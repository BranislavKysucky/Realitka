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
                            <p>DELETE uz funguje, update skoro tiez, len po potvrdeni nevracia uvodnu stranku ale error,
                            funkciu tu splni, updatne db, ale musim ten return napravit, zatial neviem preco to blbne.... A takisto nie su dobre este spravene selectory ked si vyberam
                            napr. kategoriu z inej tabulky, malo by nacitat vsetky nahrate udaje, a pouzivatel si len vyberie z moznosti danu polozku.</p>
                            <h4>Úprava inzerátu</h4>
                        </div>
                        <form  method="post" class="form-horizontal" action="{{route('inzeraty.update',[$inzerat->id])}}" >
                              {{csrf_field()}}
                              {{method_field('PUT')}}



                            <label for="nazov">Nazov</label>
                            <input  id="nazov" class="form-control" placeholder="Zadajte názov" name="nazov"  value="{{$inzerat->nazov}}"/>

                            <label for="popis">Popis</label>
                            <textarea  class="form-control" placeholder="Zadajte popis" name="popis" rows="4" cols="50">{{$inzerat->nazov}}</textarea>

                            <label for="mesto">Mesto</label>
                            <input id="mesto" class="form-control" placeholder="Zadajte mesto" name="mesto" value="{{$inzerat->mesto}}"/>

                            <label for="ulica">Ulica</label>
                            <input id="ulica" class="form-control" placeholder="Zadajte ulicu" name="ulica" value="{{$inzerat->ulica}}"/>

                            <label id="kategoria_label" for="kraj">Kategória</label>
                            <select id="kategoria_id" class="form-control" name="kategoria_id">
                                <option id=0 value=1>{{$kategorie->nazov}}</option>
                            </select>

                            <label id="kraj_label" for="kraj">Kraj</label>
                            <select id="kraj_id" class="form-control" name="kraj_id">
                                <option id=0 value=1>{{$kraje->nazov}}</option>
                                <option id=1 value=1>Bratislavský kraj</option>
                                <option id=2 value=2>Trnavský kraj</option>
                                <option id=3 value=3>Trenčiansky kraj</option>
                                <option id=4 value=4>Nitriansky kraj</option>
                                <option id=5 value=5>Žilinský kraj</option>
                                <option id=6 value=6>Banskobystrický kraj</option>
                                <option id=7 value=7>Prešovský kraj</option>
                                <option id=8 value=8>Košický kraj</option>
                            </select>

                            <label id="druh_label" for="druh">Druh</label>
                            <select id="druh_id" class="form-control" name="druh_id">
                                <option id=0 value=1>{{$druhy->nazov}}</option>
                                <option id=1 value=1>vyber1</option>
                                <option id=2 value=2>vyber2</option>
                            </select>


                            <label id="druh_label" for="druh">Stav</label>
                            <select id="druh_id" class="form-control" name="druh_id">
                                <option id=0 value=1>{{$stav->nazov}}</option>
                                <option id=1 value=1>vyber1</option>
                                <option id=2 value=2>vyber2</option>
                            </select>

                            <label for="cena">Cena</label>
                            <input id="cena" class="form-control" placeholder="cena"  type="number"  name="cena" value="{{$inzerat->cena}}" />

                            <label for="vymera_domu">Výmera domu</label>
                            <input class="form-control" placeholder=" Zadajte vymeru domu"  type="number" name="vymera_domu" value="{{$inzerat->vymera_domu}}"/>

                            <label for="vymera_pozemku">Výmera pozemku</label>
                            <input  class="form-control" placeholder=" Zadajte vymeru pozemku" type="number" name="vymera_pozemku" value="{{$inzerat->vymera_pozemku}}"/>

                            <label for="uzitkova_plocha">Úžitková plocha</label>
                            <input id="uzitkova_plocha" class="form-control" placeholder="Zadajte uzitkovu plochu" type="number" name="uzitkova_plocha" value="{{$inzerat->uzitkova_plocha}}"/>

                            <label for="cena_dohodou">Cena dohodou</label>
                            <input id="cena_dohodou" class="form-control" placeholder="Zadajte cenu dohodou" type="number"  name="cena_dohodou" value="{{$inzerat->cena_dohodou}}"/>

                            <br>
                            <input type="submit" class="btn btn-danger form-control" value="Uložiť zmeny" name="submit">
                              <br>  <br>
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