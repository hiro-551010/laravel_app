@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        {{-- {{ var_dump($errors) }} --}}
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif