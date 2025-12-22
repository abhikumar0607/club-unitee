<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Customer Registration</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial, Helvetica, sans-serif;">

<!-- Wrapper -->
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8;padding:24px;">
    <tr>
        <td align="left">

            <!-- Card -->
            <table width="620" cellpadding="0" cellspacing="0"
                style="background:#ffffff;border-radius:12px;
                box-shadow:0 8px 25px rgba(0,0,0,0.08);overflow:hidden;">

                <!-- Header -->
                <tr>
                    <td style="background:#1f7a5c;padding:22px 26px;">
                        <h2 style="margin:0;color:#ffffff;font-size:22px;">
                            New Customer Registration
                        </h2>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding:28px 26px;color:#374151;font-size:14px;line-height:1.7;">

                        <p style="margin-top:0;">Hello <strong>Admin</strong>,</p>

                        <p>
                            A new customer has successfully registered on the platform.
                            Please review the information below and take the appropriate action.
                        </p>

                        <!-- Info Card -->
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="margin:22px 0;background:#f9fafb;
                            border:1px solid #e5e7eb;border-radius:10px;">
                            <tr>
                                <td style="padding:18px;">
                                    <p style="margin:0 0 10px;">
                                        <strong>Name:</strong> {{ $user->name }}
                                    </p>
                                    <p style="margin:0 0 10px;">
                                        <strong>Email:</strong> {{ $user->email }}
                                    </p>
                                    <p style="margin:0;">
                                        <strong>Profession:</strong> {{ $user->profession }}
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <!-- CTA -->
                        <p style="margin:28px 0;">
                            <a href="{{ url('admin/applications') }}"
                               style="background:#1f7a5c;color:#ffffff;
                               padding:12px 26px;text-decoration:none;
                               border-radius:8px;font-weight:600;
                               display:inline-block;">
                                Review & Approve / Reject
                            </a>
                        </p>

                        <p style="font-size:12px;color:#6b7280;margin-bottom:0;">
                            If this request has already been processed, you may safely ignore this email.
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
