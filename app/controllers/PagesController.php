<?php

use App\Core\App;

class PagesController
{
    public function home()
    {
        return view('index.view');
    }
    
    public function tasks()
    {
        $tasks = App::get('database')->selectAll('tasks');

        return view('task.view', compact('tasks'));
    }
    
    public function contact()
    {
        $title = 'Contact Us';
        return view('contact-us.view', compact('title'));
    }
}
