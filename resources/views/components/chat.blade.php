<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club UniTee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost:8000/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=r_mFOKb6zkSmUDO2wVvYDv_e1BESxy9M48vqaD0JMGkgndaV-NY5zq8CvWsXDHoaCe8dblId97DNtnHUkmc1Pw" charset="UTF-8"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar-uni">
        <div class="sidebar-header">
            <a href="http://localhost:8000">
             <img src="http://localhost:8000/assets/customer/images/trasparent-logo1.png" alt="" class="sidebar-logo">            </a>
        </div>
        <ul class="sidebar-menu">
                            <li>
                    <a href="http://localhost:8000/customer/dashboard"
                    class="">
                        Dashboard
                    </a>
                </li>
            
            
            <li><a href="http://localhost:8000/customer/members " class="active">Members</a></li>
            <li><a href="http://localhost:8000/customer/connections" class="">Connections</a></li>
            <li><a href="http://localhost:8000/customer/events" class="">Events</a></li>

            <li><a href="http://localhost:8000/customer/profile" class="">My Profile</a></li>
        </ul>
    </div>
         <!-- MAIN CONTENT -->
     <div class="main-content">
         <!-- TOP NAVBAR -->
         <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
             <h4 class="m-0 fw-bold text-uni">Members</h4>
             <div class="d-flex align-items-center gap-3">
    <div class="text-end">
        <p class="m-0 user-name">Abish Choudhary</p>
        <p class="m-0 user-role">Member</p>
    </div>
    <img src="http://localhost:8000/assets/customer/images/person-dummy.jpg"
        class="user-avatar rounded-circle" alt="Profile Image">
    <form method="POST" action="http://localhost:8000/logout">
        <input type="hidden" name="_token" value="nyBIjsO4ZQ0sr3SMwE5TABqzFRZib39Z8PCCmgwA" autocomplete="off">        <button type="submit" class="btn logout-btn">Logout</button>
    </form>
</div>
         </nav>

         <!-- HEADER -->
         <section class="page-header text-center py-3">
             <div class="container">
                 <h1 class="page-title">Find Members</h1>
                 <p class="page-subtitle">Explore profiles and connect with inspiring women.</p>
             </div>
         </section>

         <!-- FILTERS SECTION -->
         <section class="pb-4">
             <div class="container">

                 <div class="card card-uni p-4 mb-4">
                     <h5 class="fw-bold mb-3">Search & Filter</h5>

                     <!-- FILTERS -->
                     <form action="http://localhost:8000/customer/members" method="GET">
                         <div class="row g-3">

                             <!-- SEARCH -->
                             <div class="col-md-4">
                                 <input type="text" name="search" class="form-control input-uni"
                                     placeholder="Search name, profession..." value="">
                             </div>

                             <!-- GOLF SKILL LEVEL -->
                             <div class="col-md-3">
                                 <select name="golf_skill_level" class="form-select input-uni">
                                     <option value="">Golf Skill Level</option>
                                     <option value="Beginner"
                                         >
                                         Beginner
                                     </option>
                                     <option value="Intermediate"
                                         >
                                         Intermediate
                                     </option>
                                     <option value="Advanced"
                                         >
                                         Advanced
                                     </option>
                                 </select>
                             </div>

                             <!-- AVAILABILITY -->
                             <div class="col-md-3">
                                 <select name="availability" class="form-select input-uni">
                                     <option value="">Availability</option>
                                     <option value="Weekday Mornings"
                                         >
                                         Weekday Mornings
                                     </option>
                                     <option value="Weekday Afternoons"
                                         >
                                         Weekday Afternoons
                                     </option>
                                     <option value="Weekends" >
                                         Weekends
                                     </option>
                                     <option value="No Preference"
                                         >
                                         No Preference
                                     </option>
                                 </select>
                             </div>

                             <!-- SUBMIT -->
                             <div class="col-md-2">
                                 <button type="submit" class="btn btn-gradient w-100 fw-semibold">
                                     Apply
                                 </button>
                             </div>

                         </div>
                     </form>

                 </div>

             </div>
         </section>

         <!-- MEMBERS GRID -->
         <section class="pb-5">
             <div class="container">

                 <div class="row g-4">
                                                                           <!-- MEMBER CARD -->
                             <div class="col-md-4">
                                 <div class="card card-uni p-4 text-center">
                                     <!-- PROFILE PHOTO -->
                                     <div class="member-photo mb-3">
                                                                                      <img src="http://localhost:8000/assets/customer/images/person-dummy.jpg"
                                                 alt="Profile Image" class="rounded-circle"
                                                 style="width:120px;height:120px;object-fit:cover;">
                                                                              </div>
                                     <h5 class="fw-bold">Amit</h5>
                                     <p class="text-muted mb-1">program</p>
                                     <span
                                         class="badge bg-success-subtle text-success fw-semibold mb-2">goldikkumar123@gmail.com</span>
                                     <!-- <p class="text-muted small">"https://dashboard.zayda.io/customer/dashboard"</p><br>
                                             <p class="text-muted small">"test"</p> -->
                                     <a href="http://localhost:8000/profile/2"
                                         class="btn btn-gradient w-100 mt-2">View Profile</a>
                                     <button class="btn btn-gradient btn-sm"
                                         onclick="openChat(2, 'Amit' , '')">
                                         Chat
                                     </button>

                                 </div>
                             </div>
                                                               </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-5">
                     
                 </div>

             </div>
         </section>

     </div>

     <!-- CHAT DRAWER -->
     <!-- CHAT DRAWER -->
<div id="chatDrawer" class="chat-drawer">
    <div class="chat-header d-flex align-items-center">
        <img id="chatUserProfile" 
            src="http://localhost:8000/assets/customer/images/person-dummy.jpg" 
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
    top: 0;
    right: -400px;
    width: 380px;
    height: 100%;
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
    background: #fff;
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
}
.chat-msg.sent {
    background: #10b981;
    border: 1px solid #10b981;
    color: #fff;
    margin-left: auto;
    display: flex;
    justify-content: space-between;
    align-items: end;
}
.chat-msg.received {
    background: #ddd;
    border: 1px solid #ddd;
    display: flex;
    justify-content: space-between;
    align-items: end;
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
const baseUrl = "http://localhost:8000";
const authUserId = 4;
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
            'X-CSRF-TOKEN': 'nyBIjsO4ZQ0sr3SMwE5TABqzFRZib39Z8PCCmgwA'
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
let pusher = new Pusher("3c78bdc4ea776fbdad10", {
    cluster: "ap2",
    authEndpoint: `${baseUrl}/broadcasting/auth`,
    forceTLS: true,
    auth: {
        headers: {
            'X-CSRF-TOKEN': 'nyBIjsO4ZQ0sr3SMwE5TABqzFRZib39Z8PCCmgwA'
        }
    }
});

let channel = pusher.subscribe('private-chat.4');

channel.bind('message.sent', function (data) {
    if (currentChatUserId == data.message.sender_id) {
        let div = document.createElement('div');
        div.className = 'chat-msg received';

        let msgContent = document.createElement('div');
        msgContent.innerText = data.message.message;

        let timestamp = document.createElement('div');
        timestamp.style.fontSize = '10px';
        timestamp.style.color = '#fff';
        timestamp.style.marginTop = '2px';
        timestamp.innerText = new Date(data.message.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

        div.appendChild(msgContent);
        div.appendChild(timestamp);

        document.getElementById('chatMessages').appendChild(div);
        scrollToBottom();
    }
});

</script>

     
</body>

</html>
