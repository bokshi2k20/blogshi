@extends('backend.layouts.app')

@section('content')
	
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Horizontal Form</h6>
        <form class="forms-sample">



            <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email">
                </div>
            </div>




            <div class="form-group row">
                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email">
                </div>
            </div>



            <div class="form-group row">
                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                </div>
            </div>



            <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Password">
                </div>
            </div>


            <div class="form-group row">
                <label for="exampleFormControlSelect1">Select Input</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option selected disabled>Select your age</option>
                    <option>12-18</option>
                    <option>18-22</option>
                    <option>22-30</option>
                    <option>30-60</option>
                    <option>Above 60</option>
                </select>
            </div>



            <div class="form-group row">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>


            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Default checkbox
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" checked class="form-check-input">
                        Checked
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" disabled class="form-check-input">
                        Disabled checkbox
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" disabled checked>
                        Disabled checked
                    </label>
                </div>
            </div>




            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </form>
    </div>
</div>

@endsection