<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trace;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {

        if($request->ajax()){

            // $trace = new Trace();
            // $trace->type = 5;
            // $trace->refe = auth()->id();
            // $trace->save();

            return User::All();

        }else{
            return view('home');
        }

    }       

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $trace = new Trace();
        
        if( $id == auth()->id()){
            $trace->type = 3;
            $trace->refe = auth()->id();
        }else {
            $trace->type = 4;
            $trace->refe = $id;
        }
        
        $trace->user_id = auth()->id();
        $trace->save();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        $trace = new Trace();
        
        if( $id == auth()->id()){
            $trace->type = 8;
            $trace->refe = auth()->id();
        }else {
            $trace->type = 9;
            $trace->refe = $id;
        }
        
        $trace->user_id = auth()->id();
        $trace->save();
    }
}
