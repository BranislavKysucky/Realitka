@extends('spravovanie.index')
@section('supercontent')

    <!-- CSS TU JE NA PRIAMO ZATIAL ABY SA LAHKO UPRAOVVALO POTOM HO PREMIESTNIM EXTERNE -->

    <style>


        /*****************globals*************/
        body {
            font-family: 'open sans';
            overflow-x: hidden; }

        img {
            max-width: 100%; }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column; }
        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px; } }

        .preview-pic {
            width: 70%;
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px; }
        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%; }
        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block; }
        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0; }
        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0; }

        .tab-content {
            overflow: hidden; }
        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s; }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex; } }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column; }



        .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold; }


        .product-title, .rating, .product-description, .price, .vote, .sizes {
            margin-bottom: 15px; }

        .product-title {
            margin-top: 0; }


        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1); } }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3); }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1); } }

        /*# sourceMappingURL=style.css.map */

        textarea {
            resize: none;
        }

        .remove:hover {
            cursor: pointer;
        }

        .inputFile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        label[for=fileInput] {
            border: 2px solid black;
            background-color: transparent;
            color: black;
            /*padding: 7px 14px;*/
            text-align: center;
            font-size: 10px;
            cursor: pointer;
            border-color: #4CAF50;
            color: green;
        }

        label[for=fileInput]:hover {
            background-color: #4CAF50;
            color: white;
        }

    </style>

    <!-- CSS TU JE NA PRIAMO ZATIAL ABY SA LAHKO UPRAVOVALO POTOM HO PREMIESTNIM EXTERNE -->




    <form id="form" class="form-horizontal" action="{{action('RealitkaInzeratyController@update', $inzerat->id)}}" method="POST"
          enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}





        <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">



                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">



