@extends('layouts.app')
@section('content')
            <div id="kraje" class="container-fluid">
                <ul class="clickMenu" style="padding: 0 0 0 0">
                @foreach($kraje as $kraj)
                        <div class="panel panel-default" style="padding: 10px">
                            <li id="{{$kraj->kraj_id}}">
                            <span><b>{{$kraj->kraj}}</b></span>
                                <ul id="okresy{{$kraj->kraj_id}}" style="display: none">
                                    @for($j = 0; $j<$kraj->pocet; $j++)
                                        <li class="sub">
                                            <a href="realitne_kancelarie?okres={{$okresy[$kraj->kraj_id][$j]}}"><span>{{$okresy[$kraj->kraj_id][$j]}}</span></a>
                                        </li>
                                    @endfor
                                </ul>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>

            <nav class="alphabet" style="font-size: 15px">
                <a href="realitne_kancelarie?pismeno=a">A</a>
                <a href="realitne_kancelarie?pismeno=b">B</a>
                <a href="realitne_kancelarie?pismeno=c">C</a>
                <a href="realitne_kancelarie?pismeno=d">D</a>
                <a href="realitne_kancelarie?pismeno=e">E</a>
                <a href="realitne_kancelarie?pismeno=f">F</a>
                <a href="realitne_kancelarie?pismeno=g">G</a>
                <a href="realitne_kancelarie?pismeno=h">H</a>
                <a href="realitne_kancelarie?pismeno=i">I</a>
                <a href="realitne_kancelarie?pismeno=j">J</a>
                <a href="realitne_kancelarie?pismeno=k">K</a>
                <a href="realitne_kancelarie?pismeno=l">L</a>
                <a href="realitne_kancelarie?pismeno=m">M</a>
                <a href="realitne_kancelarie?pismeno=n">N</a>
                <a href="realitne_kancelarie?pismeno=o">O</a>
                <a href="realitne_kancelarie?pismeno=p">P</a>
                <a href="realitne_kancelarie?pismeno=q">Q</a>
                <a href="realitne_kancelarie?pismeno=r">R</a>
                <a href="realitne_kancelarie?pismeno=s">S</a>
                <a href="realitne_kancelarie?pismeno=t">T</a>
                <a href="realitne_kancelarie?pismeno=u">U</a>
                <a href="realitne_kancelarie?pismeno=v">V</a>
                <a href="realitne_kancelarie?pismeno=w">W</a>
                <a href="realitne_kancelarie?pismeno=x">X</a>
                <a href="realitne_kancelarie?pismeno=y">Y</a>
                <a href="realitne_kancelarie?pismeno=z">Z</a>
            </nav>
            <br>
            {{--@foreach($realitky as $realitka)--}}
                {{--<a style="color: black" href="/inzeraty/{{$realitka->id}}">--}}
                    {{--<div class="col-md-9 col-lg-9 col-sm-9 pull-right">--}}

                        {{--<div class="col-md-4 col-lg-4 col-sm-4 image-container">--}}
                            {{--<img src="{{$realitka->obrazok}}" style="height:90%;width: 90%;margin-left:-15px;"/>--}}
                        {{--</div>--}}
                        {{--<div class="excerpt">--}}
                            {{--<h6 class="heading">{{$realitka->nazov}}</h6>--}}
                            {{--<ul class="nospace meta">--}}
                                {{--<li><i class="fas fa-home"></i> {{$realitka->kraj->nazov}}, {{$realitka->mesto}}, {{$realitka->kategoria->nazov}} {{$realitka->druh->nazov}} </li>--}}
                                {{--<li><i class="fas fa-building"></i> {{$realitka->stav->nazov}}, {{$realitka->vymera_domu}}m² </li>--}}
                                {{--<li><i class="fas fa-hand-paper"></i> {{$realitka->typ->nazov}} </li>--}}
                                {{--<li><i class="fas fa-euro-sign"></i> <span style="color: limegreen">{{$realitka->cena}}</span></li>--}}
                            {{--</ul>--}}
                            {{--<p>--}}
{{--                                {{$realitka->popis}}--}}
                            {{--</p>--}}
{{--                            <p class="pull-right" >Pocet zobrazeni: {{$inzerat->pocet_zobrazeni}}x</p>--}}


                        {{--</div>--}}
                        {{--<hr/>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--@endforeach--}}

            @foreach($realitky as $realitka)
                {{--<a style="color: black" href="/realitkay/{{$realitka->id}}">--}}
                    <div class="col-md-9 col-lg-9 col-sm-9 pull-right">

                        <div class="col-md-4 col-lg-4 col-sm-4 image-container">
                            <img src="{{'/images/demo/no_image.jpg'}}"
                                 style="height:90%;width: 90%;margin-left:-15px;min-height: 150px;border-radius: 4%"/>
                        </div>
                        <div class="excerpt">
                            <h4 class="heading" style="font-family: Calibri">{{$realitka->nazov}}</h4>
                            <ul class="nospace meta">


                                {{--@if($realitka->crawler!=true)--}}
                                    {{--@if ($realitka->stav != null)--}}
                                        <li><i class="fas fa-home"></i> {{$realitka->obecc}}, okres {{$realitka->okress}}, {{$realitka->ulica_cislo}}
                                        </li>
                                    {{--@else--}}
                                        <li><i class="fas fa-address-book"></i> {{$realitka->kontaktna_osoba}}</li>
                                    {{--@endif--}}
                                {{--@endif--}}


                                <li><i class="fas fa-mobile-alt"></i> {{$realitka->telefon}} </li>

                                {{--@if ($realitka->cena == null)--}}
                                    {{--<li><i class="fas fa-euro-sign"></i> <span style="color: limegreen">Dohodou</span>--}}
                                    {{--</li>--}}
                                {{--@else--}}
                                    <li><i class="	fas fa-at"></i> <span>{{$realitka->email}}</span></li>
                                {{--@endif--}}

                            </ul>
                            {{--<p style="color:#585858">--}}
                                {{--{{substr($realitka->popis,0,300)}}...--}}
                            {{--</p>--}}
                            {{--<p class="pull-right">Pocet zobrazeni: {{$realitka->pocet_zobrazeni}}x</p>--}}


                            {{--<hr/>--}}
                        </div>
                        <hr/>
                    </div>
                {{--<hr/>--}}
                {{--</a>--}}
            @endforeach
            <div>{{ $realitky->links() }}</div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src='{{ URL::asset('js/krajeClickHandler.js') }}'></script>

@endsection