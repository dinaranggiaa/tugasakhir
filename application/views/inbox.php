<script>setInterval('autoRefresh()', 10000);</script>

<?php
    $perPage = 5;
    $page = $this->uri->segment(2);
    $no = isset($page) ? $page * $perPage - $perPage : 0;
?>

<!--SIDE BAR-->
<?php $this->view('partials/sidebar')?>

<div class="center-bar">
    <h3>Pesan Masuk</h3>
  <div class="border"></div>

<br>
<br>
<br>

    <?= showFlashMessage() ?>
    <?= showMessage() ?>

    <?php if ($inbox) : ?>
    <table class="table table-bordered table-condensed table-responsive">
        <thead>
            <tr>
                <td>No</td>
                <td>Pengirim</td>
                <td>Waktu</td>
                <td>Pesan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inbox as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->SenderNumber ?></td>
                <td><?= $row->ReceivingDateTime ?></td>
                <td><?= $row->TextDecoded ?></td>
                <td>
                    <?= form_open('inbox/delete') ?>
                    <?= form_hidden('ID', $row->ID) ?>
                    <?= form_button(['type' => 'submit', 'content' => 'Delete', 
                                    'class' => 'btn btn-danger btn-xs tombol-konfirmasi', 
                                    'data-confirm' => "Anda yakin akan menghapus data ini?"]) ?>
                    <?= form_close() ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <p>Jumlah : <strong><?= $totalRow ?></strong></p>
    <?php endif ?>

    <?= $pagination ?>
    <hr>