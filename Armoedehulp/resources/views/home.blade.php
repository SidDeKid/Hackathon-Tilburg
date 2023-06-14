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
        main #left, main #right a p {
            font-size: 15pt;
        }
        main #right a h3 {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 16pt;
        }
        main #right a {
            margin-bottom: 30px;
            color: black;
            text-decoration: none;
            border-bottom: 1px solid gray;
        }
        main #right a h3, main #right a p, main #right h1 {
            margin: 0;
        }
        main #right h1 {
            margin-bottom: 15px;
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

        #line {
            grid-column: 2 / 3;
            grid-row: 1 / 3;
            background: gray;
            width: 1px;
            height: auto;
            margin: 30px auto;
        }

        @media only screen and (max-width: 700px) {
            main {
                padding-top: 100px;
                grid-template-columns: auto;
                grid-template-rows: auto;
            }
            main h1, main #right h1 {
                grid-row: auto;
                margin-bottom: 0;
            }

            #line {
                display: none;
            }
            .alignRight {
                grid-column: 1 / 2;
            }
        }
    </style>
@endsection
@section('nav')
    <a class="active" href="{{route('home')}}">Home</a>
    <a href="{{route('forums.index')}}">Forum</a>
    <a href="{{route('chats.index')}}">Chat</a>
    <a href="{{route('artikelen.index')}}">Nieuws</a>
    <a href="{{route('werknemers.index')}}">
        <?php if (isSet($_SESSION['account'])) {echo "Account";} else {echo "Log in";} ?>
    </a>
@endsection
@section('content')
    <h1 class= "alignLeft">
        Welkom
    </h1>
    <div id="left" class= "alignLeft">
        Dit is de homepagina van Armoedehulp Gemeente Tilburg. <br>
        <br>
        Met deze website proberen we nuttige informatie te verspreiden, die bedoeld zijn om armoede te bestrijden. <br>
        <br>
        Hoe werkt deze website? <br>
        <ul>
            <li>Stel algemene vragen op het forum;</li>
            <li>Voer een 1 op 1 gesprek met experts met de chat;</li>
            <li>Volg informatieve blogs en adviezen op de nieuws pagina;</li>
            <li>Registreer je als expert, en beantwoord vragen.</li>
        </ul>
        <br>
        En alle vragen zijn volledig anoniem. Tenzij u uw gegevens erbij zet natuurlijk.
    </div>

    <div id = "line"></div>

    <h1 class="alignRight">
        Populairste vraag
    </h1>
    <div id="right" class="alignRight">
        @if ($forum != null)
            <a href="{{ route('forums.show', ['forum' => $forum->id]) }}">
                <h3>
                    {{ $forum->titel }} 
                    <div class="flexPunten">
                        <p>{{ $forum->punten }}</p>
                        <img src="{{ URL('images/BlueArrow.png') }}" alt="Like">
                        <img src="{{ URL('images/OrangeArrow.png') }}" alt="Dislike">
                    </div>
                </h3>
                <p>{{ $forum->bericht }}</p>
            </a> <br>
            <h1>
                Beste reacties
            </h1>
            @php
                $counter = 0;
            @endphp
            @foreach ($forum->reacties as $reactie)
                <a>
                    <h3>
                        {{ $reactie->titel }}
                        <div class="flexPunten">
                            <p>{{ $reactie->punten }}</p>
                            <img src="{{ URL('images/BlueArrow.png') }}" alt="Like">
                            <img src="{{ URL('images/OrangeArrow.png') }}" alt="Dislike">
                        </div>
                    </h3>
                    <p>{{ $reactie->reactie }}</p>
                </a> <br>
                @php
                    $counter += 1;
                @endphp
                @if ($counter == 2)
                    @break
                @endif
            @endforeach
        @else
            <a href="{{ route('forums.create') }}">
                <h3>
                    Niks gevonden 
                    <div class="flexPunten">
                        <p>0</p>
                        <img src="{{ URL('images/BlueArrow.png') }}" alt="Like">
                        <img src="{{ URL('images/OrangeArrow.png') }}" alt="Dislike">
                    </div>
                </h3>
                <p>Er zijn nog geen algemene vragen gesteld. Ben de eerste!</p>
            </a> <br>
        @endif
    </div>
@endsection