<!-- CHAT DRAWER -->
<div id="chatDrawer" class="chat-drawer">
    <div class="chat-header d-flex align-items-center">
        <img id="chatUserProfile"
            src="{{ asset('assets/customer/images/person-dummy.jpg') }}"
            alt="Profile"
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
    box-shadow: -4px 0 15px rgba(0,0,0,.15);
    transition: right .3s ease;
    z-index: 9999;
    display: flex;
    flex-direction: column;
}
.chat-drawer.open { right: 0; }
.chat-header {
    padding: 15px;
    background: linear-gradient(to right, var(--emerald), var(--rose));
    color: #000000;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
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

</style>
 
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
 
<script>
const baseUrl = "{{ url('/') }}";
const authUserId = {{ auth()->id() }};
let currentChatUserId = null;
 
function openChat(userId, userName, profileImage) {
    currentChatUserId = userId;
    document.getElementById('chatUserName').innerText = userName;
    document.getElementById('chatUserProfile').src = profileImage
        ? `${baseUrl}/assets/customer/uploads/profile/${profileImage}`
        : `${baseUrl}/assets/customer/images/person-dummy.jpg`;
    document.getElementById('chatDrawer').classList.add('open');
    document.getElementById('chatMessages').innerHTML = '';
 
    fetch(`${baseUrl}/chat/messages/${userId}`)
        .then(res => res.json())
        .then(messages => {
           messages.forEach(msg => {
            let div = document.createElement('div');
            div.className = msg.sender_id == authUserId ? 'chat-msg sent' : 'chat-msg received';
 
            // Message content
            let msgContent = document.createElement('div');
            msgContent.innerText = msg.message;
 
            // Timestamp
            let timestamp = document.createElement('div');
            timestamp.style.fontSize = '10px';
            timestamp.style.color = '#fff';
            timestamp.style.marginTop = '2px';
            timestamp.style.textAlign = 'end';
            timestamp.innerText = new Date(msg.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
 
            div.appendChild(msgContent);
            div.appendChild(timestamp);
 
            document.getElementById('chatMessages').appendChild(div);
        });
 
            scrollToBottom();
        });
}
 
function closeChat() {
    document.getElementById('chatDrawer').classList.remove('open');
}
 
function sendMessage() {
    let input = document.getElementById('chatInput');
    if (!input.value.trim()) return;
 
    fetch(`${baseUrl}/chat/messages`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            receiver_id: currentChatUserId,
            message: input.value
        })
    })
    .then(res => res.json())
    .then(msg => {
        let div = document.createElement('div');
        div.className = 'chat-msg sent';
        div.innerText = msg.message;
        document.getElementById('chatMessages').appendChild(div);
        input.value = '';
        scrollToBottom();
    });
}
 
function scrollToBottom() {
    let body = document.getElementById('chatMessages');
    body.scrollTop = body.scrollHeight;
}
 
// PUSHER
let pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
    cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
    authEndpoint: `${baseUrl}/broadcasting/auth`,
    forceTLS: true,
    auth: {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }
});
 
let channel = pusher.subscribe('private-chat.{{ auth()->id() }}');
 
channel.bind('message.sent', function (data) {
    if (currentChatUserId == data.message.sender_id) {
        let div = document.createElement('div');
        div.className = 'chat-msg received';
 
        let msgContent = document.createElement('div');
        msgContent.innerText = data.message.message;
 
        let timestamp = document.createElement('div');
        timestamp.style.fontSize = '10px';
        timestamp.style.color = '#666';
        timestamp.style.marginTop = '2px';
        timestamp.innerText = new Date(data.message.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
 
        div.appendChild(msgContent);
        div.appendChild(timestamp);
 
        document.getElementById('chatMessages').appendChild(div);
        scrollToBottom();
    }
});
 
</script>