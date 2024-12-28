<?php

namespace App\Http\Controllers;

use App\Interfaces\TodoInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public $todoInterface;
    public function __construct(TodoInterface $todoInterface)
    {
        $this->todoInterface = $todoInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todos = $this->todoInterface->getTodos();
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $todo = $this->todoInterface->saveTodo($request);
        if($todo){
            return back()->with('success', 'Todo has been created.');
        }else{
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
