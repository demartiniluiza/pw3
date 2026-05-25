@extends('keep/_base')
@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>
    <p><a href="{{ @route('keep.create') }}">Adiconar nota</a></p>
@endsection