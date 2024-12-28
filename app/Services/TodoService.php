<?php

namespace App\Services;

use App\Interfaces\TodoInterface;

class TodoService
{
    public $todoInterface;
    /**
     * Create a new class instance.
     */
    public function __construct(TodoInterface $todoInterface)
    {
        $this->todoInterface = $todoInterface;
    }

    /**
     * Function: getTods
     * Description: This function fetch all the todos.
     */
    public function getTodos()
    {
        return $this->todoInterface->getTodos();
    }

    /**
     * Function: saveTodo
     * Description: This function save todo.
     */
    public function saveTodo($request)
    {
        # Organize Todo form data
        $todo = $this->mapTodoFormData($request);
        # Save Todo
        return $this->todoInterface->saveTodo($todo);
    }

    /**
     * Function: editTodo
     * Description: The function will delete data.
     */
    public function editTodo($id)
    {
        return $this->todoInterface->editTodo($id);
    }

    /**
     * Function: editTodo
     * Description: The function will delete data.
     */
    public function updateTodo($request, $id)
    {
        $todo = $this->mapTodoFormData($request);
        return $this->todoInterface->updateTodo($todo, $id);
    }

    /**
     * Function: destroyTodo
     * Description: The function will delete data.
     */
    public function destroyTodo($id)
    {
        return $this->todoInterface->destroyTodo($id);
    }


    /**
     * Function: saveTodo
     * Description: The function will map todo from data.
     */
    public function mapTodoFormData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description
        ];
    }
}
