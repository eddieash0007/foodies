@extends('admin.layouts.admin')
@section('view')
Settings
@endsection

@section('content')

    <form action="{{route('settings.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Logo</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Insert Image</label>
                            <input type="file" name="logo" class="form-control" id="customFile">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="logo">Current logo</label>
                        <div class="form-group">
                            
                            <img src="{{asset($settings->logo)}}" alt="logo" width="300px" height="200px">
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card-header">
                <hr>
                <h3 style="margin-top:0;" class="card-title">About Section</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
        
                    <textarea name="about" id="about" cols="30" rows="10">{{$settings->about}}</textarea>
                </div>
                
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>




@endsection

@section('scripts')
<script>
    ClassicEditor.create(document.querySelector('#about'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
