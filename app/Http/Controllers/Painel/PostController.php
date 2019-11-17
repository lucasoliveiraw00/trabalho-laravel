<?php

namespace App\Http\Controllers\Painel;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Psy\debug;

class PostController extends StandardController
{
    protected $model;
    protected $view = 'painel.modulos.posts';
    protected $upload = ['image' => 'image', 'path' => 'post'];
    protected $route = 'posts';

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Category::all('id', 'name');
        // $data = ' ';
        return view("{$this->view}.create-edit", compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Category::all('id', 'name');

        $data = $this->model->find($id);

        return view("{$this->view}.create-edit", compact('data', 'items'));
    }


    public function search(Request $request)
    {
        $dataForm = $request->get('pesquisa');
        $datas = $this->model
            ->where('title', 'LIKE', "%{$dataForm}%")
            ->orWhere('description', 'LIKE', "%{$dataForm}%")
            ->paginate($this->totalpages);

        return view("painel.modulos.posts.index", compact('datas', 'dataForm'));
    }
}
