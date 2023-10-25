<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food Menu</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/css@3.css">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color:#DCEDC2;">
    <div class="w-25 p-3" style="background-color:#A8E6CE;">
        <a href="<?php echo base_url('goLive/hosting_index');?>"" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
            <span class="fs-4">GoLive</span>
        </a>
        <br>
        <h3><?php echo $title; ?></h3>
        <form method="post" action="<?php echo base_url('goLive/hosting_update') ?>">
            <?php foreach ($detail_hosting as $data) : ?>
                <label for="id_hosting" class="form-label">Hosting ID : </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->id_hosting; ?>" readonly  name="id_hosting">

                <label for="nama_hosting" class="form-label">Hosting Name : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->nama_hosting; ?>"  name="nama_hosting">

                <label for="has_cpanel" class="form-label">Has CPanel? </label><br>
                <input type="radio" name="has_cpanel" value='y'<?php if ($data->has_cpanel == 'y') echo 'checked' ?> />Yes<br />
                <input type="radio" name="has_cpanel" value='n' <?php if ($data->has_cpanel == 'n') echo 'checked' ?> />No<br />

                <label for="has_ssl" class="form-label">Has ssl? </label><br>
                <input type="radio" name="has_ssl" value='y'<?php if ($data->has_ssl == 'y') echo 'checked' ?> />Yes<br />
                <input type="radio" name="has_ssl" value='n' <?php if ($data->has_ssl == 'n') echo 'checked' ?> />No<br />

                <label for="has_subdomain" class="form-label">How many subdomain (0-9)?  </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->has_subdomain; ?>"  name="has_subdomain">

                <label for="has_storage" class="form-label">How many storage (MB)? </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->has_storage; ?>" name="has_storage">


                <label for="num_database" class="form-label">How many database? </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->num_database ?>" name="num_database">

                <label for="harga" class="form-label">Price :  </label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $data->harga; ?>" name="harga">

            <?php endforeach; ?>
            <br>
            <input class="btn btn-primary" type="submit" value="Update data">
        </form>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
