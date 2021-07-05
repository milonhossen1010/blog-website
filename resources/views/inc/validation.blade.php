{{-- @if ($errors->any())
    <div class="alert alert-danger mt-3 mb-3">
        <ul class=" mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<script >
@if ($errors->any())
    @foreach ($errors->all() as $error)
        
            alertify.error("{{ $error }}");
   
    @endforeach
@endif

</script>