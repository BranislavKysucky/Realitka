@extends('spravovanie.index')
@section('supercontent')

        <div class="container" align="center">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1>{{$pouzivatel->meno." ".$pouzivatel->priezvisko}}</h1></div>

                        <br>



                        <div class="form-group">

                            <label for="meno" class="col-md-4 control-label"><strong><h3>Email : </h3> {{$pouzivatel->email}}</strong></label>


                        </div>
                        <div class="form-group">
                            <label for="priezvisko" class="col-md-4 control-label"><strong><h3>Telefon : </h3>{{$pouzivatel->telefon}}</strong></label>

                        </div>

                        <div class="form-group">
                            <label for="lokalita" class="col-md-4 control-label"><strong><h3>Obec/Mesto : </h3>{{$pouzivatel->obec->obec.', '.$pouzivatel->obec->okres_id}}</strong></label>


                        </div>



                        <br>




                        <div class="form-group">
                            <label for="ulica_pouzivatel" class="col-md-4 control-label"><strong><h3>Ulica a popisné číslo : </h3> {{$pouzivatel->ulica_cislo}} </strong></label>


                        </div>

                        <div class="form-group">
                            <label for="psc_pouzivatel" class="col-md-4 control-label"><strong><h3>PSČ : </h3> {{$pouzivatel->PSC}}</strong></label>


                        </div>

<br>


                        <div class="form-group">


                            <form action="{{action('RealitkaMakleriController@indexPouzivatel', $pouzivatel->id)}}" >
                                {{csrf_field()}}
                                {{method_field('GET')}}
                                <button class="btn btn-info form-control" type="submit">Zobraziť všetky inzeráty tohto použivateľa <span class="glyphicon glyphicon-eye-open"></span></button>
                            </form>
                           <br>
                            <form action="{{action('RealitkaMakleriController@edit', $pouzivatel->id)}}" >
                                {{csrf_field()}}
                                {{method_field('GET')}}
                                <button class="btn btn-info form-control" type="submit">Upraviť <span class="glyphicon glyphicon-eye-open"></span></button>
                            </form>
                            <br>
                            <form action="{{action('RealitkaMakleriController@destroy', $pouzivatel->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-info" onclick="return confirm('Prosím potvrdťe zmazanie');" type="submit">Odstrániť<span class="glyphicon glyphicon-trash"></span></button>
                            </form>





                        </div>





                    </div>
                </div>
            </div>
        </div>




@endsection