<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Invitation</title>
</head>
<body>

    <p>Hi {{ $user->name }},</p>

    <p>
        You have been selected for the following event:
    </p>

    <ul>
        <li><strong>Event:</strong> {{ $event->title }}</li>
        <li><strong>Date:</strong> {{ $event->date }}</li>
        <li><strong>Time:</strong> {{ $event->event_time }}</li>
        <li><strong>Location:</strong> {{ $event->location }}</li>
    </ul>

    <p>
        Please be available on time.
    </p>

    <p>
        Thanks,<br>
        {{ config('app.name') }}
    </p>

</body>
</html>
