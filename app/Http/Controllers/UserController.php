<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    /**
     * Check if the user exist in the database.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUser($userId){
        
        try{
            $user = User::where('user_id','=',$userId)->first();
            
            if ($user) { 
                return $user;
            }
            else{
                return response()->json(["404"=>"Resource not found, Aquest usuari no existeix."]);
            }
        }catch(Throwable $e) {
            //report($e);
            return response()->json(["400"=>"Bad request, data no té format especificat."]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::all();
        return response()->json(['users', compact('users')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User();

            $user->user_id = rand(0,20);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->admin = false;
            $user->projects_published = 0;
            $user->save();
            
            return response()->json(['user', compact('user')]);
        } catch (Throwable $e) {
           // report($e);           
           return response()->json(["400"=>"Bad request, data no té format especificat."]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId){
        $user = $this->checkUser($userId);
        return response()->json(['user', compact('user')]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId){
        $user = $this->checkUser($userId);

        return response()->json(['user', compact('user')]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId){
        try {
            $user = $this->checkUser($userId);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return response()->json(['user', compact('user')]);

        } catch (Throwable $e) {
           // report($e);
    
            return response()->json(["400"=>"Bad request, data no té format especificat."]);

        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId){
        try{
            $user = $this->checkUser($userId);
            $user->delete();

            return response()->json("User ".$userId." deleted.",200);

        } catch (Throwable $e) {
            //report($e);
            return response()->json(["404"=>"Resource not found, Aquest usuari no existeix."]);
        }

    }
}
