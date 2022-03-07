@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Info:</strong>
        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Info:</strong>
        <h4><i class="icon fa fa-check"></i>{{ session('error') }}</h4>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
