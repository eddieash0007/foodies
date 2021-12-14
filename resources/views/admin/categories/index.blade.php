@extends('admin.layouts.admin')

@section('view')
Categories
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All categories</h3>

                <div class="d-flex float-right">
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
                    <button class="btn btn-primary btn-xs ml-2" data-toggle="modal" data-target="#createNew">
                        Add New
                    </button>
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
                        @if ($categories->count()>0)
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{!!Str::limit($category->description, 10)!!}</td>
                            <td>

                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#view-category-{{$category->id}}">View</button>

                                <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit-category-{{$category->id}}">Edit</button>
                                <a href="{{route('category.destroy',['id'=>$category->id] )}}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <!--view modal -->
                        <div class="modal fade bd-example-modal-lg" id="view-category-{{$category->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$category->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="category_title">Category Name</label>
                                                    <p>{{$category->name}}</p>

                                                    <label for="category_description">Category Description</label>
                                                    <p>{!!$category->description!!}</p>
                                                </div>
                                                <div class="col-md-4 ml-auto">
                                                    <img src="{{asset($category->image)}}" alt="{{$category->image}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end view modal --}}

                        {{--edit modal --}}
                        <div class="modal fade bd-example-modal-lg" id="edit-category-{{$category->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit: {{$category->name}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('category.update', ['id'=>$category->id])}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter category name" value="{{$category->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category Image</label>
                                                <input type="file" name="image" class="form-control" id="customFile">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_name">Description</label>
                                                <textarea name="{{$category->id}}" id="description" cols="30" rows="10"
                                                    placeholder="Edit your category description here">{{$category->description}}</textarea>
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
                        @endforeach
                        @else
                        <tr>
                            <th colspan="5" class="text-center">No Uploaded Categories</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{$categories -> links('pagination::bootstrap-4') }}
                </ul>
            </div>
        </div>
        <!-- /.card -->

    </div>
    {{--create modal --}}
    <div class="modal fade bd-example-modal-lg" id="createNew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create a new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category name">
                        </div>
                        <div class="form-group">
                            <label for="category">Category Image</label>
                            <input type="file" name="image" class="form-control" id="customFile">
                        </div>
                        <div class="form-group">
                            <label for="category_name">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                placeholder="Enter category description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    {{-- end create modal  --}}




</div>

@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
    // ClassicEditor.create(document.querySelector('#description2'))
    //     .catch(error => {
    //         console.error(error);
    //     });

</script>
@endsection
