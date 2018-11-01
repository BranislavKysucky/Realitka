@extends('layouts.app')

@section('content')

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- / main body -->


    <div class="wrapper row2">
        <section id="latest" class="hoc container clear">

            <!-- ################################################################################################ -->
            <div class="wrapper row4">
                <footer id="footer" class="hoc clear">
                    <!-- ################################################################################################ -->
                    <div class="one_third first">

                        <!-- Styles -->
                        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                        <h4>VYHĽADÁVANIE</h4>

                        <form action="/inzeraty" method="get">
                            {{csrf_field()}}

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
                            <input id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita"/>



                            <div class="form-group">
                                <label for="kategoria">Kategória</label>
                                <select id="kategoria" class="form-control" name="kategoria">
                                    <option value="1">Všetky nehnuteľnosti</option>
                                    <option value="2">Ponuka real. kancelárií</option>
                                    <option value="3">Súkromná inzercia</option>
                                </select>

                                <label for="typ">Typ</label>
                                <select id="typ" class="form-control" name="typ">
                                    <option value="1">Predaj</option>
                                    <option value="2">Prenájom</option>
                                    <option value="3">Kúpa</option>
                                    <option value="4">Podnájom</option>
                                    <option value="5">Výmena</option>
                                    <option value="6">Dražba</option>
                                </select>

                                <label for="druh">Druh</label>
                                <select  class="form-control" id="druh" name="druh">
                                    <option value="1">Všetko</option>
                                    <optgroup label="BYTY">
                                        <option value="101">Garsónka</option>
                                        <option value="102">1 izbový byt</option>
                                        <option value="103">2 izbový byt</option>
                                        <option value="104">3 izbový byt</option>
                                        <option value="105">4 izbový byt</option>
                                        <option value="106">5 a viac izbový byt</option>
                                        <option value="107">Mezonet</option>
                                        <option value="108">Apartmán</option>
                                        <option value="109">Iný byt</option>
                                        <option value="110">Všetky byty</option>
                                    </optgroup>
                                    <optgroup label="DOMY">
                                        <option value="201">Chata</option>
                                        <option value="202">Chalupa</option>
                                        <option value="203">Rodinný dom</option>
                                        <option value="204">Rodinná vila</option>
                                        <option value="205">Bývalá poľnohosp. usadlosť</option>
                                        <option value="206">Iný objekt na bývanie a rekreáciu</option>
                                        <option value="207">Všetky domy</option>
                                    </optgroup>
                                    <optgroup label="PRIESTORY">
                                        <option value="301">Kancelárie, administratívne priestory</option>
                                        <option value="302">Obchodné priestory</option>
                                        <option value="303">Reštauračné priestory</option>
                                        <option value="304">Športové priestory</option><
                                        <option value="305">Iné komerčné priestory</option>
                                        <option value="306">Priestor pre výrobu</option>
                                        <option value="307">Priestor pre sklad</option>
                                        <option value="308">Opravárenský priestor</option>
                                        <option value="309">Priestor pre chov zvierat</option>
                                        <option value="310">Iný prevádzkovy priestor</option>
                                        <option value="311">Všetky priestory</option>
                                    </optgroup>
                                    <optgroup label="POZEMKY">
                                        <option value="401">Rekreačný pozemok</option>
                                        <option value="402">Pozemok pre rodinné domy</option>
                                        <option value="403">Pozemok pre bytovú výstavbu</option>
                                        <option value="404">Komerčná zóna</option>
                                        <option value="405">Priemyselná zóna</option>
                                        <option value="406">Záhrada</option>
                                        <option value="407">Sad</option>
                                        <option value="407">Lúka, pasienok</option>
                                        <option value="408">Orná poda</option>
                                        <option value="409">Chmelnica, vinica</option>
                                        <option value="410">Lesná pôda</option>
                                        <option value="411">Vodná plocha</option>
                                        <option value="412">Iný poľnohosp. pozemok</option>
                                        <option value="413">Hrobové miesto</option>
                                        <option value="414">Všetky pozemky</option>
                                    </optgroup>
                                </select>
                                <label for="stav">Stav</label>
                                <select id="stav" class="form-control" name="stav">
                                    <option value="1">Všetky stavy</option>
                                    <option value="2">Novostavba</option>
                                    <option value="3">Čiastočná rekonštrukcia</option>
                                    <option value="4">Kompletná rekonštrukcia</option>
                                    <option value="5">Pôvodný stav</option>
                                    <option value="6">Vo výstavbe</option>
                                    <option value="7">developerský projekt</option>
                                </select>
                                <label for="cena">Cena(€)</label>
                                <div class="input-group" id="cena">
                                    <input  placeholder="od" class="form-control" type="number" min="0" name="cena_od"/>
                                    <span class="input-group-addon"></span>
                                    <input  placeholder="do" class="form-control" type="number" min="0" name="cena_do"/>
                                </div>
                                <label for="vymera">Výmera (m<sup>2</sup>)</label>
                                <div class="input-group" id="vymera">
                                    <input  placeholder="od" class="form-control" type="number" min="0" name="vymera_od"/>
                                    <span class="input-group-addon"></span>
                                    <input  placeholder="do" class="form-control" type="number" min="0" name="vymera_do"/>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-danger form-control" value="VYHĽADAŤ"/>
                            </div>
                            @include('errors')
                        </form>

                        <!-- ################################################################################################ -->
                    </div>
                    <div class="one_third">
                        <h1 class="logoname"><span>REA</span>LITKY</h1>
                        <p class="btmspace-30">Nejaký popis... o nás... [<a href="#">&hellip;</a>]</p>
                        <ul class="faico clear">
                            <li><a class="faicon-dribble" href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
                        </ul>
                    </div>
                    <div class="one_third">
                        <h6 class="heading">Rýchly kontakt</h6>
                        <p class="nospace btmspace-15">Toto je len príklad toho, čo sa tu môže dať. To sa zmení...</p>
                        <form method="post" action="#">
                            <fieldset>
                                <legend>Kontakt:</legend>
                                <input class="btmspace-15" type="text" value="" placeholder="Name">
                                <input class="btmspace-15" type="text" value="" placeholder="Email">
                                <input class="btmspace-15" type="text" value="" placeholder="Správa">

                                <button type="submit" value="submit">Potvrdiť</button>
                            </fieldset>
                        </form>
                    </div>
                    <!-- ################################################################################################ -->
                </footer>
            </div>
            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
                <h6 class="heading">Inzeráty</h6>
                <p>Zobrazenie...</p>
            </div>
            <ul class="nospace group">
                <li class="one_third first">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Nadpis 1</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Popis... [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="inzeraty/1 ">Zobraziť detail</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Nadpis 2</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Popis... [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="inzeraty/1">Zobraziť detail</a></footer>
                        </div>
                    </article>
                </li>
                <li class="one_third">
                    <article>
                        <figure><a href="#"><img src="images/demo/348x261.png" alt=""></a>
                            <figcaption>
                                <time datetime="2045-04-04T08:15+00:00"><strong>04</strong> <em>Apr</em></time>
                            </figcaption>
                        </figure>
                        <div class="excerpt">
                            <h6 class="heading">Nadpis 3</h6>
                            <ul class="nospace meta">
                                <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
                                <li><i class="fas fa-tags"></i> <a href="#">Tag 1</a>, <a href="#">Tag 2</a></li>
                            </ul>
                            <p>Popis... [<a href="#">&hellip;</a>]</p>
                            <footer><a class="btn" href="inzeraty/1">Zobraziť detail</a></footer>
                        </div>

                    </article>
                </li>
            </ul>
            <!-- ################################################################################################ -->
        </section>
    </div>

    <!-- ################################################################################################ -->
    </section>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    {{-- Tu je zatial pripraveny kod na prihlasovanie, registraciu - potom sa pouzije }}


    {{--<ul class="nav navbar-nav navbar-right">--}}
    {{--<!-- Authentication Links -->--}}
    {{--@guest <li><a href="{{ route('login') }}">Prihlásenie</a></li>--}}
    {{--<li><a href="{{ route('register') }}">Registrácia</a></li>--}}
    {{----}}
    {{--@else--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<ul class="dropdown-menu">--}}
    {{--<li>--}}
    {{--<a href="{{ route('logout') }}"--}}
    {{--onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();">--}}
    {{--Odhlásiť--}}
    {{--</a>--}}

    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--@endguest--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</div>--}}

    <!-- ################################################################################################ -->

    </body>
    </html>

@endsection