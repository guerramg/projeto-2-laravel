<?php
//JAMAIS ESQUECER DE CHAMAR AS CLASSES AQUI
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePost;

class PostController extends Controller
{
    public function index(){ //ENVIAR PARA ROTA INDEX
        $posts = Post::get();
        return view('admin.posts.index',compact('posts'));
       
    }
    public function create(){ //DIRECIONANDO PARA ROTA DE CREATE
        return view('admin.posts.create');
    }
    public function store(StoreUpdatePost $request){ //ADICIONANDO NO BANCO DE DADOS
        Post::create($request -> all());
       // dd('cadastrando posts');
       return redirect()
       ->route('posts.index')
       ->with('menssage', 'Post Criado com sucesso.');

       //return redirect()->route('posts.index');
    }
    public function show($id){ //EXIBINDO OS DADOS E EDITANDO
        //$post = Post::where('id', $id) -> first();
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
        //dd($post);
    }
    public function destroy($id){ //DELETANDO OS DADOS
        if(!$post = Post::find($id))
            return redirect()->route('posts.index');
        $post->delete();
        return redirect()
            ->route('posts.index')
            ->with('menssage', 'Post deletado com sucesso.');

        }
        public function edit($id){ //EXIBINDO OS DADOS E EDITANDO
            //$post = Post::where('id', $id) -> first();
            if(!$post = Post::find($id)){
                return redirect()->back();
            }
            return view('admin.posts.edit', compact('post'));
            //dd($post);
        }
        public function update(StoreUpdatePost $request, $id){ //EXIBINDO OS DADOS E EDITANDO
            //$post = Post::where('id', $id) -> first();
            if(!$post = Post::find($id)){
                return redirect()->back();
            }
            //return view('admin.posts.edit', compact('post'));
            $post->update($request->all());
            return redirect()
            ->route('posts.index')
            ->with('menssage', 'Post editado com sucesso.');
        }
}
