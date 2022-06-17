<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="<?=base_url(); ?>" >
                            <i class="ri-bar-chart-2-line me-1"></i> Dashboards
                        </a>
                    </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="ri-dashboard-line me-1"></i> Data Master
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?=base_url()?>admin/parameter" class="dropdown-item">Parameter</a>
							                <a href="<?=base_url()?>admin/user" class="dropdown-item">User</a>
                          </div>
                      </li>
                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->
