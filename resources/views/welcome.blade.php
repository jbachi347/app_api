<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>


        <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-analytics.js"></script>

        <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
      </body>
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                    <button onclick="signin()" >Test</button>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>


    <script>


        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyDT3pNl9SgWEUWJuL64MYfzQRbySth9FEk",
            authDomain: "apprealone.firebaseapp.com",
            databaseURL: "https://apprealone.firebaseio.com",
            projectId: "apprealone",
            storageBucket: "apprealone.appspot.com",
            messagingSenderId: "8541888838",
            appId: "1:8541888838:web:508c7ebdf1f60e306dc547",
            measurementId: "G-RSL0070YGE"
          };
          // Initialize Firebase
          firebase.initializeApp(firebaseConfig);
          firebase.analytics();

        async function signin() {
            console.log(firebase)
            console.log('signing in')

            let creds = await firebase.auth().signInWithEmailAndPassword('info@jbachi.com', '123123')

            console.log({ creds })
            let token = await creds.user.getIdToken()
            console.log({ token })
            let headers = { Authorization: 'Bearer ' + token }
            let me = await axios.get('/api/me', { headers })
            console.log({ me })
        }
        </script>


</html>
