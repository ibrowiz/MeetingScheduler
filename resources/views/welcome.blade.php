@extends('layouts.guest')

@section('extra-css')
    
        <style>
            /*html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }*/

            .full-height {
                height: 100vh;
            }

            .flex-center {
                top: -100px;
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

 
            .content {
                border-radius: 10px;
                padding: 70px 30px;
                text-align: center;
                background: #0f192a;
                animation: boxfade 15s ease -2s normal;
            }

            .title {
                font-size: 84px;
            }

            @keyframes boxfade{
                from{
                    opacity: 0;
                }
                to{
                    opacity: 1;
                }
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
@endsection

@section('content')
            <h3 style=" text-align: center; margin: 0px;color: #e6e6e6; font-size: 180px; font-weight: 800; letter-spacing: -10px; line-height: 60px;">Welcome</h3>


        <div class="flex-center position-ref full-height">
        

            <div class="content">

                <div class="title m-b-md">
                    Telvida Meeting
                </div>

                <div class="links">
                    <a href="https://erp.telvida.com">Telvida Portal</a>
                    <a href="http://www.telvida.com">Telvida</a>
                    <a href="https://webconf.telvida.com">Telvida Web Conference</a>
                    <a href="https://callintegrator.com">Call Intergrator</a>
                </div>
            </div>
        </div>

@endsection