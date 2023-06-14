@extends('layouts.regular')
@section('style')
    <style>
        main {
            display: grid;
            grid-template-columns: 1fr 50px 1fr;
            grid-template-rows: 75px auto;
            padding: 0px 30px;
        }
        main h1 {
            grid-row: 1 / 2;
        }
        main h1 a {
            color: blue;
        }
        main #right .divForum, main #left .divForum {
            margin-bottom: 30px;
            border-bottom: 2px solid gray;
        }
        main #right .divForum a, main #left .divForum a {
            color: black;
            text-decoration: none;
        }
        main #right .divForum a:hover, main #left .divForum a:hover {
            color: rgb(255, 192, 90);
            text-decoration: underline;
        }
        main #left .divForum a p, main #right .divForum a p {
            font-size: 15pt;
        }
        main #right .divForum h3, main #left .divForum h3 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 16pt;
        }
        main #right .divForum h3 p, main #right .divForum a p, main #right .divForum a i, main #left .divForum h3 p, main #left .divForum a p, main #left .divForum a i {
            margin: 0;
        }
        
        #line {
            grid-column: 2 / 3;
            grid-row: 1 / 3;
            background: gray;
            width: 1px;
            height: auto;
            margin: 30px auto;
        }
        
        .alignLeft {
            grid-column: 1 / 2;
        }
        .alignRight {
            grid-column: 3 / 4;
        }
        .flexPunten {
            display: flex;
            flex-direction: row;
        }
        .flexPunten form {
            display: block;
            margin: 0px 3px;
            height: 17px;
            width: 17px;
        }
        .flexPunten form .upVote {
            content:url({{ URL('images/UpArrow.png') }});
        }
        .flexPunten form .upVote:hover {
            content:url({{ URL('images/BlueArrow.png') }});
        }
        .flexPunten form .downVote {
            content:url({{ URL('images/DownArrow.png') }});
        }
        .flexPunten form .downVote:hover {
            content:url({{ URL('images/OrangeArrow.png') }});
        }

        @media only screen and (max-width: 700px) {
            main {
                padding-top: 100px;
                grid-template-columns: auto;
                grid-template-rows: 50px 75px auto;
            }
            main h1 {
                grid-row: auto;
                margin-bottom: 0;
            }
            main h1 a {
                text-align: right;
            }

            #line, #right {
                display: none;
            }

            .alignRight {
                grid-column: 1 / 2;
            }
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
    <h1 class="alignLeft">
        Forum
    </h1>
    <h1 class="alignRight">
        <a href="{{ route('forums.create') }}">Stel een vraag</a>
    </h1>

    <div id="left" class="alignLeft">
        <h3 class="alignLeft">
            Recente vragen
        </h3>
        @foreach ($forums as $forum)
            <div class="divForum">
                <h3>
                    {{ $forum->titel }}
                    <div class="flexPunten">
                        <p>{{ $forum->punten }}</p>
                        <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="upvote">
                            <input type="image" src="" alt="Like" class="upVote">
                        </form>
                        <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="downvote">
                            <input type="image" alt="Dislike" class="downVote">
                        </form>
                    </div>
                </h3>
                <a href="{{ route('forums.show', ['forum' => $forum->id]) }}">
                    <p>{{ \Illuminate\Support\Str::limit($forum->bericht, 300, $end='...') }}</p>
                    <i>{{ $forum->reacties->count() }} reacties</i>
                </a>
            </div>
        @endforeach
    </div>

    <div id = "line"></div>

    <div id="right" class="alignRight">
        <h3 class="alignRight">
            Populaire vragen
        </h3>
        @foreach ($popForums as $forum)
            <div class="divForum">
                <h3>
                    {{ $forum->titel }} 
                    <div class="flexPunten">
                        <p>{{ $forum->punten }}</p>
                        <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="upvote">
                            <input type="image" src="" alt="Like" class="upVote">
                        </form>
                        <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="downvote">
                            <input type="image" alt="Dislike" class="downVote">
                        </form>
                    </div>
                </h3>
                <a href="{{ route('forums.show', ['forum' => $forum->id]) }}">
                    <p>{{ \Illuminate\Support\Str::limit($forum->bericht, 300, $end='...') }}</p>
                    <i>{{ $forum->reacties->count() }} reacties</i>
                </a>
            </div>
        @endforeach
    </div>
@endsection