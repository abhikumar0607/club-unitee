 @extends('layouts.customer-dashboard')
 @section('content')
     <!-- MAIN CONTENT -->
     <div class="main-content">
         <!-- TOP NAVBAR -->
         <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
             <h4 class="m-0 fw-bold text-uni">Members</h4>
             <x-customer-dashboard-nav-profile />
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
                     <form action="{{ route('customer.members') }}" method="GET">
                         <div class="row g-3">

                             <!-- SEARCH -->
                             <div class="col-md-4">
                                 <input type="text" name="search" class="form-control input-uni"
                                     placeholder="Search name, profession..." value="{{ request('search') }}">
                             </div>

                             <!-- GOLF SKILL LEVEL -->
                             <div class="col-md-3">
                                 <select name="golf_skill_level" class="form-select input-uni">
                                     <option value="">Golf Skill Level</option>
                                     <option value="Beginner"
                                         {{ request('golf_skill_level') == 'Beginner' ? 'selected' : '' }}>
                                         Beginner
                                     </option>
                                     <option value="Intermediate"
                                         {{ request('golf_skill_level') == 'Intermediate' ? 'selected' : '' }}>
                                         Intermediate
                                     </option>
                                     <option value="Advanced"
                                         {{ request('golf_skill_level') == 'Advanced' ? 'selected' : '' }}>
                                         Advanced
                                     </option>
                                 </select>
                             </div>

                             <!-- AVAILABILITY -->
                             <div class="col-md-3">
                                 <select name="availability" class="form-select input-uni">
                                     <option value="">Availability</option>
                                     <option value="Weekday Mornings"
                                         {{ request('availability') == 'Weekday Mornings' ? 'selected' : '' }}>
                                         Weekday Mornings
                                     </option>
                                     <option value="Weekday Afternoons"
                                         {{ request('availability') == 'Weekday Afternoons' ? 'selected' : '' }}>
                                         Weekday Afternoons
                                     </option>
                                     <option value="Weekends" {{ request('availability') == 'Weekends' ? 'selected' : '' }}>
                                         Weekends
                                     </option>
                                     <option value="No Preference"
                                         {{ request('availability') == 'No Preference' ? 'selected' : '' }}>
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
                     @if ($members->count() > 0)
                         @foreach ($members as $member)
                             <!-- MEMBER CARD -->
                             <div class="col-md-4">
                                 <div class="card card-uni p-4 text-center">
                                     <!-- PROFILE PHOTO -->
                                     <div class="member-photo mb-3">
                                         @if ($member->profile_image)
                                             <img src="{{ asset('assets/customer/uploads/profile/' . $member->profile_image) }}"
                                                 alt="Profile Image" class="rounded-circle"
                                                 style="width:120px;height:120px;object-fit:cover;">
                                         @else
                                             <img src="{{ asset('assets/customer/images/person-dummy.jpg') }}"
                                                 alt="Profile Image" class="rounded-circle"
                                                 style="width:120px;height:120px;object-fit:cover;">
                                         @endif
                                     </div>
                                     <h5 class="fw-bold">{{ $member->name }}</h5>
                                     <p class="text-muted mb-1">{{ $member->profession }}</p>
                                     <span
                                         class="badge bg-success-subtle text-success fw-semibold mb-2">{{ $member->email }}</span>
                                     <!-- <p class="text-muted small">"{{ $member->linkedin_url ?? '' }}"</p><br>
                                             <p class="text-muted small">"{{ $member->instagram_handle ?? '' }}"</p> -->
                                     <a href="{{ route('profile.index', $member->id) }}"
                                         class="btn btn-gradient w-100 mt-2">View Profile</a>
                                     <button class="btn btn-gradient btn-sm"
                                         onclick="openChat({{ $member->id }}, '{{ $member->name }}')">
                                         Chat
                                     </button>

                                 </div>
                             </div>
                         @endforeach
                     @else
                         <p>No members found.</p>
                     @endif
                 </div>

                 <!-- Pagination -->
                 <div class="d-flex justify-content-center mt-5">
                     {{ $members->links('pagination::bootstrap-5') }}
                 </div>

             </div>
         </section>

     </div>

     <!-- CHAT DRAWER -->
     <div id="chatDrawer" class="chat-drawer">
         <div class="chat-header">
             <span id="chatUserName">Chat</span>
             <button onclick="closeChat()">✕</button>
         </div>

         <div class="chat-body" id="chatMessages">
             <div class="chat-msg received">
                 Hi 👋 How can I help you?
             </div>
             <div class="chat-msg sent">
                 I want to connect with you
             </div>
         </div>

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
             box-shadow: -4px 0 15px rgba(0, 0, 0, .15);
             transition: right .3s ease;
             z-index: 9999;
             display: flex;
             flex-direction: column;
         }

         .chat-drawer.open {
             right: 0;
         }

         .chat-header {
             padding: 15px;
             background: #6f42c1;
             color: #fff;
             font-weight: 600;
             display: flex;
             justify-content: space-between;
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
             background: #6f42c1;
             color: #fff;
             margin-left: auto;
         }

         .chat-msg.received {
             background: #e9ecef;
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
             background: #6f42c1;
             color: #fff;
             border: none;
             padding: 0 18px;
             border-radius: 20px;
         }
     </style>
     <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
   <script>
    const baseUrl = "{{ url('/') }}";
    const authUserId = {{ auth()->id() }};
    let currentChatUserId = null;

    // Open Chat drawer and load messages
    function openChat(userId, userName) {
        currentChatUserId = userId;

        document.getElementById('chatUserName').innerText = userName;
        document.getElementById('chatDrawer').classList.add('open');
        document.getElementById('chatMessages').innerHTML = '';

        fetch(`${baseUrl}/chat/messages/${userId}`)
            .then(res => res.json())
            .then(messages => {
                messages.forEach(msg => {
                    let div = document.createElement('div');
                    div.className = msg.sender_id == authUserId
                        ? 'chat-msg sent'
                        : 'chat-msg received';

                    div.innerText = msg.message;
                    document.getElementById('chatMessages').appendChild(div);
                });
                scrollToBottom();
            });
    }

    // Close Chat drawer
    function closeChat() {
        document.getElementById('chatDrawer').classList.remove('open');
    }

    // Send message
    function sendMessage() {
        let input = document.getElementById('chatInput');
        if (input.value.trim() === '') return;

        let message = input.value;

        fetch(`${baseUrl}/chat/messages`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                receiver_id: currentChatUserId,
                message: message
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

    // ================= PUSHER =================
    let pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        authEndpoint: "/broadcasting/auth",
        encrypted: true
    });

    let channel = pusher.subscribe(
        'private-chat.{{ auth()->id() }}'
    );

    channel.bind('message.sent', function (data) {
        if (currentChatUserId == data.message.sender_id) {
            let div = document.createElement('div');
            div.className = 'chat-msg received';
            div.innerText = data.message.message;
            document.getElementById('chatMessages').appendChild(div);
            scrollToBottom();
        }
    });

</script>


 @endsection
