<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Все методы требуют аутентификации
    }

    public function index()
    {
        // Здесь можно получить статьи из базы данных
        $articles = [
            ['id' => 1, 'title' => 'First Article', 'content' => 'Content of the first article.'],
            ['id' => 2, 'title' => 'Second Article', 'content' => 'Content of the second article.'],
        ];
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        // Только пользователи с правом 'create articles' могут получить доступ
        $this->authorize('create articles'); // Используем метод authorize
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create articles');
        // Логика сохранения статьи
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function edit($id)
    {
        $this->authorize('edit articles');
        // Логика получения статьи для редактирования
        $article = ['id' => $id, 'title' => 'Sample Article', 'content' => 'Sample content to edit.'];
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit articles');
        // Логика обновления статьи
        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy($id)
    {
        $this->authorize('delete articles');
        // Логика удаления статьи
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
