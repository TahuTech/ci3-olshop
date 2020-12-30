<div class="col-sm-12">
    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
        echo $this->session->flashdata('pesan');
        echo '</h5></div>';
    }
    ?>
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <!-- Pesanan Masuk admin -->
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) {  ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tanggal_order ?></td>
                                <td>
                                    <b><?= $value->expedisi ?></b><br>
                                    Paket: <?= $value->paket ?><br>
                                    Ongkir: Rp. <?= number_format($value->ongkir, 0) ?>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Sudah Bayar</span><br>
                                        <span class="badge badge-primary">Menunggu Verifikasi</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-xm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>"> Cek Bukti Bayar</button>
                                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-xm btn-flat btn-primary"> Proses </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <!-- Pesanan di proses Admin -->
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th></th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) {  ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tanggal_order ?></td>
                                <td>
                                    <b><?= $value->expedisi ?></b><br>
                                    Paket: <?= $value->paket ?><br>
                                    Ongkir: Rp. <?= number_format($value->ongkir, 0) ?>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>

                                    <span class="badge badge-primary">Pesanan Diproses</span>

                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-xm btn-flat btn-primary"><i class="fa fa-paper-plane" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"> Kirim </i> </button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <!-- Pesanan Dikirim admin -->
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) {  ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tanggal_order ?></td>
                                <td>
                                    <b><?= $value->expedisi ?></b><br>
                                    Paket: <?= $value->paket ?><br>
                                    Ongkir: Rp. <?= number_format($value->ongkir, 0) ?>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>

                                    <span class="badge badge-success"> Dikirim</span>

                                </td>
                                <td>
                                    <h4><?= $value->no_resi ?></h4>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <!-- Pesanan Selesai Admin -->
                    <table class="table">
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal Order</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) {  ?>
                            <tr>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tanggal_order ?></td>
                                <td>
                                    <b><?= $value->expedisi ?></b><br>
                                    Paket: <?= $value->paket ?><br>
                                    Ongkir: Rp. <?= number_format($value->ongkir, 0) ?>
                                </td>
                                <td>
                                    <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>

                                    <span class="badge badge-success"> Pesanan Selesai</span>

                                </td>
                                <td>
                                    <h4><?= $value->no_resi ?></h4>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<?php foreach ($pesanan as $key => $value) { ?>

    <!-- Modal cek Bukti Pembayaran -->
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <th><?= $value->nama_bank ?></th>
                        </tr>
                        <tr>
                            <th>Nama Rek</th>
                            <th>:</th>
                            <th><?= $value->no_rek ?></th>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <th><?= $value->atas_nama ?></th>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->total_bayar, 0)  ?></th>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                    <table class="table">
                        <tr>
                            <th>Expedisi</th>
                            <th>:</th>
                            <th><?= $value->expedisi ?></th>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <th><?= $value->paket ?></th>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <th>Rp. <?= number_format($value->ongkir, 0)  ?></th>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <th><input name='no_resi' class="form-control" placeholder="No. Resi"></th>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>