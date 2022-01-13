<?php
namespace App\Controllers;

class TodoController
{
    public function list()
    {
        $data = [
            'tasks' => ['first task', 'socend task','three task'],
            'title' => 'List Task'
        ];
        view('todo.list', $data);
    }
}