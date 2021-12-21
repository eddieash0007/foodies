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
                    <a href="{{route('post.restore',['id'=>$post->id])}}">
                      <button class="btn btn-success">Restore</button>
                    </a>
                    
                    <button class="btn btn-danger" data-toggle="modal"
                    data-target="#delete-post-{{$post->id}}">Delete</button>
                    
                  </td>
                </tr>
                {{--delete modal --}}
              <div class="modal fade bd-example-modal-lg" id="delete-post-{{$post->id}}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle">Danger</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: white">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <p> Are you sure you want to permanently delete <b>{{$post->title}}</b>?</p>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">No
                                </button>
                                <a href="{{route('post.kill',['id'=>$post->id] )}}">
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </a>
                            </div>
                    </div>
                    
                </div>
              </div>
            {{-- end delete modal  --}}
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