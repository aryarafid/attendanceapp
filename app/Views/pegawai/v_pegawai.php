<?php
?>
<?php $session = session(); ?>

<?= $this->extend('webframe') ?>
<?= $this->section('content') ?>

<h1 class="mt-4"> <?= $heading; ?> </h1>

<div class="card-body">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-lg">
            <table id="datatablesSimple" class="table-sm">
                <thead>
                    <tr>
                        <th style="text-align:center;">ID Pegawai</th>
                        <th style="text-align:center;">Nama Pegawai</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pegawai as $dp) {
                    ?>
                        <tr>
                            <td style="width: 20%; text-align:center; padding:1.2em;">
                                <?= $dp['id_pegawai']; ?>
                            </td>
                            <td style="text-align:center; padding:1.2em;">
                                <?= $dp['nama_pegawai']; ?>
                            </td>
                            <td class="align-middle" style="width: 10%;">
                                <a href="<?= base_url() ?>/pegawai/pegawai_detail/<?= $dp['id_pegawai']; ?>">
                                    <button type="button" class="btn btn-success">Detail</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="col-2"></div>

    </div>
</div>

<?= $this->endSection() ?>