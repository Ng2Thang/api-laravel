<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Late;
use App\Position;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   

    public function getListLatePending()
    {

    $lates = Late::where('status',0)->paginate(10);
        return view('admin.lates.pending',compact('lates'));
    }



   
    
    public function getListLateHistory()
    {
        $lates = Late::where('status','<>',0)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.lates.history',compact('lates'));
    }


  public function approvedLate($id,$flag)
    {
        $late = Late::find($id);
        if ($flag==1){
            $late->status = 1;
        }
        else 
        {
           $late->status = 2;
        }
        
        $late->save();
        return redirect('/admin/lates/pending')->with('success','Success !');
    }


public function getListPosition()
    {
        $positions = Position::all();
        
        return view('admin.positions.index',compact('positions'));
    }

    public function getCreatePosition()
    {
        
        return view('admin.positions.create');
    }

    public function postCreatePosition(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            
            
         ],
         [  
            'name.required' => 'Please enter name of position',
            
            
         ]);

        $position = new Position;
        $position->name = $request->name;
        $position->created_at = date('Y-m-d H:i:s');
        $position->updated_at = date('Y-m-d H:i:s');
        $position->save();

        return redirect('admin/positions')->with('success','Create successfully!');
    }


    
}
