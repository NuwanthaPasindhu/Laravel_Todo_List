<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new todo();
    }

    public function index()
    {
       $response['tasks'] =  $this->task->all();

       return view('pages.todo.index')->with($response);
    }


    public function add(Request $request)
    {
        $this->task->create($request->all());

            return redirect()->back();
    }





    public function complete($id)
    {
        $data =  $this->task->find($id);
        $data ->complete = 1;
        $data->update();

        return redirect()->back();

    }
    public function notcomplete($id)
    {
        $data =  $this->task->find($id);
        $data ->complete = 0;
        $data->update();

        return redirect()->back();

    }
    public function delete($id)
    {
       $data =  $this->task->find($id);
       $data->delete();
       return redirect()->back();
    }
}
