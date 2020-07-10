<div class="container-fluid pb-5 page-content">
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-university"></i> 
        <a href="<?php echo base_url('administrator') ?>" class="btn btn-sm">Administrator</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="#" class="btn btn-sm">Kelas</a>
    </div>
    <div class="row no-gutters justify-content-md-center">
        <div class="col-md-8 box-content">
            <?php echo $this->session->flashdata('pesan')?>
            <?php echo anchor('administrator/kelas/tambah_kelas','<button class="btn btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Kelas</button>')?>
            <?php echo validation_errors(); ?>
            <table class="table table-bordered table=striped table-hover">
                <thead>
                    <tr>
                        <td class="mepetin">No</td>
                        <td>Nama Kelas</td>
                        <td class="mepetin text-center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kelas as $kl) : ?>
                    <tr>
                        <td class="mepetin"><?php echo $no++ ?></td>
                        <td><?php echo $kl->tingkat . ' ' . $kl->nama ?></td>
                        <td class="mepetin text-center">
                            <?php echo anchor('administrator/kelas/update/'.$kl->id,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>')?>
                            <button data-id="<?php echo $kl->id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
            "targets": 2,
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
            window.location.href = "<?php echo base_url('administrator/kelas/delete/') ?>" + id;
        }
    })
});
</script>

