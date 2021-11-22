@if (Session::has('failure'))
<div class="alert alert-danger">
    {{ Session::get('failure') }}
</div>
@endif
