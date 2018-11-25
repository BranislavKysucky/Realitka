@extends('layouts.app')
@section('content')


<div class="col-md-9 col-lg-9 col-sm-9">
<div  class="summary entry-summary">
    <h3>Team</h3>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Bill_Gates_June_2015.jpg/230px-Bill_Gates_June_2015.jpg"><br>
    <p>Ing. Bill Gates</p>
</div>

    <ul>

        <li><i class="fas fa-mobile"></i> +421 222 333 555</li>
        <li><i class="fas fa-print"></i> KSU@KSU.sk</li>
    </ul>

<div style="border: #2a2a2a solid 1px">
    <h3 style="margin-top: 10px;margin-left: 10px">Kontaktna adresa</h3>
    <ul>
        <li>KSU s.r.o</li>
        <li>Nitrianska 1/100</li>
        <li>94901 Nitra</li><br>
        <li><b>ICO:</b> 48484</li>
        <li><b>IC DPH:</b> SK1585</li>
        <li><b>DIC:</b> 848484</li>
    </ul>

</div>



</div>




<div class="col-md-9 col-lg-9 col-sm-9" style="border: black solid 1px;margin-top: 30px">
<h3 style="margin-top: 10px">Kontaktujte nas !</h3>
    <!-- zatial to dame bez akcie, neskor bude fungovat normalne odosielanie mailov-->
    <form action="{{route('inzeraty.odoslatMail')}}" method="post" enctype="multipart/form-data">

        <label for="emailReply">Vasa emailova adresa</label>
        <input type="email" required id="emailReply" class="form-control" placeholder="123@email.sk" name="emailReply">
        <label for="predmet">Predmet spravy</label>
        <input type="text" required id="predmet" class="form-control" placeholder="Predmet emailu" name="predmet">
        <label for="predmet">Meno odosielatela</label>
        <input type="text" required id="meno" class="form-control" placeholder="Vase meno" name="meno">
        <label for="sprava">Sprava: </label>
        <input type="text" required id="sprava" class="form-control" placeholder="Vasa sprava" name="sprava"><br>


        <input style="margin-bottom: 10px" type="submit" class="btn btn-success form-control" value="Odoslat spravu" name="submit">

        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>

</div>

@endsection