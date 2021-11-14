<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BlogApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mohammed AL Shurafa</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/posts" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                My Posts
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Posts</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Edit Posts
            </div>
            <div class="card-body">
                <form action="/admin/posts/updatedata" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="judul">Judul Postingan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value ="<?= $judul; ?>">
                                <?php if ($validation->hasError('judul')): ?>
                                  <div class="invalid-feedback">
                                    <?= $validation->getError("judul"); ?>
                                    </div>
                                  <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="slug">slug</label>
                                <input type="text" class="form-control <?= ($validation->hasError('slug')) ? 'is-invalid' : ''; ?>" id="slug" name="slug" readonly value ="<?= $slug; ?> ">
                                <?php if ($validation->hasError('slug')): ?>
                                  <div class="invalid-feedback">
                                    <?= $validation->getError("slug"); ?>
                                    </div>
                                  <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori Postingan</label>
                                <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" id="kategori" name="kategori" value ="<?= $kategori; ?>">
                                <?php if ($validation->hasError('kategori')): ?>
                                  <div class="invalid-feedback">
                                    <?= $validation->getError("kategori"); ?>
                                    </div>
                                  <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="author" name="author" value ="<?= $author; ?>">
                                <?php if ($validation->hasError('author')): ?>
                                  <div class="invalid-feedback">
                                    <?= $validation->getError("author"); ?>
                                    </div>
                                  <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="deskripsi">Deskripsi Postingan</label>
                            <br>
                            <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" name="deskripsi" id="deskripsi" <?= $deskripsi; ?>></textarea>
                            <?php if ($validation->hasError('deskripsi')): ?>
                                  <div class="invalid-feedback">
                                    <?= $validation->getError("deskripsi"); ?>
                                    </div>
                                  <?php endif; ?>

                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> Update Data
                    </form>
                </form>
            </div>
        </div>
    </div>
    <!--bakal dirubah -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?= $this->endSection(); ?>

<?= $this->section('myscript');?>
<script>
    $('#deskripsi').summernote()
</script>
<?= $this->endSection();?>