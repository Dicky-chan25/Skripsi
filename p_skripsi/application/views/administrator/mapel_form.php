<div class="container-fluid">
<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form input Mata Pelajaran
</div>

    <form method="post" action="<?php echo base_url('administrator/mapel/tambah_mapel_aksi')?>">
        <div class="form-group">
            <lable>Nama Mata Pelajaran</lable>
            <input type ="text" name="nama_mapel"
            placeholder="Masukan Nama Mata Pelajaran" class="form-control">
            <?php echo form_error('nama_mapel','<div class="text-danger small" ml-3>')?>
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