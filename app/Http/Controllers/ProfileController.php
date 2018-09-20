<?php

namespace App\Http\Controllers;

use File;
use App\Profile;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        if($profile ==null ){
            return redirect()->route('profile.getCreate')->with('warning','Please create your profile');
        }   
        return view('profiles.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('profiles.create',compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {          
        
        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->fullname = $request->fullname;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->identity_card = $request->identity_card;
        $profile->work_start = $request->work_start;
        $profile->birthday = $request->birthday;
        $profile->position_id = $request->position; 
        $profile->gender = $request->gender;
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $nameFile = 'profile'.'_'.Auth::user()->id.'_'.$file->getClientOriginalName();

            $file->move(public_path().'\images\avatar',$nameFile);
            $profile->avatar = $nameFile;              
        }
        $profile->save();
       return redirect('/profile/my-profile')->with('success', 'Create profile success!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $positions = Position::all();
    
        return view('profiles.edit', compact('profile','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $profile->fullname = $request->fullname;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->identity_card = $request->identity_card;
        $profile->work_start = $request->work_start;
        $profile->birthday = $request->birthday;
        $profile->position_id =$request->position;; // check again
        $profile->gender = $request->gender;
        if ($request->hasFile('avatar')) {
            File::delete(base_path().'\\public\images\\avatar\\'.$profile->avatar);    
            $file = $request->avatar;
            $nameFile = 'profile'.'_'.Auth::user()->id.'_'.$file->getClientOriginalName();
            //dd($nameFile);
            $file->move(public_path().'\images\avatar',$nameFile);
            $profile->avatar = $nameFile;              
        }
        $profile->save();
        //return view('profiles.index', compact('profile'))->with('success', 'Update profile success!!!');
        return redirect()->route('profile.index')->with('success', 'Update profile success!!!');
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
