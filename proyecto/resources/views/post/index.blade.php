<x-layout.app title="Blog">    
    <br><br>
    <h3>Blog</h3>
    @auth
        <a href="{{route('post.create')}}">Crear post</a>
    @endauth
    @foreach($post as $p)
        <h4>
            <a href="{{route('post.show',$p->id)}}">{{$p->title}}</a>  <a style="margin-left: 5px;" href="{{route('post.edit',$p->id)}}">Editar</a>
        </h4>
        
    @endforeach
</x-layout.app>