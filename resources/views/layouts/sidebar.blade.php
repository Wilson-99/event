
<!-- Container START -->
  <div class="container">
    <div class="row">
<!-- Sidebar START -->
      <div class="col-lg-3">

        <!-- Advanced filter responsive toggler START -->
				<!-- Divider -->
				<div class="d-flex align-items-center mb-4 d-lg-none">
					<button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<i class="fa-solid fa-sliders"></i>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">Sliders</span>
					</button>
				</div>
				<!-- Advanced filter responsive toggler END -->

        <nav class="navbar navbar-light navbar-expand-lg mx-0">
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
            <!-- Offcanvas header -->
						<div class="offcanvas-header">
							<button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
            <!-- Offcanvas body -->
            <div class="offcanvas-body p-0">
              <!-- Card START -->
              <div class="card w-100">
                <!-- Card body START -->
                <div class="card-body" id="sidebar">

                <!-- Side Nav START -->
                <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route('admin')}}"> <i class="fa-solid fa-minimize"></i> <span>Dashboard</span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('events')}}"><i class="fa-solid fa-calendar-plus"></i> <span>Events </span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('users')}}"><i class="fa-solid fa-user"></i> <span>Users </span></a>
                  </li>
                  <li class="nav-item" data-bs-dismiss="offcanvas">
                    <a class="nav-link d-flex mb-0" href="{{route ('reports')}}"><i class="fa-solid fa-clipboard"></i> <span>Reports </span></a>
                  </li>
                </ul>
                <!-- Side Nav END -->
              </div>
              <!-- Card body END -->
              </div>
            <!-- Card END -->
            </div>
            <!-- Offcanvas body -->
            <!-- Copyright -->
            <p class="small text-center mt-1">©2022 HDC Events </p>
          </div>
        </nav>
      </div>
      <!-- Sidebar END -->


