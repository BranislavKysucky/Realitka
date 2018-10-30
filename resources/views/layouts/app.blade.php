
<!DOCTYPE html>

<html lang="sk">
<head>
    <title>Realitky</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Aktuálna ponuka nehnuteľností zo Slovenska. Nehnuteľnosti na predaj, prenájom, dražby, byty, rodinné domy a pozemky.">
    <meta name="keywords" content="realitky, byty, domy, nehnuteľnosti ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>




@yield('content')


</body>
</html>