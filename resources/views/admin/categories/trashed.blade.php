@extends('admin.layouts.admin')

@section('view')
  Categories
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Trashed categories</h3>

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
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
               
              </tr>
            </thead>
            <tbody>
              <tr>
                
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
  </div>
@endsection