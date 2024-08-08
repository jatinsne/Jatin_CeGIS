<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <div class="page-loader">
        <div class="bar"></div>
    </div>
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="/" class="b-brand text-primary">
                    <span class="fs-3 theme-version">Jatin CeGIS</span>
                </a>
            </div>
            <div class="navbar-content">
                <div class="card pc-user-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 ms-3 me-2">
                                <h6 class="mb-0"><?= "Name" ?></h6><small><?= "User" ?></small>
                            </div><a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink"><svg class="pc-icon">
                                    <use xlink:href="#custom-sort-outline"></use>
                                </svg></a>
                        </div>
                        <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                            <div class="pt-3">
                                <a href="/logout"><i class="ti ti-power"></i> <span>Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pc-navbar">
                    <li class="pc-item">
                        <a href="/dashboard" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption"><label>Masters</label></li>
                    <li class="pc-item">
                        <a href="/states" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">States</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="/district" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Districts</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="/tehsil" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Tehsil</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="/block" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Blocks</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption"><label>School Management</label></li>
                    <li class="pc-item">
                        <a href="/school" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Schools</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="/asset" class="pc-link">
                            <span class="pc-micon">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-story"></use>
                                </svg>
                            </span>
                            <span class="pc-mtext">Assets</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse"><a href="#" class="pc-head-link ms-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a></li>
                    <li class="pc-h-item pc-sidebar-popup"><a href="#" class="pc-head-link ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a></li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item"><a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><svg class="pc-icon">
                                <use xlink:href="#custom-sun-1"></use>
                            </svg></a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown"><a href="#!" class="dropdown-item" onclick="layout_change('dark')"><svg class="pc-icon">
                                    <use xlink:href="#custom-moon"></use>
                                </svg> <span>Dark</span> </a><a href="#!" class="dropdown-item" onclick="layout_change('light')"><svg class="pc-icon">
                                    <use xlink:href="#custom-sun-1"></use>
                                </svg> <span>Light</span> </a><a href="#!" class="dropdown-item" onclick="layout_change_default()"><svg class="pc-icon">
                                    <use xlink:href="#custom-setting-2"></use>
                                </svg> <span>Default</span></a></div>
                    </li>
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false"><img src="assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar"></a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Profile</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                    <div class="d-flex mb-1">
                                        <div class="flex-shrink-0"><img src="assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-35"></div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><?= "Name" ?></h6><span><a href="#" class="__cf_email__"><?= "User" ?></a></span>
                                        </div>
                                    </div>
                                    <hr class="border-secondary border-opacity-50">
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2">
                                                <use xlink:href="#custom-lock-outline"></use>
                                            </svg>
                                            <span>Change Password</span>
                                        </span>
                                    </a>
                                    <hr class="border-secondary border-opacity-50">
                                    <div class="d-grid mb-3">
                                        <a href="/logout" class="btn btn-primary">
                                            <svg class="pc-icon me-2">
                                                <use xlink:href="#custom-logout-1-outline"></use>
                                            </svg>Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>