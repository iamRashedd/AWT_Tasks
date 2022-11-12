@extends('layouts.app')
@section('content')

<form action="{{route('seller.profileUpdate')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../assets/uploads/{{$seller->photo}}"><span class="font-weight-bold">{{$seller->first_name}}</span><span class="text-black-50">{{$seller->email}}</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="col-md-6"><label class="labels">Seller ID: </label><input type="text" class="form-control" placeholder="id" readonly value="{{$seller->id}}"></div>
                <div class="row mt-2">
                    
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value="{{$seller->first_name}}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{$seller->last_name}}" placeholder="lastname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="{{$seller->phone}}"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{$seller->email}}"></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="{{$seller->address}}"></div>
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="enter address line 2" value="{{$seller->gender}}"></div>
                    <div class="col-md-12"><label class="labels">Date of birth: </label><input type="text" class="form-control" placeholder="enter dob" value="{{$seller->dob}}"></div>
                    
                    <div class="col-md-12"><label class="labels">NID:<br>
                        <img class="" width="150px" src="../assets/uploads/{{$seller->nid}}">
                    </label><input type="file" class="form-control" name="nid" placeholder="enter nid" value="{{$seller->nid}}"></div>

                    <div class="col-md-12"><label class="labels">BIN:<br>
                        <img class="" width="150px" src="../assets/uploads/{{$seller->documents}}">
                    </label><input type="file" class="form-control" name="bin" placeholder="enter bin" value="{{$seller->documents}}"></div>

                    <div class="col-md-12"><label class="labels">Passport:<br>
                        <img class="" width="150px" src="../assets/uploads/{{$seller->passport}}">
                    </label><input type="file" class="form-control" name="passport" placeholder="enter passport" value="{{$seller->passport}}"></div>

                    <div class="col-md-12"><label class="labels">Account:<br>
                        <img class="" width="150px" src="../assets/uploads/{{$seller->account}}">
                    </label><input type="file" class="form-control" name="account" placeholder="enter account" value="{{$seller->account}}"></div>

                    <div class="col-md-12"><label class="labels">Photo:<br>
                        <img class="" width="150px" src="../assets/uploads/{{$seller->photo}}">
                    </label><input type="file" class="form-control" name="photo" placeholder="enter nid" value="{{$seller->photo}}"></div>

                   
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Password</label><input type="password" name="password" class="form-control" placeholder="Password" value="{{$seller->password}}"></div>
                    <div class="col-md-6"><label class="labels">Confirm Password</label><input type="password" name="confirmPassword" class="form-control" value="{{$seller->password}}" placeholder="Confirm Password"></div>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" type="submit" value="Save Profile"></div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</form>
@endsection