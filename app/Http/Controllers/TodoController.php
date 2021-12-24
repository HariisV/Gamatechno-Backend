<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    public function post(Request $request){
        $result = Todo::create($request->all());
        return response()->json([
            $result
         ], 201);
    }
    public function get($key){
        if ($key === "completed") {
            $list = Todo::where('status','completed')->get();
        }elseif ($key=="active") {
            $list = Todo::where('status','active')->get();
        }else{
            $list = Todo::get();
        }
        $left = Todo::where('status','active')->count();
      
        return response()->json(
            [$list,$left],
             201);
    }
    public function update(Request $request){
        $result = Todo::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        return response()->json($result, 201);
    }
    public function completedall(Request $request){
        $result = Todo::where('status', 'active')->update([
            'status' => 'completed'
        ]);
        return response()->json($result, 201);
    }
    public function clearCompleted(Request $request){
        $result = Todo::where('status', 'completed')->delete();
        return response()->json($result, 201);
    }
    
    
    public function delete($id){
        Todo::Where('id', $id)->delete();
        return response()->json('Succes Delete', 201);
    }
}
