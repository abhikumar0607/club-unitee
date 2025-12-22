<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Account Approved</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left" style="padding:20px;">

            <!-- MAIN CONTAINER -->
            <table width="600" cellpadding="0" cellspacing="0"
                   style="background:#ffffff;border-radius:8px;overflow:hidden;">

                <!-- HEADER -->
                <tr>
                    <td style="background:#1f7a5c;padding:18px 24px;">
                        <h2 style="margin:0;color:#ffffff;">
                            Account Approved
                        </h2>
                    </td>
                </tr>

                <!-- BODY -->
                <tr>
                    <td style="padding:24px;color:#333;">

                        <p style="font-size:15px;">
                            Hello <strong>{{ $user->name }}</strong>,
                        </p>

                        <p style="font-size:14px;line-height:1.6;">
                            We are pleased to inform you that your account has been
                            <strong>successfully approved</strong>.  
                            You can now log in and start using all features of our platform.
                        </p>

                        <!-- LOGIN DETAILS -->
                        <table width="100%" cellpadding="0" cellspacing="0"
                               style="margin-top:18px;border:1px solid #e0e0e0;border-radius:6px;">
                            <tr>
                                <td style="padding:14px;background:#f9f9f9;">
                                    <p style="margin:6px 0;"><strong>Email:</strong> {{ $user->email }}</p>
                                    <p style="margin:6px 0;"><strong>Password:</strong> {{ $plainPassword }}</p>
                                </td>
                            </tr>
                        </table>

                        <!-- CTA BUTTON -->
                        <div style="margin-top:22px;">
                            <a href="{{ route('login') }}"
                               style="
                               background:#1f7a5c;
                               color:#ffffff;
                               text-decoration:none;
                               padding:12px 20px;
                               border-radius:6px;
                               display:inline-block;
                               font-weight:bold;
                               ">
                                Login to Your Account
                            </a>
                        </div>

                        <!-- NOTE -->
                        <p style="margin-top:22px;font-size:13px;color:#555;">
                            <strong>Security Note:</strong>  
                            Please change your password immediately after logging in
                            to keep your account secure.
                        </p>

                        <p style="margin-top:28px;font-size:14px;">
                            If you have any questions or need assistance, feel free to
                            contact our support team.
                        </p>

                        <p style="margin-top:18px;">
                            Regards,<br>
                            <strong>Club Unitee Team</strong>
                        </p>

                    </td>
                </tr>

            </table>
            <!-- END MAIN CONTAINER -->

        </td>
    </tr>
</table>

</body>
</html>
