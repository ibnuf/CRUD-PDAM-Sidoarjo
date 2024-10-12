<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "pdam");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nim = htmlspecialchars($data['nip']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $id_ruangan = htmlspecialchars($data['id_ruangan']);

    $sql = "INSERT INTO pegawai(nip, nama, alamat, tgl_lahir, id_ruangan) VALUES ('$nip','$nama','$alamat','$tgl_lahir','$id_ruangan')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nip)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip = $nip");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nip = htmlspecialchars($data['nip']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $tgl_lahir = htmlspecialchars($data['tgl_lahir']);
    $id_ruangan = htmlspecialchars($data['id_ruangan']);

    $sql = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', tgl_lahir = '$tgl_lahir', id_ruangan = '$id_ruangan' WHERE nip = $nip";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

