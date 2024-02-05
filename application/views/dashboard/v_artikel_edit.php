<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Artikel</b> <small>manajemen artikel</small></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('dashboard/artikel'); ?>"><button class="btn btn-sm btn-success">Kembali</button></a>
                <br><br>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-file"></i> Data Artikel <small>Edit Artikel</small>
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <?php foreach ($artikel as $a) { ?>
                            <form method="post" action="<?php echo base_url('dashboard/artikel_update'); ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label>Judul Artikel</label>
                                            <input type="hidden" name="id" value="<?php echo $a->artikel_id; ?>">
                                            <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Artikel . . ." value="<?php echo $a->artikel_judul ?>">
                                            <br>
                                            <?php echo form_error('judul'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Konten Artikel</label>
                                            <?php echo form_error('konten'); ?>
                                            <textarea class="form-control" name="konten" id="summernote"><?php echo $a->artikel_konten; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option value="">-- Pilih Kategori --</option>
                                                <?php foreach ($kategori as $k) { ?>
                                                    <option <?php if ($a->artikel_kategori == $k->kategori_id) {
                                                                echo "selected='selected'";
                                                            } ?> value="<?php echo $k->kategori_id; ?>">
                                                        <?php echo $k->kategori_nama; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            <?php echo form_error('kategori'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" name="sampul" class="form-control">
                                            <br>
                                            <?php if (isset($gambar_error)) {
                                                echo $gambar_error;
                                            }
                                            echo form_error('sampul');
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="status" value="Draft" class="btn btn-sm btn-warning btn-block">
                                            <input type="submit" name="status" value="Publish" class="btn btn-sm btn-success btn-block">
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </form>
                        <?php } ?>
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section><!-- /.content -->
</div>