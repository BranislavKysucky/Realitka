@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registrácia realitnej kancelárie</div>


                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nazov') ? ' has-error' : '' }}">
                                <label for="nazov" class="col-md-4 control-label">Názov</label>

                                <div class="col-md-6">
                                    <input id="nazov" type="text" class="form-control" name="nazov"
                                           value="{{ old('nazov') }}" required autofocus>

                                    @if ($errors->has('nazov'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nazov') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokalita" class="col-md-4 control-label">Obec/Mesto</label>

                                <div class="col-md-6">
                                    <input list="obce" id="obec_realitka" class="form-control" placeholder="Zadajte lokalitu" name="obec_realitka" autocomplete="off"/>
                                        <datalist id="obce">
                                            @foreach($obce as $obec)
                                                    <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>
                                            @endforeach
                                        </datalist>

                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('ulica') ? ' has-error' : '' }}">
                                <label for="ulica" class="col-md-4 control-label">Ulica a popisné číslo</label>

                                <div class="col-md-6">
                                    <input id="ulica" type="text" class="form-control" name="ulica"
                                           value="{{ old('ulica') }}" required autofocus>

                                    @if ($errors->has('ulica'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ulica') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('psc') ? ' has-error' : '' }}">
                                <label for="psc" class="col-md-4 control-label">PSČ</label>

                                <div class="col-md-6">
                                    <input id="psc" type="number" min="0" class="form-control" name="psc"
                                           value="{{ old('psc') }}" required autofocus>

                                    @if ($errors->has('psc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('psc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('kontaktna_osoba') ? ' has-error' : '' }}">
                                <label for="kontaktna_osoba" class="col-md-4 control-label">Kontaktna osoba</label>

                                <div class="col-md-6">
                                    <input id="kontaktna_osoba" type="text" class="form-control" name="kontaktna_osoba"
                                           value="{{ old('kontaktna_osoba') }}" required autofocus>

                                    @if ($errors->has('kontaktna_osoba'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('kontaktna_osoba') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                                <label for="telefon" class="col-md-4 control-label">Telefón</label>

                                <div class="col-md-6">
                                    <input id="telefon" type="text" class="form-control" name="telefon"
                                           value="{{ old('telefon') }}" required autofocus>

                                    @if ($errors->has('telefon'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telefon') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email_realitka') ? ' has-error' : '' }}">
                                <label for="email_realitka" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email_realitka" type="email" class="form-control" name="email_realitka"
                                           value="{{ old('email_realitka') }}" required>

                                    @if ($errors->has('email_realitka'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email_realitka') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('ico') ? ' has-error' : '' }}">
                                <label for="ico" class="col-md-4 control-label">IČO</label>

                                <div class="col-md-6">
                                    <input id="ico" type="text" class="form-control" name="ico"
                                           value="{{ old('ico') }}" required autofocus>

                                    @if ($errors->has('ico'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('ico') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('dic') ? ' has-error' : '' }}">
                                <label for="dic" class="col-md-4 control-label">DIČ</label>

                                <div class="col-md-6">
                                    <input id="dic" type="text" class="form-control" name="dic"
                                           value="{{ old('dic') }}" required autofocus>

                                    @if ($errors->has('dic'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('dic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- ################################################################################################################# -->
                            <hr/>
                            Osobné údaje
                            <div class="form-group{{ $errors->has('meno') ? ' has-error' : '' }}">
                                <label for="meno" class="col-md-4 control-label">Meno</label>

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
                                <label for="priezvisko" class="col-md-4 control-label">Priezvisko</label>

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
                                <label for="lokalita" class="col-md-4 control-label">Obec/Mesto</label>

                                <div class="col-md-6">
                                    <input list="obce" id="obec_pouzivatel" class="form-control" placeholder="Zadajte lokalitu" name="obec_pouzivatel" autocomplete="off"/>
                                    <datalist id="obce">
                                        @foreach($obce as $obec)
                                            <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>
                                        @endforeach
                                    </datalist>

                                </div>
                            </div>








                            <div class="form-group{{ $errors->has('ulica_pouzivatel') ? ' has-error' : '' }}">
                                <label for="ulica_pouzivatel" class="col-md-4 control-label">Ulica a popisné číslo</label>

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
                                <label for="psc_pouzivatel" class="col-md-4 control-label">PSČ</label>

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
                                <label for="telefon_pouzivatel" class="col-md-4 control-label">Telefón</label>

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
                                <label for="email" class="col-md-4 control-label">E-Mail</label>

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
                                <label for="password" class="col-md-4 control-label">Heslo</label>

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
                                <label for="password-confirm" class="col-md-4 control-label">Potvrdiť Heslo</label>

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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
