@extends('layouts.app')

@section('content')

    <!-- na tejto stranke bude pridavanie inzeratu, zatial som len ciastocne predpripravil form pre input obrazkov,
    v buducniosti tu bude musiet byt aj nejaky ten javascript, ktory zobrazi nacitane obrazky este pred odoslanim,
    taktiez je vytvorena zlozka public/images kde sa budu ukladat obrazky-->




    <div class="col-sm-3 col-md-3 col-lg-3 pull-left">

        <div class="well well-sm ">
            <div align="center">
                <h4>Pridanie inzeratu</h4>
            </div>
            <form action="{{route('inzeraty.store')}}" method="post" enctype="multipart/form-data">
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



                <label for="nazov">Nazov</label>
                <input id="nazov" class="form-control" placeholder="Zadajte nazov" name="nazov"/>

                <label for="popis">Popis</label>
                <input id="popis" class="form-control" placeholder="Zadajte popis" name="popis"/>

                <label for="lokalita">Adresa</label>
                <input id="adresa" class="form-control" placeholder="Zadajte adresu" name="adresa"/>


                <div class="form-group">
                    <label for="kategoria">Kategória</label>
                    <select id="kategoria" class="form-control" name="kategoria">

                        <option value="1">Ponuka real. kancelárií</option>
                        <option value="2">Súkromná inzercia</option>
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

                        </optgroup>
                        <optgroup label="DOMY">
                            <option value="201">Chata</option>
                            <option value="202">Chalupa</option>
                            <option value="203">Rodinný dom</option>
                            <option value="204">Rodinná vila</option>
                            <option value="205">Bývalá poľnohosp. usadlosť</option>
                            <option value="206">Iný objekt na bývanie a rekreáciu</option>

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

                        </optgroup>
                    </select>
                    <label for="stav">Stav</label>
                    <select id="stav" class="form-control" name="stav">

                        <option value="1">Novostavba</option>
                        <option value="2">Čiastočná rekonštrukcia</option>
                        <option value="3">Kompletná rekonštrukcia</option>
                        <option value="4">Pôvodný stav</option>
                        <option value="5">Vo výstavbe</option>
                        <option value="6">Developerský projekt</option>
                    </select>
                    <label for="cena">Cena(€)</label>
                    <div class="input-group" id="cena">
                        <input  placeholder="cena" class="form-control" type="number" min="0" name="cena_od"/>

                    </div>

                    <label for="cena_dohodou">Cena dohodou </label>
                    <label class="radio-inline"><input type="radio" [value] = 1 name="optradio" checked>Ano</label>
                    <label class="radio-inline"><input type="radio" [value] = 0 name="optradio">Nie</label>
                    <br>

                    <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                    <div class="input-group" id="vymera_domu">
                        <input  placeholder="vymera domu" class="form-control" type="number" min="0" name="vymera_domu"/>

                    </div>


                    <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                    <div class="input-group" id="vymera_pozemku">
                        <input  placeholder="vymera pozemku" class="form-control" type="number" min="0" name="vymera_pozemku"/>

                    </div>

                    <label for="uzitkova_plocha">Uzitkova plocha(m<sup>2</sup>)</label>
                    <div class="input-group" id="uzitkova_plocha">
                        <input  placeholder="uzitkova plocha" class="form-control" type="number" min="0" name="uzitkova_plocha"/>

                    </div>


                </div>
                <div class="well well-lg">


                        <label>Select image to upload:</label>
                        <input type="file" name="image" id="image">


                </div>
                <div class="form-group">

                    <input type="submit" class="btn btn-danger form-control"  value="Pridat" name="submit">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </div>
                @include('errors')
            </form>


        </div>

    </div>



@endsection