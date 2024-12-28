<?php

namespace App\Repositories;

use App\Interfaces\TodoInterface;
use App\Models\Todo;

class TodoRepository implements TodoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Function: getTodos
     * Description: The function will fetch all the todos from the Todo Model.
     */

    public function getTodos()
    {
        return Todo::all();
    }

    /**
     * Function: saveTodo
     * Description: The function will save todo.
     */

    public function saveTodo($todoRequest)
    {
        return Todo::create($todoRequest);
    }

    /**
     * Function: editTodo
     * Description: The function will edit todo.
     */
    public function editTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            return $todo;
        }

        return false;
    }

    public function updateTodo($todoRequest, $id){
        $todo = Todo::find($id);

        if ($todo) {
            $todo->update($todoRequest);
            return $todo;
        }

        return false;
    }

    /**
     * Function: destroyTodo
     * Description: The function will delete todo.
     */
    public function destroyTodo($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            return $todo->delete();
        }

        return false;
    }
}
