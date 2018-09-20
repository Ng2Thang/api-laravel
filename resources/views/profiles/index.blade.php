@extends('layouts.main')

@section('content')

<div class="container emp-profile">
    @if(session('success'))
        <div class="bs-component">
          <div class="alert alert-dismissible alert-success">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <strong>{{session('success')}}</strong>
          </div>
        </div>

        @endif
            <form method="get" action="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @if($profile->avatar)
                            <img src="{{asset('/images/avatar/').'/'.$profile->avatar}}" alt=""/ style="width: 275px; height: 198px">
                            @else
                            <img src="/github.png" alt=""/ style="width: 275px; height: 198px">
                            @endif
                            
                            <!-- <div class="file btn btn-lg btn-primary">
                                <a href="/users/changeAvatar">Change Photo</a>
                                
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h3>
                                        {{$profile->fullname}}
                                    </h3>
                                    <h6>
                                       {{$profile->position->name}}
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>

                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('profile.getEdit')}}"><span class="btn btn-primary"><i class="fa fa-edit"></i> Edit Profile</span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->fullname}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->address}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->phone}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Position</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->position->name}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Identity Card</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->identity_card}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birthday</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->birthday}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Start Work</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$profile->work_start}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                @if($profile->gender==0)
                                                <p> Male</p>
                                                @else
                                                <p> Female</p>
                                                @endif
                                               
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        

@endsection

