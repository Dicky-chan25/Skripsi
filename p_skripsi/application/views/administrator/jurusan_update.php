<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Jurusan
</div>

<?php foreach($kategori as $jrs) : ?>
    <form method="post" action="<?php echo base_url('administrator/kategori/update_aksi')?>">

        <div class="form-group">
            <lable>Kode Jurusan</lable>
            <input type="hidden" name="id_jurusan" value="<?php echo $jrs->id_jurusan ?>">
            <input type ="text" name="kode_jurusan" class="form-control" value="<?php echo $jrs->kode_jurusan ?>">
            <?php echo form_error('kode_jurusan','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Nama Jurusan</lable>
            <input type ="text" name="nama_jurusan" class="form-control" value="<?php echo $jrs->nama_jurusan ?>">
            <?php echo form_error('nama_jurusan','<div class="text-danger small" ml-3>')?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

<?php endforeach; ?>

        

</div>
</div>
      <!-- End of Main Content -->

<div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website Sekolah 2020</span>
    </div>
  </div>