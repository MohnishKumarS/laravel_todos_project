<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todoList = Todo::latest()->paginate(5);
        return view('index',compact('todoList'));
    }

    public function create(){
        return view('create');
    }   

    public function store(Request $req){
        // return $req->all();
        $this->validate($req,[
            'title' => 'required|string|max:255|min:3',
            'description' => 'required',
        ]);

        $todo = Todo::create($req->all());
       
        return redirect()->route('index')->with('status','Great!')->with('text','Todo list created successfully...')->with('type','success');
    }

    public function edit (Todo $id){
        $todoData =  $id;
       return view('edit',compact('todoData'));
    }


    public function update(Request $req,$id){

        $todo = Todo::findOrFail($id);

        $req->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required',
        ]);

        $todo->title = $req->title;
        $todo->description = $req->description;
        $todo->completed = $req->completed == 1 ? true : false;
        $todo->update();


        return redirect()->route('index')->with('status','Whooa!')->with('text','Todo list updated successfully...')->with('type','success');;
    }


    public function delete(Request $req){
        $todo = Todo::findOrFail($req->todoId);

        // return $todo;
        $todo->delete();

        // return redirect()->route('index')->with('status','Finished!')->with('text','Todo list deleted successfully...')->with('type','success');
        return response()->json(['status'=>'Finished!','text'=>'Todo list deleted successfully...','type'=>'success']);
    }
}
