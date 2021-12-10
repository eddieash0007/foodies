@extends('admin.layouts.admin')

@section('view')
  Posts
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">All posts</h3>

          <div class="card-tools">
           
            <button class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#createNew">Add New</button>
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
              
            </div>
            
          </div>
          
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Actions</th>
               
              </tr>
            </thead>
            <tbody>
              <tr>
                
                <td></td>
                <td></td>
                <td></td>
                <td> 
                  <button class="btn btn-warning">View</button>
                  <button class="btn btn-info">Edit</button>
                  <button class="btn btn-danger">Delete</button>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="modal fade bd-example-modal-lg" id="createNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Create a new post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="post_title">Title</label>
              <input type="text" class="form-control"  placeholder="Enter post title">
            </div>
            <div class="form-group">
              <label for="post_image">Image</label>
              <input type="file" class="form-control" id="customFile">
            </div>
            <div class="form-group">
              <label for="Post">Post</label>
              <textarea name="" id="post" cols="30" rows="10" placeholder="Type post here..."></textarea>
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  
  <script>
    ClassicEditor
      .create( document.querySelector( '#post' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>
@endsection