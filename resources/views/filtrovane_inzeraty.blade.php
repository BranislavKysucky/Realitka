@extends('layouts.app')

@section('content')
        @foreach($inzeraty as $inzerat)
            <h1>Názov: {{$inzerat->nazov}}</h1>
            <h3>Kategória: {{$inzerat->kategoria}}</h3>
            <h3>Druh: {{$inzerat->druh}}</h3>
            <h3>Typ: {{$inzerat->typ}}</h3>
            <h3>Stav: {{$inzerat->stav}}</h3>
            @endforeach
@endsection