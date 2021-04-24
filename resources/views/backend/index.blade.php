@extends('backend.layouts.app')
@section('content')
		<!-- partial -->
	
		<div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>


        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          
         

        <div class="row w-100">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">New Visitors</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ totalVisitors() }}</h3>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Posts</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ totalPosts() }}</h3>
                      
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Categories</h6>
      
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ totalCategories()}}</h3>
                        
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->

        <div class="row">
          <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                  <h6 class="card-title mb-0">Visitors</h6>
                  
                </div>
                <div class="row align-items-start mb-2">
                  <div class="col-md-7">
                    <p class="text-muted tx-13 mb-3 mb-md-0">Visitor is the income that a business has from its normal business activities, usually from the sale of goods and services to customers.</p>
                  </div>
                  
                </div>
                <div class="flot-wrapper">
                  <div id="piechart"></div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->


        <div class="row">
          <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Categories</h6>
                </div>
                <div class="d-flex flex-column">

              
                    
                    @forelse(categories() as $category)
                    <a href="javascript:;" class="d-flex align-items-center border-bottom mt-3 pb-3">
                      <div class="w-100 ">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{$category->title}}</h6>
                      </div>
                    </div>
                  </a>
                    @empty
                    @endforelse
                 
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Posts</h6>
                  
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">SL.</th>
                        <th class="pt-0">Post Name</th>
                        <th class="pt-0">Created Date</th>
                      </tr>
                    </thead>
                    <tbody>

                    @forelse(posts() as $post)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($post->title, 80)}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                      </tr>
                    @empty
                    @endforelse
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

			</div>
@endsection

			