@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Add New Category</h6>
        <form action={{route('category.store')}} method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf



            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" id="exampleInputUsername2" placeholder="Category title">
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Thumbnail</label>
                <div class="col-sm-9">
                    <input type="file" name="thumbnail" class="form-control" id="exampleInputUsername2">
                </div>
            </div>

            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="publish" value="1">
                        Is Publish?
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="menu" value="1">
                        Has Menu?
                    </label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>

        </form>
    </div>
</div>

@endsection