@extends('spravovanie.index')
@section('supercontent')

    <div class="panel-heading"><h1>Inzeráty pridané zvoleným maklérom  : </h1></div>



    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Možnosti</th>
            <th scope="col">Názov</th>
            <th scope="col">Typ</th>
            <th scope="col">Mesto</th>
            <th scope="col">Cena</th>
            <th scope="col">Meno a priezvisko makléra</th>
            <th scope="col">Email makléra</th>
            <th scope="col">Mobilné číslo makléra</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inzeraty as $inzerat)



            <tr>
                <th scope="row">






                    <form action="{{action('RealitkaInzeratyController@show', $inzerat->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="SHOW">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-eye-open"></span></button>
                    </form>


                    <form action="{{action('RealitkaInzeratyController@edit', $inzerat->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="EDIT">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span></button>
                    </form>



                    <form action="{{action('RealitkaInzeratyController@destroy', $inzerat->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-info" onclick="return confirm('Prosím potvrdťe zmazanie');" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>



                </th>
                <td>{{ $inzerat->nazov}}</td>
                <td>{{ $inzerat->typ}}</td>
                <td>{{ $inzerat->obec.', '.$inzerat->okres}}</td>

                @if ($inzerat->cena == null)
                    <td>Dohodou</td>
                @else
                    <td>{{ $inzerat->cena}}</td>
                @endif

                <td>{{ $inzerat->meno." ".$inzerat->priezvisko}}</td>
                <td>{{ $inzerat->email}}</td>
                <td>{{ $inzerat->telefon}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>



@endsection







<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
