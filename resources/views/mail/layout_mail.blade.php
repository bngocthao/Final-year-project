<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="telephone=no">
    <style type="text/CSS"></style>
    <style @import url('https://dopplerhealth.com/fonts/BasierCircle/basiercircle-regular-webfont.woff2');></style>
    <title></title>
    <!--[if mso]>
    <style>
        table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
        div, td {padding:0;}
        div {margin:0 !important;}
    </style>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: 'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;
        }
        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #FFEADA;
                text-decoration: none !important;
                font-weight: bold;
            }
            .button {
                min-height: 42px;
                line-height: 42px;
            }
            .col-lge {
                max-width: 100% !important;
            }
        }
        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }
            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#FDF8F4;">
    <p style="margin:0;">Dear mr/mrs {{$teach->name}},</p>
    <p>You have just received an postponse application.</p>
    <p style="text-align: center;margin: 2.5em auto;">
    <a class="button" href="#" style="background: #3baade;
        text-decoration: none;
        padding: 1em 1.5em;
        border-radius: 48px;
        mso-padding-alt:0;">
        <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]-->
        <span style="mso-text-raise:10pt;font-weight:bold;"><a link="/admin/postponse_apps/"> Application management</a></span>
        <!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i><![endif]-->
    </a>
    </p>
    <p>Best regard,</p>
</div>
</body>

</html>
