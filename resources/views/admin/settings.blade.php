@extends('admin.layouts.admin')
@section('view')
Settings
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Logo</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for=""></label>
                    <input type="file" name="logo" class="form-control" id="customFile">
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">

    </div>
</div>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">About Section</h3>
    </div>
    <div class="card-body">
        <div class="form-group">

            <textarea name="about" id="about" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#about'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
