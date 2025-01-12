<div class="offcanvas offcanvas-start container-fluid text-white bg-dark pt-3 pb-2 px-2 h-100" id="showSidebar">
    <div class="row align-items-center">
        <div class="col-6 text-start mt-1">
            <a href="{{ route('admin.homepage') }}" class="ms-1 text-decoration-none text-white">
                <img src="{{ asset('img/pupLogo.png') }}" style="height: 30px;">
                <span class="mt-2 fs-4 fw-bold align-middle">PUPTAPS</span>
            </a>
        </div>
        <div class="col-6 text-end mt-1">
            <button type="button" class="me-1 btn btn-md btn-outline-light d-inline d-sm-inline d-md-inline d-lg-inline d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#showSidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <div class="col-12 mt-4">
            <div class="w-100">
                <!-- Dashboard -->
                <a type="button" href="{{ route('admin.homepage') }}" class="btn btn-sm btn-dark w-100 text-start @yield('active-homepage') py-2">
                    <i class="fa-solid fa-house me-1"></i>
                    Dashboard
                </a>

                <hr class="my-1">
                <!-- Start: User Manager -->
                <a type="button" href="" class="btn btn-sm btn-dark w-100 text-start dropdown-toggle py-2" data-bs-toggle="collapse" data-bs-target="#userManager" aria-expanded="false">
                    <i class="fa-solid fa-user-group me-1"></i>
                    User Management
                </a>
                <div class="mt-1">
                    <div class="collapse show ms-4" id="userManager">
                        {{-- <a type="button" href="{{ route('adminUserManagement.getAlumniList') }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-alumni-list')">
                            <i class="fa-solid fa-file-arrow-up me-1"></i>
                            Upload Alumni List
                        </a> --}}
                        <a type="button" href="{{ route('adminUserManagement.getAlumniManager') }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-alumni-manager')">
                            <i class="fa-solid fa-user-graduate me-1"></i>
                            Alumni Manager
                        </a>
                    </div>
                </div>
                <!-- End: User Manager -->

                <hr class="my-1">
                <!-- Start: Career Management -->
                <a type="button" href="" class="btn btn-sm btn-dark w-100 text-start dropdown-toggle py-2" data-bs-toggle="collapse" data-bs-target="#careerManagement" aria-expanded="false">
                    <i class="fa-solid fa-briefcase me-1"></i>
                    Careers Management
                </a>
                <div class="mt-1">
                    <div class="collapse show ms-4" id="careerManagement">
                        <a type="button" href="{{ route('adminCareer.getAdminCareerIndex') }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-career-index')">
                            <i class="fa-solid fa-gauge me-1"></i>
                            Career Dashboard
                        </a>
                        <a type="button" href="{{ route('adminCareer.getCareerRequest') }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-career-approval')">
                            <i class="fa-solid fa-circle-check me-1"></i>
                            Posting Approval
                        </a>
                    </div>
                </div>
                <!-- End: Career Management -->

                <hr class="my-1">
                <!-- Start: Reports -->
                <a type="button" href="" class="btn btn-sm btn-dark w-100 text-start dropdown-toggle py-2" data-bs-toggle="collapse" data-bs-target="#reportsManager" aria-expanded="false">
                    <i class="fa-solid fa-chart-pie me-1"></i>
                    Reports
                </a>
                <div class="mt-1">
                    <div class="collapse show ms-4" id="reportsManager">
                        <a type="button" href="{{ route("adminReports.getFormReports") }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-form-reports')">
                            <i class="fa-solid fa-file-lines me-1"></i>
                            Form Reports
                        </a>
                        <a type="button" href="{{ route("adminReports.getTracerReports") }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-tracer-reports')">
                            <i class="fa-solid fa-business-time me-1"></i>
                            Tracer Reports
                        </a>
                        <a type="button" href="{{ route("adminReports.getUserReports") }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-user-reports')">
                            <i class="fa-solid fa-clipboard-user me-1"></i>
                            User Reports
                        </a>
                    </div>
                </div>
                <!-- End: Reports -->

                <hr class="my-1">
                <!-- Start: Account Settings -->
                <a type="button" href="{{ route("adminSettings.getAccountSettings") }}" class="btn btn-sm btn-dark w-100 text-start py-2 @yield('active-account-settings')">
                    <i class="fa-solid fa-gear me-1"></i>
                    Account Settings
                </a>
            </div>
        </div>
    </div>
</div>
