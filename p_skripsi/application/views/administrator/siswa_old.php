<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> SISWA
</div>
<?php echo $this->session->flashdata('pesan')?>

<?php echo anchor('administrator/siswa/tambah_siswa','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Siswa</button>')?>


<table class="table table-bordered table=striped table-hover">
  <tr>
    <th>NO</th>
    <th>NAMA SISWA</th>
    <th>NISN</th>
    <th>EMAIL</th>
    <th>KELAS</th>
    <th colspan="3">AKSI</th>
  </tr>
  
  <?php
  $no = 1;

  foreach ($data_siswa as $s) : ?>

    <tr>
      <td width="20px"><?php echo $no++ ?></td>
      <td><?php echo $s->name ?></td>
      <td><?php echo $s->nisn ?></td>
      <td><?php echo $s->email ?></td>
      <td><?php echo $s->kelas ?></td>
      <td width="20px"><?php echo anchor('administrator/siswa/detail/'.$s->id_siswa,'<div class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></div></td>')?>
      <td width="20px"><?php echo anchor('administrator/siswa/update/'.$s->id_siswa,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div></td>')?>
      <td width="20px"><?php echo anchor('administrator/siswa/delete/'.$s->id_siswa,'<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></td>')?>
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