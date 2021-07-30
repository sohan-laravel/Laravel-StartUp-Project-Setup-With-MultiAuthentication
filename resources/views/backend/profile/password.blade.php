@extends('backend.layouts.app')

@section('title')
    Update Admin Password
@stop


@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Update Admin Password
        </div>

        {{-- @if ($errors->any())
     @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{$error}}</strong>
        </div>
     @endforeach
 @endif

        @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif --}}
  
{{-- @if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif --}}


        <div class="card-body">
            <form method="post" action="{{ route('admin.update.password') }}">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" class="form-control" name="old_password" placeholder="Enter Your old Password">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your New Password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Your Confirm Password Again">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
   
@endsection



