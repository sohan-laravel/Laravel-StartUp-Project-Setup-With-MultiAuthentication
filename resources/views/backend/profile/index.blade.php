@extends('backend.layouts.app')

@section('title')
    Admin Profile
@stop


@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Admin Profile
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.profile.update') }}">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ auth()->guard('admin')->user()->name }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" name="email" value="{{ auth()->guard('admin')->user()->email }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
   
@endsection

