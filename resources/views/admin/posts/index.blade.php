post
<a href="{{route('posts.create')}}">criar novo post</a>
<hr>
@if (session('menssage'))
    <div>
        {{session('menssage')}}
    </div>
@endif
@foreach ($posts as $post)
    <p>{{$post->title}}
        [<a href="{{ route('posts.show',[$post->id]) }}">Ver</a> | 
        <a href="{{route('posts.edit', $post->id)}}">Edit</a>
        ]
    </p>
@endforeach