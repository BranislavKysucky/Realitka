@extends('layouts.app')
@section('content')

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->


    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/inzerat_detail2.css') }}">
    <link rel='stylesheet' id='wpis-fontawesome-css-css'  href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=1' type='text/css' media='all' />
    <script type='text/javascript' src='{{ URL::asset('js/inzerat_detail.js') }}'></script>



    <!-- ################################################################################################ -->
    <body class="wordpress ltr sk sk-sk parent-theme y2018 m11 d01 h12 thursday logged-out wp-custom-logo singular singular-product singular-product-2614 product-template-default woocommerce woocommerce-page woocommerce-no-js elementor-default" dir="ltr" itemscope="itemscope" itemtype="http://schema.org/WebPage">

    <div class="hgrid main-content-grid">
        <main id="content" class="content  hgrid-span-9 no-sidebar layout-none " role="main" itemprop="mainContentOfPage">
            <div id="content-wrap">


                <div class="woocommerce-notices-wrapper"></div><div id="product-2614" class="entry author-augustinova has-excerpt post-2614 product type-product status-publish has-post-thumbnail product_cat-uncategorized product_cat-domy first outofstock taxable shipping-taxable purchasable product-type-simple">
                    <div class="images">

                        @foreach ($fotografie->all() as $fotky )
                            <section class="slider wpis-slider-for"><div class="zoom"><img src="{{$fotky->url}}" alt="" /><img src="{{$fotky->url}}" alt="" /></div>
                                @endforeach



                        {{--<section class="slider wpis-slider-for">--}}
                            {{--<div class="zoom"><img src="{{$fotografie->url}}" alt="" /><img src="{{$fotografie->url}}" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="{{$fotografie->url}}" alt="" /><img src="{{$fotografie->url}}" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="{{$fotografie->url}}" alt="" /><img src="{{$fotografie->url}}" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="{{$fotografie->url}}" alt="" /><img src="{{$fotografie->url}}" alt="" /></div>--}}


                            {{--<div class="zoom"><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2028.jpg" alt="" /><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2028.jpg" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2006.jpg" alt="" /><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2006-600x450.jpg" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013.jpg" alt="" /><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-600x450.jpg" alt="" /></div>--}}
                            {{--<div class="zoom"><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013.jpg" alt="" /><img src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-600x450.jpg" alt="" /></div>--}}
                        </section>
                        <section id="wpis-gallery" class="slider wpis-slider-nav">

                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="{{$fotografie->url}}" sizes="(max-width: 100px) 100vw, 100px" srcset="{{$fotografie->url}} 100w, {{$fotografie->url}} 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="{{$fotografie->url}}" sizes="(max-width: 100px) 100vw, 100px" srcset="{{$fotografie->url}} 100w, {{$fotografie->url}} 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="{{$fotografie->url}}" sizes="(max-width: 100px) 100vw, 100px" srcset="{{$fotografie->url}} 100w, {{$fotografie->url}} 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="{{$fotografie->url}}" sizes="(max-width: 100px) 100vw, 100px" srcset="{{$fotografie->url}} 100w, {{$fotografie->url}} 150w" alt="" width="100" height="100" /></li>--}}


                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2028-100x100.jpg" sizes="(max-width: 100px) 100vw, 100px" srcset="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2028-100x100.jpg 100w, https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2028-150x150.jpg 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2006-100x100.jpg" sizes="(max-width: 100px) 100vw, 100px" srcset="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2006-100x100.jpg 100w, https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2006-150x150.jpg 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-100x100.jpg" sizes="(max-width: 100px) 100vw, 100px" srcset="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-100x100.jpg 100w, https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-150x150.jpg 150w" alt="" width="100" height="100" /></li>--}}
                            {{--<li title=""><img class="attachment-shop_thumbnail size-shop_thumbnail" src="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-100x100.jpg" sizes="(max-width: 100px) 100vw, 100px" srcset="https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-100x100.jpg 100w, https://enertexreality.sk/wp-content/uploads/2018/09/DSCN2013-150x150.jpg 150w" alt="" width="100" height="100" /></li>--}}
                        </section>

                        <!-- ################################################################################################ -->
                        <!-- ################################################################################################ -->

                    </div>

                    <div class="summary entry-summary">
                        <h1 class=" loop-title" itemprop="headline">{{$inzerat->nazov}} </h1>
                        <p class="price"> <span  class="woocommerce-Price-amount amount">Cena: {{ $inzerat->cena }}&nbsp;<span class="woocommerce-Price-currencySymbol">&euro;</span></span></p>
                        <div class="woocommerce-product-details__short-description">
                            <p> Druh: {{$druh->nazov}}<br />
                                Typ:{{$typ->nazov}} <br />
                                Stav: {{$stav->nazov}} <br />
                                Kategória: <font color="red">{{$kategoria->nazov}}</font> </span> <br /> </p>
                        </div>


                        <div class="product_meta">
                           <p> Pridal:{{$pouzivatel->meno}}
                            <br>  <span class="posted_in">Tento inzerát bol zobrazený: <font color="green">{{$inzerat->pocet_zobrazeni}}-krát</font> </span> </p>
                        </div>
                    </div>


                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="tabs wc-tabs" role="tablist">
                            <li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                                <a href="#tab-description">Zobraziť podrobnosti</a>
                            </li>
                            <li class="description_tab" id="tab-title-description" role="tab" aria-controls="tab-description">
                                <a href="/inzeraty/{{$inzerat->id}}/edit">Spravovať inzerát</a>
                            </li>

                        </ul>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                            <h2>Popis</h2>

                            <p> {{$inzerat->popis}}</p>
                            <p><strong> Mesto: </strong>{{$inzerat->mesto}}<br />
                                <strong>Ulica: </strong> {{$inzerat->ulica}}<br />
                                <strong>Kraj: </strong> {{$kraj->nazov}}<br />
                                <strong>Výmera pozemku: </strong> {{$inzerat->vymera_pozemku}} km2<br />
                                <strong>Výmera domu: </strong> {{$inzerat->vymera_domu}} km2<br />
                                <strong>Užitková plocha: </strong> {{$inzerat->uzitkova_plocha}} km2<br />
                                <strong>Cena dohodou: </strong> {{$inzerat->cena_dohodou}}<br />
                                <strong>Telefón : </strong> {{$pouzivatel->telefon}}<br />
                                <strong>E-mail: </strong> {{$pouzivatel->email}}<br />

                            <div class="elementor elementor-773">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section data-id="atphyts" class="elementor-element elementor-element-atphyts elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">


                                                <!-- ################################################################################################ -->
                                                <!-- ################################################################################################ -->

                                                <script type='text/javascript'>
                                                    /* <![CDATA[ */
                                                    var object_name = {"wpis_arrow":"true","wpis_carrow":"true","wpis_zoom":"false","wpis_popup":"true","wpis_autoplay":"false"};
                                                    /* ]]> */
                                                </script>
                                                <script type='text/javascript' src='https://enertexreality.sk/wp-content/plugins/woo-product-images-slider/assets/js/wpis.front.js?ver=1.0'></script>


                                                <!-- ################################################################################################ -->
                                                <!-- ################################################################################################ -->

                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>

    </body>

    </body>

    <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
    <!-- JAVASCRIPTS -->

    <script src="../layout/scripts/jquery.backtotop.js"></script>


    </html>


@endsection