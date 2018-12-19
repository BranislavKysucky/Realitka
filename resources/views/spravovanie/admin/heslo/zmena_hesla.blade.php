@extends('spravovanie.index2')
@section('supercontent2')


    <div class="content" style="margin: auto; width: 50%;">
        <form id="target" method="post" action="/overitHeslo">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="stareHeslo">Staré heslo</label>
                        <input id=stareHeslo type="password" class="form-control" value="" name="stareHeslo"
                               placeholder="Zadajte staré heslo" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Nové heslo</label>
                        <input id="password" type="password" class="form-control" value="" name="noveHeslo"
                               placeholder="Zadajte nové heslo" required>
                        @if ($errors->has('noveHeslo'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('noveHeslo') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password2">Zopakujte nové heslo</label>
                        <input id="password2" type="password" class="form-control" value="" name="noveHeslo2"
                               placeholder="Zopakujte heslo" oninput="check(this)" required>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary mb-2">Odoslať</button>
            <div class="clearfix"></div>
        </form>
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