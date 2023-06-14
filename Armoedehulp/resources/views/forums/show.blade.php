@extends('layouts.regular')
@section('style')
    <style>
        main {
            display: grid;
            grid-template-rows: 75px auto 75px auto auto;
            padding: 0px 30px;
        }
        main .divForum, main div .divReactie {
            margin-bottom: 30px;
            border-bottom: 2px solid gray;
        }
        main .divForum a, main div .divReactie a {
            color: black;
            text-decoration: none;
        }
        main .divForum a p, main div .divReactie a p {
            font-size: 15pt;
        }
        main .divForum h3, main div .divReactie h3 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 16pt;
        }
        main .divForum h3 p, main .divForum a p, main .divForum a, main div .divReactie h3 p, main div .divReactie a p, main div .divReactie a  {
            margin: 0;
        }
        main form {
            display: grid;
            grid-template-columns: 50px auto;
            margin-bottom: 25px;
        }
        main form h2 {
            grid-column: 1 / 3;
        }
        main form label {
            grid-column: 1 / 2;
            width: 100px;
        }
        main form input, main form button {
            grid-column: 1 / 3;
            width: 100%;
            max-width: 600px;
        }
        main form button {
            background: rgb(0, 176, 240);
            color: white;
        }
        main form button:hover {
            background: rgb(255, 192, 90);
            color: black;
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
                grid-template-rows: auto;
            }
            main h1 {
                grid-row: auto;
                margin-bottom: 0;
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
    <h1>
        Forum
    </h1>

    <div class="divForum">
        <h3>
            {{ $forum->titel }}
            <div class="flexPunten">
                <p>{{ $forum->punten }}</p>
                <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="punten" value="upvote">
                    <input class="upVote" type="image" src="" alt="Like">
                </form>
                <form action="{{ route('forums.update', ['forum' => $forum->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="punten" value="downvote">
                    <input class="downVote" type="image" src="" alt="Dislike">
                </form>
            </div>
        </h3>
        <a>
            <p>{{ $forum->bericht }}</p>
            <i>{{ $forum->reacties->count() }} reacties</i>
        </a>
    </div>

    <h1>Reacties</h1>

    <div>
        @foreach ($forum->reacties as $reactie)
            <div class="divReactie">
                <h3>
                    {{ $reactie->titel }}
                    <div class="flexPunten">
                        <p>{{ $reactie->punten }}</p>
                        <form action="{{ route('reacties.update', ['reactie' => $reactie->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="upvote">
                            <input class="upVote" type="image" src="" alt="Like">
                        </form>
                        <form action="{{ route('reacties.update', ['reactie' => $reactie->id]) }}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="punten" value="downvote">
                            <input class="downVote" type="image" src="" alt="Dislike">
                        </form>
                    </div>
                </h3>
                <a>
                    <p>{{ $reactie->reactie }}</p>
                </a>
            </div>
        @endforeach
    </div>
    
    <form action="{{ route('reacties.store') }}" method="post">
        @csrf
        <h2>Plaats een reactie</h2>
        <label for="reactie">Titel</label>
        <input type="text" name="titel" pattern="[A-Za-z]{0-35}" required> <br>
        <label for="reactie">Reactie</label>
        <input type="text" name="reactie" pattern="[A-Za-z]{0-10000}" required> <br>
        <input type="hidden" name="forum_id" value="{{ $forum->id }}">
        <button type="submit">Reageer</button>
    </form>
@endsection
