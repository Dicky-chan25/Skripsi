<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university"></i> Form Update Data Siswa
</div>

    <?php foreach($data_siswa as $ds) : ?>
    <form method="post" action="<?php echo base_url('administrator/siswa/update_aksi')?>">

        <div class="form-group">
            <lable>Nama</lable>
            <input type="hidden" name="id_siswa" value="<?php echo $ds->id_siswa ?>">
            <input type ="text" name="name" class="form-control" value="<?php echo $ds->name ?>">
            <?php echo form_error('name','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Email</lable>
            <input type ="text" name="email" class="form-control" value="<?php echo $ds->email ?>">
            <?php echo form_error('email','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Password</lable>
            <input type ="password" name="password" class="form-control" value="<?php echo $ds->password ?>" readonly>
        </div>

        <div class="form-group">
            <lable>NISN</lable>
            <input type ="text" name="nisn" class="form-control" value="<?php echo $ds->nisn ?>">
            <?php echo form_error('nisn','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Kelas</lable>
            <input type ="text" name="kelas" class="form-control" value="<?php echo $ds->kelas ?>" readonly>
            
        </div>

        <div class="form-group">
            <lable>Jenis Kelamin</lable>
            <select name="kelamin" class="form-control" value="<?php echo $ds->kelamin ?>">
                <option >Laki-laki</option>
                <option >Perempuan</option></select>
            <?php echo form_error('kelamin','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Tempat Lahir</lable>
            <input type ="text" name="tempat_lahir" class="form-control" value="<?php echo $ds->tempat_lahir ?>">
            <?php echo form_error('tempat_lahir','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Tanggal Lahir</lable>
            <input type ="date" name="tanggal_lahir" class="form-control" value="<?php echo $ds->tanggal_lahir ?>">
            <?php echo form_error('tanggal_lahir','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Agama</lable>
            <select name="agama" class="form-control" value="<?php echo $ds->agama ?>">
                <option >Islam</option>
                <option >Kristen</option>
                <option >Hindu</option>
                <option >Budha</option></select>
            <?php echo form_error('agama','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>No Hp</lable>
            <input type ="text" name="hp" class="form-control" value="<?php echo $ds->hp ?>">
            <?php echo form_error('hp','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Alamat</lable>
            <input type ="text" name="alamat" class="form-control" value="<?php echo $ds->alamat ?>">
            <?php echo form_error('alamat','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>RT/RW</lable>
            <input type ="text" name="rtrw" class="form-control" value="<?php echo $ds->rtrw ?>">
            <?php echo form_error('rtrw','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Kelurahan</lable>
            <input type ="text" name="kel" class="form-control" value="<?php echo $ds->kel ?>">
            <?php echo form_error('kel','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Kecamatan</lable>
            <input type ="text" name="kec" class="form-control" value="<?php echo $ds->kec ?>">
            <?php echo form_error('kec','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Kabupaten</lable>
            <input type ="text" name="kab" class="form-control" value="<?php echo $ds->kab ?>">
            <?php echo form_error('kab','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
            <lable>Provinsi</lable>
            <input type ="text" name="prov" class="form-control" value="<?php echo $ds->prov ?>">
            <?php echo form_error('prov','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <lable>Kode Pos</lable>
            <input type ="text" name="kode_p" class="form-control" value="<?php echo $ds->kode_p ?>">
            <?php echo form_error('kode_p','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <lable>Nama Wali Murid</lable>
            <input type ="text" name="wali_murid" class="form-control" value="<?php echo $ds->wali_murid ?>">
            <?php echo form_error('wali_murid','<div class="text-danger small" ml-3>')?>
        </div>
        <div class="form-group">
            <lable>Hp Wali Murid</lable>
            <input type ="text" name="hp_wali_murid" class="form-control" value="<?php echo $ds->hp_wali_murid ?>">
            <?php echo form_error('hp_wali_murid','<div class="text-danger small" ml-3>')?>
        </div>

        <div class="form-group">
        <?php foreach($detail as $dt) : ?>

            <img src="<?php echo base_url().'assets/img/siswa/'.$ds->image ?>" style="width:150px">


        <?php endforeach ; ?><br><br>
            <lable>Photo</lable><br>
            <input type="file" name="userfile" value="<?php echo $ds->image ?>" >
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