@if (session()->has('success'))
    <div class="alert alert-dismissable alert-success ">
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif