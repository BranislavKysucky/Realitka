@extends('layouts.app')

@section('content')




    <div class="col-sm-6 col-md-6 col-lg-6 pull-left">

        <div class="well well-sm ">
            <div align="center">
                <h4>Pridanie inzeratu</h4>
            </div>
            <form action="{{route('inzeraty.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}



                <label for="nazov">Nazov</label>
                <input required id="nazov" class="form-control" placeholder="Zadajte nazov" name="nazov"/>

                <label for="popis">Popis</label>
                <input required id="popis" class="form-control" placeholder="Zadajte popis" name="popis"/>


                <label id = "kraj_label" for="kraj">Kraj</label>
                <select id="kraj_id" class="form-control" name="kraj_id">


                        <option id=1 value=1>Bratislavský kraj</option>
                        <option id=2 value=2>Trnavský kraj</option>
                        <option id=3 value=3>Trenčiansky kraj</option>
                        <option id=4 value=4>Nitriansky kraj</option>
                        <option id=5 value=5>Žilinský kraj</option>
                        <option id=6 value=6>Banskobystrický kraj</option>
                        <option id=7 value=7>Prešovský kraj</option>
                        <option id=8 value=8>Košický kraj</option>

                </select>



                <label for="lokalita">Lokalita</label>
                <input id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita"/>

                <label for="adresa">Adresa</label>
                <input required id="adresa" class="form-control" placeholder="Zadajte adresu" name="adresa"/>


                <div class="form-group">


                    <label id = "typ_label" for="typ">Typ</label>
                    <select id="typ" class="form-control" name="typ">
                        @foreach($typy as $typ)

                            <option id={{$typ->nazov}} value={{$typ->id}}>{{$typ->nazov}}</option>

                        @endforeach
                    </select>






                    <label for="druh">Druh</label>
                    <select  class="form-control" id="druh" name="druh">
                        @foreach($druhy_nazov as $druh_nazov)
                            <optgroup label={{$druh_nazov->nazov}} id={{$druh_nazov->nazov}}>


                            @foreach($druhy as $druh)



                                    @if($druh_nazov->nazov == $druh->nazov)
                                    <option value={{$druh->id}}>{{$druh->podnazov}}</option>
                                    @endif


                            @endforeach

                            </optgroup>

                        @endforeach
                    </select>

                    <label id="stavy_label" for="stavy">Stav</label>
                    <select id="stavy" class="form-control" name="stavy">

                        @foreach($stavy as $stav)

                            <option value={{$stav->id}}>{{$stav->nazov}}</option>

                        @endforeach

                    </select>

                    <label for="cena">Cena(€)</label>


                    <div class="input-group" id="cena" name="cena">
                        <input  required placeholder="cena" class="form-control" type="number" min="0" id="cena"  name="cena"/>

                    </div>



                    <div  id="cena_dohodou">

                    <label for="cena_dohodou">Cena dohodou </label>
                    <label class="radio-inline"><input value = true name = "cena_dohodou" id = "cena_dohodou" type="radio"  name="optradio" checked>Ano</label>
                    <label class="radio-inline"><input value = false name = "cena_dohodou" id = "cena_dohodou" type="radio"  name="optradio">Nie</label>
                    <br>
                    </div>

                    <div class="input-group" id="vymera_domu">
                        <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                        <input required placeholder="vymera domu" class="form-control" type="number" min="0" name="vymera_domu"/>

                    </div>



                    <div class="input-group" id="vymera_pozemku">
                        <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                        <input required placeholder="vymera pozemku" class="form-control" type="number" min="0" name="vymera_pozemku"/>

                    </div>


                    <div class="input-group" id="uzitkova_plocha">
                        <label for="uzitkova_plocha">Uzitkova plocha(m<sup>2</sup>)</label>
                        <input required placeholder="uzitkova plocha" class="form-control" type="number" min="0" name="uzitkova_plocha"/>

                    </div>


                </div>


                <div id="wrapper">
                        <input type="file" id="fileInput" class="inputFile" name="images" accept=".jpg, .jpeg, .png" multiple><br>
                        <label for="fileInput">Vyber obrázok</label>

                        <div id="container">
                            <div class="element" id="div_1"></div>
                        </div>




                </div>




                <div class="form-group">

                    <input type="submit" class="btn btn-danger form-control"  value="Pridat" name="submit">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </div>
                @include('errors')
            </form>


        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src='{{ URL::asset('js/polozky_formularu.js') }}'></script>
    <script src='{{ URL::asset('js/lokalita.js') }}'></script>
    <script src='{{ URL::asset('js/preview.js') }}'></script>


@endsection