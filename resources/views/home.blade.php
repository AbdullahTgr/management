@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
<a href="{{route('users')}}"> 
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Employees</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{$users}}
                        <span class="text-success text-sm font-weight-bolder">User</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </a>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
<a href="{{route('tasks')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Completed Tasks</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{$completed_tasks}}
                        <span class="text-success text-sm font-weight-bolder">Compoleted Task</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</a>
          </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
<a href="{{route('tasks')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Incomplete Tasks</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{$incomplete_tasks}}
                        <span class="text-danger text-sm font-weight-bolder">Inompleted Task</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </a>
          </div>
          <div class="col-xl-3 col-sm-6">
              <a href="{{route('tasks')}}">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Tasks</p>
                      <h5 class="font-weight-bolder mb-0">
                        {{$tasks}}
                        <span class="text-success text-sm font-weight-bolder">Task</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </a>
          </div>
        </div>
































        <div class="row mt-4">
          <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column h-100">
                      <p class="mb-1 pt-2 text-bold">Built by developers</p>
                      <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                      <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                      <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                        Read More
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                    <div class="bg-gradient-primary border-radius-lg h-100">
                      <img src="assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                      <div class="position-relative d-flex align-items-center justify-content-center h-100">
                        <img class="w-100 position-relative z-index-2 pt-4" src="assets/img/illustrations/rocket-white.png" alt="rocket">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card h-100 p-3">
              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                  <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                    Read More
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
       



        
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  <i class="fa fa-heart"></i>
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link text-muted" target="_blank">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link pe-0 text-muted" target="_blank">License</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>

      </div>


 
@endsection


@section('scripts')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
@endsection