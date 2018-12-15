


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
                            <h2> Úprava profilu </h2>
                        </div>


                        <form class="form" action="{{action('MaklerController@update',$pouzivatel->id)}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-default">




                                    <div class="form-group{{ $errors->has('meno') ? ' has-error' : '' }}">
                                        <label for="meno" ><strong>Meno</strong></label>


                                            <input id="meno" type="text" class="form-control" name="meno" value="{{ $pouzivatel->meno }}" required autofocus>

                                            @if ($errors->has('meno'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('meno') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('priezvisko') ? ' has-error' : '' }}">
                                        <label for="priezvisko" ><strong>Priezvisko</strong></label>


                                            <input id="priezvisko" type="text" class="form-control" name="priezvisko" value="{{ $pouzivatel->priezvisko }}" required autofocus>

                                            @if ($errors->has('priezvisko'))

                                        <strong>{{ $errors->first('priezvisko') }}</strong>

                                            @endif
                                    </div>


                                    <label for="lokalita"><strong>Obec/Mesto</strong></label>
                                    <input list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita" value="{{$pouzivatel->obec->obec.", okres ".$pouzivatel->obec->okres_id}}" autocomplete="off"/>

                                    <datalist id="obce">
                                        @foreach($obce as $obec)
                                            <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>

                                        @endforeach
                                    </datalist>


<br>





                                    <div class="form-group{{ $errors->has('ulica_pouzivatel') ? ' has-error' : '' }}">
                                        <label for="ulica_pouzivatel" ><strong>Ulica a popisné číslo</strong></label>


                                            <input id="ulica_pouzivatel" type="text" class="form-control" name="ulica_pouzivatel"
                                                   value="{{ $pouzivatel->ulica_cislo }}" required autofocus>

                                            @if ($errors->has('ulica_pouzivatel'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('ulica_pouzivatel') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('psc_pouzivatel') ? ' has-error' : '' }}">
                                        <label for="psc_pouzivatel"><strong>PSČ</strong></label>


                                            <input id="psc_pouzivatel" type="number" min="0" class="form-control"
                                                   name="psc_pouzivatel"
                                                   value="{{ $pouzivatel->PSC }}" required autofocus>

                                            @if ($errors->has('psc_pouzivatel'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('psc_pouzivatel') }}</strong>
                                    </span>
                                            @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('telefon_pouzivatel') ? ' has-error' : '' }}">
                                        <label for="telefon_pouzivatel" ><strong>Telefón</strong></label>


                                            <input id="telefon_pouzivatel" type="text" class="form-control"
                                                   name="telefon_pouzivatel"
                                                   value="{{ $pouzivatel->telefon }}" required >

                                            @if ($errors->has('telefon_pouzivatel'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('telefon_pouzivatel') }}</strong>
                                    </span>
                                            @endif

                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" ><strong>E-Mail</strong></label>


                                            <input id="email" type="email" class="form-control" name="email" value="{{ $pouzivatel->email }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif

                                    </div>



                                    <div class="form-group">

                                            <button type="submit" class="btn btn-info form-control">
                                                Aktualizovať
                                            </button>


                                    </div>

                                </div>

                            </div>
                        </form>





                    </div>
                </div>
            </div>


        </div>




    </div>
@endsection