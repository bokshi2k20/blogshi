@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Profile Update</h6>


    


        <form action="{{route('profile.store')}}" method="POST" class="forms-sample" enctype="multipart/form-data">
            @csrf



            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Full Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername2" value="{{ Auth::user()->name }}" placeholder="Name">
                    
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               
               
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" value="{{ Auth::user()->email }}" placeholder="Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
               
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off"  placeholder="Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               
                </div>
            </div>


            <img src="{{ asset('uploads/users/' . Auth::user()->image) }}" class="img-fluid" width="200" alt="{{ Auth::user()->name }}">

            <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-9">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror " id="image" autocomplete="off" placeholder="Image">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
               
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>

@endsection