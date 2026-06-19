@extends('keep/_base')

@section('conteudo')
    <p>Bem-vindo ao Little Keep!</p>
    <p><a href="{{ @route('keep.create') }}">Adiconar nota</a></p>
    <hr>
    @if (session('mensagem'))
    <div>{{  session('mensagem') }}</div>
    @endif

    @foreach ($notas as $nota )
        <div style="border:1px solid; background-color: {{ $nota['cor'] }}; padding:2px">{{ $nota['nota'] }}</div>
        <br>
        <a href="">📑</a>
        <a href="">🗑️</a>
    
    @endforeach
@endsection