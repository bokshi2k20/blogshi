@extends('frontend.layouts.app')
@section('content')
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
            
            
        
                        @forelse($posts as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{route('single.post', $post->id)}}" title="">
                                        <img src="{{ asset('uploads/thumbnails/' . thumb($post->id)) }}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->
            
                            <div class="blog-meta big-meta col-md-8">
                                <span class="bg-aqua"><a href="garden-category.html" title="">{{ $post->category->title}}</a></span>
                                <h4><a href="{{route('single.post', $post->id)}}" title="">{{ $post->title }}</a></h4>
                                <p>{{ Str::limit($post->description, 300) }}</p>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> {{ views($post)->count() }}</a></small>
                                <small><a href="{{route('single.post', $post->id)}}" title="">{{ $post->created_at->format('d F, Y') }}</a></small>
                                <small>{{$post->user->name}}</small>
                            </div><!-- end meta -->
                        </div>
                        <!-- end blog-box -->
            
                        <hr class="invis">
                        @empty
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