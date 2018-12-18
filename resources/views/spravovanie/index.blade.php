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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<!--Header-part-->

<!--close-Header-part-->


<!--top-Header-menu-->

<!--close-top-Header-menu-->
<!--start-top-serch-->

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



            <li >
                <br>
                <center> <i class="fa fa-user-circle" style="font-size:36px"></i> </center>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Odhlásiť
                </a>

                <a href="/"><i class="icon icon-share-alt"></i>Vrátiť sa späť na stránku</a>


                <a href="{{action('RealitkaMakleriController@editProfil', Auth::user()->id)}}"><i class="fa fa-edit"></i>
                    <span>Upraviť osobné údaje</span></a>
                <a href="{{action('RealitkaMakleriController@editFirma', Auth::user()->realitna_kancelaria_id)}}"><i class="fa fa-edit"></i> <span>Upraviť firemné údaje</span></a>
            </li>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>


            <li >
                <br>
                <center>                <i class="fa fa-vcard-o" style="font-size:36px"></i></center>

                <a href="{{route('inzeraty_r.index')}}"><i class="icon icon-list-alt"></i> <span>Zobraziť všetky inzeráty</span></a>
                <a href="{{route('inzeraty.create')}}"><i class="fa fa-plus"></i>
                    <span>Pridať inzerát</span></a>
            </li>
            <li>
                <br>
                <center>                <i class="fa fa-user-secret" style="font-size:36px"></i></center>

                <a href="{{route('makleri_r.index')}}"><i class="icon icon-list-alt"></i> <span>Zobraziť všetkých maklérov</span></a>
                <a href="{{route('makleri_r.create')}}"><i class="fa fa-plus"></i>
                    <span>Pridať makléra</span></a>
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
