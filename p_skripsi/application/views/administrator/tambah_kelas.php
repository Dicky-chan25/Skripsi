<div class="container-fluid pb-5 page-content">
    <!-- Breadcrumb -->
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-university"></i> 
        <a href="<?php echo base_url('administrator') ?>" class="btn btn-sm">Administrator</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="<?php echo base_url('administrator/kelas') ?>" class="btn btn-sm">Kelas</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="#" class="btn btn-sm">Tambah Kelas</a>
    </div>

    <!-- Form Tambah Kelas -->
    <div class="row no-gutters justify-content-md-center">
        <div class="col-md-8 box-content">
            <?php echo $this->session->flashdata('pesan')?>
            <a href="<?php echo base_url('administrator/kelas') ?>" class="mb-3 btn font-weight-bold pl-0"><i class="fa fa-arrow-left mr-2"></i>Form Tambah Kelas</a>
            <form method="POST" action="<?php echo base_url('administrator/kelas/proses_tambah_kelas') ?>" class="form-group mb-0">
                <!-- Tingkat Kelas -->
                <label for="tingkat">Tingkat</label>
                <select name="tingkat" class="form-control">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>

                <!-- Nama kelas -->
                <label class="mt-3" for="nama">Nama Kelas</label> <?php echo form_error('nama', '<span class="text-danger small ml-3">','</span>')?>
                <input type="text" class="form-control" placeholder="Masukkan nama kelas" name="nama">
                
                <!-- Submit Button -->
                <div class="text-right pt-3 mb-0">
                    <a href="<?php echo base_url('administrator/kelas') ?>" class="btn">Batal</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save mr-1"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


