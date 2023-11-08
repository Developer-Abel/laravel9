<x-layout.app title="Crear nuevo post">
	<h1>Crear nuevo post</h1>

	<form method="POST" action="{{route('post.store')}}">
		@csrf
		<label>
			Title <br>
			<input type="text" name="title" value="{{old('title')}}"> 
			@error('title')
				<br>
				<small style="color: orangered;">{{$message}}</small>
			@enderror
			<br>
		</label>
		<label>
			Body <br>
			<textarea name="body">{{old('body')}}</textarea> <br>
			@error('body')
				<small style="color: orangered;">{{$message}}</small>
				<br>
			@enderror

		</label>
		<button type="submit">Enviar</button>
	</form>
	<br>
	<a href="{{route('post.index')}}">Regresar</a>
</x-layout.app>







