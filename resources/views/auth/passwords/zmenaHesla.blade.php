@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Zmena hesla</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/ulozit_Heslo">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="stareHeslo" class="col-md-4 control-label">Staré heslo</label>

                                <div class="col-md-6">
                                    <input id=stareHeslo type="password" class="form-control" value="" name="stareHeslo"
                                           placeholder="Zadajte staré heslo" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Nové heslo</label>

                                <div class="col-md-6">

                                    <input id="password" type="password" class="form-control" value="" name="noveHeslo"
                                           placeholder="Zadajte nové heslo" required>
                                    @if ($errors->has('noveHeslo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('noveHeslo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password2" class="col-md-4 control-label">Zopakujte heslo</label>
                                <div class="col-md-6">
                                    <input id="password2" type="password" class="form-control" value=""
                                           name="noveHeslo2"
                                           placeholder="Zopakujte nové heslo" oninput="check(this)" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Uložiť
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#target").submit(function (event) {
                if (document.getElementById('password2').value !== document.getElementById('password').value) {
                    alert('Heslá sa nezhodujú');
                    return false;
                } else {
                    return true;
                }
                event.preventDefault();
            });
        });
    </script>
@endsection