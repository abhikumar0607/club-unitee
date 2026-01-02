<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reset Your Password</title>
    </head>
    <body style="margin:0;padding:0;background:#f3f6f4;font-family:Arial,Helvetica,sans-serif;">
        <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
            <tr>
                <td align="center">
                    <!--CARD-->
                    <table width="520" cellpadding="0" cellspacing="0"
                        style="
                        background:#ffffff;
                        border-radius:14px;
                        box-shadow:0 10px 30px rgba(0,0,0,0.08);
                        padding:34px;
                        ">
                        <!--LOGO-->
                        <tr>
                            <td align="center" style="padding-bottom:22px;">
                                <img src="{{ $message->embed(public_path('assets/customer/images/trasparent-logo1.png')) }}"
                                alt="Club UniTee"
                                style="height:48px;display:block;">
                            </td>
                        </tr>
                        <!--TITLE-->
                        <tr>
                            <td align="center" style="padding-bottom:6px;">
                                <h2 style="
                                margin:0;
                                font-size:16px;
                                color:#065f46;
                                font-weight:600;
                                ">
                                Reset Your Password
                                </h2>
                            </td>
                        </tr>
                        <!--SUB TITLE-->
                        <tr>
                            <td align="center" style="padding-bottom:22px;">
                                <p style="
                                margin:0;
                                font-size:13px;
                                color:#6b7280;
                                line-height:20px;
                                ">
                                Secure access to your Club UniTee account
                                </p>
                            </td>
                        </tr>
                        <!--MESSAGE-->
                        <tr>
                            <td style="
                                color:#374151;
                                font-size:14px;
                                line-height:22px;
                                padding-bottom:24px;
                                ">
                                Hello <strong>{{ $user->name ?? 'there' }}</strong>,<br><br>
                                We received a request to reset your password.
                                Click the button below to create a new, secure password for your account.
                            </td>
                        </tr>
                        <!-- BUTTON -->
                        <tr>
                            <td align="center" style="padding-bottom:12px;">
                                <a href="{{ $url }}"
                                style="
                                background:#0f766e;
                                color:#ffffff;
                                text-decoration:none;
                                padding:10px 22px;
                                border-radius:8px;
                                font-size:12px;
                                font-weight:600;
                                display:inline-block;
                                ">
                                Reset Password
                                </a>
                            </td>
                        </tr>
                        <!--INFO TEXT (same green tone)-->
                        <tr>
                            <td style="
                                text-align:center;
                                font-size:13px;
                                color:#374151;
                                line-height:20px;
                                padding-bottom:24px;
                                ">
                                This password reset link will expire in <strong>60 minutes</strong>.<br>
                                If you did not request a password reset, you can safely ignore this email.
                            </td>
                        </tr>
                        <!--FOOTER-->
                        <tr>
                            <td style="
                                font-size:12px;
                                color:#6b7280;
                                line-height:18px;
                                ">
                                Regards,<br>
                                <strong style="color:#065f46;">Club UniTee Team</strong><br>
                                <span style="font-size:11px;">
                                    Play Together. Rise Together.
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>