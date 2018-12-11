@extends('layouts.app')

@section('content')

    @include('popup.pridany')
    @include('popup.error')

    <div class="container" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div align="center">
                            <h4>Úprava inzerátu</h4>
                        </div>
                        <form method="post" class="form-horizontal"
                              action="{{route('inzeraty.update',[$inzerat->id])}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}


                            <label for="nazov">Nazov</label>
                            <input id="nazov" class="form-control" placeholder="Zadajte názov" name="nazov"
                                   value="{{$inzerat->nazov}}"/>

                            <label for="popis">Popis</label>
                            <textarea class="form-control" placeholder="Zadajte popis" name="popis" rows="4"
                                      cols="50">{{$inzerat->popis}}</textarea>

                            <label for="mesto">Mesto</label>
                            <input id="mesto" class="form-control" placeholder="Zadajte mesto" name="mesto"
                                   value="{{$inzerat->mesto}}"/>

                            <label for="ulica">Ulica</label>
                            <input id="ulica" class="form-control" placeholder="Zadajte ulicu" name="ulica"
                                   value="{{$inzerat->ulica}}"/>

                            <label id="kategoria_label" for="kraj">Kategória</label>
                            <select id="kategoria_id" class="form-control" name="kategoria_id">
                                <option value={{$kategoria->id}}>{{$kategoria->nazov}}</option>


                                <option> @foreach($kategorie as $kategoria)
                                    @if(substr($kategoria->nazov,0, 7) != "Všetky" )
                                        <option value={{$kategoria->id}}>{{$kategoria->nazov}}</option>
                                    @endif
                                @endforeach

                            </select>


                            <label for="lokalita"><strong>Obec/Mesto</strong></label>
                            <input list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu"
                                   name="lokalita" value="{{$inzerat->obec->obec.", okres ".$inzerat->obec->okres_id}}"
                                   autocomplete="off"/>

                            <datalist id="obce">
                                @foreach($obce as $obec)
                                    <option href="#" id="{{$obec->obec}}">{{$obec->obec}},
                                        okres {{$obec->okres_id}}</option>

                                @endforeach
                            </datalist>


                            <label id="stavy_label" for="stavy">Stav</label>
                            <select id="stavy" class="form-control" name="stavy">
                                <option id=0 value={{$stav->id}}>{{$stav->nazov}}</option>
                                <option> @foreach($stavy as $stav)
                                    @if(substr($stav->nazov,0, 7) != "Všetky" )
                                        <option value={{$stav->id}}>{{$stav->nazov}}</option>
                                    @endif
                                @endforeach

                            </select>

                            <label id="druh_label" for="druh">Druh</label>
                            <select class="form-control" id="druh" name="druh">
                                <option id=0 value=1>{{$druh->nazov}}</option>
                                <option id=1 value=1> @foreach($druhy_nazov as $druh_nazov)
                                    <optgroup label={{$druh_nazov->nazov}} id={{$druh_nazov->nazov}}>
                                        @foreach($druhy as $druh)
                                            @if(($druh_nazov->nazov == $druh->nazov) && (substr($druh->podnazov,0, 7) != "Všetky" ))
                                                <option value={{$druh->id}}>{{$druh->podnazov}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>

                            <label id="typ_label" for="typ">Typy</label>
                            <select id="typ" class="form-control" name="typ">
                                <option id=0 value={{$typ->id}}>{{$typ->nazov}}</option>
                                <option> @foreach($typy as $typ)
                                    <option id={{$typ->nazov}} value={{$typ->id}}>{{$typ->nazov}} </option>
                                @endforeach
                            </select>


                            <label for="cena">Cena</label>
                            <input id="cena" class="form-control" placeholder="cena" type="number" name="cena"
                                   value="{{$inzerat->cena}}"/>

                            @if ($inzerat->cena_dohodou == 1)
                                <div id="cena_dohodou">

                                    <label for="cena_dohodou"><strong>Cena dohodou</strong> </label>
                                    <label class="radio-inline"><input value=true onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio"
                                                                       name="optradio" checked>Ano</label>
                                    <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio" name="optradio"
                                        >Nie</label>
                                    <br>
                                </div>
                            @else
                                <div id="cena_dohodou">

                                    <label for="cena_dohodou"><strong>Cena dohodou </strong> </label>
                                    <label class="radio-inline"><input value=true onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio"
                                                                       name="optradio">Ano</label>
                                    <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio" name="optradio"
                                                                       checked
                                        >Nie</label>
                                    <br>
                                </div>






                            @endif
                            <label for="vymera_domu">Výmera domu</label>
                            <input class="form-control" placeholder=" Zadajte vymeru domu" type="number"
                                   name="vymera_domu" value="{{$inzerat->vymera_domu}}"/>

                            <label for="vymera_pozemku">Výmera pozemku</label>
                            <input class="form-control" placeholder=" Zadajte vymeru pozemku" type="number"
                                   name="vymera_pozemku" value="{{$inzerat->vymera_pozemku}}"/>

                            <label for="uzitkova_plocha">Úžitková plocha</label>
                            <input id="uzitkova_plocha" class="form-control" placeholder="Zadajte uzitkovu plochu"
                                   type="number" name="uzitkova_plocha" value="{{$inzerat->uzitkova_plocha}}"/>

                            <label for="uzitkova_plocha">Úžitková plocha</label>
                            <input id="uzitkova_plocha" class="form-control" placeholder="Zadajte uzitkovu plochu"
                                   type="number" name="uzitkova_plocha" value="{{$inzerat->uzitkova_plocha}}"/>

                            @if($pouzivatel!=null)
                                <label for="telefon">Kontakt / tel. číslo</label>
                                <input id="telefon" class="form-control" placeholder="Zadajte telefonne číslo"
                                       name="telefon" value="{{$pouzivatel->telefon}}"/>
                            @endif

                            <br>
                            <input type="submit" class="btn btn-danger form-control" value="Uložiť zmeny" name="submit">
                            <br> <br>
                        </form>


                        <form method="POST" action="{{route('inzeraty.destroy',[$inzerat->id])}}">
                            {{ method_field('DELETE') }}
                            {{csrf_field()}}
                            <div class="field">
                                <div class="control">
                                    <button type="submit" class="btn btn-danger form-control">Zmazať projekt</button>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection