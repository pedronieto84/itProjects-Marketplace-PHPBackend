<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all()->toArray();

        return response()->json(['files', $files]);
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
            $file = new file();
            $file->name = $request->name;
            $file->type_file = $request->type_file;
            $file->path = $request->path;
            $file->save();
            
            return response()->json(['file', $file]);
        
        } catch (Throwable $e) {
           // report($e);           
           return response()->json(["400"=>"Bad request, les dades no ténen el format especificat."]);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show( $fileId)
    {
        $file = File::where('id', '=', $fileId)->first();
        return response()->json(['file', $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fileId)
    {
        try{
            $file = File::where('id', '=', $fileId)->first();
            $file->name = $request->name;
            $file->type_file = $request->type_file;
            $file->path = $request->path;
            $file->save();
            return response()->json(['user', compact('user')]);

        } catch (Throwable $e) {
           // report($e);
    
            return response()->json(["400"=>"Bad request,les dades no ténen el format especificat."]);

        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileId)
    {       
        try{
            File::where('id', '=', $fileId)->delete(); 

            return response()->json("File ".$fileId." deleted.",200);

        } catch (Throwable $e) {
            //report($e);
            return response()->json(["404"=>"Resource not found, Aquest fitxer no existeix."]);
        }
    }
    
    public function getDownload($fileId)
    {
        $file = File::where('id', '=', $fileId)->firstOrFail();
        $pathToFile=storage_path().$file->path."/".$file->name."/".$file->type_file;

        return response()->download($pathToFile);  

    }
}