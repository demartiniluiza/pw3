<h1>Nova tarefa</h1>

<form action="{{ route('tasks.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<input
type="text"
name="title"
placeholder="Título">

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