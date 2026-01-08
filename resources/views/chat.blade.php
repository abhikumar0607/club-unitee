@extends(auth()->user()->role === 'customer'
    ? 'layouts.customer-dashboard'
    : 'layouts.admin-dashboard'
)

@section('content')

<style>
.chat-wrapper{height:calc(100vh - 120px);padding:15px}
.chat-page{display:flex;height:100%;background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.1)}
.chat-users{width:320px;border-right:1px solid #e5e7eb;background:#f9fafb;display:flex;flex-direction:column}
.chat-users-header{padding:16px;font-weight:700;border-bottom:1px solid #e5e7eb}
.chat-search{padding:10px 14px;border-bottom:1px solid #e5e7eb}
.chat-search input{width:100%;padding:8px 12px;border-radius:8px;border:1px solid #d1d5db}
.chat-users-list{flex:1;overflow-y:auto}
.chat-user{padding:12px 16px;display:flex;gap:12px;cursor:pointer;align-items:center;position:relative}
.chat-user:hover,.chat-user.active{background:#e6f7f0}
.chat-user img{width:42px;height:42px;border-radius:50%;object-fit:cover}
.chat-user-name{font-weight:600;font-size:14px}
.chat-user-last{font-size:12px;color:#6b7280}
.unread-badge{position:absolute;right:14px;top:50%;transform:translateY(-50%);background:#ef4444;color:#fff;min-width:18px;height:18px;font-size:11px;border-radius:999px;display:flex;align-items:center;justify-content:center}

.chat-box{flex:1;display:flex;flex-direction:column;background:#ece5dd}
.chat-header{padding:14px 16px;background:#fff;border-bottom:1px solid #e5e7eb;display:flex;align-items:center;gap:12px}
.chat-header img{width:42px;height:42px;border-radius:50%;object-fit:cover}
.chat-header-name{font-weight:700}

.chat-messages{flex:1;padding:20px;overflow-y:auto}
.chat-msg{max-width:65%;padding:8px 12px;margin-bottom:10px;border-radius:10px;font-size:14px}
.chat-msg.sent{background:#dcf8c6;margin-left:auto}
.chat-msg.received{background:#fff}
.chat-time{font-size:10px;text-align:right;opacity:.6}
.msg-status{margin-left:4px;font-size:12px}
.msg-status.seen{color:#0ea5e9}

.chat-input{padding:12px;background:#fff;border-top:1px solid #ddd;display:flex;gap:10px}
.chat-input input{flex:1;border:1px solid #d1d5db;border-radius:999px;padding:10px 16px}
.chat-input button{background:#22c55e;border:none;color:#fff;padding:0 22px;border-radius:999px}
</style>

<!--MAIN CONTENT-->
<div class="main-content">
    <!--TOP NAVBAR-->
    <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
        <h4 class="m-0 fw-bold text-uni">chats</h4>
        <x-customer-dashboard-nav-profile />
    </nav>
    <!--HEADER-->
    <section class="page-header text-center py-3">
    </section>   
<div class="chat-wrapper">
<div class="chat-page">

<!-- USERS -->
<div class="chat-users">
    <div class="chat-users-header">Members</div>
    <div class="chat-search">
        <input type="text" id="userSearch" placeholder="Search members">
    </div>
    <div class="chat-users-list">
        @foreach($members as $m)
        <div class="chat-user"
            data-id="{{ $m->id }}"
            data-name="{{ strtolower($m->name) }}"
            data-image="{{ $m->profile_image ? asset('assets/customer/uploads/profile/'.$m->profile_image) : asset('assets/customer/images/person-dummy.jpg') }}"
            onclick="openChat({{ $m->id }}, '{{ $m->name }}', this)">
            <img src="{{ $m->profile_image ? asset('assets/customer/uploads/profile/'.$m->profile_image) : asset('assets/customer/images/person-dummy.jpg') }}">
            <div>
                <div class="chat-user-name">{{ $m->name }}</div>
                <div class="chat-user-last" id="last-msg-{{ $m->id }}">Tap to chat</div>
            </div>
            <span id="unread-{{ $m->id }}" class="unread-badge d-none">0</span>
        </div>
        @endforeach
    </div>
</div>

<!-- CHAT -->
<div class="chat-box">
    <div class="chat-header">
        <img id="chatHeaderImg" src="{{ asset('assets/customer/images/person-dummy.jpg') }}">
        <div class="chat-header-name" id="chatHeaderName">Select a member</div>
    </div>

    <div class="chat-messages" id="chatMessages"></div>

    <div class="chat-input">
        <input type="text" id="chatInput" placeholder="Type a message">
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

</div>
</div>
</div>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
/* ================= GLOBAL STATE ================= */
const baseUrl = "{{ url('/') }}";
const authUserId = {{ auth()->id() }};
let currentChatUserId = null;
let unseenCounts = {};   // 🔥 FIXED ERROR

/* SEARCH */
document.getElementById('userSearch').addEventListener('keyup', e=>{
    let v=e.target.value.toLowerCase();
    document.querySelectorAll('.chat-user').forEach(u=>{
        u.style.display=u.dataset.name.includes(v)?'flex':'none';
    });
});

/* OPEN CHAT */
async function openChat(id,name,el){
    currentChatUserId=id;
    chatHeaderName.innerText=name;
    chatHeaderImg.src=el.dataset.image;
    chatMessages.innerHTML='';

    document.querySelectorAll('.chat-user').forEach(u=>u.classList.remove('active'));
    el.classList.add('active');

    let r=await fetch(`${baseUrl}/chat/messages/${id}`);
    let msgs=await r.json();
    msgs.forEach(renderMessage);
    scrollBottom();

    await fetch(`${baseUrl}/chat/seen/${id}`,{
        method:'POST',
        headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
    });

    unseenCounts[id]=0;
    hideUnread(id);
}

/* RENDER */
function renderMessage(m){
    let d=document.createElement('div');
    d.className='chat-msg '+(m.sender_id==authUserId?'sent':'received');
    d.dataset.id=m.id;
    d.innerHTML=`
        ${m.message}
        <div class="chat-time">
            ${new Date(m.created_at).toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})}
            ${m.sender_id==authUserId
                ? `<span class="msg-status ${m.is_seen?'seen':''}">${m.is_seen?'✓✓':'✓'}</span>`
                : ''}
        </div>`;
    chatMessages.appendChild(d);
}

/* SEND */
function sendMessage(){
    if(!chatInput.value.trim())return;
    fetch(`${baseUrl}/chat/messages`,{
        method:'POST',
        headers:{'Content-Type':'application/json','X-CSRF-TOKEN':'{{ csrf_token() }}'},
        body:JSON.stringify({receiver_id:currentChatUserId,message:chatInput.value})
    }).then(r=>r.json()).then(m=>{
        renderMessage(m);
        chatInput.value='';
        scrollBottom();
    });
}

/* UNREAD */
function hideUnread(id){
    let b=document.getElementById(`unread-${id}`);
    if(b)b.classList.add('d-none');
}

/* SCROLL */
function scrollBottom(){chatMessages.scrollTop=chatMessages.scrollHeight}

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
    const s=data.message.sender_id;

    if(currentChatUserId===s){
        renderMessage(data.message);
        scrollBottom();
        fetch(`${baseUrl}/chat/seen/${s}`,{
            method:'POST',
            headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}
        });
    }else{
        unseenCounts[s]=(unseenCounts[s]||0)+1;
        let b=document.getElementById(`unread-${s}`);
        if(b){b.innerText=unseenCounts[s];b.classList.remove('d-none')}
    }
});

/* REALTIME SEEN */
channel.bind('message.seen',data=>{
    let el=document.querySelector(`.chat-msg.sent[data-id="${data.message.id}"] .msg-status`);
    if(el){el.innerText='✓✓';el.classList.add('seen')}
});
</script>

@endsection
