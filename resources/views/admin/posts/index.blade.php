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

                <div class="d-flex float-right">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('posts.create')}}">
                        <button class="btn btn-primary btn-xs ml-2" data-toggle="modal" data-target="#createNew">
                            Add New
                        </button>
                    </a>
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
                        @if ($posts->count()>0)
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->author}}</td>
                            <td>{{$post->created_at->toFormattedDateString()}}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#view-post-{{$post->id}}">View</button>
                                <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit-post-{{$post->id}}">Edit</button>

                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#trash-post-{{$post->id}}">Delete</button>

                            </td>
                        </tr>
                        <!--view modal -->
                        <div class="modal fade bd-example-modal-lg" id="view-post-{{$post->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$post->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="post_title">Post Title</label>
                                                    <p>{{$post->title}}</p>

                                                    <label for="post_category">Category</label>
                                                    <p>{{$post->category->name ?? 'None'}}</p>

                                                    <label for="post_post">Post</label>
                                                    <p>{{$post->post}}</p>
                                                </div>
                                                <div class="col-md-4 ml-auto">
                                                    <img src="{{asset($post->image)}}" alt="{{$post->image}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end view modal --}}

                        {{--edit modal --}}
                        <div class="modal fade bd-example-modal-lg" id="edit-post-{{$post->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit: {{$post->name}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('post.update', ['id'=>$post->id])}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Title</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter post title" value="{{$post->title}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Category</label>
                                                <select class="form-control" name="category_id">
                                                    <option value="{{$post->category_id}}">Select a Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" <?php if ($category->id == $post->category_id) {
                                                        echo 'selected';
                                                    } ?>>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Post Image</label>
                                                <input type="file" name="image" class="form-control" id="customFile">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_name">Post</label>
                                                <textarea name="{{$post->post}}" id="description" cols="30" rows="10"
                                                    placeholder="Edit your category description here">{{$post->post}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        {{-- end edit modal  --}}
                        {{-- trash-modal --}}
                        <div class="modal fade bd-example-modal-lg" id="trash-post-{{$post->id}}" tabindex="-1"
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
                                        <p> Are you sure you want to trash <b>{{$post->title}}</b>?</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                        </button>
                                        <a href="{{route('post.destroy',['id'=>$post->id] )}}">
                                            <button type="button" class="btn btn-primary">Yes</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- end-trash-modal --}}
                        @endforeach
                        @else
                        <tr>
                            <th colspan="5" class="text-center">No Uploaded Posts</th>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>
@endsection

@section('scripts')

<script>
    ClassicEditor
        .create(document.querySelector('#post'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
