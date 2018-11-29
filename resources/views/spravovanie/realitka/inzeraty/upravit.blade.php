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
        .buttonik {
            position: fixed; /* or position: absolute; */
            bottom: 0;
            right: 0;
            padding: 10px;




        }
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

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

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





    </style>

    <!-- CSS TU JE NA PRIAMO ZATIAL ABY SA LAHKO UPRAVOVALO POTOM HO PREMIESTNIM EXTERNE -->

    <div class="buttonik">

        <form action="{{action('RealitkaInzeratyController@destroy', $inzerat->id)}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button  class="btn btn-danger" type="submit">Odstranit  <span heigth="14px" class="glyphicon glyphicon-trash"></span> </button>
        </form>

        <form action="{{action('RealitkaInzeratyController@show', $inzerat->id)}}" method="get">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="SHOW">
            <button class="btn btn-danger" type="submit">Zobrazit <span class="glyphicon glyphicon-eye-open"></span></button>
        </form>

    </div>



    <form class="form-horizontal" action="{{action('RealitkaInzeratyController@update', $inzerat->id)}}" method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}





    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">



                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">



                            <div class="tab-pane active" id="pic-1"><img src="{{$fotografie->first()->url}}" /></div>



                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            @foreach ($fotografie->all() as $fotka )
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="{{$fotka->url}}" /></a></li>
                            @endforeach



                        </ul>

                    </div>







                    <div class="details col-md-6">

                        <h3 class="product-title"><label for="nazov"><strong>Nazov</strong></label><input required id="nazov" class="form-control" placeholder="Zadajte nazov" value="{{$inzerat->nazov}}" name="nazov"/></h3>





                        <h4 class="price">

                            <label for="cena"><strong>Cena</strong></label>
                            <input id="cena" class="form-control" placeholder="cena"  type="number"  name="cena" value="{{$inzerat->cena}}" />

                            <label for="cena_dohodou"><strong>Cena dohodou</strong></label>
                            <input id="cena_dohodou" class="form-control" placeholder="Zadajte cenu dohodou" type="number"  name="cena_dohodou" value="{{$inzerat->cena_dohodou}}"/>

                        </h4>


                        <h5>

                            Kraj : {{$kraj->nazov}}

                        </h5>
                        <h5>

                            Mesto : {{$inzerat->mesto}}

                        </h5>


                        <h5>

                            Ulica : {{$inzerat->ulica}}


                        </h5>

                        <h5>

                            Kategoria : {{$kategoria->nazov}}

                        </h5>

                        <h5>

                            Druh : {{$druh->nazov}}

                        </h5>

                        <h5>

                            Typ : {{$typ->nazov}}

                        </h5>

                        <h5 >

                            Makler : {{$pouzivatel->meno." ".$pouzivatel->priezvisko}}

                        </h5>














                    </div>





                </div>


                <h3>Popis:</h3>
                <p class="product-description">{{$inzerat->popis}}</p>

                @if ($inzerat->vymera_domu != null)
                    <h5 class="colors">
                        Vymera domu : {{$inzerat->vymera_domu}}
                    </h5>
                @endif

                @if ($inzerat->vymera_pozemku != null)
                    <h5 class="colors">
                        Vymera pozemku : {{$inzerat->vymera_pozemku}}
                    </h5>
                @endif

                @if ($inzerat->uzitkova_plocha != null)
                    <h5 class="colors">
                        Uzitkova plocha : {{$inzerat->uzitkova_plocha}}
                    </h5>
                @endif


            </div>
        </div>
    </div>


    </form>




@endsection
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
