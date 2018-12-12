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




    <form id="form" class="form-horizontal" action="{{action('RealitkaMakleriController@updateMakler', $inzerat->id)}}" method="POST"
          enctype="multipart/form-data">
        {{csrf_field()}}







        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">



                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">



                                <div class="tab-pane active" id="pic-1"><img src="{{$inzerat->fotografie->first()->url}}" /></div>



                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                @foreach ($inzerat->fotografie as $fotka )
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="{{$fotka->url}}" /></a></li>
                                @endforeach



                            </ul>

                        </div>


                        <div class="details col-md-6">
                            <h3 class="product-title">{{$inzerat->nazov}}</h3>
                            <div class="rating">

                                <span class="review-no"><b>Počet zobrazení :</b> {{$inzerat->pocet_zobrazeni}}x</span>
                            </div>

                            <h4 class="price">Cena : <span>

                                @if ($inzerat->cena == null)
                                        Dohodou
                                    @else
                                        {{ $inzerat->cena}}
                                    @endif


                            </span></h4>



                            <h5>

                                Mesto/Obec : {{$inzerat->obec->obec.', '.$inzerat->obec->okres_id}}

                            </h5>


                            <h5>

                                Ulica : {{$inzerat->ulica}}


                            </h5>



                            <h5>

                                Druh : {{$inzerat->druh->podnazov}}

                            </h5>

                            <h5>

                                Typ : {{$inzerat->typ->nazov}}

                            </h5>

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
                                    <label id="makleri_label" for="makleri"><strong>Prideliť mne </strong></label>
                                    <select id="makleri" class="form-control" name="makleri">


                                        <option selected="selected" value={{$inzerat->pouzivatel->id}}>{{$inzerat->pouzivatel->email}}</option>
                                    </select>

                                @endif

                            </h5>














                        </div>





                    </div>


                    <h3>Popis:</h3>
                    <p class="product-description">{{$inzerat->popis}}</p>

                    @if ($inzerat->vymera_domu != null)
                        <h5 class="colors">
                            Výmera domu : {{$inzerat->vymera_domu}}
                        </h5>
                    @endif

                    @if ($inzerat->vymera_pozemku != null)
                        <h5 class="colors">
                            Výmera pozemku : {{$inzerat->vymera_pozemku}}
                        </h5>
                    @endif

                    @if ($inzerat->uzitkova_plocha != null)
                        <h5 class="colors">
                            Úžitková plocha : {{$inzerat->uzitkova_plocha}}
                        </h5>
                    @endif


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
