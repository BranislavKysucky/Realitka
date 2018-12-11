@extends('layouts.app')
@section('content')

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->


    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail2.css') }}">
    <link rel='stylesheet' id='wpis-fontawesome-css-css'
          href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1' type='text/css'
          media='all'/>
    <script type='text/javascript' src='{{ URL::asset('js/inzerat_detail.js') }}'></script>



    <!-- ################################################################################################ -->
    <body class="wordpress ltr sk sk-sk parent-theme y2018 m11 d01 h12 thursday logged-out wp-custom-logo
    singular singular-product singular-product-2614 product-template-default woocommerce woocommerce-page woocommerce-no-js elementor-default"
          dir="ltr" itemscope="itemscope" itemtype="http://schema.org/WebPage">

    <div class="hgrid main-content-grid">
        <main id="content" class="content  hgrid-span-9 no-sidebar layout-none " role="main"
              itemprop="mainContentOfPage">
            <div id="content-wrap">

                <div class="summary entry-summary">
                    <h1 class="heading" style="color:#585858"><i class="fas fa-home"></i> {{$inzerat->typ->nazov}}
                        , {{$inzerat->druh->podnazov}}, {{$obec->obec}}, okres {{$obec->okres_id}} </h1>
                    {{--@if ($inzerat->cena_dohodou == 0)   <p class="price"><span
                                class="woocommerce-Price-amount amount">Cena: {{ $inzerat->cena }}&nbsp;<span
                                    class="woocommerce-Price-currencySymbol">&euro;</span></span></p>
                    @else      <p class="price"><label for="cena_dohodou"> <strong>Cenu je možné dohodnúť
                                dohodou </strong> </label> @endif </p>
                    <div class="woocommerce-product-details__short-description">
                        <p> Stav: {{$stav->nazov}}<br/>
                            Druh:{{$druh->nazov}} <br/>
                            Typ: {{$typ->nazov}} <br/>
                            Kategória: <font color="red">{{$kategoria->nazov}}</font> </span> <br/></p>--}}
                </div>
                <hr>
                <label for="cena">Cena:</label>
                @if ($inzerat->cena == null)
                    <strong id="cena">Dohodou</strong> <br/>
                @else
                    <strong id="cena">{{$inzerat->cena}} €</strong> <br/>
                @endif

                @if ($inzerat->ulica != null)
                    <label for=ulica style="color:#585858">Ulica:</label>
                    <strong id="ulica">{{$inzerat->ulica}}</strong> <br/>
                @endif
                @if ($inzerat->vymera_pozemku != null)
                    <label for=pozemok style="color:#585858">Výmera pozemku:</label>
                    <strong id="pozemok">{{$inzerat->vymera_pozemku}} m²</strong> <br/>
                @endif
                @if ($inzerat->vymera_domu != null)
                    <label for=dom style="color:#585858">Výmera domu:</label>
                    <strong>{{$inzerat->vymera_domu}} m²</strong> <br/>
                @endif
                @if ($inzerat->uzitkova_plocha != null)
                    <label for=dom style="color:#585858">Užitková plocha:</label>
                    <strong>{{$inzerat->uzitkova_plocha}} m² </strong> <br/>
                @endif
                @if($pouzivatel)
                    @if ($pouzivatel->telefon != null)
                        <label for=telefon style="color:#585858">Telefón :</label>
                        <strong id="telefon"> {{$pouzivatel->telefon}}</strong> <br/>
                    @endif
                    @if ($pouzivatel->email != null)
                        <label for=email style="color:#585858">E-mail: </label>
                        <strong id="email">{{$pouzivatel->email}}</strong> <br/>
                    @endif
                @endif

                <hr>
                {{--<div class="product_meta">
                    --}}{{--<p> Pridal:{{$pouzivatel->meno}}--}}{{--
                    <br> <span class="posted_in">Tento inzerát bol zobrazený: <font color="green">{{$inzerat->pocet_zobrazeni}}
                            -krát</font> </span> </p>
                </div>--}}
            </div>

            <div class="woocommerce-notices-wrapper"></div>
            <div id="product-2614"
                 class="entry author-augustinova has-excerpt post-2614 product type-product status-publish has-post-thumbnail
                     product_cat-uncategorized product_cat-domy first outofstock taxable shipping-taxable purchasable product-type-simple">

                <div class="row">
                    <section class="slider wpis-slider-for">
                        @foreach ($fotografie as $fotka )
                            <div class="zoom">
                                <img src="{{$fotka->url}}" style="border-radius: 1%" alt=""/>
                                <img src="{{$fotka->url}}" style="border-radius: 1%" alt=""/>
                            </div>

                        @endforeach
                    </section>

                    <section id="wpis-gallery" class="slider wpis-slider-nav">

                    </section>

                </div>
                </br>

                <div class="woocommerce-tabs wc-tabs-wrapper">
                    <ul class="tabs wc-tabs" role="tablist">

                        @if(Auth::check())
                            @if(Auth::user()->id==$inzerat->pouzivatel_id)
                                <li class="description_tab" id="tab-title-description" role="tab"
                                    aria-controls="tab-description">
                                    <a href="/inzeraty/{{$inzerat->id}}/edit">Spravovať inzerát</a>
                                </li>
                            @endif
                        @else
                            <li class="description_tab" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="/inzeraty/{{$inzerat->id}}/edit">Spravovať inzerát</a>
                            </li>
                        @endif


                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                         id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="background: #F8F8F8">

                        {{--<h2>Popis</h2>--}}

                        <p style="color:#585858"> {{$inzerat->popis}}</p>


                        <!-- ################################################################################################ -->
                        <!-- ################################################################################################ -->

                        <script type='text/javascript'>
                            /* <![CDATA[ */
                            var object_name = {
                                "wpis_arrow": "true",
                                "wpis_carrow": "false",
                                "wpis_zoom": "false",
                                "wpis_popup": "false",
                                "wpis_autoplay": "false"
                            };
                            /* ]]> */
                        </script>
                        <script type='text/javascript'
                                src='https://enertexreality.sk/wp-content/plugins/woo-product-images-slider/assets/js/wpis.front.js?ver=1.0'></script>


                        <!-- ################################################################################################ -->
                        <!-- ################################################################################################ -->


                    </div>
                </div>
            </div>
        </main>
    </div>
    </body>
    {{-- </div>--}}


    {{-- <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>--}}
    <!-- JAVASCRIPTS -->

    {{-- <script src="../layout/scripts/jquery.backtotop.js"></script>--}}





@endsection