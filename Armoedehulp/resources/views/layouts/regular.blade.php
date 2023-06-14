<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armoedehulp Tilburg</title>
    @yield('style')
    <style>
        header{
            background-color: rgb(0, 176, 240);
            display: flex;
            justify-content: space-between;
        }
        header>img{
            margin: 10px;
        }
        body{
            height: 100vh;
            margin: 0;
            display: grid;
            grid-template-rows: 80px auto 80px;
        }
        header>nav{
            display: flex;
        }
        header>nav>a{
            background-color: rgb(0, 176, 240);
            display: block;
            padding: 30px;
            color: white;
            font-size: 18px;
            border: 0;
            border-left: 3px solid black;
            font-family: Calibri;
            text-decoration: none;
        }
        header>nav>a:hover{
            background-color: rgb(255, 192, 90);
            cursor: pointer;
            text-decoration: underline;
            color: black;
        }
        .active{
            background-color: rgb(255, 192, 90);
            color: black;
        }
        footer{
            display: flex;
            justify-content: space-between;
            color: white;
            background-color: rgb(0, 176, 240);
            font-weight: bold;
            font-family: Calibri;
            grid-row: 3/4;
            padding: 10px;
        }
        footer>p{
            align-self: center;
        }
        footer>div{
            display: flex;
            justify-content: space-around;
            flex-direction: column;
        }
        @media only screen and (max-width: 700px) {
            header>nav{
                display: flex;
                flex-direction: column;
            }
            header>nav>a{ /* remember to change back */
                width: 100px;
                height: 30px;
                padding: 5px;
                border-left: none;
                border-bottom: 2px solid black;
                font-size: 16pt;
            }
            header{
                height: 185px;
                border-bottom: 2px solid black;
            }
        }
    </style>
</head>
<body>
<header>
    <img src="{{URL('images/logo.jpg')}}">
    <nav>
        @yield('nav')
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>Gemeente Tilburg</p>
    <div>
        <div>Telefoon: 0612345678</div>
        <div>Email: info@gemeentetilburg.nl</div>
        <div><a>Link naar onze website</a></div>
    </div>
</footer>
</body>
</html>
