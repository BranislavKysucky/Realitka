<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrátorske rozhranie</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin/bootstrap.min.css" />
    <link rel="stylesheet" href="css/admin/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/admin/matrix-style.css" />
    <link rel="stylesheet" href="css/admin/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
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
        <li  class="dropdown" id="profile-messages" ><a title="" href="/" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Vrátiť sa späť na stránku</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="{{ route('logout') }}"><i class="icon icon-share-alt"></i> <span class="text">Odhlásiť sa</span></a></li>
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
        <li class="active"><a href="admin"><i class="icon icon-home"></i> <span>Domov</span></a> </li>
        <li> <a href="admin/edit_inzeratov"><i class="icon icon-inbox"></i> <span>Spravovanie inzerátov</span></a> </li>
        <li> <a href="admin/edit_pouzivatelov"><i class="icon icon-inbox"></i> <span>Spravovanie používateľov</span></a> </li>
        <li> <a href="admin/statistiky"><i class="icon icon-signal"></i> <span>Zobraziť štatistiky</span></a> </li>





    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Domovská stránka</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions">

                <p> Vitajte v administracnom rozhrani.
                Tu sa nieco potom doplni....</p>

            </ul>
        </div>
    </div> </div>
        <!--End-Action boxes-->







<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> © 2018 KSU</a> </div>
</div>

<!--end-Footer-part-->





</body>
</html>
