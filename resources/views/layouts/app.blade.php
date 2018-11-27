<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Realitky</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description"
          content="Aktuálna ponuka nehnuteľností zo Slovenska. Nehnuteľnosti na predaj, prenájom, dražby, byty, rodinné domy a pozemky.">
    <meta name="keywords" content="realitky, byty, domy, nehnuteľnosti ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script> -->
        <!-- doplnit api key, zmazany kvoli bezpecnosti -->

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('layout/styles/layout.css') }}">
    <style>
        .pac-icon {
            width: 0;
            background-image: none;
        }

        .pac-container:after {
            /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */

            background-image: none !important;
            height: 0px;
        }

        .remove:hover {
            cursor: pointer;
        }

        .inputFile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        label[for=fileInput] {
            border: 2px solid black;
            background-color: transparent;
            color: black;
            /*padding: 7px 14px;*/
            text-align: center;
            font-size: 10px;
            cursor: pointer;
            border-color: #4CAF50;
            color: green;
        }

        label[for=fileInput]:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<!-- #################################################################### -->

<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <!-- ################################################################################################ -->
        <div class="fl_left">
            <ul class="nospace">
                <li><i class="fas fa-user fa-lg"></i></li>
                @guest
                    <li><a href="{{ route('login') }}">Prihlásiť sa</a></li>
                    <li><a href="{{ route('register') }}">Registrovať sa</a></li>
                @else
                    <li>{{ Auth::user()->email }}</li>

                    @if(Auth::user()->rola==1)
                        <li><a href="{{route('inzeraty_a.index')}}">Spravovať</a></li>
                    @elseif(Auth::user()->rola==2)
                        <li><a href="{{route('inzeraty_r.index')}}">Spravovať</a></li>
                    @endif



                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Odhlásiť
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


                    </li>
                @endguest

            </ul>
        </div>
        <div class="fl_right">
            <ul class="nospace">
                <li><i class="fas fa-phone rgtspace-5"></i> +00 (123) 456 7890</li>
                <li><i class="fas fa-envelope rgtspace-5"></i> info@ksu.sk</li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </div>
</div>
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
    <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="one_half first">
            <h1 class="logoname"><a href=""><span>REA</span>LITKY</a></h1>
        </div>
        <div class="one_half">
            <ul class="nospace clear">
                <li class="one_half first">
                    <div class="block clear"><i class="fas fa-star"></i> <span><strong class="block"><hr>Jednotka na trhu </strong> </span>
                    </div>
                </li>
                <li class="one_half">
                </li>
            </ul>
        </div>
        <!-- ################################################################################################ -->
    </header>
    <nav id="mainav" class="hoc clear">
        <!-- ################################################################################################ -->
        <ul class="clear">
            <li><a href="/">Domov</a></li>
            <li><a href="/realitne_kancelarie">Realitné kancelárie</a></li>
            <li>
                @if(Auth::check())
                    <a href="{{route('moje_inzeraty_p.index')}}">Moje inzeráty</a>
                @else
                    <a href="/moje_inzeraty">Moje inzeráty</a>
                @endif
            </li>
            @guest
                <li><a href="/overit_email">Pridať inzerat</a></li>
            @else
                <li><a href="{{ route('inzeraty.create') }}">Pridať inzerat</a></li>
            @endguest


            <li><a href="/kontakt">Kontakt</a></li>
        </ul>
        <!-- ################################################################################################ -->
    </nav>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- / main body -->


<main>
    <div class="clear"></div>
</main>


<section class="hoc container clear">
    @yield('content')
</section>
</body>


<footer>
    <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left"> &copy; 2018 - <a href="#">KSU</a></p>

        <!-- ################################################################################################ -->
    </div>

    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
</footer>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</html>