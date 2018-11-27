<!DOCTYPE html>
<html lang="en">
<head>
    <title>Spravovanie</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/bootstrap-responsive.min.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/matrix-style.css')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/admin/matrix-media.css')}}"/>
    <link href="{{ URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link rel="icon" href="{{ URL::asset('images/favicon.ico') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="admin">Admin rozhranie</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <!--<li  class="dropdown" id="profile-messages" ><a title="" href="/" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-share-alt"></i>  <span class="text">Vrátiť sa späť na stránku</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href=""><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>-->
        <li>
            <a href="/"><i class="icon icon-share-alt"></i>Vrátiť sa späť na stránku</a>
        </li>
        <li class=""><a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Odhlásiť
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Vyhľadaj..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Admin rozhranie</a>
    <ul>
        @if(Auth::user()->rola==1)
            <li class="active">
                <a href=""><i class="icon icon-home"></i> <span>Domov</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-inbox"></i> <span>Inzeráty</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-inbox"></i> <span>Používatelia</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-inbox"></i> <span>Realitné kancelárie</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-signal"></i> <span>Štatistiky</span></a>
            </li>
        @elseif(Auth::user()->rola==2)
            <li class="active">
                <a href=""><i class="icon icon-home"></i> <span>Domov</span></a>
            </li>
            <li>
                <a href="{{route('inzeraty_r.index')}}"><i class="icon icon-list-alt"></i> <span>Inzeráty</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-list-alt"></i> <span>Makléri</span></a>
            </li>
            <li>
                <a href=""><i class="icon icon-list-alt"></i> <span>Štatistiky</span></a>
            </li>

        @endif
    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <!--
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Domovská stránka</a></div>
    </div>
    -->
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <!--
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">

                <p> Vitajte v administracnom rozhrani.
                    Tu sa nieco potom doplni....</p>

            </ul>
        </div>
    </div>-->
    @yield('supercontent')
</div>
<!--End-Action boxes-->


<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> © 2018 KSU</a> </div>
</div>

<!--end-Footer-part-->


</body>
</html>
