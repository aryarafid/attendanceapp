<?php
?>
<?php $session = session(); ?>

<?= $this->extend('webframe') ?>
<?= $this->section('content') ?>

<h1 class="mt-4"> <?= $heading; ?> </h1>

<div class="card-body">
    <!-- <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-black mb-4">
                <div class="card-body">
                    <h3>150</h3>
                    Karyawan Terlambat
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-black mb-4">
                <div class="card-body">
                    <h3>150</h3>
                    Karyawan Lembur
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h3>150</h3>
                    Karyawan Pulang Cepat
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div> -->


    <table id="datatablesSimple" class="table-striped">
        <thead style="text-align:center;">
            <tr style="text-align:center;">
                <th style="text-align:center;">No. Absensi</th>
                <th style="text-align:center;">ID Pegawai</th>
                <th style="text-align:center;">Tanggal Absensi</th>
                <th style="text-align:center;">Waktu Masuk</th>
                <th style="text-align:center;">Waktu Pulang</th>
            </tr>
        </thead>
        <tbody style="text-align:center;">
            <?php foreach ($data_absensi as $da) {
            ?>
                <tr>
                    <td style="width: 15%; text-align:center;"><?= $da['id_absensi']; ?></td>
                    <td style="text-align:center;">
                        <a href="<?= base_url() ?>/pegawai/pegawai_detail/<?= $da['id_pegawai']; ?>">
                            <?= $da['id_pegawai']; ?>
                        </a>
                    </td>
                    <td><?= $da['tanggal_absen']; ?></td>
                    <td><?= $da['waktu_masuk']; ?></td>
                    <td><?= $da['waktu_pulang']; ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>