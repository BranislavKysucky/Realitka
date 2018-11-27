@extends('spravovanie.index')
@section('supercontent')

    @foreach($inzeraty as $inzerat)

        {{ $inzerat->nazov}}


    @endforeach

@endsection