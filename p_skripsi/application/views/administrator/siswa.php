<div class="container-fluid pb-5 page-content">
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-university"></i> 
        <a href="<?php echo base_url('administrator') ?>" class="btn btn-sm">Administrator</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="#" class="btn btn-sm">Data Siswa</a>
    </div>
    <div class="row no-gutters justify-content-md-center">
        <div class="col-md-12 box-content">
            <?php echo $this->session->flashdata('pesan')?>
            <?php echo anchor('administrator/siswa/tambah_siswa','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah siswa</button>')?>
            <?php echo validation_errors(); ?>
            <table class="table table-bordered table=striped table-hover">
                <thead>
                    <tr>
                        <td class="mepetin">No</td>
                        <td>Nama siswa</td>
                        <td>JK</td>
                        <td>Kelas</td>
                        <td class="mepetin text-center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($siswa as $s) : ?>
                    <tr>
                        <td class="mepetin text-center"><?php echo $no++ ?></td>
                        <td><?php echo $s->nama ?></td>
                        <td class="mepetin text-center"><?php echo $s->jk ?></td>
                        <td class="mepetin">
                            <?php 
                                if ($s->kelas_id) {
                                    $kelas = $this->global_model->get_detail('kelas', $s->kelas_id);
                                    if ($kelas) {
                                        echo $kelas['tingkat'] . ' ' . $kelas['nama'];
                                    }
                                } 
                            ?>
                        </td>
                        <td class="mepetin text-center">
                            <?php echo anchor('administrator/siswa/view/'.$s->id,'<div class="btn btn-sm btn-success"><i class="fa fa-eye"></i></div>')?>
                            <?php echo anchor('administrator/siswa/update/'.$s->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
                            <button data-id="<?php echo $s->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.table').DataTable({
        "columnDefs": [{
            "targets": 4,
            "orderable": false
        }]
    });
    $(".table").removeAttr("style");
});

$( ".btn-danger" ).click(function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        var id = $(this).attr("data-id");
        if (result.value) {
            window.location.href = "<?php echo base_url('administrator/siswa/delete/') ?>" + id;
        }
    })
});
</script>

