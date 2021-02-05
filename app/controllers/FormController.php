<?php

use App\Core\App;
use App\Core\Request;

class FormController
{
    public function store()
    {
        $name = Request::get('name');

        App::get('database')->insert('tasks', [
            'name' => $name,
            'completed' => 0,
        ]);

        return redirect('/tasks');
    }
}
