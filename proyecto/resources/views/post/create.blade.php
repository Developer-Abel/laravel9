<x-layout.app title="Crear nuevo post">
	<h1>Crear nuevo post</h1>

	<form method="POST" action="{{route('post.store')}}">
		@csrf
		<label>
			Title <br>
			<input type="text" name="title"> <br>
		</label>
		<label>
			Body <br>
			<textarea name="body"></textarea> <br>
		</label>
		<button type="submit">Enviar</button>
	</form>
	<br>
	<a href="{{route('post.index')}}">Regresar</a>
</x-layout.app>