<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Search</h2>
            <form action="{{route('frontend.post.search')}}" method="GET" class="form-inline search-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search on the site">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- end widget -->

        
        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">


                   @forelse(posts()->take(3) as $post)
                    <a href="{{route('single.post', $post->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{ asset('uploads/thumbnails/' . thumb($post->id)) }}" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{Str::limit($post->title,30)}}</h5>
                            <small>{{$post->created_at->format('d F,y')}}</small>
                        </div>
                    </a>
                    @empty
                    @endforelse


                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->




        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    @forelse(categories() as $category)
                    <li><a href="{{route('category.posts', $category->id)}}">{{$category->title}}<span>({{ postCount($category->id) }})</span></a></li>
                    @empty
                      no result found
                    @endforelse

                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->