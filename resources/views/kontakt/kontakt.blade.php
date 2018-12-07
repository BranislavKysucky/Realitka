@extends('layouts.app')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif

<div class="panel">
    <h3 align="center">Kontaktná osoba</h3>

<div align="center">
            <img style="width: 200px; height: 200px" src="http://oldengineering.co.uk/wp-content/uploads/2015/11/generic-headshot.png"><br>
                <p>{{$kontakt->meno}} {{$kontakt->priezvisko}}</p>

</div>

</div>





<div style="background-color: #f5f5f5"  class="panel">
    <h3 style="margin-top: 10px;margin-left: 10px">Kontaktna adresa</h3>
    <ul>
        <li><i class="fas fa-mobile"></i> +{{$kontakt->telefon}}</li>
        <li><i class="fas fa-print"></i> {{$kontakt->email}}</li>
        <li>{{$kontakt->nazovSpolocnosti}}</li>
        <li>{{$kontakt->ulica}}</li>
        <li>{{$kontakt->psc}} {{$kontakt->mesto}}</li><br>
        <li><b>ICO:</b> {{$kontakt->ico}}</li>
        <li><b>IC DPH:</b> {{$kontakt->ic_dph}}</li>
        <li><b>DIC:</b> {{$kontakt->dic}}</li>
    </ul>
</div>




<div align="center" style="background-color: #f5f5f5" class="panel">
<h3 style="margin-top: 10px;margin-left: 10px">Kontaktujte nas !</h3>

    <form style="margin-left: 10px;margin-right: 10px" action="customerEmailPost" method="post" enctype="multipart/form-data">

        <label for="emailReply">Vasa emailova adresa pre kontaktovanie:</label>
        <input type="email" required id="emailReply" class="form-control" placeholder="123abc@email.sk" name="emailReply">
        <label for="meno">Meno odosielatela:</label>
        <input type="text" required id="meno" class="form-control" placeholder="Vase meno" name="meno">
        <label for="sprava">Sprava: </label>
        <textarea class="form-control" required id="sprava" name="sprava" rows="8" cols="100" placeholder="Vasa sprava..."></textarea>


        <input style="margin-bottom: 10px;margin-top: 10px" type="submit" class="btn btn-outline-success form-control" value="Odoslat spravu" name="submit">

        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>

</div>


@endsection