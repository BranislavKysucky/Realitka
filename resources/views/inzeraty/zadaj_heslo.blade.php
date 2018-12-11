@extends('layouts.app')
@section('content')
    <div class="col-sm-3 col-md-3 col-lg-3 well well-lg" style="margin-left: 35%">
        <h1>Zadajte heslo</h1>
        <form action="/inzeraty/{{$inzerat->id}}/edit" method="get">
            {{csrf_field()}}
            <input id="heslo" class="form-control" placeholder="Zadajte heslo" name="heslo" type="password" required/>
            <br>
            <input type="submit" class="form-control" value="Potvrdiť" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">

        </form>
    </div>
@endsection