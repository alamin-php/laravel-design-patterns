<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public $todoService;
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = $this->todoService->getTodos();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoFormRequest $request)
    {
        $todo = $this->todoService->saveTodo($request);
        if ($todo) {
            return back()->with('success', 'Todo has been created.');
        } else {
            return back()->with('error', 'Unable to create Todo!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = $this->todoService->editTodo($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoFormRequest $request, string $id)
    {
        $todo = $this->todoService->updateTodo($request, $id);
        if ($todo) {
            return to_route('todos.index')->with('success', 'Todo has been updated.');
        } else {
            return to_route('todos.index')->with('error', 'Unable to update Todo!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = $this->todoService->destroyTodo($id);
        if ($todo) {
            return back()->with('success', 'Todo has been deleted.');
        } else {
            return back()->with('error', 'Unable to delete Todo!');
        }
    }
}
