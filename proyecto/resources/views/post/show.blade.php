<x-layout.app title="post">
	<h1>{{$Post->title}}</h1>
	<p>{{$Post->body}}</p>
	<a href="{{route('post.index')}}">Regresar</a>
</x-layout.app>