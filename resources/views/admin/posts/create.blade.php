<h1>Cadastrar Novo Post</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
    @endforeach
</ul>
    
@endif
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" value="{{old('title')}}">
    <textarea name="content" id="" cols="30" rows="10">{{old('content')}}</textarea>
    <button type="submit">Enviar</button>
</form>