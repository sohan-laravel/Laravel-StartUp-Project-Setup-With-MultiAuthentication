@extends('backend.layouts.app')

@section('title')
    Categories
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@endsection

@section('backend-content')

<div class="container mt-3">
    <div class="card">
        <div class="card-header">

            <h3 class="card-title">Categories</h3>

            {{-- href="{{ route('admin.category.create') }}" --}}

            <div class="container">
                 <button class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus-circle fa-w-20"></i><span> ADD</span>
            </button>
            </div>
        </div>

        <div class="card-body">
    <table id="categoryTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SL NO</th>
                <th>Category Name</th>  
                <th>Category Slug</th>  
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

           {{-- <tr>
               <td></td>
               <td></td>
               <td></td>
           </tr> --}}

        </tbody>
        <tfoot>
            <tr>
                <th>SL NO</th>
                <th>Category Name</th>
                <th>Category Slug</th>  
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

        <form action="" method="post" id="delete_form">
          @method('DELETE')
          @csrf
        </form>

        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="categoryAddLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="categoryAddLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('admin.category.store') }}" method="post" id="addCategoryForm">

                @csrf

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">
                </div>

                <button type="submit" class="btn btn-outline-primary btn-sm float-right"><span class="loading d-none">....</span>Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="categoryEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="categoryEditLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="edit_part">
        
      </div>
    </div>
  </div>
</div>
   
@endsection

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script>
       
        $(function category(){
        table =$('#categoryTable').DataTable({
        processing:true,
        serverSide:true,
        search:true,
        ajax:"{{ route('admin.category.index') }}",
        columns:[
            { data:'DT_RowIndex', name:'DT_RowIndex'},
            { data:'category_name', name:'category_name'},
            { data:'category_slug', name:'category_slug'},
            { data:'action', name:'action'},
        ]
    });

});

       


    // Add Category

       $('#addCategoryForm').submit(function(e){
         e.preventDefault();
         $('.loading').removeClass('d-none');
         var url = $(this).attr('action');
         var request = $(this).serialize();

         $.ajax({
             url:url,
             type:'post',
             async:false,
             data:request,
             success:function(data){
                 toastr.success(data);
                 $('#addCategoryForm')[0].reset();
                 $('.loading').addClass('d-none');
                 //$('#addModal').modal('hide');
                 $('#addModal').hide();
                 $(".modal-backdrop").remove();
                 $('#categoryTable').DataTable().ajax.reload();
             }
         });

    });


    // Edit Category

       $('body').on('click', '.edit', function () {
         var id = $(this).data('id');
         var url = "{{ url('admin/category/edit') }}/"+id;

         $.ajax({
             url:url,
             type:'get',
             success:function(data){
                $('#edit_part').html(data);
             }
         });
    });

    // Delete Category

    $(document).ready(function(){

      $(document).on('click', '#delete_category', function (event) {
      event.preventDefault();
      var url = $(this).attr('href');
      $('#delete_form').attr('action', url);
      swal.fire({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then(function(result) {
          if (result.isConfirmed) {
              $('#delete_form').submit();
          }
      });
  });

  // Data Passed Through Here
    $('#delete_form').submit(function(e){
         e.preventDefault();
         var url = $(this).attr('action');
         var request = $(this).serialize();

         $.ajax({
             url:url,
             type:'post',
             async:false,
             data:request,
             success:function(data){
                 toastr.success(data);
                 $('#delete_form')[0].reset();
                 $('#addModal').hide();
                 $(".modal-backdrop").remove();
                 $('#categoryTable').DataTable().ajax.reload();
             }
         });

    });

});

    </script>

@endsection