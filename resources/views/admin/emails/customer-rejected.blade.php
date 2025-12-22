<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Update</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8;padding:24px;">
    <tr>
        <td align="left">

            <!-- Card -->
            <table width="620" cellpadding="0" cellspacing="0"
                style="background:#ffffff;border-radius:12px;
                box-shadow:0 8px 25px rgba(0,0,0,0.08);overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="background:#b91c1c;padding:22px 26px;">
                        <h2 style="margin:0;color:#ffffff;font-size:22px;">
                            Application Status
                        </h2>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:28px 26px;color:#374151;font-size:14px;line-height:1.7;">

                        <p style="margin-top:0;">
                            Hello <strong>{{ $user->name }}</strong>,
                        </p>

                        <p>
                            Thank you for registering with <strong>Club Unitee</strong>.
                            We have carefully reviewed your application.
                        </p>

                        <p style="color:#b91c1c;font-weight:600;">
                            Unfortunately, your application could not be approved at this time.
                        </p>

                        <p>
                            This usually happens when some details are incomplete, unclear,
                            or require correction.
                        </p>

                        <!-- Info box -->
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="margin:22px 0;background:#fef2f2;
                            border:1px solid #fee2e2;border-radius:10px;">
                            <tr>
                                <td style="padding:18px;">
                                    <p style="margin:0 0 8px;">✔ Please review your submitted details carefully</p>
                                    <p style="margin:0 0 8px;">✔ Ensure all information is accurate and complete</p>
                                    <p style="margin:0;">✔ Re-apply after correcting the details</p>
                                </td>
                            </tr>
                        </table>

                        <p>
                            If you believe this decision was made in error or need assistance,
                            our support team will be happy to help you.
                        </p>

                        <!-- CTA -->
                        <p style="margin:26px 0;">
                            <a href="{{ url('/support') }}"
                               style="background:#1f7a5c;color:#ffffff;
                               padding:12px 26px;text-decoration:none;
                               border-radius:8px;font-weight:600;
                               display:inline-block;">
                                Contact Support
                            </a>
                        </p>

                        <p style="font-size:12px;color:#6b7280;margin-bottom:0;">
                            You are welcome to apply again once your details are updated.
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f3f4f6;padding:16px 26px;
                    font-size:12px;color:#6b7280;">
                        Regards,<br>
                        <strong>Club Unitee Team</strong><br>
                        © {{ date('Y') }} Club Unitee. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
