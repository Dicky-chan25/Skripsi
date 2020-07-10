<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> MATA PELAJARAN
</div>
<?php echo $this->session->flashdata('pesan')?>

<?php echo anchor('administrator/mapel/tambahmapel','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Mata Pelajaran</button>')?>


<table class="table table-bordered table=striped table-hover">
  <tr>
    <th>NO</th>
    <th>MATA PELAJARAN</th>
    <th colspan="2">AKSI</th>
  </tr>
  
  <?php
  $no = 1;

  foreach ($mapel as $mp) : ?>

    <tr>
      <td width="20px"><?php echo $no++ ?></td>
      <td><?php echo $mp->nama_mapel ?></td>
      <td width="20px"><?php echo anchor('administrator/mapel/update/'.$mp->id_mapel,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div></td>')?>
      <td width="20px"><?php echo anchor('administrator/mapel/delete/'.$mp->id_mapel,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>')?>
    </tr>

  <?php endforeach; ?>
  </table>
</div>

</div>
      <!-- End of Main Content -->

<div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website Sekolah 2020</span>
    </div>
  </div>