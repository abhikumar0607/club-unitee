<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RSVP Confirmed</title>
    </head>
    <body style="margin:0;padding:0;font-family:Arial, Helvetica, sans-serif;color:#222;line-height:1.6;">
        <p>Hello Admin,</p>
        <p>
            We’re pleased to inform you that a user has confirmed their attendance
            for the following event:
        </p>
        <p>
            <strong>User Name:</strong> {{ $user->name }}<br>
            <strong>User Email:</strong> {{ $user->email }}
        </p>
        <p>
            <strong>Event Name:</strong> {{ $event->title }}<br>
            <strong>Event DateTime:</strong>
            {{ \Carbon\Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $event->date . ' ' . $event->event_time
            )->format('d M Y, h:i A') }} 
        </p>
        <p>
            <strong>RSVP Status:</strong>
            <span style="color:#1a7f37;font-weight:bold;">GOING</span>
        </p>
        <p>
            Warm regards,<br>
            <strong>The Club Unitee Team</strong>
        </p>
    </body>
</html>