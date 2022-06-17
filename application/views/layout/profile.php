<li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <img src="<?=base_url()?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
        <span class="pro-user-name ms-1">
            <?=$this->session->userdata("nama")?> <i class="mdi mdi-chevron-down"></i>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
      <div class="dropdown-header noti-title">
          <h4 class="text-overflow m-0"><?=$this->session->userdata('user')->nama?></h4>
          <h6 class="text-overflow m-0"><?=$this->session->userdata('user')->level?></h6>
      </div>
      <div class="dropdown-divider"></div>
        <a href="<?=base_url()?>main/login" class="dropdown-item notify-item">
            <i class="ri-logout-box-line"></i>
            <span>Logout</span>
        </a>

    </div>
</li>
