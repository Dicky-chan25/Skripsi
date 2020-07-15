<div class="container-fluid pb-5 page-content">
    <!-- Breadcrumb -->
    <div class="alert alert-primary" role="alert">
        <i class="fas fa-university"></i> 
        <a href="<?php echo base_url('administrator') ?>" class="btn btn-sm">Administrator</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="<?php echo base_url('administrator/siswa') ?>" class="btn btn-sm">Siswa</a>
        <a href="#" class="btn btn-sm p-0">/</a>
        <a href="#" class="btn btn-sm">Edit Siswa</a>
    </div>

    <!-- Form Edit Siswa -->
    <?php echo form_open_multipart('administrator/siswa/update/'.$siswa['id']); ?>
        <div class="row no-gutters justify-content-md-center">
            <div class="col-md-12 box-content" style="padding-bottom: 0 !important; margin-bottom: -18px;">
                <a href="<?php echo base_url('administrator/siswa') ?>" class="mb-3 btn font-weight-bold pl-0"><i class="fa fa-arrow-left mr-2"></i>Form Edit Siswa</a>
            </div>
            <div class="col-md-6 box-content">
                
                <!-- Tingkat Siswa -->
                
                <div class="font-weight-bold form-title">Data Diri</div>

                <!-- Nama siswa -->
                <label class="mt-3" for="nama">Nama Lengkap</label> <span class="text-danger">*</span> <?php echo form_error('nama', '<span class="text-danger small ml-3">','</span>')?>
                <input type="text" class="form-control" name="nama" value="<?php echo ($this->input->post('nama') ? $this->input->post('nama') : $siswa['nama']); ?>">

                <div class="row no-gutters mt-3">
                    <!-- Jenis Kelamin -->
                    <div class="col-md-6 pr-1">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="">--- Pilih Jenis Kelamin ---</option>
                            <option value="L" <?php if ($siswa['jk'] == 'L') { echo 'selected'; } ?>>Laki-laki</option>
                            <option value="P" <?php if ($siswa['jk'] == 'P') { echo 'selected'; } ?>>Perempuan</option>
                        </select>
                    </div>
                    <!-- Agama -->
                    <div class="col-md-6 pl-1">
                        <label for="agama">Agama</label>
                        <select name="agama" class="form-control">
                            <option value="">--- Pilih Agama ---</option>
                            <option value="Islam" <?php if ($siswa['agama'] == 'Islam') { echo 'selected'; } ?>>Islam</option>
                            <option value="Kristen" <?php if ($siswa['agama'] == 'Kristen') { echo 'selected'; } ?>>Kristen</option>
                            <option value="Katholik" <?php if ($siswa['agama'] == 'Katholik') { echo 'selected'; } ?>>Katholik</option>
                            <option value="Hindu" <?php if ($siswa['agama'] == 'Hindu') { echo 'selected'; } ?>>Hindu</option>
                            <option value="Budha" <?php if ($siswa['agama'] == 'Budha') { echo 'selected'; } ?>>Budha</option>
                            <option value="Kong Hu Cu" <?php if ($siswa['agama'] == 'Kong Hu Cu') { echo 'selected'; } ?>>Kong Hu Cu</option>
                        </select>
                    </div>
                </div>

                <div class="row no-gutters mt-3 mb-3">
                    <!-- Tempat Lahir -->
                    <div class="col-md-6 pr-1">
                        <label for="pob">Tempat Lahir</label>
                        <input type="text" class="form-control" name="pob" value="<?php echo ($this->input->post('pob') ? $this->input->post('pob') : $siswa['pob']); ?>">
                    </div>
                    <!-- Tanggal Lahir -->
                    <div class="col-md-6 pl-1">
                        <label for="dob">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="dob" id="datepicker" value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $siswa['dob']); ?>">
                    </div>
                </div>

                <!-- Kelas -->
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control">
                    <option value="">--- Pilih Kelas ---</option>
                    <?php foreach ($kelas as $kl) : ?>
                        <option value="<?php echo $kl->id ?>" <?php if ($siswa['kelas_id'] == $kl->id) { echo 'selected'; } ?>><?php echo $kl->tingkat . ' ' . $kl->nama ?></option>
                    <?php endforeach; ?>
                </select>
                
                <!-- HP -->
                <label class="mt-3" for="hp">Nomor HP</label> <?php echo form_error('hp', '<span class="text-danger small ml-3">','</span>')?>
                <input type="text" class="form-control" name="hp" value="<?php echo ($this->input->post('hp') ? $this->input->post('hp') : $siswa['hp']); ?>">
                
                <!-- NISN -->
                <label class="mt-3" for="nisn">NISN</label> <?php echo form_error('nisn', '<span class="text-danger small ml-3">','</span>')?>
                <input type="number" class="form-control" name="nisn" value="<?php echo ($this->input->post('nisn') ? $this->input->post('nisn') : $siswa['nisn']); ?>">

                <!-- Data Akun -->
                <div class="font-weight-bold form-title mt-5">Akun</div>

                <!-- Email -->
                <label class="mt-3" for="email">Email</label> <?php echo form_error('email', '<span class="text-danger small ml-3">','</span>')?>
                <input type="text" class="form-control" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $siswa['email']); ?>">

                <!-- Password -->
                <!-- <div class="form-group password-field">
                    <label class="mt-3" for="password">Password</label> <?php echo form_error('password', '<span class="text-danger small ml-3">','</span>')?>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Kosongkan jika tidak ingin merubah password">
                    <button class="btn btn-show-password"><i class="fa fa-eye"></i></button>
                </div> -->

                <div class="font-weight-bold form-title mt-5">Data Wali Murid</div>

                <!-- Nama Wali Murid -->
                <label class="mt-3" for="wali_murid">Nama Wali Murid</label> 
                <input type="text" class="form-control" name="wali_murid" value="<?php echo ($this->input->post('wali_murid') ? $this->input->post('wali_murid') : $siswa['wali_murid']); ?>">

                <!-- HP Wali Murid -->
                <label class="mt-3" for="hp_wali_murid">HP Wali Murid</label> 
                <input type="text" class="form-control" name="hp_wali_murid" value="<?php echo ($this->input->post('hp_wali_murid') ? $this->input->post('hp_wali_murid') : $siswa['hp_wali_murid']); ?>">
                
            </div>

            <div class="col-md-6 box-content">
                
                <!-- Foto -->
                <div class="font-weight-bold form-title">Foto</div>
                
                <div class="mx-auto w-50">
                    <div class="form-group mt-3">
                        <label for="foto">Upload Foto</label>
                        <input type="file" id="input-file-now" class="dropify" name="foto" data-height="180" data-default-file="<?php echo base_url('assets/foto') . '/' . $siswa['foto'] ?>"/>
                    </div>
                </div>

                <!-- Data Alamat -->
                <div class="font-weight-bold form-title">Data Alamat</div>

                <!-- Alamat Lengkap -->
                <label for="alamat" class="mt-3">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" rows="8" class="form-control"> <?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $siswa['alamat']); ?> </textarea>

                <!-- RT / RW -->
                <div class="row no-gutters">
                    <div class="col-6 pr-1">
                        <div class="form-group">
                            <label for="rt" class="mt-3">RT</label>
                            <input type="number" id="rt" name="rt" class="form-control" value="<?php echo ($this->input->post('rt') ? $this->input->post('rt') : $siswa['rt']); ?>">
                        </div>
                    </div>
                    <div class="col-6 pl-1">
                        <div class="form-group">
                            <label for="rw" class="mt-3">RW</label>
                            <input type="number" id="rw" name="rw" class="form-control" value="<?php echo ($this->input->post('rw') ? $this->input->post('rw') : $siswa['rw']); ?>">
                        </div>
                    </div>
                </div>

                <!-- Desa -->
                <div class="form-group">
                    <label for="desa" class="mt-3">Desa/Kelurahan</label>
                    <input type="text" name="desa" class="form-control" value="<?php echo ($this->input->post('desa') ? $this->input->post('desa') : $siswa['desa']); ?>">
                </div>

                <!-- Kecamatan -->
                <div class="form-group">
                    <label for="kecamatan" class="mt-3">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="<?php echo ($this->input->post('kecamatan') ? $this->input->post('kecamatan') : $siswa['kecamatan']); ?>">
                </div>

                <!-- Kabupaten -->
                <div class="form-group">
                    <label for="kabupaten" class="mt-3">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="<?php echo ($this->input->post('kabupaten') ? $this->input->post('kabupaten') : $siswa['kabupaten']); ?>">
                </div>

                <!-- Provinsi -->
                <div class="form-group">
                    <label for="provinsi" class="mt-3">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" value="<?php echo ($this->input->post('provinsi') ? $this->input->post('provinsi') : $siswa['provinsi']); ?>">
                </div>

                <!-- Kode Pos -->
                <div class="form-group">
                    <label for="kodepos" class="mt-3">Kode Pos</label>
                    <input type="text" name="kodepos" class="form-control" value="<?php echo ($this->input->post('kodepos') ? $this->input->post('kodepos') : $siswa['kodepos']); ?>">
                </div>

                <!-- Submit Button -->
                <div class="text-right pt-3 mb-0">
                    <a href="<?php echo base_url('administrator/siswa') ?>" class="btn">Batal</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save mr-1"></i>Simpan</button>
                </div>
            </div>
        </div>
    <?php echo form_close(); ?>
</div>


<script>

    $('.dropify').dropify();

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });

    $( ".btn-show-password" ).click(function( event ) {
        event.preventDefault();
        var tipe = $("#password").attr("type");
        if (tipe == "text") {
            $("#password").attr("type", "password");
        } else {
            $("#password").attr("type", "text");
        }
    });
</script>