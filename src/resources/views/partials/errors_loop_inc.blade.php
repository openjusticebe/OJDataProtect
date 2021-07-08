@if(isset($errors))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            @foreach ($errors->all() as $error)
            <div class="alert alert-warning" role="alert">{{ $error }}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
