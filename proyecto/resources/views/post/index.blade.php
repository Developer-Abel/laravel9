<x-layout.app title="Blog">
    
    {{-- @if(session('status'))
        <p>{{session('status')}}</p>
    @endif --}}
    
    <h3>Blog</h3>
    <a href="{{route('post.create')}}">Crear post</a>
    @foreach($post as $p)
        <h4>
            <a href="{{route('post.show',$p->id)}}">{{$p->title}}</a>
        </h4>
    @endforeach
</x-layout.app>