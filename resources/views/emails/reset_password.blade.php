<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="email_template.css">
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #edf2f7;
            }
            .logo {
                display: flex;
                justify-content: center;
            }
            .content {
                background-color: #fff;
                width: 90%;
                margin: auto;
                padding: 10px;
            }
            .link {
                text-decoration: none;
                color: #fff;
                overflow: hidden;
            }
            .reset-button {
                background-color: #2d3748 ;
                border: 0;
                padding: 1.5% 3%;
                border-radius: 3%;
            }
            .reset-button-container {
                display: flex;
                justify-content: center;
                padding: 2%;
            }
            p {
                color: #8a96a8;
            }
            hr {
                margin: 5% 0;
            }
            .reset-link {
                overflow-wrap: break-word;
            }
            @media only screen and (min-width: 768px) {
                .content {
                    width: 50%;
                }
            }
        </style>
    </head>
    <body>
       <div>
        <div class="logo">
             <img src="{{asset('assets/admin/images/logo/GP2.png')}}" alt="">
        </div>
        <div class="content">
             <h1>Hello!</h1>
             <p>You are receiving this email because we received a password reset request for your account.</p>
             <div class="reset-button-container">
                 <button class="reset-button"><a class="link" href="http://127.0.0.1:4200/ResetPassword">Reset Password</a></button>
             </div>
             <p>This password reset link will expire in 60 minutes.</p>
             <p>If you did not request a password reset, no further action is required.</p>
             <p>Regards, <br> MediBooki</p>
             <hr>
             <p>if you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: <a class="reset-link" href="http://medibookidashbord.test/en">http://medibookidashbord.test/en</a></p>
        </div>
       </div>
    </body>
</html>