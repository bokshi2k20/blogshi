@extends('frontend.layouts.app')
@section('content')
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
            
            
        
            @forelse($categories as $category)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="#" title="">
                                        <img src="{{asset('frontend/upload/garden_sq_01.jpg')}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->
            
                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="#" title="">{{ $category->title }}</a></h4>
                                <small><a href="#" title="">{{ $category->created_at->format('d F, Y') }}</a></small>
                            </div><!-- end meta -->
                        </div>
                        <!-- end blog-box -->
            
                        <hr class="invis">
                        @empty
                          No result found
                        @endforelse
            
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->
            
                <hr class="invis">
            
                {{-- <div class="row">
                    <div class="col-md-12">
                        
                    </div><!-- end col -->
                </div><!-- end row --> --}}
            </div><!-- end col -->
            
            @include('frontend.components.sidebar')
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection