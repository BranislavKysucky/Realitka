@extends('spravovanie.index2')
@section('supercontent2')


    <div class="content">
        <form  method="post" action="{{route('realitky_a.update',[$kontakt->id])}}" >
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Názov spoločnosti</label>
                        <input type="text" class="form-control" value="{{$kontakt->nazovSpolocnosti}}" name="nazovSpolocnosti">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Telefón</label>
                        <input type="number" class="form-control" value="{{$kontakt->telefon}}" name="telefon">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" value="{{$kontakt->email}}" name="email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meno</label>
                        <input type="text" class="form-control" value="{{$kontakt->meno}}" name="meno">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Priezvisko</label>
                        <input type="text" class="form-control" value="{{$kontakt->priezvisko}}" name="priezvisko">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Ulica</label>
                        <input type="text" class="form-control" value="{{$kontakt->ulica}}" name="ulica">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mesto</label>
                        <input id="lokalita" list="mesta" type="text" class="form-control" value="{{$kontakt->mesto}}" name="mesto">
                        <datalist id="mesta">
                            @foreach($obce as $obec)
                                <option href="#" id="{{$obec->obec}}">{{$obec->obec}}, okres {{$obec->okres_id}}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>PSČ</label>
                        <input type="number" class="form-control" value="{{$kontakt->psc}}" name="psc">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>IČO</label>
                        <input type="number" class="form-control" value="{{$kontakt->ico}}" name="ico">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>IČ DPH</label>
                        <input type="number" class="form-control"  value="{{$kontakt->ic_dph}}" name="ic_dph">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>DIČ</label>
                        <input type="number" class="form-control" value="{{$kontakt->dic}}" name="dic">
                    </div>
                </div>
            </div>



            <button type="submit" class="btn btn-info btn-fill pull-right">Aktualizovať</button>
            <div class="clearfix"></div>
        </form>
    </div>


    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#lokalita").on('input', function (e) {

                var option = $('#mesta option').filter(function() {
                    return this.value === $("#lokalita").val();
                }).val();

                if(option !== undefined){
                    this.value = option.substr(0, option.indexOf(','));
                }
            });
        });
    </script>
@endsection