@extends('admin.layouts.admin')

@section('view')
Edit : {{$post->title}}
@endsection

@section('content')

    <div class="card">
            <div class="card-body">
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
                    <textarea name="{{$post->post}}" id="post" cols="30" rows="10"
                        placeholder="Edit your category description here">{{$post->post}}</textarea>
                </div>
            </div>
        
            <div class="card-footer">
                <a href="{{route('posts')}}">
                <button type="button" class="btn btn-secondary">Close</button>
                </a>
                <button type="submit" class="btn btn-primary">Save</button>
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
