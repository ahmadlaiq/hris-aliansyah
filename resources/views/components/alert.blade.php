@if (session()->has('success'))
    <div class="alert alert-success px-2">
        <i class="fas fa-check-circle mr-2"></i>{{ Session('success') }}
    </div>
@endif

@if (session()->has('danger'))
    <div class="alert alert-danger px-2">
        <i class="fas fa-exclamation-circle mr-2"></i>{{ Session('danger') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger px-2">
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@push('js')
    <script>
        $('.alert').delay(4500).fadeOut('slow');
    </script>
@endpush
