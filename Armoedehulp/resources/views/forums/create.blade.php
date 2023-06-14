@extends('layouts.regular')
@section('style')
    <style>
        main {
            padding: 0px 30px;
        }
        form {
            display: grid;
            grid-template-columns: 75px auto;
        }
        form label {
            grid-column: 1 / 2;
            font-weight: bold;
        }
        form input, form textarea, form button {
            grid-column: 2 / 3;
            width: 90%;
            max-width: 600px;
        }
        form textarea {
            resize: none;
            height: 75px;
        }
        form button {
            margin-top: 25px;
            background: rgb(255, 192, 90);
            font-weight: bold;
        }
        form button:hover {
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
@endsection
@section('nav')
    <a href="{{route('home')}}">Home</a>
    <a class="active" href="{{route('forums.index')}}">Forum</a>
    <a href="{{route('chats.index')}}">Chat</a>
    <a href="{{route('artikelen.index')}}">Nieuws</a>
    <a href="{{route('werknemers.index')}}">
        <?php if (isSet($_SESSION['account'])) {echo "Account";} else {echo "Log in";} ?>
    </a>
@endsection
@section('content')
    <h1>Algemene vraag stellen</h1>
    <form action="{{ route('forums.store') }}" method="post">
        @csrf
        <label for="titel">Titel</label>
        <input name="titel" type="text" pattern="[A-Za-z]{0-35}" required> <br>
        <label for="bericht">Bericht</label>
        <textarea name="bericht" pattern="[A-Za-z]{0-20000}" required></textarea>
        <button type="submit">Stel de vraag</button>
    </form>
@endsection
