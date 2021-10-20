<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
<!-- CSS only -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>

{{-- <link rel="stylesheet" href="{{asset('css/argon-tables.css')}}">
 --}}
 <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{asset('css/nucleo-icons.css')}}">
<link rel="stylesheet" href="{{asset('css/nucleo-svg.css')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.css')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.css.map')}}">
<link rel="stylesheet" href="{{asset('css/soft-ui-dashboard.min.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/tasks.css')}}">

@if (!Auth::check())
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endif

</head> 
<body>
    <div id="app">
         @if (!isset($nav) && Auth::check())
         @include('layouts.sidebar')
         @endif 

         <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
            @if (!isset($nav) && Auth::check())
            @include('layouts.navbar')
            @endif
            @yield('content')
        </main>
    </div>

    @yield('scripts')  
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{asset('js/soft-ui-dashboard.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
 
    <script type="text/javascript">

      var notificationsCount     = parseInt($('.counter').text());
      var notifications          =  $('#notifications');

      if (notificationsCount <= 0) {
        $('.counter').removeClass('d-block');
        $('.counter').addClass('d-none');
      }

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;

      var pusher = new Pusher('4fed3cc1904f7b29666d', {
        encrypted: true,
        cluster: 'eu'

      });

      // Subscribe to the channel we specified in our Laravel Event
      var channel = pusher.subscribe('my-channel');

      // Bind a function to a Event (the full Laravel class)
      channel.bind('App\\Events\\NewRequest', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
        <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="{{route('sales')}}">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="https://png.pngitem.com/pimgs/s/463-4637103_icon-info-transparent-svg-new-icon-hd-png.png" class="avatar avatar-sm  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">` + data.data.title + `</span>
                    </h6>
                    <p class="text-sm text-secondary mb-0">
                         ` +  data.data.message  + `
                    </p>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      13 minutes ago
                    </p>
                  </div>
                </div>
              </a>
            </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);
       console.log(data.data);
        notificationsCount += 1;
        $('.counter').text(notificationsCount);
        $('.counter').removeClass('d-none');
        $('.counter').addClass('d-block');      });
    </script>
</body>
</html>
