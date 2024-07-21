<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-bolt text-white" style="font-size: 24px;"></i> <!-- Bolt icon -->
		</div>
		<div class="sidebar-brand-text mx-3 text-white">
			<span class="font-weight-bold">ElektroStore</span>
			<sup class="text-muted" style="font-size: 12px;">Stok</sup>
		</div>
	</a>

  <hr class="sidebar-divider my-0">

  <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('dashboard') ?>">
      <i class="fas fa-fw fa-chart-line text-white"></i> <!-- Chart line icon -->
      <span class="text-white">Dashboard</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading text-white">
    Master
  </div>

  <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('barang') ?>">
      <i class="fas fa-fw fa-box-open text-white"></i> <!-- Box open icon -->
      <span class="text-white">Stok Barang</span>
    </a>
  </li>

  <li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('customer') ?>">
      <i class="fas fa-fw fa-user-friends text-white"></i> <!-- User friends icon -->
      <span class="text-white">Data Pengambil</span>
    </a>
  </li>

  <li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('supplier') ?>">
      <i class="fas fa-fw fa-truck text-white"></i> <!-- Truck icon -->
      <span class="text-white">Data Sumber Barang</span>
    </a>
  </li>

  <li class="nav-item <?= $aktif == 'petugas' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('petugas') ?>">
      <i class="fas fa-fw fa-user-cog text-white"></i> <!-- User cog icon -->
      <span class="text-white">Data User</span>
    </a>
  </li>

  <hr class="sidebar-divider">
  
  <div class="sidebar-heading text-white">
    Transaksi
  </div>

  <li class="nav-item <?= $aktif == 'penerimaan' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('penerimaan') ?>">
      <i class="fas fa-fw fa-arrow-circle-up text-white"></i> <!-- Arrow circle up icon -->
      <span class="text-white">Barang Masuk</span>
    </a>
  </li>

  <li class="nav-item <?= $aktif == 'pengeluaran' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('pengeluaran') ?>">
      <i class="fas fa-fw fa-arrow-circle-down text-white"></i> <!-- Arrow circle down icon -->
      <span class="text-white">Barang Keluar</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  <?php if ($this->session->login['role'] == 'admin'): ?>
    <div class="sidebar-heading text-white">
      Pengaturan
    </div>

    <li class="nav-item <?= $aktif == 'pengguna' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('pengguna') ?>">
        <i class="fas fa-fw fa-users-cog text-white"></i> <!-- Users cog icon -->
        <span class="text-white">Manajemen Pengguna</span>
      </a>
    </li>

    <li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('toko') ?>">
        <i class="fas fa-fw fa-laptop text-white"></i> <!-- Laptop icon -->
        <span class="text-white">Profil SIM</span>
      </a>
    </li>

	<li class="nav-item <?= $aktif == 'backup' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('backup') ?>">
      <i class="fas fa-fw fa-database text-white"></i> <!-- Database icon -->
      <span class="text-white">Backup Data</span>
    </a>
  </li>

  <?php endif;?>

  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>