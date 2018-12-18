@extends('layouts.app')
@section('content')
@include('popup.error')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div>
                            <h1>Overiť email</h1>
                            <p>Pred pridaním inzerátu je nutné overiť emailovú adresu, na ktorú bude zaslaný overovací kĺúč</p>
                            <form action="overit_email" method="post">
                                {{csrf_field()}}
                                <input id="email" class="form-control" placeholder="Zadajte email"
                                       name="email" type="email" required/>
                                <br>
                                <input type="submit" class="btn btn-danger form-control" value="Overiť a pokračovať v pridaní inzerátu" name="submit">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src='{{ URL::asset('js/zatvor_popup.js') }}'></script>
@endsection