@extends('layouts.app')
@section('content')

    <div class="col-sm-3 col-md-3 col-lg-3 well well-lg" style="margin-left: 35%">
        <h1>Moje inzeráty</h1>
        <form action="" method="get">
            {{csrf_field()}}

                <input id="telefon" class="form-control" placeholder="Zadajte telefónne číslo" name="telefon" type="number" min="0"/>
                <br>
                <input type="submit" class="form-control"  value="Vyhľadať" name="submit">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

        </form>
    </div>

@endsection