<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $itemsCategorias = Category::all('id', 'name');

        return view('site.templates.master', compact('itemsCategorias'));
    }

    public function index(Request $request)
    {
        $pg = $request->query('pg');
        $pesquisar = $request->query('pesquisar');

        $itemsCategorias = Category::all('id', 'name');

        $postDestaque = [];
        if (empty($pg) && empty($pesquisar)) {
            $itemsPost = Post::where('featured', 0)
                ->get();

            /** @var \App\Models\Post $postDestaque */
            $postDestaque = Post::where('featured', 1)
                ->limit(3)
                ->get();
        } else if (!empty($pg)) {
            $itemsPost = Post::where('category_id', $pg)
                ->get();
        } else {
            $itemsPost = Post::where('title', 'like', '%' . $pesquisar . '%')
                ->get();
        }

        return view('site.index', compact('itemsCategorias', 'itemsPost', 'postDestaque'));
    }

    public function contato()
    {
        $itemsCategorias = Category::all('id', 'name');

        return view('site.pages.contato', compact('itemsCategorias'));
    }

    public function empresa()
    {
        $itemsCategorias = Category::all('id', 'name');

        return view('site.pages.empresa', compact('itemsCategorias'));
    }
}
