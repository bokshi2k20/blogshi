@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Subscription Table</h4>
       

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                       
                        <th>
                            Email
                        </th>
                        
                        <th>
                            Created_at
                        </th>

                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribes as $sub)

                    <tr>
                        
                        <td>
                            {{$sub->email}}
                        </td>
                        
                        <td>
                            {{$sub->created_at->diffForHumans()}}
                        </td>

                        <td>
                           <a href="{{route('subscribe.delete', $sub->id)}}" class="btn-sm btn-danger">Delete</a>
                        </td>
                        
                    </tr>

                    @empty

                    <tr>
                        
                        <td colspan="3" class="text-center">
                            No emails found
                        </td>
                        
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection