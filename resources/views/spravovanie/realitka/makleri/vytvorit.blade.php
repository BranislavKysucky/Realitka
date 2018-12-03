@extends('spravovanie.index')
@section('supercontent')
    <form class="form" action="{{action('RealitkaMakleriController@store')}}" method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}
    <div class="container" align="center">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Registrácia nového makléra</h1></div>

<br>



                            <div class="form-group{{ $errors->has('meno') ? ' has-error' : '' }}">
                                <label for="meno" class="col-md-4 control-label"><strong>Meno</strong></label>

                                <div class="col-md-6">
                                    <input id="meno" type="text" class="form-control" name="meno" value="{{ old('meno') }}" required autofocus>

                                    @if ($errors->has('meno'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('meno') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('priezvisko') ? ' has-error' : '' }}">
                                <label for="priezvisko" class="col-md-4 control-label"><strong>Priezvisko</strong></label>

                                <div class="col-md-6">
                                    <input id="priezvisko" type="text" class="form-control" name="priezvisko" value="{{ old('priezvisko') }}" required autofocus>

                                    @if ($errors->has('priezvisko'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('priezvisko') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokalita" class="col-md-4 control-label"><strong>Obec/Mesto</strong></label>

                                <div class="col-md-6">
                                    <input list="obce" id="obec_pouzivatel" class="form-control" placeholder="Zadajte lokalitu" name="obec_pouzivatel" autocomplete="off"/>
                                    <datalist id="obce">
                                        @foreach($obce as $obec)
                                            <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>
                                        @endforeach
                                    </datalist>

                                </div>
                            </div>



<br>




                            <div class="form-group{{ $errors->has('ulica_pouzivatel') ? ' has-error' : '' }}">
                                <label for="ulica_pouzivatel" class="col-md-4 control-label"><strong>Ulica a popisné číslo</strong></label>

                                <div class="col-md-6">
                                    <input id="ulica_pouzivatel" type="text" class="form-control" name="ulica_pouzivatel"
                                           value="{{ old('ulica_pouzivatel') }}" required autofocus>

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
                                           value="{{ old('psc') }}" required autofocus>

                                    @if ($errors->has('psc_pouzivatel'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('psc_pouzivatel') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telefon_pouzivatel') ? ' has-error' : '' }}">
                                <label for="telefon_pouzivatel" class="col-md-4 control-label"><strong>Telefón</strong></label>

                                <div class="col-md-6">
                                    <input id="telefon_pouzivatel" type="text" class="form-control"
                                           name="telefon_pouzivatel"
                                           value="{{ old('telefon_pouzivatel') }}" required autofocus>

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label"><strong>Heslo</strong></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label"><strong>Potvrdiť Heslo</strong></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registrovať
                                    </button>
                                </div>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>


@endsection