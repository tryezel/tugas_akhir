<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="nav-item <?php if ($this->uri->segment(2) == 'home') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?php echo base_url('admin/home'); ?>">
          <i class="fa fa-fw fa-home"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <hr>
      <li class="nav-item <?php if ($this->uri->segment(2) == 'datapemain') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="<?php echo base_url('admin/pemain'); ?>">
          <i class="fa fa-users"></i>
          <span class="nav-link-text">Data Pemain</span>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'menulatihan') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="<?php echo base_url('admin/menu'); ?>">
          <i class="fa fa-tasks"></i>
          <span class="nav-link-text">Menu Latihan</span>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'perhitungan') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="<?php echo base_url('admin/perhitungan'); ?>">
          <i class="fa fa-calculator"></i>
          <span class="nav-link-text">Perhitungan</span>
        </a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'laporan') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="<?php echo base_url('admin/laporan'); ?>">
          <i class="fa fa-file-text"></i>
          <span class="nav-link-text">Laporan</span>
        </a>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>