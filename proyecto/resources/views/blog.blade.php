<x-layout.app title="Blog">
    <h3>Blog</h3>
    @foreach($post as $p)
        <h4>{{$p['title']}}</h4>
    @endforeach
</x-layout.app>