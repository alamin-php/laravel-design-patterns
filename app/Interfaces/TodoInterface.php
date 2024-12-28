<?php

namespace App\Interfaces;

interface TodoInterface
{
    # Fetch All Todos
    public function getTodos();

    # Save Todo
    public function saveTodo($request);

    # Edit Todo by ID
    public function editTodo($id);

    # Update Todo by ID
    public function updateTodo($request, $id);

    # Destroy Todo by ID
    public function destroyTodo($id);


}
