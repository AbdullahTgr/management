  @php
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
       // $notifications->markAsRead();
  @endphp
  <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
 
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="{{route('settings')}}" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <span  class="counter {{count($notifications) > 0 ? 'd-block' : 'd-none' }}">{{count($notifications)}}</span>

              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" id="notifications" aria-labelledby="dropdownMenuButton">
                @forelse ($notifications as $not)
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="{{route('sales')}}">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="https://png.pngitem.com/pimgs/s/463-4637103_icon-info-transparent-svg-new-icon-hd-png.png" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">{{$not->data['title']}}</span> 
                        </h6>
                        <p class="text-sm text-secondary mb-0">
                          {{$not->data['message']}}
                        </p>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          {{$not->created_at}}
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                @empty
                    
                @endforelse
              


              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>



















