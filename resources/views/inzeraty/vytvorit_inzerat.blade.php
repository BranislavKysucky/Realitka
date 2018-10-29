@extends('layouts.app')

@section('content')

    <!-- na tejto stranke bude pridavanie inzeratu, zatial som len ciastocne predpripravil form pre input obrazkov,
    v buducniosti tu bude musiet byt aj nejaky ten javascript, ktory zobrazi nacitane obrazky este pred odoslanim,
    taktiez je vytvorena zlozka public/images kde sa budu ukladat obrazky-->
    <div class="well well-lg">
        <form action="{{route('inzeraty.store')}}" method="post" enctype="multipart/form-data">

            <label>Select image to upload:</label>
            <input type="file" name="image" id="image">
            <input type="submit" value="Uložiť" name="submit">

            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
    </div>

@endsection