<!-- CHAT DRAWER -->
<div id="chatDrawer" class="chat-drawer">
    <div class="chat-header d-flex align-items-center">
        <img id="chatUserProfile" src="{{ asset('assets/customer/images/person-dummy.jpg') }}" alt="Profile"
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

<style>
    .chat-drawer {
        position: fixed;
        bottom: 0;
        right: -400px;
        width: 380px;
        height: 50%;
        background: #fff;
        box-shadow: -4px 0 15px rgba(0, 0, 0, .15);
        transition: right .3s ease;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        border-radius: 10px 10px 0 0;
    }

    .chat-drawer.open {
        right: 0;
    }

    .chat-header {
        padding: 15px;
        background: linear-gradient(to right, var(--emerald), var(--rose));
        color: #000000;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 11px 11px 0 0;
    }

    .chat-header button {
        background: #ffffff85;
        border: 1px solid #000;
        border-radius: 99px;
        padding: 3px 8px;
    }

    .chat-body {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background: #f8f9fa;
    }

    .chat-msg {
        max-width: 75%;
        padding: 10px 14px;
        margin-bottom: 10px;
        border-radius: 18px;
        font-size: 14px;
        width: fit-content;
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: pre-wrap;
    }

    .chat-msg.sent {
        background: #10b981;
        border: 1px solid #10b981;
        color: #fff;
        margin-left: auto;
    }

    .chat-msg.received {
        background: #ddd;
        border: 1px solid #ddd;
    }

    .chat-footer {
        display: flex;
        padding: 10px;
        border-top: 1px solid #ddd;
    }

    .chat-footer input {
        flex: 1;
        border: none;
        outline: none;
        padding: 10px;
    }

    .chat-footer button {
        background: #ffffff;
        color: #000000;
        border: 1px solid #21b381;
        padding: 0 18px;
        border-radius: 20px;
    }

    .msg-status {
        font-size: 10px;
        text-align: right;
        margin-top: 2px;
        opacity: .85;
    }

    .msg-seen {
        color: #22c55e;
    }

    .unread-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ef4444;
        color: #fff;
        min-width: 18px;
        height: 18px;
        font-size: 11px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
</style>


<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
const baseUrl = "{{ url('/') }}";
const authUserId = {{ auth()->id() }};
let currentChatUserId = null;

/* ===============================
   OPEN CHAT
================================ */
async function openChat(userId, userName, profileImage) {
    currentChatUserId = userId;

    chatUserName.innerText = userName;
    chatUserProfile.src = profileImage
        ? `${baseUrl}/assets/customer/uploads/profile/${profileImage}`
        : `${baseUrl}/assets/customer/images/person-dummy.jpg`;

    chatDrawer.classList.add('open');
    chatMessages.innerHTML = '';

    // 1️⃣ Load messages
    const res = await fetch(`${baseUrl}/chat/messages/${userId}`);
    const messages = await res.json();

    messages.forEach(msg => renderMessage(msg));
    scrollToBottom();

    // 2️⃣ Mark as seen
    await fetch(`${baseUrl}/chat/seen/${userId}`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });

    // 3️⃣ Update UI
    updateSeenUI();
    removeUnreadBadge(userId);
}

/* ===============================
   RENDER MESSAGE
================================ */
function renderMessage(msg){
    let isMine = msg.sender_id == authUserId;

    let div = document.createElement('div');
    div.className = isMine ? 'chat-msg sent' : 'chat-msg received';
    div.dataset.id = msg.id;

    div.innerHTML = `
        <div>${msg.message}</div>
        ${isMine ? `<div class="msg-status">${msg.is_seen ? '✓✓ Seen' : '✓ Sent'}</div>` : ''}
    `;

    chatMessages.appendChild(div);
}

/* ===============================
   UPDATE SEEN UI
================================ */
function updateSeenUI(){
    document.querySelectorAll('.chat-msg.sent .msg-status').forEach(el => {
        el.innerText = '✓✓ Seen';
        el.classList.add('msg-seen');
    });
}

/* ===============================
   SEND MESSAGE
================================ */
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
    .then(res=>res.json())
    .then(msg=>{
        renderMessage(msg);
        input.value='';
        scrollToBottom();
    });
}

/* ===============================
   SCROLL
================================ */
function scrollToBottom(){
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

/* ===============================
   UNSEEN COUNT
================================ */
function loadUnseenCount(userId){
    fetch(`${baseUrl}/chat/unseen-count/${userId}`)
        .then(res => res.json())
        .then(data => {
            let badge = document.getElementById(`unread-${userId}`);
            if(!badge) return;

            if(data.count > 0){
                badge.classList.remove('d-none');
                badge.innerText = data.count > 9 ? '9+' : data.count;
            }else{
                badge.classList.add('d-none');
            }
        });
}

function removeUnreadBadge(userId){
    let badge = document.getElementById(`unread-${userId}`);
    if(badge){
        badge.classList.add('d-none');
    }
}

/* ===============================
   PUSHER SETUP
================================ */
let pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
    cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
    authEndpoint: `${baseUrl}/broadcasting/auth`,
    forceTLS:true,
    auth:{ headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'} }
});

let channel = pusher.subscribe('private-chat.{{ auth()->id() }}');

/* ===============================
   REALTIME MESSAGE RECEIVE
================================ */
channel.bind('message.sent', data => {

    const senderId = data.message.sender_id;

    //  ALWAYS update unseen badge (popup ho ya na ho)
    loadUnseenCount(senderId);

    //  Agar popup isi user ka open hai tabhi message render karo
    if(currentChatUserId === senderId){
        renderMessage(data.message);
        scrollToBottom();

        // auto-seen only if popup open
        fetch(`${baseUrl}/chat/seen/${senderId}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        }).then(() => {
            updateSeenUI();
            removeUnreadBadge(senderId);
        });
    }
});


/* ===============================
   REALTIME SEEN (SENDER SIDE)
================================ */
channel.bind('message.seen', data=>{
    let el = document.querySelector(
        `.chat-msg.sent[data-id="${data.message.id}"] .msg-status`
    );
    if(el){
        el.innerText = '✓✓ Seen';
        el.classList.add('msg-seen');
    }
});
</script>

