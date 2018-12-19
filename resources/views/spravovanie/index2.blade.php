<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Panel</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    {{--<link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet"/>--}}

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ URL::asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    {{--<link href="{{ URL::asset('assets/css/demo.css') }}" rel="stylesheet" />--}}


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail2.css') }}">
    <link rel='stylesheet' id='wpis-fontawesome-css-css'
          href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1' type='text/css'
          media='all'/>
    <script type='text/javascript' src='{{ URL::asset('js/inzerat_detail.js') }}'></script>
    <style>
        .alphabet
        {
            text-align: center
        }

        #kraje ul
        {
            list-style-type: none;
        }

        li.sub {
            padding: 7px 0;
        }

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
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg" style="background: black">

        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

        <div class="sidebar-wrapper" style="background-color: black;">
            {{--<div class="logo">--}}
                {{--<a href="http://www.creative-tim.com" class="simple-text">--}}
                    {{--Admin panel--}}
                {{--</a>--}}
            {{--</div>--}}

            <ul class="nav">
                @if(Auth::user()->rola==1)
                <li>
                    <a href="{{route('pouzivatelia_a.index')}}">
                        <i class="pe-7s-users"></i>
                        <p>Používatelia</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('realitky_a.index')}}">
                        <i class="pe-7s-id"></i>
                        <p>Kontakt</p>
                    </a>
                </li>
                <li>
                    <a href="/zmenaHesla">
                        <i class="pe-7s-repeat"></i>
                        <p>Zmena hesla</p>
                    </a>
                </li>
                    {{--zmenit ikony--}}
                {{--@elseif(Auth::user()->rola==2)--}}
                    {{--<li>--}}
                        {{--<a href=""><i class="icon icon-home"></i> <p>Domov</p></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('inzeraty_r.index')}}"><i class="icon icon-list-alt"></i> <p>Inzeráty</p></a>--}}
                        {{--<a href="{{route('inzeraty.create')}}"><i class="glyphicon glyphicon-plus"></i> <p>ať inzerát</p></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('makleri_r.index')}}"><i class="icon icon-list-alt"></i> <p>Makléri</p></a>--}}
                        {{--<a href="{{route('makleri_r.create')}}"><i class="glyphicon glyphicon-plus"></i> <p>ať makléra</p></a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href=""><i class="icon icon-list-alt"></i> <p>Štatistiky</p></a>--}}
                    {{--</li>--}}
                @endif
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li style="margin: 0">
                            <a href="/">
                                <span class="pe-7s-back">   Hlavná stránka</span>
                            </a>
                        </li>
                        <li style="margin: 0" class=""><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="pe-7s-close-circle" style="">   Odhlásiť</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

        @yield('supercontent2')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="text-align: center">
        <div class="modal-content">

            <!-- header modal -->
            <div class="modal-header">
                <button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Naozaj chcete odstrániť tohto použivateľa?</h4>
            </div>

            <!-- body modal -->
            <div class="modal-body text-center">
                Jeho odstránením vymažete všetky jeho inzeráty.
                <hr>
                <form id="delForm" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="delete" class="btn btn-danger">Vymazať</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="block" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="text-align: center">
        <div class="modal-content">

            <!-- header modal -->
            <div class="modal-header">
                <button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Naozaj chcete blokovať tohto použivateľa?</h4>
            </div>

            <!-- body modal -->
            <div class="modal-body text-center">
                Používateľ s týmto mailom bude trvalo blokovaný.
                <hr>
                <form id="blockForm" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="delete" class="btn btn-danger">Blokovať</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="deleteInzerat" class="modal fade" class="modal-dialog modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="text-align: center">
        <div class="modal-content">

            <!-- header modal -->
            <div class="modal-header">
                <button id="closeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Naozaj chcete odstrániť tento inzerát?</h4>
            </div>

            <!-- body modal -->
            <div class="modal-body text-center">
                <form id="delFormInzerat" method="post">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button type="submit" value="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
{{--<script src="assets/js/chartist.min.js"></script>--}}

{{--<!--  Notifications Plugin    -->--}}
{{--<script src="assets/js/bootstrap-notify.js"></script>--}}

{{--<!--  Google Maps Plugin    -->--}}
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>--}}

{{--<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->--}}
{{--<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>--}}

{{--<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->--}}
{{--<script src="assets/js/demo.js"></script>--}}

</html>
