<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Realitka</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Reality KSU
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="">Úvod</a></li>
                        <li><a href="">Realitné kancelárie</a></li>
                        <li><a href="">Moje inzeráty</a></li>
                        <li><a href="">Pridať inzerát</a></li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Prihlásenie</a></li>
                            <li><a href="{{ route('register') }}">Registrácia</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-sm-3 col-md-3 col-lg-3 pull-left">

            <div class="well well-sm ">
                <div align="center">
                    <h4>VYHĽADÁVANIE</h4>
                </div>
                <form >

                    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
                    <script type="text/javascript">
                        function initialize() {

                            var options = {
                                types: ['(regions)'],
                                componentRestrictions: {country: "sk"}
                            };

                            var input = document.getElementById('lokalita');
                            var autocomplete = new google.maps.places.Autocomplete(input, options);


                        }
                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>

                    <label for="lokalita">Lokalita</label>
                    <input id="lokalita" class="form-control" placeholder="Zadajte lokalitu"/>



                    <div class="form-group">
                        <label for="kategoria">Kategória</label>
                        <select id="kategoria" class="form-control">
                            <option value="">Všetky nehnuteľnosti</option>
                            <option value="1">Ponuka real. kancelárií</option>
                            <option value="2">Súkromná inzercia</option>
                        </select>

                        <label for="typ">Typ</label>
                        <select id="typ" class="form-control">
                            <option value="">Predaj</option>
                            <option value="">Prenájom</option>
                            <option value="">Kúpa</option>
                            <option value="">Podnájom</option>
                            <option value="">Výmena</option>
                            <option value="">Dražba</option>
                        </select>

                        <label for="druh">Druh</label>
                        <select  class="form-control" id="druh">
                            <option value="">Všetko</option>
                            <optgroup label="BYTY">
                                <option value="">Garsónka</option>
                                <option value="">1 izbový byt</option>
                                <option value="">2 izbový byt</option>
                                <option value="">3 izbový byt</option>
                                <option value="">4 izbový byt</option>
                                <option value="">5 a viac izbový byt</option>
                                <option value="">Mezonet</option>
                                <option value="">Apartmán</option>
                                <option value="">Iný byt</option>
                                <option value="">Všetky byty</option>
                            </optgroup>
                            <optgroup label="DOMY">
                                <option value="">Chata</option>
                                <option value="">Chalupa</option>
                                <option value="">Rodinný dom</option>
                                <option value="">Rodinná vila</option>
                                <option value="">Bývalá poľnohosp. usadlosť</option>
                                <option value="">Iný objekt na bývanie a rekreáciu</option>
                                <option value="">Všetky domy</option>
                            </optgroup>
                            <optgroup label="PRIESTORY">
                                <option value="">Kancelárie, administratívne priestory</option>
                                <option value="">Obchodné priestory</option>
                                <option value="">Reštauračné priestory</option>
                                <option value="">Športové priestory</option><
                                <option value="">Iné komerčné priestory</option>
                                <option value="">Priestor pre výrobu</option>
                                <option value="">Priestor pre sklad</option>
                                <option value="">Opravárenský priestor</option>
                                <option value="">Priestor pre chov zvierat</option>
                                <option value="">Iný prevádzkovy priestor</option>
                                <option value="">Všetky priestory</option>
                            </optgroup>
                            <optgroup label="POZEMKY">
                                <option value="">Rekreačný pozemok</option>
                                <option value="">Pozemok pre rodinné domy</option>
                                <option value="">Pozemok pre bytovú výstavbu</option>
                                <option value="">Komerčná zóna</option>
                                <option value="">Priemyselná zóna</option>
                                <option value="">Záhrada</option>
                                <option value="">Sad</option>
                                <option value="">Lúka, pasienok</option>
                                <option value="">Orná poda</option>
                                <option value="">Chmelnica, vinica</option>
                                <option value="">Lesná pôda</option>
                                <option value="">Vodná plocha</option>
                                <option value="">Iný poľnohosp. pozemok</option>
                                <option value="">Hrobové miesto</option>
                                <option value="">Všetky pozemky</option>
                            </optgroup>
                        </select>
                        <label for="stav">Stav</label>
                        <select id="stav" class="form-control">
                            <option value="">Všetky stavy</option>
                            <option value="">Novostavba</option>
                            <option value="">Čiastočná rekonštrukcia</option>
                            <option value="">Kompletná rekonštrukcia</option>
                            <option value="">Pôvodný stav</option>
                            <option value="">Vo výstavbe</option>
                            <option value="">developerský projekt</option>
                        </select>
                        <label for="cena">Cena(€)</label>
                        <div class="input-group" id="cena">
                            <input  placeholder="od" class="form-control" type="number" min="0"/>
                            <span class="input-group-addon"></span>
                            <input  placeholder="do" class="form-control" type="number" min="0"/>
                        </div>
                        <label for="vymera">Výmera (m<sup>2</sup>)</label>
                        <div class="input-group" id="vymera">
                            <input  placeholder="od" class="form-control" type="number" min="0"/>
                            <span class="input-group-addon"></span>
                            <input  placeholder="do" class="form-control" type="number" min="0"/>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-danger form-control" value="VYHĽADAŤ"/>
                    </div>
                </form>


            </div>

        </div>

        <div class="col-md-9 col-lg-9 col-sm-9 pull-right">

            <div class="well well-lg">
                <h1>Inzerát</h1>
                <p class="lead">popis inzerátu..... samozrejme toto je len náčrt, vyhľadávanie a  inzeráty budú v samostatných
                    súboroch.... prihlásenie a registrácia sa upraví :D </p>
                <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->

            </div>
        </div>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