{{--                            <div class="tab-pane active" id="pic-1"><img src="{{$inzerat->fotografie->first()->url}}" /></div>--}}

                            <div id="wrapper">
                                <input type="file" id="fileInput" class="inputFile" name="images[]"
                                       accept=".jpg, .jpeg, .png"
                                       multiple><br>
                                <label for="fileInput">Vložiť obrázok</label>

                                <div id="containerImages">
                                    <div class="element" id="div_1"></div>
                                </div>


                            </div>



                        </div>
                        <ul class="preview-thumbnail nav nav-tabs" id="zoznamObrazkov" style="display: none">
                            @foreach ($inzerat->fotografie->all() as $fotka )
                                <li id="{{$fotka->id}}"><a data-target="#pic-2" data-toggle="tab"><img src="{{$fotka->url}}" /></a></li>
                            @endforeach



                        </ul>

                    </div>







                    <div class="details col-md-6">

                        <h3 class="product-title"><label for="nazov"><strong>Názov</strong></label><input required id="nazov" class="form-control" placeholder="Zadajte nazov" value="{{$inzerat->nazov}}" name="nazov"/></h3>






                        <div id="cena" >
                            <label for="cena"><strong>Cena (€) </strong></label>

                            <input onchange="hideCena_dohodou();" required id="cena" class="form-control" placeholder="cena" value="{{$inzerat->cena}}" name="cena"/>


                        </div>


                        <br>

                        @if ($inzerat->cena_dohodou == 1)
                            <div id="cena_dohodou" >

                                <label for="cena_dohodou"><strong>Cena dohodou</strong> </label>
                                <label class="radio-inline"><input value=true onchange="hideCena();" name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio"
                                                                   name="optradio" checked>Ano</label>
                                <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                   name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio" name="optradio"
                                    >Nie</label>
                                <br>
                            </div>
                        @else
                            <div id="cena_dohodou" >

                                <label for="cena_dohodou"><strong>Cena dohodou </strong> </label>
                                <label class="radio-inline"><input value=true onchange="hideCena();" name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio"
                                                                   name="optradio" >Ano</label>
                                <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                   name="cena_dohodou"
                                                                   id="cena_dohodou" type="radio" name="optradio" checked
                                    >Nie</label>
                                <br>
                            </div>






                        @endif




                        <h5>

                            <label for="lokalita"><strong>Obec/Mesto</strong></label>
                            <input list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita" value="{{$inzerat->obec->obec.", okres ".$inzerat->obec->okres_id}}" autocomplete="off"/>

                            <datalist id="obce">
                                @foreach($obce as $obec)
                                    <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>

                                @endforeach
                            </datalist>



                        </h5>


                        <h5>

                            <label for="ulica"><strong>Ulica :</strong></label>
                            <input required id="ulica" class="form-control" value="{{$inzerat->ulica}}" placeholder="Zadajte ulicu" name="ulica"/>




                        </h5>



                        <h5>




                            <label for="druh"><strong>Druh : </strong></label>
                            <select class="form-control" id="druh" name="druh" >
                                @foreach($druhy_nazov as $druh_nazov)
                                    <optgroup  label={{$druh_nazov->nazov}} id={{$druh_nazov->nazov}}>


                                        @foreach($druhy as $druh1)



                                            @if(($druh_nazov->nazov == $druh1->nazov) && (substr($druh1->podnazov,0, 7) != "Všetky" ))

                                                @if ($inzerat->druh->podnazov == $druh1->podnazov)
                                                    <option selected="selected" value={{$inzerat->druh->id}}>{{$inzerat->druh->podnazov}}</option>
                                                @else
                                                    <option value={{$druh1->id}}>{{$druh1->podnazov}}</option>
                                                @endif



                                            @endif


                                        @endforeach

                                    </optgroup>

                                @endforeach
                            </select>

                        </h5>

                        <h5>

                            <label id="typ_label" for="typ"><strong>Typ : </strong></label>
                            <select id="typ" class="form-control" name="typ">
                                @foreach($typy as $typ1)

                                    @if ($typ1->nazov == $inzerat->typ->nazov)
                                        <option selected="selected" id={{$inzerat->typ->nazov}} value={{$inzerat->typ->id}}>{{$inzerat->typ->nazov}}</option>
                                    @else
                                        <option id={{$typ1->nazov}} value={{$typ1->id}}>{{$typ1->nazov}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </h5>


                        @if ($inzerat->stav!=null)
                            <h5>        <label id="stavy_label" for="stavy"><strong>Stav :</strong></label>
                                <select id="stavy" class="form-control" name="stavy">

                                    @foreach($stavy as $stav1)
                                        @if(substr($stav1->nazov,0, 7) != "Všetky" )

                                            @if ($stav1->nazov == $inzerat->stav->nazov)
                                                <option selected="selected" value={{$inzerat->stav->id}}>{{$inzerat->stav->nazov}}</option>
                                            @else
                                                <option value={{$stav1->id}}>{{$stav1->nazov}}</option>
                                            @endif


                                        @endif
                                    @endforeach

                                </select>


                        </h5>


                        @else

                            <h5>        <label id="stavy_label" for="stavy"><strong>Stav :</strong></label>

                                <select id="stavy" class="form-control" name="stavy">

                                    @foreach($stavy as $stav1)
                                        @if(substr($stav1->nazov,0, 7) != "Všetky" )

                                                <option value={{$stav1->id}}>{{$stav1->nazov}}</option>
                                        @endif
                                    @endforeach

                                </select>

                            </h5>

                            <script> $("#stavy").val(null);
                                $("#stavy").hide();
                                $("#stavy_label").hide();</script>

                        @endif




                        <h5 >

                            

                        @if (count($makleri) != 0)
                                <label id="makleri_label" for="makleri"><strong>Makléri : </strong></label>
                                <select id="makleri" class="form-control" name="makleri">

                                    @foreach($makleri as $makler)


                                        @if ($makler->email == $inzerat->pouzivatel->email)
                                            <option selected="selected" value={{$inzerat->pouzivatel->id}}>{{$inzerat->pouzivatel->email}}</option>
                                        @else
                                            <option value={{$makler->id}}>{{$makler->email}}</option>
                                        @endif

                                    @endforeach


                                </select>

                        @else
                                <label id="makleri_label" for="makleri"><strong>Vytvoril : </strong></label>
                                <select id="makleri" class="form-control" name="makleri">


                                <option selected="selected" value={{$inzerat->pouzivatel->id}}>{{$inzerat->pouzivatel->email}}</option>
                                </select>

                        @endif



                        </h5>














                    </div>





                </div>






                <label for="popis"><strong>Popis </strong></label>
                <textarea required id="popis" class="form-control" placeholder="Zadajte popis" name="popis"
                          rows="4" cols="50">{{$inzerat->popis}}</textarea>


                @if ($inzerat->vymera_domu!=null)
                    <div id="vymera_domu">
                        <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                        <input required id="vymera domu" placeholder="vymera domu" class="form-control" value="{{$inzerat->vymera_domu}}"  min="0" name="vymera_domu"/>

                    </div>
                @else

                    <div id="vymera_domu">
                        <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                        <input required id="vymera domu" placeholder="vymera domu" class="form-control" value="{{$inzerat->vymera_domu}}"  min="0" name="vymera_domu"/>

                    </div>


                    <script> $("#vymera_domu").hide().find(':input').attr('required', false);</script>
                @endif
                


                @if ($inzerat->vymera_pozemku!=null)
                    <div id="vymera_pozemku">
                        <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                        <input required placeholder="vymera pozemku" class="form-control" value="{{$inzerat->vymera_pozemku}}"  min="0" name="vymera_pozemku"/>

                    </div>

                @else

                    <div id="vymera_pozemku">
                        <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                        <input required placeholder="vymera pozemku" class="form-control" value="{{$inzerat->vymera_pozemku}}"  min="0" name="vymera_pozemku"/>

                    </div>
                    <script> $("#vymera_pozemku").hide().find(':input').attr('required', false);</script>

                @endif






                @if ($inzerat->uzitkova_plocha!=null)
                    <div id="uzitkova_plocha">
                        <label for="uzitkova_plocha">Úžitková plocha(m<sup>2</sup>)</label>
                        <input required placeholder="uzitkova plocha" class="form-control"  value="{{$inzerat->uzitkova_plocha}}"  min="0" name="uzitkova_plocha"/>

                    </div>

                @else
                    <div id="uzitkova_plocha">
                        <label for="uzitkova_plocha">Úžitková plocha(m<sup>2</sup>)</label>
                        <input required placeholder="uzitkova plocha" class="form-control"  value="{{$inzerat->uzitkova_plocha}}"  min="0" name="uzitkova_plocha"/>

                    </div>

                    <script> $("#uzitkova_plocha").hide().find(':input').attr('required', false);</script>

                @endif



            </div>

            <br><br>

            <div>






            </div>
        </div>


    </div>
        <button href=""  class="btn btn-info form-control" type="submit">Aktualizovať  <span heigth="14px"  name="submit" class="glyphicon glyphicon-edit"></span> </button>
        @include('errors')
    </form>

    {{--<form action="{{action('RealitkaInzeratyController@destroy', $inzerat->id)}}" method="post">--}}
        {{--{{csrf_field()}}--}}
        {{--<input name="_method" type="hidden" value="DELETE">--}}
        {{--<button  onclick="return confirm('Prosím potvrdťe zmazanie');" class="btn btn-info form-control" type="submit">Odstrániť  <span heigth="14px" class="glyphicon glyphicon-trash"></span> </button>--}}
    {{--</form>--}}

    {{--<form action="{{action('RealitkaInzeratyController@show', $inzerat->id)}}" method="get">--}}
        {{--{{csrf_field()}}--}}
        {{--<input name="_method" type="hidden" value="SHOW">--}}
        {{--<button class="btn btn-info form-control" type="submit">Náhľad <span class="glyphicon glyphicon-eye-open"></span></button>--}}
    {{--</form>--}}



@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='{{ URL::asset('js/polozky_formularu_realitka.js') }}'></script>
<script src='{{ URL::asset('js/cena.js') }}'></script>
<script src='{{ URL::asset('js/preview2.js') }}'></script>
