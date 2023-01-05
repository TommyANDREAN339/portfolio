<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/employees*') ? 'active' : '' }}" href="/dashboard/employees">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Employees
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Posts
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/patterns*') ? 'active' : '' }}" href="/dashboard/patterns">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Patterns
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/leaves*') ? 'active' : '' }}" href="/dashboard/leaves">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Leaves
          </a>
        </li>
        
      </ul>
     
     @can('admin')
     <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1
     text-muted">
      <span>Administrator</span>
     </h6>
     <ul class="nav flex-column">
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid" class="align-text-bottom"></span>
            Categories
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/cities*') ? 'active' : '' }}" href="/dashboard/cities">
          <span data-feather="grid" class="align-text-bottom"></span>
            Cities
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/providers*') ? 'active' : '' }}" href="/dashboard/providers">
          <span data-feather="grid" class="align-text-bottom"></span>
            Providers
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/branchs*') ? 'active' : '' }}" href="/dashboard/branchs">
          <span data-feather="grid" class="align-text-bottom"></span>
            Branch
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/leapes*') ? 'active' : '' }}" href="/dashboard/leapes">
          <span data-feather="grid" class="align-text-bottom"></span>
            Leave Type
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/organisations*') ? 'active' : '' }}" href="/dashboard/organisations">
          <span data-feather="grid" class="align-text-bottom"></span>
            Organisation
        </a>
       </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/units*') ? 'active' : '' }}" href="/dashboard/units">
          <span data-feather="grid" class="align-text-bottom"></span>
            Unit
        </a>
       </li>
     </ul>
     @endcan
    </div>
  </nav>