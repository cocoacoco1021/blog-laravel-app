{{-- Dashboard --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/materia/bootstrap.min.css" rel="stylesheet" integrity="sha384-1tymk6x9Y5K+OF0tlmG2fDRcn67QGzBkiM3IgtJ3VrtGrIi5ryhHjKjeeS60f1FA" crossorigin="anonymous"> 

        <!-- Styles -->
        <style>

            #pic{
                background-color: #151515;
                border-radius: 5%;
            }

            #content{
                background-color: whitesmoke;
                
                }

            #title{
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
            }

            #text{
                font-size: 15px;
                /* font-family: 'Nunito', sans-serif; */
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    fels 
                </a>      
                <ul class="nav">
                    @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                    @endif
                </ul>
            </div>
        </nav>     
        <div class="container pt-0 pb-3" id="content">
            <div class="row" id="pic">
                <img src="img/car.jpg" alt="" id="pic" class="col-4 ">
                <img src="img/car.jpg" alt="" id="pic" class="col-4 ">
                <img src="img/car.jpg" alt="" id="pic" class="col-4">
                {{-- <img src="img/car.jpg" alt="" class="col-1"> --}}
            </div>
            
            <div class="col-md-12">
                <h1 class="page-title text-center my-5" id="title">Awesome Blog App</h1>
                <div class="col-md-6 offset-3 mx-auto pb-2" id="text">
                    <p>
                        <em>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium repellendus natus officia unde doloremque veniam assumenda ea autem reprehenderit tempore asperiores minima fugit, fugiat, dolore rem deleniti aut laboriosam tenetur?
                        </em>
                    </p>
                    <p>
                        <em>
                            Ullam quod impedit accusantium quas enim dignissimos mollitia ut, tenetur porro, aspernatur in laboriosam sit maxime omnis, culpa eius harum saepe voluptas!
                        </em>
                    </p>
                    <p>
                        <em>
                            Beatae neque fugiat, excepturi, ducimus, odio sapiente nobis illum dicta harum consequatur facilis minus illo odit. Fuga harum commodi blanditiis ullam saepe.
                        </em>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>