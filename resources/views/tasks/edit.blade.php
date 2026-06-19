<h1>Editar tarefa</h1>

<form action="{{ route('tasks.update',$task) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<input
type="text"
name="title"
value="{{ $task->title }}">

<br><br>

<input
type="file"
name="image">

<br><br>

<button>Salvar</button>

</form>

<br>

<a href="{{ route('tasks.index') }}">
Voltar
</a>