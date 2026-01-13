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
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const baseUrl = "{{ url('/') }}";
    const badge  = document.getElementById('global-unread-count');

    function updateUnreadCount(){
        fetch(`${baseUrl}/chat/global/unread-count`)
            .then(r => r.json())
            .then(d => {
                if(!badge) return;

                if(d.count > 0){
                    badge.innerText = d.count > 9 ? '9+' : d.count;
                    badge.classList.remove('d-none');
                }else{
                    badge.classList.add('d-none');
                }
            });
    }

    updateUnreadCount();

    let pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
        cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
        authEndpoint: `${baseUrl}/broadcasting/auth`,
        forceTLS: true,
        auth: {
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" }
        }
    });

    /* ================= PRIVATE ================= */
    let userChannel = pusher.subscribe('private-chat.{{ auth()->id() }}');
    userChannel.bind('message.sent', updateUnreadCount);
    userChannel.bind('message.seen', updateUnreadCount);

    /* ================= GROUP CHANNELS (✅ FIXED) ================= */
    @foreach($groupIds as $group)
        let groupChannel{{ $group->id }} =
            pusher.subscribe('private-chat.{{ $group->id }}');

        groupChannel{{ $group->id }}.bind('group.message.sent', () => {
            updateUnreadCount();
        });

        groupChannel{{ $group->id }}.bind('group.message.read', () => {
            updateUnreadCount();
        });
    @endforeach

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
