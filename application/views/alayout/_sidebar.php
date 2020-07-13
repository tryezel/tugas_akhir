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


      <li class="treeview <?php if ($this->uri->segment(2) == 'datapemain') {
                            echo "active";
                          } ?>">
        <a href="#"><i class="fa fa-users"></i> <span>Data Pemain</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(3) == 'datapemain') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/pemain/index_laki') ?>"><i class="fa  fa-angle-right"></i> Laki-Laki</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == 'datapemain') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/pemain/index_cewek') ?>"><i class="fa  fa-angle-right"></i> Perempuan</a>
          </li>
        </ul>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'menulatihan') {
                            echo "active";
                          } ?>" data-toggle="tooltip" data-placement="right">
        <a class="nav-link" href="<?php echo base_url('admin/menu'); ?>">
          <i class="fa fa-tasks"></i>
          <span class="nav-link-text">Menu Latihan</span>
        </a>
      </li>



      <li class="treeview <?php if ($this->uri->segment(2) == 'perhitungan') {
                            echo "active";
                          } ?>">
        <a href="#"><i class="fa fa-calculator"></i> <span>Perhitungan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(3) == 'perhitungan') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/perhitungan/index_laki') ?>"><i class="fa  fa-angle-right"></i> Laki-Laki</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == 'perhitungan') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/perhitungan/index_cewek') ?>"><i class="fa  fa-angle-right"></i> Perempuan</a>
          </li>
        </ul>
      </li>


      <li class="treeview <?php if ($this->uri->segment(2) == 'laporan') {
                            echo "active";
                          } ?>">
        <a href="#"><i class="fa fa-file-text"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(3) == 'laporan') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/laporan/index_laki') ?>"><i class="fa  fa-angle-right"></i> Laki-Laki</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == 'perhitungan') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/laporan/index_cewek') ?>"><i class="fa  fa-angle-right"></i> Perempuan</a>
          </li>
        </ul>
      </li>
      <hr>

      <li class="treeview <?php if ($this->uri->segment(2) == 'laporan') {
                            echo "active";
                          } ?>">
        <a href="#"><i class="fa fa-file-text"></i> <span>Konfigurasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(3) == 'action') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/config/jurusan') ?>"><i class="fa  fa-angle-right"></i> Jurusan</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == 'action') {
                        echo "active";
                      } ?>">
            <a href="<?php echo site_url('admin/config/action') ?>"><i class="fa  fa-angle-right"></i> Action</a>
          </li>
      </li>
    </ul>
    </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>