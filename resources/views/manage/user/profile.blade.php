@extends('layouts.dashboard.backend')


@section('content')

<div>
      <h2>Profile</h2>
</div>

<ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active">edit : {{$user->name}}</li>
</ul>

<div class="row">
      <div class="col-md-12">
            <div class="tile mb-4">
                  <form action="{{ route('manage.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                              <label for="name">User Name</label>
                              <input type="text" name="name" value="{{ $user->name }}"
                                    placeholder="Enter Your User Name" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="email">User Email</label>
                              <input type="email" name="email" value="{{ $user->email }}"
                                    placeholder="Enter Your User Email" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="phone">Phone</label>
                              <input type="phone" name="phone" value="{{ $user->profile->phone }}"
                                    placeholder="" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="password">New Password</label>
                              <input type="password" name="password" placeholder="Enter Your new password"
                                    class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="about">About you</label>
                              <textarea class="form-control" name="about" id="about" cols="30"
                                    rows="10">{{ $user->profile->about }}</textarea>
                        </div>
                        <div class="form-group">
                              <label for="linkedin">Address</label>
                              <input type="text" value="{{ $user->profile->address }}" name="address" placeholder=""
                                    class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="linkedin">DOB</label>
                              <input type="date" value="{{ $user->profile->DOB }}" name="DOB" placeholder=""
                                    class="form-control">
                        </div>
                        
                        <div class="form-group">
                              <label for="CV">CV</label>
                              <input type="file" value="{{ $user->profile->CV }}" name="CV" placeholder=""
                                    class="form-control">
                        </div>
                        <div class="from-group">
                              <div class="text-right">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>

@stop
