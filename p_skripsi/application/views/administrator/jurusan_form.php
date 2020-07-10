<div class="container-fluid">
<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form input Jurusan
</div>

    <form method="post" action="<?php echo base_url('administrator/kategori/input_aksi')?>">
        <div class="form-group">
            <lable>Kode Jurusan</lable>
            <input type ="text" name="kode_jurusan"
            placeholder="Masukan Kode Jurusan" class="form-control">
            <?php echo form_error('kode_jurusan','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Nama Jurusan</lable>
            <input type ="text" name="nama_jurusan"
            placeholder="Masukan Nama Jurusan" class="form-control">
            <?php echo form_error('nama_jurusan','<div class="text-danger small" ml-3>')?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
</div>
      <!-- End of Main Content -->

<div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website Sekolah 2020</span>
    </div>
  </div>