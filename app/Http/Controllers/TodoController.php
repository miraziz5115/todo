<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Todo::where('status','0')->orderBy('date','asc')->get();
        if($data){
            return response()->json($data);
        }else{
            return response()->json(null,204);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = Todo::create( $request->all());
        
        return response()->json($data,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Todo::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Todo::find($id);
        if( isset( $input['status'] )){
            $data->status = $input['status'];
            if($data->save()){
                return response()->json(200);
            }
        }else{
            $data->text = $request->all()['text'];
            $data->date = $request->all()['date'];
            if($data->save()){
                return response()->json($data,200);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Todo::find($id);
        if($data->delete()){
            return response()->json(null, 204);
        }
    }

    public function todoDoneList()
    {
        $data = Todo::where('status','1')->orderBy('date','desc')->get();
        return response()->json($data);
    }
}
