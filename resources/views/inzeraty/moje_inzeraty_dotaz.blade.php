@extends('layouts.app')
@section('content')

    <div class="col-sm-3 col-md-3 col-lg-3 well well-lg" style="margin-left: 35%">
        <h1>Moje inzeráty</h1>
        <form action="{{route('inzeraty.index')}}" method="get">
            {{csrf_field()}}
                <input id="email" class="form-control" placeholder="Zadajte email" name="email" type="email" required/>
                <br>
                <input type="submit" class="form-control"  value="Vyhľadať" name="submit">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">

        </form>
    </div>

@endsection