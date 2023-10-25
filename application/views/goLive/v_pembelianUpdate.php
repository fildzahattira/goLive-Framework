<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Hosting</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/css@3.css">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color:#52BBFF;">
        <div class="w-25 p-3" style="background-color:#CCD4E0;">
            <a href="<?php echo base_url('goLive/pembelian_index');?>"" class="d-flex align-items-center link-body-emphasis text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                <span class="fs-4">GoLive</span>
            </a>
            <br>
            <h3><?php echo $title; ?></h3>
            <form method="post" action="<?php echo base_url('goLive/pembelian_update') ?>">
                <?php foreach ($detail_pembelian as $data) : ?>

                    <label for="k_pembelian" class="form-label">K Pembelian : </label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->k_pembelian; ?>" readonly name="k_pembelian">

                    <label for="nama_pembeli" class="form-label">Nama Pembeli : </label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" value="<?php echo $data->nama_pembeli; ?>" name="nama_pembeli">

                    <label for="alamat" class="form-label">Alamat : </label>
                    <input type="text" class="form-control" id="exampleFormControlInput3" value="<?php echo $data->alamat; ?>" name="alamat">

                    <label for="domain" class="form-label">Domain : </label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" value="<?php echo $data->domain; ?>" name="domain">

                    <label for="lama_sewa" class="form-label">Lama Sewa : </label><br>
                    <input type="radio" name="lama_sewa" value=1 <?php if ($data->lama_sewa == 1) echo ' checked' ?> /> 1<br />
                    <input type="radio" name="lama_sewa" value=2 <?php if ($data->lama_sewa == 2) echo ' checked' ?> /> 2<br />
                    <input type="radio" name="lama_sewa" value=3 <?php if ($data->lama_sewa == 3) echo ' checked' ?> /> 3<br />

                    <label for="id_hosting" class="form-label">ID Hosting : </label><br>
                    <select class="form-select form-select-sm" aria-label="Small select example" name="id_hosting">
                        <?php
                        foreach ($hosting as $dataTemplate) :  ?>
                            <option value="<?php echo $dataTemplate->id_hosting ?>" <?php if ($data->id_hosting == $dataTemplate->id_hosting) echo 'selected' ?>><?php echo $dataTemplate->id_hosting; ?> - <?php echo $dataTemplate->nama_hosting; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="jumlah_bayar" class="form-label">Jumlah Bayar : </label>
                    <input type="number" class="form-control" id="exampleFormControlInput5" value="<?php echo $data->jumlah_bayar; ?>" name="jumlah_bayar">

                    <br>
                <?php endforeach; ?>
                <input class="btn btn-primary" type="submit" value="Update Data">
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[type=radio][name=lama_sewa]").change(function() {
                var optionSelected = $('select').find("option:selected");
                var valueSelected = optionSelected.val();
                var textSelected = optionSelected.text();

                <?php echo json_encode($hosting) ?>.forEach(hosting => {
                    if (hosting.id_hosting == valueSelected) {
                        $("#exampleFormControlInput5").attr('value', hosting.harga*12 * $("input[type=radio][name=lama_sewa]:checked").val())
                    }
                });

                console.log($("#exampleFormControlInput5").val());
            });

            $('select').change(function() {
                var optionSelected = $(this).find("option:selected");
                var valueSelected = optionSelected.val();
                var textSelected = optionSelected.text();

                <?php echo json_encode($hosting) ?>.forEach(hosting => {
                    if (hosting.id_hosting == valueSelected) {
                        $("#exampleFormControlInput5").attr('value', hosting.harga*12 * $("input[type=radio][name=lama_sewa]:checked").val())
                    }
                });
                console.log($("#exampleFormControlInput5").val());
            });
        });
    </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>