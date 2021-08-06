<form action="{{ route('admin.update.category') }}" method="post" id="editCategoryForm">
    
    @csrf

    <div class="form-group">
        <input type="hidden" name="id" value="{{ $data->id }}">
        <label for="category_name">Category Name</label>
        <input type="text" class="form-control" name="category_name" value="{{ $data->category_name }}" id="category_name" placeholder="Enter Category Name">
    </div>

    <button type="submit" class="btn btn-outline-primary btn-sm float-right"><span class="loading d-none">....</span>Update</button>
</form>

<script type="text/javascript">

    //edit form submit

    $('#editCategoryForm').submit(function(e){
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
                 $('#editCategoryForm')[0].reset();
                 $('.loading').addClass('d-none');
                 //$('#addModal').modal('hide');
                 $('#editModal').hide();
                 $(".modal-backdrop").remove();
                 $('#categoryTable').DataTable().ajax.reload();
             }
         });

    });
</script>