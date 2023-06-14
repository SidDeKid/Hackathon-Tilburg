@extends('layouts.regular')
@section('style')
@endsection
@section('nav')
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('forums.index')}}">Forum</a>
    <a href="{{route('chats.index')}}">Chat</a>
    <a class="active" href="{{route('artikelen.index')}}">Nieuws</a>
    <a href="{{route('werknemers.index')}}">
        <?php if (isSet($_SESSION['account'])) {echo "Account";} else {echo "Log in";} ?>
    </a>
@endsection
@section('content')
@endsection
