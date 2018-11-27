@extends('spravovanie.index')
@section('supercontent')





    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Možnosti</th>
            <th scope="col">Nazov</th>
            <th scope="col">Mesto</th>
            <th scope="col">Cena</th>
            <th scope="col">Meno a priezvisko maklera</th>
            <th scope="col">Email maklera</th>
            <th scope="col">Telefon maklera</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inzeraty as $inzerat)



            <tr>
                <th scope="row">

                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>

                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>

                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>


                </th>
                <td>{{ $inzerat->nazov}}</td>
                <td>{{ $inzerat->mesto}}</td>

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