@extends('layouts.app')

@section('content')



    @include('popup.pridany')
    @include('popup.error')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div align="center">
                            <h4>Pridanie inzeratu</h4>
                        </div>
                        <form class="form-horizontal" action="{{route('inzeraty.store')}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}


                            <label for="nazov">Nazov</label>
                            <input required id="nazov" class="form-control" placeholder="Zadajte nazov" name="nazov"/>

                            <label for="popis">Popis</label>
                            <textarea required id="popis" class="form-control" placeholder="Zadajte popis" name="popis"
                                      rows="4" cols="50"></textarea>





                            <label for="lokalita">Obec/Mesto</label>
                            <input list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita" autocomplete="off"/>
                            <datalist id="obce">
                                @foreach($obce as $obec)
                                    <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>
                                @endforeach
                            </datalist>

                            <label for="ulica">Ulica</label>
                            <input required id="ulica" class="form-control" placeholder="Zadajte ulicu" name="ulica"/>


                            <label id="typ_label" for="typ">Typ</label>
                            <select id="typ" class="form-control" name="typ">
                                @foreach($typy as $typ)

                                    <option id={{$typ->nazov}} value={{$typ->id}}>{{$typ->nazov}}</option>

                                @endforeach
                            </select>


                            <label for="druh">Druh</label>
                            <select class="form-control" id="druh" name="druh">
                                @foreach($druhy_nazov as $druh_nazov)
                                    <optgroup label={{$druh_nazov->nazov}} id={{$druh_nazov->nazov}}>


                                        @foreach($druhy as $druh)



                                            @if(($druh_nazov->nazov == $druh->nazov) && (substr($druh->podnazov,0, 7) != "Všetky" ))
                                                <option value={{$druh->id}}>{{$druh->podnazov}}</option>
                                            @endif


                                        @endforeach

                                    </optgroup>

                                @endforeach
                            </select>

                            <label id="stavy_label" for="stavy">Stav</label>
                            <select id="stavy" class="form-control" name="stavy">

                                @foreach($stavy as $stav)
                                    @if(substr($stav->nazov,0, 7) != "Všetky" )
                                        <option value={{$stav->id}}>{{$stav->nazov}}</option>
                                    @endif
                                @endforeach

                            </select>


                            <div id="cena" name="cena">
                                <label for="cena">Cena(€)</label>
                                <input  placeholder="cena" class="form-control" type="number" min="0" id="cena"
                                       value=""
                                       oninput="hideCena_dohodou();" name="cena"/>

                            </div>


                            <div id="cena_dohodou" align="center">

                                <label for="cena_dohodou">Cena dohodou </label>
                                <label class="radio-inline"><input value=true onchange="hideCena();" name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio"
                                                                   name="optradio" checked>Ano</label>
                                <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                   name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio" name="optradio"
                                                                   >Nie</label>
                                <br>
                            </div>

                            <div id="vymera_domu">
                                <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                                <input required placeholder="vymera domu" class="form-control" type="number" min="0"
                                       name="vymera_domu"/>

                            </div>


                            <div id="vymera_pozemku">
                                <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                                <input required placeholder="vymera pozemku" class="form-control" type="number" min="0"
                                       name="vymera_pozemku"/>

                            </div>


                            <div id="uzitkova_plocha">
                                <label for="uzitkova_plocha">Uzitkova plocha(m<sup>2</sup>)</label>
                                <input required placeholder="uzitkova plocha" class="form-control" type="number" min="0"
                                       name="uzitkova_plocha"/>

                            </div>

                            @guest
                                <label for="heslo">Heslo (slúži k editácii/zmazaniu inzerátu)</label>
                                <input required id="heslo" type="password" class="form-control"
                                       placeholder="Zadajte heslo"
                                       name="heslo" onmouseover="this.type='text'" onmouseout="this.type='password'"/>

                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                       placeholder="Zadajte Váš email">

                                <label for="kluc">Overovací kľúč (kluc bol odoslaný na vašu emailovú adresu)</label>
                                <input required id="kluc" type="password" class="form-control"
                                       placeholder="Zadajte kľúč"
                                       name="kluc" onmouseover="this.type='text'" onmouseout="this.type='password'"/>

                            @endguest

                            <div id="wrapper">
                                <input type="file" id="fileInput" class="inputFile" name="images[]"
                                       accept=".jpg, .jpeg, .png"
                                       multiple><br>
                                <label for="fileInput">Vyber obrázok</label>

                                <div id="container">
                                    <div class="element" id="div_1"></div>
                                </div>


                            </div>


                            <div>

                                <input type="submit" class="btn btn-danger form-control" value="Pridat" name="submit">

                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </div>
                            @include('errors')
                        </form>


                    </div>
                </div>
            </div>


        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src='{{ URL::asset('js/polozky_formularu.js') }}'></script>
        <script src='{{ URL::asset('js/preview.js') }}'></script>
        <script src='{{ URL::asset('js/cena.js') }}'></script>
        <script src='{{ URL::asset('js/zatvor_popup.js') }}'></script>

    </div>
@endsection