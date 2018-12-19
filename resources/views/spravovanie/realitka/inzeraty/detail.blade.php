@extends('spravovanie.index')
@section('supercontent')

    <!-- CSS TU JE NA PRIAMO ZATIAL ABY SA LAHKO UPRAOVVALO POTOM HO PREMIESTNIM EXTERNE -->

    <link href="{{ asset('css/realitka.css') }}" rel="stylesheet">
    <!-- CSS TU JE NA PRIAMO ZATIAL ABY SA LAHKO UPRAVOVALO POTOM HO PREMIESTNIM EXTERNE -->










    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">




                    <div class="preview col-md-6">
                        @if ($inzerat->fotografie->count() > 0)
                        <div class="preview-pic tab-content">



                                <div class="tab-pane active" id="pic-1"><img src="{{$inzerat->fotografie->first()->url}}" /></div>



                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            @foreach ($inzerat->fotografie as $fotka )
                                <li><a data-target="#pic-2" data-toggle="tab"><img src="{{$fotka->url}}" /></a></li>
                            @endforeach



                        </ul>
                        @endif
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

                            Maklér : {{$inzerat->pouzivatel->meno." ".$inzerat->pouzivatel->priezvisko}}

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






        <form action="{{action('RealitkaInzeratyController@edit', $inzerat->id)}}" method="get">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="EDIT">
            <button class="btn btn-info form-control" type="submit">Upraviť  <span class="glyphicon glyphicon-edit"></span></button>
        </form>
    <form action="{{action('RealitkaInzeratyController@destroy', $inzerat->id)}}" method="post">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
        <button  onclick="return confirm('Prosím potvrdťe zmazanie');" class="btn btn-info form-control" type="submit">Odstrániť  <span heigth="14px" class="glyphicon glyphicon-trash"></span> </button>
    </form>




@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
