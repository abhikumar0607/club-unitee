<!-- ================= CHAT DRAWER ================= -->
<div id="chatDrawer" class="chat-drawer">
    <div class="chat-header d-flex align-items-center">
        <img id="chatUserProfile"
            src="{{ asset('assets/customer/images/person-dummy.jpg') }}"
            style="width:40px;height:40px;border-radius:50%;margin-right:10px;">
        <span id="chatUserName">Chat</span>
        <button onclick="closeChat()" style="margin-left:auto;">✕</button>
    </div>

    <div class="chat-body" id="chatMessages"></div>

    <div class="chat-footer">
        <input type="text" id="chatInput" placeholder="Type a message...">
        <button onclick="sendMessage()">➤</button>
    </div>
</div>

<!-- ================= STYLES ================= -->
<style>
.chat-drawer{
    position:fixed;bottom:0;right:-400px;width:380px;height:55%;
    background:#fff;box-shadow:-4px 0 15px rgba(0,0,0,.15);
    transition:.3s;z-index:9999;display:flex;flex-direction:column;
    border-radius:10px 10px 0 0;
}
.chat-drawer.open{right:0}
.chat-header{
    padding:12px;
    background:#44a982;
    color:#000;
    font-weight:600;
    display:flex;
    align-items:center;
    border-radius:10px 10px 0 0;
}
.chat-header button{
    background:#fff;border:none;border-radius:50%;padding:4px 8px;
}
.chat-body{
    flex:1;padding:12px;overflow-y:auto;background:#ece5dd;
}

/* ===== CHAT BUBBLES ===== */
.chat-msg{
    max-width:75%;
    padding:8px 10px;
    margin-bottom:8px;
    font-size:14px;
    border-radius:8px;
    line-height:1.4;
}
.chat-msg.sent{
    background:#dcf8c6;
    margin-left:auto;
    border-radius:8px 0 8px 8px;
}
.chat-msg.received{
    background:#fff;
    margin-right:auto;
    border-radius:0 8px 8px 8px;
    border:1px solid #eee;
}
.msg-text{word-wrap:break-word}
.msg-meta{
    display:flex;
    justify-content:flex-end;
    align-items:center;
    gap:6px;
    font-size:11px;
    margin-top:2px;
    color:#555;
}
.msg-status{font-size:12px}
.msg-status.seen{color:#34b7f1}

/* ===== FOOTER ===== */
.chat-footer{
    display:flex;padding:8px;border-top:1px solid #ddd;background:#fff;
}
.chat-footer input{
    flex:1;border:none;outline:none;padding:8px;
}
.chat-footer button{
    background:#25D366;border:none;color:#fff;
    padding:0 16px;border-radius:20px;
}

/* ===== UNREAD BADGE ===== */
.unread-badge{
    position:absolute;
    top:-6px;
    right:-6px;
    background:#ef4444;
    color:#fff;
    min-width:18px;
    height:18px;
    font-size:11px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
}
</style>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<!-- ================= SCRIPT ================= -->
<script>
const baseUrl = "{{ url('/') }}";
const authUserId = {{ auth()->id() }};
let currentChatUserId = null;

//close chat
function closeChat(){
    chatDrawer.classList.remove('open');
}
/* OPEN CHAT */
async function openChat(userId, name, image){
    currentChatUserId = userId;
    chatUserName.innerText = name;
    chatUserProfile.src = image
        ? `${baseUrl}/assets/customer/uploads/profile/${image}`
        : `${baseUrl}/assets/customer/images/person-dummy.jpg`;

    chatDrawer.classList.add('open');
    chatMessages.innerHTML = '';

    const res = await fetch(`${baseUrl}/chat/messages/${userId}`);
    const messages = await res.json();
    messages.forEach(renderMessage);
    scrollToBottom();

    await fetch(`${baseUrl}/chat/seen/${userId}`,{
        method:'POST',
        headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
    });

    updateSeenUI();
    removeUnreadBadge(userId);
}

/* RENDER MESSAGE */
function renderMessage(msg){
    let isMine = msg.sender_id == authUserId;
    let div = document.createElement('div');
    div.className = isMine ? 'chat-msg sent' : 'chat-msg received';
    div.dataset.id = msg.id;

    div.innerHTML = `
        <div class="msg-text">${msg.message}</div>
        <div class="msg-meta">
            <span>${new Date(msg.created_at).toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})}</span>
            ${isMine ? `<span class="msg-status ${msg.is_seen?'seen':''}">${msg.is_seen?'✓✓':'✓'}</span>` : ''}
        </div>
    `;
    chatMessages.appendChild(div);
}

/* SEND MESSAGE */
function sendMessage(){
    let input = chatInput;
    if(!input.value.trim()) return;

    fetch(`${baseUrl}/chat/messages`,{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        body:JSON.stringify({
            receiver_id: currentChatUserId,
            message: input.value
        })
    })
    .then(r=>r.json())
    .then(msg=>{
        renderMessage(msg);
        input.value='';
        scrollToBottom();
    });
}

/* SEEN UI */
function updateSeenUI(){
    document.querySelectorAll('.chat-msg.sent .msg-status').forEach(el=>{
        el.innerText='✓✓';
        el.classList.add('seen');
    });
}

/* UNREAD BADGE */
function loadUnseenCount(userId){
    fetch(`${baseUrl}/chat/unseen-count/${userId}`)
        .then(r=>r.json())
        .then(d=>{
            let b=document.getElementById(`unread-${userId}`);
            if(!b)return;
            if(d.count>0){b.innerText=d.count>9?'9+':d.count;b.classList.remove('d-none')}
            else b.classList.add('d-none');
        });
}
function removeUnreadBadge(userId){
    let b=document.getElementById(`unread-${userId}`);
    if(b)b.classList.add('d-none');
}

/* SCROLL */
function scrollToBottom(){chatMessages.scrollTop=chatMessages.scrollHeight}

/* PUSHER */
let pusher=new Pusher("{{ config('broadcasting.connections.pusher.key') }}",{
    cluster:"{{ config('broadcasting.connections.pusher.options.cluster') }}",
    authEndpoint:`${baseUrl}/broadcasting/auth`,
    forceTLS:true,
    auth:{headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}}
});
let channel=pusher.subscribe('private-chat.{{ auth()->id() }}');

/* REALTIME MESSAGE */
channel.bind('message.sent',data=>{
    loadUnseenCount(data.message.sender_id);
    if(currentChatUserId===data.message.sender_id){
        renderMessage(data.message);
        scrollToBottom();
        fetch(`${baseUrl}/chat/seen/${data.message.sender_id}`,{
            method:'POST',headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
        }).then(updateSeenUI);
    }
});

/* REALTIME SEEN */
channel.bind('message.seen',data=>{
    let el=document.querySelector(`.chat-msg.sent[data-id="${data.message.id}"] .msg-status`);
    if(el){el.innerText='✓✓';el.classList.add('seen')}
});
</script>
