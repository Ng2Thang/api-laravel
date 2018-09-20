@extends('layouts.main')
@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12 ">
     <div class="list-group ">
      <h3><a href="#" class="list-group-item list-group-item-action active">Create New User Profile</a></h3>
    </div> 
  </div>

  <div class="col-md-12 ">
    <div class="card">
      <div class="card-body">
        <div class="row border-bottom">
          <div class="col-1"></div>
          <div class="col-md-3  col-sm-12 ">
            <img class="-right" src="https://workingabroad.daijob.com/images/uploads/8192/aa26ff-7c40-8e364.png" alt="" height="100" style="width:100%">
          </div>
          <div class="col-md-7  col-sm-12 col-form-label my-auto ">

            <h2 class="float-right">User Profile</h2>
            
          </div>
        </div>
        @if(session('warning'))
        <div class="bs-component">
          <div class="alert alert-dismissible alert-warning">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>{{session('warning')}}</strong>
          </div>
        </div>

        @endif
        
        @if ($errors->any())
        <div class="alert alert-danger col-10 offset-1">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form method="post" action="{{route('profile.postCreate')}}" enctype="multipart/form-data">
          @csrf
          <div class="my-4"></div>
          <div class="row">
            <div class="col-md-3 offset-1">
              <h4 class="text-center" style="font-family:sans-serif; ">Avatar User</h4>
              <img src="http://ussh.vnu.edu.vn/Upload/NewsImgCache/user_w350.jpg" alt="" style="width:100%" height="250" id="image_avatar">

              <hr>  
              <input type="file" name="avatar"  value="{{old('avatar')}}" accept="image/*"/>
            </div>
            <div class="col-md-8">      

              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">User Name&nbsp*</label> </div>              
                <div class="col-9">
                  <input value="{{Auth::user()->name}}"  name="username" class="form-control here"  readonly="">

                  
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Full Name&nbsp*</label> </div>        
                <div class="col-9">
                  <input value="{{old('fullname')}}" name="fullname" class="form-control here" type="text" placeholder="Please Enter Your Full Name . . ." autofocus="">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Email</label> </div>       
                <div class="col-9">
                  <input value="{{old('email')}}" name="email" class="form-control here" required="required" type="email" >
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Position</label> </div>        
                <div class="col-9">
                  <select name="position" class="form-control">
                    @foreach($positions as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Phone&nbsp*</label> </div>       
                <div class="col-9">
                  <input value="{{old('phone')}}" name="phone" class="form-control here" required="required" type="number" placeholder="Please Enter Phone Number . . .">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Address</label> </div>       
                <div class="col-9">
                  <input value="{{old('address')}}" name="address" placeholder="Please Enter Address . . ." class="form-control here" type="text">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Identity Card&nbsp*</label> </div>        
                <div class="col-9">
                  <input value="{{old('identity_card')}}" name="identity_card" placeholder="Please Enter Indentiry Number . . ." class="form-control here" type="text">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Birthday&nbsp*</label> </div>       
                <div class="col-9">
                  <input value="{{old('birthday')}}" name="birthday" placeholder="New Password" class="form-control here" type="date">
                </div>
              </div> 

              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Date Start</label> </div>       
                <div class="col-9">
                  <input value="{{old('work_start')}}" name="work_start" placeholder="Date" class="form-control here" type="date">
                </div>
              </div> 
              <div class="form-group row">
                <div class="col-2"><label for="Role" class="col-form-label float-right">Gender&nbsp</label> </div>       
                <div class="col-2 col-form-label">                 
                  <input class="" type="radio" name="gender" value="0" >&nbsp&nbspMale                

                </div>
                <div class="col-2 col-form-label">                                               
                  <input class="" type="radio" name="gender" value="1">&nbsp&nbspFemale            
                </div>
              </div>
              <div class="form-group row">

                <div class="col-9 offset-2 text-danger">
                 Field has * is required, you must fill it.
               </div>
             </div> 
             <div class="form-group row">
              <div class="offset-8  col-3">
                <button type="submit" class="btn btn-primary">Create New Profile</button>
              </div>
            </div>



          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>

@endsection