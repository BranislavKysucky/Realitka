@extends('spravovanie.index')
@section('supercontent')



<center><h3> Pred zmazaním : {{$inzeraty->first()->meno." ".$inzeraty->first()->priezvisko." - ".$inzeraty->first()->email}}</h3></center>
<center><h2> je potrebné určiť čo sa má vykonať s jeho inzerátmi.</h2></center>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Editovanie</th>
            <th scope="col">Názov</th>
            <th scope="col">Typ</th>
            <th scope="col">Mesto</th>
            <th scope="col">Cena</th>

        </tr>
        </thead>
        <tbody>
        @foreach($inzeraty as $inzerat)



            <tr>
                <th scope="row">









                    <form action="{{action('RealitkaMakleriController@editMakler', $inzerat->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="EDIT">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span></button>
                    </form>

                    <form action="{{action('RealitkaMakleriController@removeMakler', $inzerat->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-info" onclick="return confirm('Prosím potvrdťe zmazanie');" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
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


            </tr>

        @endforeach

        </tbody>
    </table>



@endsection







<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
