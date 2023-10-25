<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Pembelian</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/css@3.css">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar" style="background-color: #1AA7EC;">
    <div class="container-fluid">
        <a href="<?php echo base_url('goLive/index');?>"" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
            <span class="fs-4">GoLive</span>
        </a>
        <a class="navbar-brand">TABLE PEMBELIAN</a>
        <?php echo $this->session->flashdata('msg'); ?>
        <a class = "btn btn-outline-dark" href = "<?php echo base_url('goLive/pembelian_insert');?>" role = "button">ADD NEW DATA</a>
    </div>
    </nav>
    <table class="table table-bordered border-primary">
        <thead>
            <tr align="center" class="table-info">
                <th scope="col">K Pembelian</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Alamat Pembeli</th>
                <th scope="col">Domain</th>
                <th scope="col">Jumlah Bayar</th>
                <th scope="col">Lama Sewa</th>
                <th scope="col">ID Hosting</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail_pembelian as $data) : ?>
                <tr align="center">
                    <th scope = "row"><?php echo($data->k_pembelian); ?></th>
                    <td><?php echo $data->nama_pembeli; ?></td>
                    <td><?php echo $data->alamat; ?></td>
                    <td><?php echo $data->domain; ?></td>
                    <td><?php echo price($data->jumlah_bayar); ?></td>
                    <td><?php echo tahun($data->lama_sewa); ?></td>
                    <td><?php echo $data->id_hosting; ?> - <?php echo $data->nama_hosting; ?></td>
                    <td>
                        <a class = "btn btn-warning" href = "<?php echo base_url('goLive/pembelian_update/'.$data->k_pembelian);?>" role = "button">UPDATE</a>
                        <a class = "btn btn-danger" href = "<?php echo base_url('goLive/pembelian_delete/'.$data->k_pembelian);?>" role = "button">DELETE</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>