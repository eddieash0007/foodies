@extends('admin.layouts.admin')

@section('view')
Tags
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All tags</h3>

                <div class="d-flex float-right">
                    <div class="card-tools">

                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" id="search" name="table_search" class="form-control search float-right"
                                placeholder="Search">

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
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($tags->count()>0)
                        @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>

                                <button class="btn btn-info" data-toggle="modal"
                                    data-target="#edit-tag-{{$tag->id}}">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete-tag-{{$tag->id}}">Delete</button>
                            </td>
                        </tr>
                        {{--edit modal --}}
                        <div class="modal fade bd-example-modal-lg" id="edit-tag-{{$tag->id}}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit: {{$tag->name}}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('tag.update', ['id'=>$tag->id])}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="category_name">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter tag" value="{{$tag->name}}">
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
                        {{--delete modal --}}
                        <div class="modal fade bd-example-modal-lg" id="delete-tag-{{$tag->id}}" tabindex="-1"
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
                                        <p> Are you sure you want to permanently delete <b>{{$tag->name}}</b>?</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                        </button>
                                        <a href="{{route('tag.destroy',['id'=>$tag->id] )}}">
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- end delete modal  --}}
                        @endforeach
                        @else
                        <tr>
                            <th colspan="5" class="text-center">No Uploaded Tags</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="modal fade bd-example-modal-lg" id="createNew" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create a new post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('tag.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tag">Tag</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter tag name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<input type="text" id="search">

@endsection

@section('script')
    <script>
        $('body').on('keyup','#search',function(){
            var searchQuery = $(this).val();
            
            $.ajax({
                method: 'POST',
                url: '{{  route("tag.search")}}',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    searchQuery: searchQuery
                },
                success: function(res){
                    //
                }
            })
        });        
    </script>    

@endsection
