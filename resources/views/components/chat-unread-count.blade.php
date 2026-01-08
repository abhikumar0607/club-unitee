<style>
    .chat-nav-item{
    position: relative;
}

.chat-nav-link{
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
}
.unread-badge-count{
     position: absolute;
    top: -7px;
    right: -6px;
    background-color: #ef4444;
    color: #fff;
    min-width: 18px;
    height: 18px;
    padding: 0 5px;
    font-size: 11px;
    font-weight: 600;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    box-shadow: 0 2px 6px rgba(0,0,0,0.25);
}

/* hide helper */
.d-none{
    display: none !important;
}

/*  small pulse animation */
@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.6);
    }
    70% {
        transform: scale(1.08);
        box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
    }
}
</style>
<span
    id="global-unread-count"
    class="unread-badge-count d-none"
>
    0
</span>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const baseUrl = "{{ url('/') }}";
    const badge  = document.getElementById('global-unread-count');

    function updateUnreadCount(){
        fetch(`${baseUrl}/chat/unread-count`)   // controller tu banayega
            .then(res => res.json())
            .then(data => {
                if(data.count > 0){
                    badge.innerText = data.count > 9 ? '9+' : data.count;
                    badge.classList.remove('d-none');
                }else{
                    badge.classList.add('d-none');
                }
            });
    }

    // initial load
    updateUnreadCount();

    // ================= PUSHER =================
    let pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        authEndpoint: `${baseUrl}/broadcasting/auth`,
        forceTLS: true,
        auth: {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        }
    });

    let channel = pusher.subscribe('private-chat.{{ auth()->id() }}');

    // new message received
    channel.bind('message.sent', () => {
        updateUnreadCount();
    });

    // message seen
    channel.bind('message.seen', () => {
        updateUnreadCount();
    });

});
</script>

<style>
.unread-badge{
    background:#ef4444;
    color:#fff;
    min-width:18px;
    height:18px;
    font-size:11px;
    border-radius:50%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}
</style>
