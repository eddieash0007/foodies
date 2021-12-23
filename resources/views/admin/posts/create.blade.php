@extends('admin.layouts.admin')

@section('view')
Create A New Post
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Post</h3>
    </div>
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="modal-body">
                <div class="form-group">
                    <label for="post_title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title">
                </div>
                <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                        <option name="{{$category->name}}" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="post_image">Image</label>
                    <input type="file" name="image" class="form-control" id="customFile">
                </div>
                <div class="form-group">
                    <label for="productstatus">Tag(s)</label>
                   @foreach ($tags as $tag)
                      <div class="checkbox">
                          <label><input type="checkbox" name="tags[]" value={{$tag->id}}>&nbsp;&nbsp;{{ $tag->name }}</label>
                      </div>           
                   @endforeach
                  </div>
                <div class="form-group">
                    <label for="Post">Post</label>
                    <textarea name="post" id="post" cols="30" rows="10" placeholder="Type post here..."></textarea>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="float-right">
                <a href="{{route('posts')}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#post'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
