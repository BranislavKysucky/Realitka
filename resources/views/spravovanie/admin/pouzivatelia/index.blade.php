@extends('spravovanie.index2')
@section('supercontent2')

    <div class="header">
        <h4 class="title">Zoznam používateľov</h4>
    </div>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
            <th>Email</th>
            <th>Vyvorený</th>
            </thead>
            <tbody>
            @foreach($pouzivatelia as $pouzivatel)
            <tr>
                <td>{{$pouzivatel->email}}</td>
                <td>{{$pouzivatel->created_at}}</td>
                <td>
                    <a href="">
                        <i class="pe-7s-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="">
                        <i class="pe-7s-delete-user"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection