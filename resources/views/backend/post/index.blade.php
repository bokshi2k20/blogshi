@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">


        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
            </p>
        @endif

        <h4 class="card-title">Striped Table</h4>
        
        <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">Search</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Search">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary">Search</button>
            </div>
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
                            Category
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Publish
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
                    @forelse($allposts as $allpost)
                    <tr>
                        <td class="py-1">
                            <img src="http://via.placeholder.com/36x36" alt="image">
                        </td>

                        <td>
                           {{$allpost->title}}
                        </td>
                        
                        <td>
                            
                            {{$allpost->category->title}}    
                        </td>

                        <td>
                           
                            {{$allpost->description}}
                        </td>
                        <td>
                            @if ($allpost->publish == 1)
                                published
                            @else
                                unpublished
                            @endif
                                
                        </td>
                        

                        <td>
                            {{$allpost->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{route('post.edit', $allpost->id)}}"><i data-feather="edit"></i></a>
                            <a href="{{route('post.delete', $allpost->id)}}"><i data-feather="trash" class="text-danger"></i></a>
                        </td>
                    </tr>
                    @empty
                    @endforelse

                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection