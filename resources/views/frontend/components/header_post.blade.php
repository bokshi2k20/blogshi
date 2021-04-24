<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            @forelse(posts()->take(3) as $post)
            <div class="left-side">
                <div class="masonry-box post-media">
                     <img src="{{ asset('uploads/thumbnails/' . thumb($post->id)) }}" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-aqua"><a href="{{ route('single.post', $post->id) }}" title="{{$post->category->title}}"></a></span>
                                <h4><a href="{{ route('single.post', $post->id) }}" title="">{{$post->title}}</a></h4>
                                <small><a href="{{ route('single.post', $post->id) }}" title="">{{$post->created_at->format('d F,Y')}}</a></small>
                                <small><a href="{{ route('single.post', $post->id) }}" title="">{{$post->user->name}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end left-side -->
            @empty  
            @endforelse

        </div><!-- end masonry -->
    </div>
</section>