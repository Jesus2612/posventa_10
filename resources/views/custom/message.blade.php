@if (session('status_success'))
    <div class="alert alert-success" role="alert">
        {{ session('status_success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script>
    setTimeout(function(){ $('.alert').slideDown(); }, 1000);
    setTimeout(function(){ $('.alert').slideUp(); }, 5000);
</script>