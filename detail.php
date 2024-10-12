<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika Data Mahasiswa diklik maka
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // mengambil data Mahasiswa dari nim 
    $sql = "SELECT * FROM pegawai WHERE nip = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                        <tr>
                            <th width="40%">NIP</th>
                            <td width="60%">' . $row['nip'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Tanggal Lahir</th>
                            <td width="60%">' . $row['tgl_lahir'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">ID Ruangan</th>
                            <td width="60%">' . $row['id_ruangan'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
