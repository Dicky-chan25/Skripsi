<div class="container-fluid pb-5 page-content">
    <!-- Breadcrumb -->
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-university"></i> 
        <a href="<?php echo base_url('administrator') ?>" class="btn btn-sm">Administrator</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="<?php echo base_url('administrator/kelas') ?>" class="btn btn-sm">Kelas</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="#" class="btn btn-sm">Edit Kelas</a>
    </div>

    <!-- Form Edit Kelas -->
    <div class="row no-gutters justify-content-md-center">
        <div class="col-md-8 box-content">
            <?php echo $this->session->flashdata('pesan')?>
            <a href="<?php echo base_url('administrator/kelas') ?>" class="mb-3 btn font-weight-bold pl-0"><i class="fa fa-arrow-left mr-2"></i>Form Edit Kelas</a>
            <form method="POST" action="<?php echo base_url('administrator/kelas/update/').$kelas['id'] ?>" class="form-group mb-0">
                
                <!-- Tingkat Kelas -->
                <label for="tingkat">Tingkat</label>
                <select name="tingkat" class="form-control">
                    <option value="X" <?php if ($kelas['tingkat'] == 'X') { echo 'selected'; } ?>>X</option>
                    <option value="XI" <?php if ($kelas['tingkat'] == 'XI') { echo 'selected'; } ?>>XI</option>
                    <option value="XII" <?php if ($kelas['tingkat'] == 'XII') { echo 'selected'; } ?>>XII</option>
                </select>

                <!-- Nama kelas -->
                <label class="mt-3" for="nama">Nama Kelas</label> <?php echo form_error('nama', '<span class="text-danger small ml-3">','</span>')?>
                <input type="text" class="form-control" placeholder="Masukkan nama kelas" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $kelas['nama']); ?>">

                <!-- Submit Button -->
                <div class="text-right pt-3 mb-0">
                    <a href="<?php echo base_url('administrator/kelas') ?>" class="btn">Batal</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save mr-1"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


