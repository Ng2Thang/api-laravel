<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Late;
use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Late as LateAPI;
use App\Services\PayUService\Exception;

class LateController extends Controller
{
    public function getInfo($email){
    	$user = User::where('email',$email)->first();
    	if($user!= null){
    		$profile = Profile::where('user_id',$user->id)->first();
    		$listLate = Late::where('user_id',$user->id)->get();
    		if($profile!=null){  			
    			return response()->json([
    				'email'=>$user->email,
    				'image'=>public_path().'\\'.$profile->avatar,
    				'list-late-to-work'=> $listLate
    			]);
    		}
    		else{
    			return response()->json([
    				'email'=>$user->email,
    				'list-late-to-work'=> $listLate
    			]);
    		}
    	}
    	else{
    		return response()->json('Wrong Email User');
    	}   	
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Late::all());
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
        $late = new Late;
        try{
        	$late->user_id = $request->use_id;
	        $late->reason = $request->reason;
	        $late->time = $request->previous;
	        $late->status = 0;
	        
        }
        catch(Exception $e){
        	return response()->json("An error occurred");
        }
        $late->save();
        return response()->json("Save Late To Work Success");
    }

    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $late = Late::where('id',$id)->first();
        if($late == null){
        	return response()->json("Not found this Late");
        }
        return response()->json($late);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
