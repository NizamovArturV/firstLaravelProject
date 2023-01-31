<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_published', true)->orderBy('created_at', 'desc')->get();

        return view('articles.index')->with('articles', $articles);
    }

    public function detail(string $slug)
    {
        $article = Article::where('code', $slug)->first();

        if (!$article) {
            redirect('/');
        }

        return view('articles.detail')->with('article', $article);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required', 'max:100', 'min:5'],
            'code' => ['required', 'alpha_dash', 'unique:' . Article::class . ',code'],
            'preview_text' => ['required', 'max:255'],
            'detail_text' => ['required'],
        ], [
            'required' => 'Поле :attribute обязятельно для заполнения',
            'alpha_dash' => 'Поле :attribute должно содержать только латинские символы, цифры и символы тире и подчеркивания',
            'max' => 'Значение :attribute превышает размер максимально допустимого - :max',
            'min' => 'Значение :attribute имеет меньший размер, чем минимально допустимое - :min',
            'code.unique' => 'Статья с таким символьным кодом уже существует'
        ])->validate();



        $article = Article::create($request->all());

        return redirect('/articles/' . $article->code);
    }
}
