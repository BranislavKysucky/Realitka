@extends('spravovanie.index2')
@section('supercontent2')


    <div class="content" style="margin: auto; width: 50%;">
        <form id="target" method="post" action="/overitHeslo" >
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" value="" name="stareHeslo" placeholder="Zadajte vaše heslo" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="password2" type="password" class="form-control" value="" name="stareHeslo2" placeholder="Zadajte vaše heslo" oninput="check(this)" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="password" class="form-control" value="" name="noveHeslo" placeholder="Zadajte nové heslo" required>
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
                $( "#target" ).submit(function( event ) {
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