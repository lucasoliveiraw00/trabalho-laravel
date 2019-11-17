<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Post;

class HomeController extends Controller
{

    protected $model;
    protected $modelPost;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Post $post)
    {
        $this->middleware('auth');
        $this->model = $user;
        $this->modelPost = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $users = $this->model->count();
        $posts = $this->modelPost->count();
        return view('painel.modulos.home', compact('users', 'posts'));
    }
}
