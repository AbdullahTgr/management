<div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar"  >
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img style="max-width: 246px;height: 53px;" src="{{asset('imgs/brand.png')}}" class="img-fluid" alt="" srcset="">
     </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link link-dark {{Route::currentRouteName() == 'home' ? 'active' : ''}}" aria-current="page">
            <i class="bi bi-speedometer"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{route('users')}}" class="nav-link link-dark {{Route::currentRouteName() == 'users' ? 'active' : ''}}">
            <i class="bi bi-people"></i>
            Employees
        </a>
      </li>
      <li>
        <a href="{{route('tasks')}}" class="nav-link link-dark {{Route::currentRouteName() == 'tasks' ? 'active' : ''}}">
            <i class="bi bi-list-task"></i>
          Tasks
        </a>
      </li>
      <li style="display: none;">
        <a href="#" class="nav-link link-dark">
            <i class="bi bi-bell"></i>
          Notifications
        </a>
      </li>
      <li>
        <a href="{{route('settings')}}" class="nav-link link-dark {{Route::currentRouteName() == 'settings' ? 'active' : ''}}">
            <i class="bi bi-sliders"></i>
          Settings
        </a>
      </li>
      <li>
        <a href="{{route('useractions')}}" class="nav-link link-dark {{Route::currentRouteName() == 'useractions' ? 'active' : ''}}">
            <i class="bi bi-sliders"></i>
          User Pehavior
        </a>
      </li>
      
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{Auth::user()->name}}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>    
        </li>
      </ul>
    </div>
  </div>