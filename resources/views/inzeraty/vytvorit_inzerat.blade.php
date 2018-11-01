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
                        @foreach($kategorie as $kategoria)

                            <option value={{$kategoria->id}}>{{$kategoria->nazov}}</option>

                        @endforeach

                    </select>

                    <label for="typ">Typ</label>
                    <select id="typ" class="form-control" name="typ">
                        @foreach($typy as $typ)

                            <option value={{$typ->id}}>{{$typ->nazov}}</option>

                        @endforeach
                    </select>

                    <label for="druh">Druh</label>
                    <select  class="form-control" id="druh" name="druh">
                        @foreach($druhy_nazov as $druh_nazov)
                            <optgroup label={{$druh_nazov->nazov}}>


                            @foreach($druhy as $druh)



                                    @if($druh_nazov->nazov == $druh->nazov)
                                    <option value={{$druh->id}}>{{$druh->podnazov}}</option>
                                    @endif


                            @endforeach

                            </optgroup>

                        @endforeach
                    </select>

                    <label for="stavy">Stav</label>
                    <select id="stavy" class="form-control" name="stavy">

                        @foreach($stavy as $stav)

                            <option value={{$stav->id}}>{{$stav->nazov}}</option>

                        @endforeach

                    </select>
                    <label for="cena">Cena(€)</label>
                    <div class="input-group" id="cena">
                        <input  placeholder="cena" class="form-control" type="number" min="0" name="cena"/>

                    </div>

                    <label for="cena_dohodou">Cena dohodou </label>
                    <label class="radio-inline"><input value = true name = "cena_dohodou" id = "cena_dohodou" type="radio"  name="optradio" checked>Ano</label>
                    <label class="radio-inline"><input value = false name = "cena_dohodou" id = "cena_dohodou" type="radio"  name="optradio">Nie</label>
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
                        <input type="file" name="images[]"  multiple>


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