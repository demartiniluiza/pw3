<!DOCTYPE html>
<html>
<head>

<title>Lista de Tarefas</title>

<style>

body{
font-family:Arial;
width:700px;
margin:auto;
}

.task{
border:1px solid #ccc;
padding:15px;
margin:15px;
border-radius:8px;
}

.completed{
background:#d4edda;
text-decoration:line-through;
color:gray;
}

img{
width:150px;
margin-top:10px;
display:block;
}

</style>

</head>

<body>

<h1>Lista de Tarefas</h1>

<a href="{{ route('tasks.create') }}">
Nova tarefa
</a>

@foreach($tasks as $task)

<div class="task {{ $task->completed ? 'completed':'' }}">

<h2>{{ $task->title }}</h2>

@if($task->image)

<img src="{{ asset('storage/'.$task->image) }}">

<form action="{{ route('tasks.removeImage',$task) }}" method="POST">
@csrf
@method('DELETE')

<button>Remover imagem</button>

</form>

@endif

<form action="{{ route('tasks.toggle',$task) }}" method="POST">

@csrf
@method('PATCH')

<button>

{{ $task->completed ? 'Desmarcar':'Concluir' }}

</button>

</form>

<a href="{{ route('tasks.edit',$task) }}">
Editar
</a>

<form action="{{ route('tasks.destroy',$task) }}" method="POST">

@csrf
@method('DELETE')

<button>Excluir</button>

</form>

</div>

@endforeach

</body>
</html>