<form action="{{route('post.store')}}" method="POST"  enctype="multipart/form-data">
    @csrf
    <input type="text" placeholder="title">
    <select name="category" id="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <input type="file" name="image">
    <textarea name="post" id="" cols="30" rows="10"></textarea>
    <input type="submit" >

  </form>