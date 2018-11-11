@extends('layouts.app')

@section('content')

    <div class="col-sm-3 col-md-3 col-lg-3 pull-left">

        <div class="well well-sm ">
            <div align="center">
                <h4>VYHĽADÁVANIE</h4>
            </div>
            <form action="{{route('inzeraty.index')}}" method="get">
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


        </div>

    </div>

    <!-- Kliknutie na inzerat je zatial zakomentovane lebo to padalo na registrovanom uzivatelovi,
        ale bez reg. uzivatela to slapalo v pohode bez problemov to hadzalo na detail inzeratu.
    ....-->
    @foreach($inzeraty as $inzerat)
    <div class="col-md-9 col-lg-9 col-sm-9 pull-right">
    {{--<a href="{{url('inzeraty/detail/'.$inzerat->id)}}">--}}
        <div class="well well-lg">
            <h2>PREDAJ - {{$inzerat->popis}}</h2>
            <h3>Názov: {{$inzerat->nazov}}</h3>
            <p><b>Uzitkova plocha:</b> {{$inzerat->uzitkova_plocha}} m² </p>
            <p><b>Typ nehnutelnosti:</b> {{$inzerat->typ->nazov}}</p>
            <p><b>Stav:</b> {{$inzerat->stav->nazov}}</p>
            <p><b>Kategoria:</b> {{$inzerat->kategoria->nazov}}</p>
            <p><b>Mesto:</b> {{$inzerat->mesto}}</p>
            <p><b>Kraj:</b> {{$inzerat->kraj->nazov}}</p>
            <p><b>Druh -</b> {{$inzerat->druh->nazov}}</p>
            <p><b>Cena - </b>{{$inzerat->cena}}  €</p>
            <p><b>Pocet zobrazeni -</b> {{$inzerat->pocet_zobrazeni}}</p>



           {{-- <p>{{$inzerat->fotografia}}</p>--}}

            <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
        </div>
    {{--</a>--}}
    </div>
    @endforeach

@endsection