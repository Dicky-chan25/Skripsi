<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> KATEGORI
</div>
<?php echo $this->session->flashdata('pesan')?>

<?php echo anchor('administrator/kategori/input','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kategori</button>')?>


<table class="table table-bordered table=strip table-hover">
  <tr>
    <th>NO</th>
    <th>KODE KATEGORI</th>
    <th>NAMA KATEGORI</th>
    <th colspan="2">AKSI</th>
  </tr>
  
  <?php
  $no = 1;

  foreach ($kategori as $jrs) : ?>

    <tr>
      <td width="20px"><?php echo $no++ ?></td>
      <td><?php echo $jrs->kode_jurusan ?></td>
      <td><?php echo $jrs->nama_jurusan ?></td>
      <td width="20px"><?php echo anchor('administrator/kategori/update/'.$jrs->id_jurusan,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div></td>')?>
      <td width="20px"><?php echo anchor('administrator/kategori/delete/'.$jrs->id_jurusan,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>')?>
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