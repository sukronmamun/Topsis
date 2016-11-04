<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {

                background-image: url('images/bg2.jpg');
                -webkit-background-size: cover;
                background-size: cover;
                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }
            .bg{
                background-color: rgba(000,000,000,.7);
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }
            .login{
                padding: 10px 50px;
                background-color: rgba(000,000,000,.4);
                font-size: 24px;
                color: #fff;
                border: 2px solid #fff;
                text-decoration: none;
                transition: all 0.2s ease-in;
            }
            .login:hover{
                background-color: rgba(255,255,255,1);
                color: #000;
                font-weight: bold;
                border: 2px solid #fff;
            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height bg">
            <div class="content">
                <div class="title m-b-md">
                    Aplikasi Pemilihan Karyawan Terbaik 
                </div>
                @if (Auth::guest())
                    <a href="{{ url('/login') }}" class="login">Login</a>
                @else
                    <a href="{{ url('/home') }}" class="login">Dashboard<a>
                @endif
               
            </div>
        </div>
    </body>
</html>
