<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <b>Dashboard</b> <small>Control Panel</small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fahome"></i> Dashboard</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $id_user = $this->session->userdata('id');
                            $user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
                            ?>
                            Anda Berhasil Login <br>
                            Anda login sebagai <?= $user->pengguna_nama; ?> <br>
                            Id Pengguna : <?= $this->session->userdata('id') ?> <br>
                            Username : <?= $this->session->userdata('username') ?><br>
                            level : <?= $this->session->userdata('level') ?><br> </div>
                    </div> <!-- /.card-body -->
            </div>
    </section><!-- /.card -->
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->