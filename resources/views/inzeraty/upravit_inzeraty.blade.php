@extends('layouts.app')

@section('content')

    @include('popup.pridany')
    @include('popup.error')







    <form id="form" class="form-horizontal" action="{{action('InzeratyController@update', $inzerat->id)}}" method="POST"
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






                            <div id="cena" name="cena">
                                <h3>  <label for="cena"><strong>Cena (€) </strong></label> </h3>
                                <input placeholder="cena" class="form-control" type="number" step="any" min="0" id="cena"
                                       value="{{$inzerat->cena}}"
                                       onchange="hideCena_dohodou();" name="cena" onKeyPress="if(this.value.length==10) return false;"/>

                            </div>


                            <br>

                            @if ($inzerat->cena_dohodou == 1)
                                <div id="cena_dohodou" >

                                    <h3>   <label for="cena_dohodou"><strong>Cena dohodou</strong> </label> </h3>
                                    <label class="radio-inline"><input value=true onchange="hideCena();" name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio"
                                                                       name="optradio" checked>Áno</label>
                                    <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio" name="optradio"
                                        >Nie</label>
                                    <br>
                                </div>
                            @else
                                <div id="cena_dohodou" >

                                    <h3>  <label for="cena_dohodou"><strong>Cena dohodou </strong> </label> </h3>
                                    <label class="radio-inline"><input value=true onchange="hideCena();" name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio"
                                                                       name="optradio" >Áno</label>
                                    <label class="radio-inline"><input value=false onchange="hideCena();"
                                                                       name="cena_dohodou"
                                                                       id="cena_dohodou" type="radio" name="optradio" checked
                                        >Nie</label>
                                    <br>
                                </div>






                            @endif


<br>

                            <h3>

                                <label for="lokalita"><strong>Obec/Mesto</strong></label>
                                <input required list="obce" id="lokalita" class="form-control" placeholder="Zadajte lokalitu" name="lokalita" value="{{$inzerat->obec->obec.", okres ".$inzerat->obec->okres_id}}" autocomplete="off"/>

                                <datalist id="obce">
                                    @foreach($obce as $obec)
                                        <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>

                                    @endforeach
                                </datalist>



                            </h3>


                            <h3>

                                <label for="ulica"><strong>Ulica :</strong></label>
                                <input required id="ulica" class="form-control" value="{{$inzerat->ulica}}" placeholder="Zadajte ulicu" name="ulica"/>




                            </h3>





                                @auth

                                <h3>

                                    <label for="telefon_pouzivatel" ><strong>Telefón</strong></label>


                                        <input id="telefon_pouzivatel" type="text" class="form-control"
                                               name="telefon_pouzivatel" min="0"
                                               value="{{ $mobil }}" required >

                                        @if ($errors->has('telefon_pouzivatel'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('telefon_pouzivatel') }}</strong>
                                    </span>
                                        @endif

                                </h3>

                                @endauth
                            <h3>

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

                            </h3>

                            <h3>

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

                            </h3>


                            @if ($inzerat->stav!=null)
                                <h3>        <label id="stavy_label" for="stavy"><strong>Stav :</strong></label>
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


                                </h3>


                            @else

                                <h3>        <label id="stavy_label" for="stavy"><strong>Stav :</strong></label>

                                    <select id="stavy" class="form-control" name="stavy">

                                        @foreach($stavy as $stav1)
                                            @if(substr($stav1->nazov,0, 7) != "Všetky" )

                                                <option value={{$stav1->id}}>{{$stav1->nazov}}</option>
                                            @endif
                                        @endforeach

                                    </select>

                                </h3>

                                <script> $("#stavy").val(null);
                                    $("#stavy").hide();
                                    $("#stavy_label").hide();</script>

                            @endif


<h3>
                            <label for="popis"><strong>Popis </strong></label>
                            <textarea required id="popis" class="form-control" placeholder="Zadajte popis" name="popis"
                                      rows="4" cols="50">{{$inzerat->popis}}</textarea>

</h3>



                            @if ($inzerat->vymera_domu!=null)
                                <div id="vymera_domu">
                                    <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                                    <input required placeholder="vymera domu" class="form-control" value="{{$inzerat->vymera_domu}}" type="number" min="0"
                                           name="vymera_domu"/>

                                </div>
                            @else

                                <div id="vymera_domu">
                                    <label for="vymera_domu">Výmera domu(m<sup>2</sup>)</label>
                                    <input required placeholder="vymera domu" class="form-control" value="{{$inzerat->vymera_domu}}" type="number" min="0"
                                           name="vymera_domu"/>

                                </div>


                                <script> $("#vymera_domu").hide().find(':input').attr('required', false);</script>
                            @endif



                            @if ($inzerat->vymera_pozemku!=null)
                                <div id="vymera_pozemku">
                                    <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                                    <input required placeholder="vymera pozemku" class="form-control" value="{{$inzerat->vymera_pozemku}}" type="number" min="0"
                                           name="vymera_pozemku"/>

                                </div>

                            @else

                                <div id="vymera_pozemku">
                                    <label for="vymera_pozemku">Výmera pozemku(m<sup>2</sup>)</label>
                                    <input required placeholder="vymera pozemku" class="form-control" value="{{$inzerat->vymera_pozemku}}" type="number" min="0"
                                           name="vymera_pozemku"/>

                                </div>
                                <script> $("#vymera_pozemku").hide().find(':input').attr('required', false);</script>

                            @endif






                            @if ($inzerat->uzitkova_plocha!=null)
                                <div id="uzitkova_plocha">
                                    <label for="uzitkova_plocha">Úžitková plocha(m<sup>2</sup>)</label>
                                    <input required placeholder="uzitkova plocha" class="form-control"  value="{{$inzerat->uzitkova_plocha}}" type="number" min="0"
                                           name="uzitkova_plocha"/>

                                </div>

                            @else
                                <div id="uzitkova_plocha">
                                    <label for="uzitkova_plocha">Úžitková plocha(m<sup>2</sup>)</label>
                                    <input required placeholder="uzitkova plocha" class="form-control"  value="{{$inzerat->uzitkova_plocha}}" type="number" min="0"
                                           name="uzitkova_plocha"/>

                                </div>

                                <script> $("#uzitkova_plocha").hide().find(':input').attr('required', false);</script>

                            @endif

<br>













                        </div>





                    </div>









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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='{{ URL::asset('js/polozky_formularu_realitka.js') }}'></script>
<script src='{{ URL::asset('js/cena.js') }}'></script>
<script src='{{ URL::asset('js/preview2.js') }}'></script>