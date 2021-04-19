<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Noble<span>UI</span>
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



        <li class="nav-item nav-category">web apps</li>



        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Email</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
              </li>
              <li class="nav-item">
                <a href="pages/email/read.html" class="nav-link">Read</a>
              </li>
              <li class="nav-item">
                <a href="pages/email/compose.html" class="nav-link">Compose</a>
              </li>
            </ul>
          </div>
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
            </ul>
          </div>
        </li>
       
       
        
      </ul>
    </div>
  </nav>