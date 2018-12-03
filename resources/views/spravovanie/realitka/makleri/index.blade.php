@extends('spravovanie.index')
@section('supercontent')





    <table class="table table-bordered">
        <thead>
        <tr>

            <th scope="col">Možnosti</th>
            <th scope="col">Meno a priezvisko maklera</th>
            <th scope="col">Email maklera</th>
            <th scope="col">Telefon maklera</th>
            <th scope="col">Bydlisko</th>
            <th scope="col">Adresa</th>


        </tr>
        </thead>
        <tbody>
        @foreach($makleri as $makler)



            <tr>
                <th scope="row">






                    <form action="{{action('RealitkaMakleriController@show', $makler->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="SHOW">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-eye-open"></span></button>
                    </form>


                    <form action="{{action('RealitkaMakleriController@edit', $makler->id)}}" method="get">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="EDIT">
                        <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-edit"></span></button>
                    </form>



                    <form action="{{action('RealitkaMakleriController@destroy', $makler->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-info" onclick="return confirm('Prosím potvrdťe zmazanie');" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>



                </th>



                <td>{{ $makler->meno." ".$makler->priezvisko}}</td>
                <td>{{ $makler->email}}</td>
                <td>{{ $makler->telefon}}</td>
                <td>{{ $makler->obec}}</td>
                <td>{{ $makler->adresa}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>



@endsection







<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
