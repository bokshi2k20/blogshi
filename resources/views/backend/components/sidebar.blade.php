<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Blog<span>Shi</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">



        <li class="nav-item nav-category">Main</li>



        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('theme.setup') }}" class="nav-link">
            <i class="link-icon" data-feather="bar-chart"></i>
            <span class="link-title">Theme Setup</span>
          </a>
        </li>






        {{-- category --}}
        <li class="nav-item nav-category">Post Categories</li>



        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="category">
            <i class="link-icon" data-feather="layers"></i>
            <span class="link-title">Categories</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="category">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">Add New Category</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('allcategory') }}" class="nav-link">All Categories</a>
              </li>
            
            </ul>
          </div>
        </li>


        {{-- POST --}}

        <li class="nav-item nav-category">Blog Posts</li>



        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Posts</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('post.create')}}" class="nav-link">Create New Post</a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">All Posts</a>
              </li>
            </ul>
          </div>
        </li>

        {{-- POST::END --}}
       
       
        
      </ul>
    </div>
  </nav>