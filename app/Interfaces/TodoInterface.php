<?php

namespace App\Interfaces;

interface TodoInterface
{
    # Fetch All Todos
    public function getTodos();

    # Save Todo
    public function saveTodo($request);


}
