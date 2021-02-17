<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Selamat Datang <?php echo $this->session->nama?> </h2>
    <h3>ID akun anda: <?php echo $this->session->id_akun?> </h3>
    <h3>Username akun anda: <?php echo $this->session->username?> </h3>
    <h3>Level akun anda: <?php echo $this->session->level?> </h3>
    <button> <a href="<?php echo site_url();?>/welcome/logout" class="dropdown-item">Logout</button>
</body>
</html>