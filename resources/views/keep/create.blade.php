@extends('keep/_base')

@section('conteudo')
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form method="post" action="{{ route('keep.create') }}">
    @csrf
    <textarea name="nota">{{ old('nota') }}</textarea>
    <br>
    <input type="color" name="cor" value="{{ old('cor') }}">
    <br>
    <input type="submit" value="Gravar">
</form>

@endsection