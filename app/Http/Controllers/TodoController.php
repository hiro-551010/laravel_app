<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    //
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();
        // エスケープ処理
        // https://biz.addisteria.com/laravel_escape/
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $inputs = $request->all();

        // https://yama-weblog.com/using-fill-method-to-be-a-simple-code/
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);

        // dd($this->todo->id, $todo->id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        // https://qiita.com/Masahiro111/items/907aab0dc4ecd6015521
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function delete($id) {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
