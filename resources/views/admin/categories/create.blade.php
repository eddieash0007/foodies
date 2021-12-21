@extends('admin.layouts.admin')

@section('view')
Create A New Category
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">New Category</h3>
        </div>
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                    <div class="form-group">
                        <label for="category_name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter category name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category Image</label>
                        <input type="file" name="image" class="form-control" id="customFile">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            placeholder="Enter category description">
                        </textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="{{route('categories')}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        
    </div>
@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection