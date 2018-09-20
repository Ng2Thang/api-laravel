<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Late;
use Illuminate\Support\Facades\Auth;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function my_history()
    {        
        $lates = Late::where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('lates.my-history',compact('lates'));
        // view history late work user
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'reason' => 'required',
            'time' => 'required',
            
         ],
         [  
            'reason.required' => 'Please enter your reason',
            'time.required' => 'Please enter time late',
            
         ]);

        // create new LATE
        $late = new Late;
        $late->user_id = Auth::user()->id;
        $late->reason = $request->reason;
        $late->status = 0;
    
        $late->time = $request->time;
        $late->created_at = date('Y-m-d H:i:s');      
        $late->updated_at = date('Y-m-d H:i:s');      
        $late->save();
        return redirect('/lates/create')->with('success','Success ! Please waiting approved.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
