@extends('admin.index')
@section('content')   
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12 text-center">
                <h1 class="page-header">users
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-6 offset-3">
                <form  method="post" action="{{ route('users.edit.save', $users->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" value="{{ $users->user_name }}" class="form-control" placeholder="Enter Username"  required="">
                        @if($errors->has('user_name'))
                            <div class="text-danger">{{ $errors->first('user_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        @if($errors->has('password'))
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" name="full_name" value="{{ $users->full_name }}" class="form-control" placeholder="Enter Fullname"  required="">
                        @if($errors->has('full_name'))
                            <div class="text-danger">{{ $errors->first('full_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $users->email }}" readonly class="form-control" placeholder="Enter Email"  required="">
                        @if($errors->has('email'))
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="mobile" value="{{ $users->mobile }}" class="form-control" placeholder="Enter Phone" required="">
                        @if($errors->has('mobile'))
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="user_image" value="{{$users->user_image}}" class="form-control" placeholder="">
                        <img class="hapo-img-avatar mt-1 py-1 px-0" src="{{url('storage/', $users->user_image)}} ">
                        @if($errors->has('user_image'))
                            <div class="text-danger">{{ $errors->first('user_image') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary error-w3l-btn mb-5 px-4" id="center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
