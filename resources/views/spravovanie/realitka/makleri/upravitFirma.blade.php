@extends('spravovanie.index')
@section('supercontent')

    <div class="container" align="center">

        <div class="row">
            <form class="form" action="{{action('RealitkaMakleriController@updateFirma',$pouzivatel->id)}}" method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1>Úprava firemných údajov</h1></div>

                        <br>




                        <div class="form-group{{ $errors->has('nazov') ? ' has-error' : '' }}">
                            <label for="nazov" class="col-md-4 control-label"><strong>Nazov</strong></label>

                            <div class="col-md-6">
                                <input id="nazov" type="text" class="form-control" name="nazov" value="{{ $pouzivatel->nazov }}" required autofocus>

                                @if ($errors->has('nazov'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nazov') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <label for="lokalita"><strong>Obec/Mesto</strong></label>
                        <input list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita" value="{{$pouzivatel->obec->obec.", okres ".$pouzivatel->obec->okres_id}}" autocomplete="off"/>

                        <datalist id="obce">
                            @foreach($obce as $obec)
                                <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>

                            @endforeach
                        </datalist>



                        <br><br>




                        <div class="form-group{{ $errors->has('ulica_pouzivatel') ? ' has-error' : '' }}">
                            <label for="ulica_pouzivatel" class="col-md-4 control-label"><strong>Ulica a popisné číslo</strong></label>

                            <div class="col-md-6">
                                <input id="ulica_pouzivatel" type="text" class="form-control" name="ulica_pouzivatel"
                                       value="{{ $pouzivatel->ulica_cislo }}" required autofocus>

                                @if ($errors->has('ulica_pouzivatel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ulica_pouzivatel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('psc_pouzivatel') ? ' has-error' : '' }}">
                            <label for="psc_pouzivatel" class="col-md-4 control-label"><strong>PSČ</strong></label>

                            <div class="col-md-6">
                                <input id="psc_pouzivatel" type="number" min="0" class="form-control"
                                       name="psc_pouzivatel"
                                       value="{{ $pouzivatel->PSC }}" required autofocus>

                                @if ($errors->has('psc_pouzivatel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('psc_pouzivatel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kontaktna_osoba') ? ' has-error' : '' }}">
                            <label for="kontaktna_osoba" class="col-md-4 control-label"><strong>Kontaktna osoba</strong></label>

                            <div class="col-md-6">
                                <input id="kontaktna_osoba" type="text" class="form-control" name="kontaktna_osoba" value="{{ $pouzivatel->kontaktna_osoba }}" required autofocus>

                                @if ($errors->has('kontaktna_osoba'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontaktna_osoba') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('telefon_pouzivatel') ? ' has-error' : '' }}">
                            <label for="telefon_pouzivatel" class="col-md-4 control-label"><strong>Telefón</strong></label>

                            <div class="col-md-6">
                                <input id="telefon_pouzivatel" type="text" class="form-control"
                                       name="telefon_pouzivatel"
                                       value="{{ $pouzivatel->telefon }}" required >

                                @if ($errors->has('telefon_pouzivatel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefon_pouzivatel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"><strong>E-Mail</strong></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $pouzivatel->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ICO') ? ' has-error' : '' }}">
                            <label for="ICO" class="col-md-4 control-label"><strong>ICO</strong></label>

                            <div class="col-md-6">
                                <input id="ICO" type="text" class="form-control" name="ICO" value="{{ $pouzivatel->ICO }}" required autofocus>

                                @if ($errors->has('ICO'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ICO') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('DIC') ? ' has-error' : '' }}">
                            <label for="DIC" class="col-md-4 control-label"><strong>DIC</strong></label>

                            <div class="col-md-6">
                                <input id="DIC" type="text" class="form-control" name="DIC" value="{{ $pouzivatel->DIC }}" required autofocus>

                                @if ($errors->has('DIC'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DIC') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info form-control">
                                    Aktualizovať
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
            <br>

        </div>



    </div>




@endsection