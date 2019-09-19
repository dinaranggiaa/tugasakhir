<script>setInterval('autoRefresh()', 10000);</script>

<?php
    $perPage = 5;
    $page = $this->uri->segment(2);
    $no = isset($page) ? $page * $perPage - $perPage : 0;
?>

<!--SIDE BAR-->


<div class="center-bar">
    <h3>Scheduled SMS</h3>
  <div class="border"></div>

<br>
<br>
<br>

    <?= showFlashMessage() ?>
    <?= showMessage() ?>

    <?php if($schedule) : ?>
    <table class="table table-bordered table-condensed table-responsive">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tujuan</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($schedule as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->tanggal ?></td>
                <td><?= $row->jam ?></td>
                <td><?= $row->no_hp ?></td>
                <td><?= $row->pesan ?></td>
                <td>
                    <?= form_open('SmsScheduled/delete') ?>
                    <?= form_hidden('ID', $row->Id) ?>
                    <?= form_button(['type' => 'submit', 'content' => 'Delete',
                                'class' => 'btn btn-danger btn-xs tombol-konfirmasi',
                                'data-confirm' => 'Anda yakin akan menghapus data ini?']) ?>
                    <?= form_close()?>
                </td>
            </tr>
            <?php endforeach ?>
        <tbody>
    </table>

    <p>Jumlah : <strong><?= $totalRow ?></strong></p>

    <?php endif ?>

    <?= $pagination ?>

    <hr>
