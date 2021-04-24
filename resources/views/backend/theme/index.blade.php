@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Theme Setup</h6>
        <form action="{{route('theme.store')}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Logo</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="exampleInputUsername2" name="logo">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
    </div>
</div>

@endsection