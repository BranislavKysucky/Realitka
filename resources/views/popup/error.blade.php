@if (session()->has('error'))
    <div class="alert alert-dismissable alert-danger">
        <strong>
            {!! session()->get('error') !!}
        </strong>
    </div>
@endif