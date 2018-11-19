@extends('layouts.app')
@section('content')

    <form action="{{route('inzeraty.odoslatMail')}}" method="post" enctype="multipart/form-data">

        <label for="emailReply">Vasa emailova adresa</label>
        <input type="email" required id="emailReply" class="form-control" placeholder="123@email.sk" name="emailReply">
        <label for="predmet">Predmet spravy</label>
        <input type="text" required id="predmet" class="form-control" placeholder="Predmet emailu" name="predmet">
        <label for="sprava">Sprava: </label>
        <input type="text" required id="sprava" class="form-control" placeholder="Vasa sprava" name="sprava"><br>


        <input type="submit" class="btn btn-danger form-control" value="Odoslat spravu" name="submit">

        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>

@endsection