<h1><strong>Editar o post</strong> {{$post->title}}</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
    @endforeach
</ul>
    
@endif
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('put')
    <input type="text" name="title" value="{{$post->title}}">
    <textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
    <button type="submit">Enviar</button><br>
    <a href="{{ route('posts.index') }}">Voltar</a>

</form>