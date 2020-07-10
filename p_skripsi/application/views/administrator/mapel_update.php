<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Mata Pelajaran
</div>

<?php foreach($mapel as $mp) : ?>
    <form method="post" action="<?php echo base_url('administrator/mapel/update_aksi')?>">

        <div class="form-group">
            <lable>Nama Mata Pelajaran</lable>
            <input type="hidden" name="id_mapel" value="<?php echo $mp->id_mapel ?>">
            <input type ="text" name="nama_mapel" class="form-control" value="<?php echo $mp->nama_mapel ?>">
            <?php echo form_error('nama_mapel','<div class="text-danger small" ml-3>')?>
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