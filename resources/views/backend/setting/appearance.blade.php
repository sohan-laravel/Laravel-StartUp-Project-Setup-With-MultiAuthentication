@extends('backend.layouts.app')

@section('title')
    Admin Setting Appearance
@stop

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    
@endsection


@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            Admin Setting Appearance
        </div>
           <div class="row mt-3">
        <div class="col-md-3">
            @include('backend.setting.sidebar')
        </div>
        <!-- left column -->
        <div class="col-md-9">
            
            <!-- form start -->
            <form id="settingsFrom" autocomplete="off" role="form" method="POST" action="{{ route('admin.appearance.update') }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <!-- general form elements -->
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="site_logo">Logo (Only Image are allowed) <code>{ key: site_logo }</code></label>
                            <input type="file" name="site_logo" id="site_logo"
                                   class="dropify @error('site_logo') is-invalid @enderror"
                                   data-default-file="{{ setting('site_logo') != null ?  Storage::url(setting('site_logo')) : '' }}">
                            @error('site_logo')
                                <span class="text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="site_favicon">Favicon (Only Image are allowed, Size: 33 X 33) <code>{ key: site_favicon }</code></label>
                            <input type="file" name="site_favicon" id="site_favicon"
                                   class="dropify @error('site_favicon') is-invalid @enderror"
                                   data-default-file="{{ setting('site_favicon') != null ?  Storage::url(setting('site_favicon')) : '' }}">
                            @error('site_favicon')
                                <span class="text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                            @enderror
                        </div>

                        <button type="button" class="btn btn-danger" onClick="resetForm('settingsFrom')">
                            <i class="fas fa-redo"></i>
                            <span>Reset</span>
                        </button>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-arrow-circle-up"></i>
                            <span>Update</span>
                        </button>

                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
    </div>
</div>
   
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $(document).ready(function(){
        $('.dropify').dropify();

    });
</script>
    
@endsection

