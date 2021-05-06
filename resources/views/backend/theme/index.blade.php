@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Logo Setup</h6>
        <hr>
        <form action="{{route('theme.store')}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf


            <img src="{{asset('uploads/logos/' . $themes->logo)}}" alt="">

            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Logo</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="exampleInputUsername2" name="logo">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>


        <br>
        <br>
        <br>


        <h6 class="card-title">Social Setup</h6>
        <hr>
        <form action="{{route('social.store')}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf
            

            <div class="form-group row">
                <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $themes->facebook }}" id="facebook" name="facebook" placeholder="Facebook Link">
                </div>
            </div>

            <div class="form-group row">
                <label for="youtube" class="col-sm-3 col-form-label">YouTube</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $themes->youtube }}" id="youtube" name="youtube" placeholder="YouTube Link">
                </div>
            </div>

            <div class="form-group row">
                <label for="pinterest" class="col-sm-3 col-form-label">Pinterest</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"  value="{{ $themes->pinterest }}" id="pinterest" name="pinterest" placeholder="Pinterest Link">
                </div>
            </div>

            <div class="form-group row">
                <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $themes->twitter }}" id="twitter" name="twitter" placeholder="Twitter Link">
                </div>
            </div>

            <div class="form-group row">
                <label for="flickr" class="col-sm-3 col-form-label">Flickr</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $themes->flickr }}" id="flickr" name="flickr" placeholder="Flickr Link">
                </div>
            </div>

            <div class="form-group row">
                <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{ $themes->instagram }}" id="instagram" name="instagram" placeholder="Instagram Link">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>

        <br>
        <br>
        <br>


        <h6 class="card-title">Company Short Description</h6>
        <hr>
        <form action="{{route('description.store')}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $themes->description }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>

        <br>
        <br>
        <br>

        <h6 class="card-title">Footer Credit</h6>
        <hr>
        <form action="{{route('footercredit.store')}}" method="POST"class="forms-sample" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="footer_credit" class="col-sm-3 col-form-label">Credit</label>
                <div class="col-sm-9">
                    <textarea name="footer_credit" class="form-control" id="footer_credit" cols="30" rows="10">{{ $themes->footer_credit }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
    </div>
</div>

@endsection