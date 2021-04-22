@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">


        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
            </p>
        @endif

        <h4 class="card-title">Search Result</h4>
        
        <div class="form-group row">
            <form action="{{route('category.search')}}" Method="GET" class="w-100">
                @csrf
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Search</label>
            <div class="col-sm-9">
                <input type="text" value="{{ $search ?? null }}" name="search" class="form-control" id="exampleInputUsername2" placeholder="Search">
            </div>
            <div class="col-sm-2 mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            Thumbnail
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Publish
                        </th>
                        <th>
                            Menu
                        </th>
                        <th>
                            Created At
                        </th>
                        <th>
                            Action
                        </th>
                       
                    
                    </tr>
                </thead>
                <tbody>
                    @forelse($allcategories as $allcategory)
                    <tr>
                        <td class="py-1">
                            <img src="http://via.placeholder.com/36x36" alt="image">
                        </td>
                        <td>
                           {{$allcategory->title}}
                        </td>
                        
                        <td>
                            @if ($allcategory->publish == 1)
                                published
                            @else
                                unpublished
                            @endif
                                
                        </td>
                        <td>
                            @if ($allcategory->menu == 1)
                                yes
                            @else
                                no
                            @endif
                            
                        </td>
                        <td>
                            {{$allcategory->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{route('category.edit', $allcategory->id)}}"><i data-feather="edit"></i></a>
                            <a href="{{route('category.delete', $allcategory->id)}}"><i data-feather="trash" class="text-danger"></i></a>
                            <a href="{{route('category.delete_all', $allcategory->id)}}"><i data-feather="alert-octagon" class="text-info"></i></a>
                        </td>
                    </tr>
                    @empty

                    <tr>
                        <td colspan="6" class="text-center">No Result</td>
                    </tr>
                    @endforelse

                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection