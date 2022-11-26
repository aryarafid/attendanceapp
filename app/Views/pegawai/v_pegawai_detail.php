<?php
?>
<?php $session = session(); ?>

<?= $this->extend('webframe') ?>
<?= $this->section('content') ?>

<h1 class="mt-4"> <?= $heading; ?> </h1>

<div class="card-body">
    <!-- <div class="row">

    </div> -->
    <div class="row mt-2">
        <div class="col-3">
            <div class="col float-right ">
                <div class="btn-group mb-2">
                    <a href="<?= base_url() . '/pegawai'; ?>" class="btn btn-primary float-left">
                        < Kembali </a>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <table class="table table-sm table-bordered table-striped">
                <tr>
                    <!-- <td>ID Pegawai</td>
                    <td style="width: 1px">:</td>
                    <td>zaza<?//=
                            //$data_pegawai['id_pegawai'];?></td>
                    <td></td> -->
                    <td>Jumlah Keterlambatan</td>
                    <td style="width: 1px">:</td>
                    <td>menit</td>
                </tr>
                <tr>
                    <!-- <td>Nama Pegawai</td>
                    <td style="width: 1px">:</td>
                    <td>zaza<?//=
                            //$data_pegawai['nama_pegawai']; ?></td>
                    <td></td> -->

                    <td>Jumlah Pulang Cepat</td>
                    <td style="width: 1px">:</td>
                    <td>menit</td>
                </tr>
                <tr>
                    <td>Jumlah Lembur</td>
                    <td style="width: 1px">:</td>
                    <td>menit</td>
            </table>
        </div>
        <div class="col-3"></div>

    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-lg mt-2">
            <table id="datatablesSimple" class="table-striped">
                <thead>
                    <tr>
                        <th style="text-align:center;">ID Pegawai</th>
                        <th style="text-align:center;">Nama Pegawai</th>
                        <th style="text-align:center;">Tanggal Absen</th>
                        <th style="text-align:center;">Waktu Masuk</th>
                        <th style="text-align:center;">Waktu Pulang</th>
                        <th style="text-align:center;">Selisih Wkt Masuk</th>
                        <th style="text-align:center;">Selisih Wkt Pulang</th>

                        <!-- <th style="text-align:center;">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pegawai as $dp) {
                    ?>
                        <tr>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['id_pegawai']; 
                                                                                        ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['nama_pegawai']; 
                                                                            ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['tanggal_absen']; ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['waktu_masuk']; ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['waktu_pulang']; ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['swm']; ?></td>
                            <td style="text-align:center; padding:1.2em;"><?= $dp['swp']; ?></td>

                            <!-- <td class="align-middle">
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="col-1"></div>

    </div>
</div>

<?= $this->endSection() ?>