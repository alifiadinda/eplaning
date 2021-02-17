<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo site_url().'/welcome/daftarAkun'?>" method='POST'>
        <label for="username"> Username
            <input type="text" name="username" id="username">
        </label>

        <br> </br>

        <label for="password"> Password
            <input type="password" name="password" id="password">
        </label>

        <br> </br>

        <label for="nama"> Nama
            <input type="text" name="nama" id="nama">
        </label>

        <br> </br>

        <label for="level"> Level Akun
            <select name="level" id="level">
                <option value="" disabled selected>Pilih Level Akun</option>
                <option value="admin">admin</option>
                <option value="pengusul">pengusul</option>
                <option value="penerima">penerima</option>
            </select>
        </label>

        <br> </br>
        
        <button type="submit">Daftar</button>
    </form>
</body>
</html>