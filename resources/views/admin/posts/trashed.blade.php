@extends('admin.layouts.admin')

@section('view')
  Posts
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Trashed posts</h3>

          <div class="card-tools">
           
            <button class="btn btn-primary btn-xs float-right">Add New</button>
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
              @foreach ($posts as $post)
                <tr>
                  
                  <td>{{$post->title}}</td>
                  <td>{{$post->author}}</td>
                  <td>{{$post->created_at}}</td>
                  <td> 
                    <button class="btn btn-success">Restore</button>
                    <button class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection