@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Create New Post</h6>
        <form action="{{route('post.update', $post->id)}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf



            <div class="form-group">
                <label for="exampleInputUsername2" class="col-form-label">Title</label>
                <div>
                    <input type="text" name='title' class="form-control" id="exampleInputUsername2" value="{{$post->title}}" placeholder="Title">
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Categories</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername2" class="col-form-label">Featured Image </label>
                <div>
                    <input type="file" value="{{$post->thumbnail}}" name='thumbnail' class="form-control" id="exampleInputUsername2" placeholder="Thumbnail">
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="publish" class="form-check-input">
                        Is Publish?
                    </label>
                </div>
            </div>


            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>

@endsection