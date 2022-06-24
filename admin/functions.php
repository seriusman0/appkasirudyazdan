<?php
function query($table)
{
    global $conn;

    return mysqli_query($conn, "SELECT * FROM $table ORDER BY `created_at` DESC");
}

function insert($table, $data)
{
    global $conn;
    mysqli_query($conn, "INSERT INTO `$table` (`id_barang`, `nama_barang`,`modal_barang`, `harga_barang`, `stok_barang`, `created_at`) values(
        '$data[id_barang]', '$data[nama_barang]','$data[modal_barang]','$data[harga_barang]','$data[stok_barang]', CURRENT_TIMESTAMP
    )");
}

function delete($table, $id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM `$table` WHERE `id_barang` = '$id'");
    header('location:index.php');
}

function queryone($table, $id, $target)
{
    global $conn;
    return mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `$table` WHERE `id_barang` = '$id'"))[$target];
}

function update($table, $id, $data)
{
    global $conn;
    mysqli_query($conn, "UPDATE `$table` SET `nama_barang` = '$data[nama_barang]', `harga_barang` = '$data[harga_barang]', `stok_barang`= '$data[stok_barang]'
    where `id_barang` = '$id'");
    header('location:index.php');
}

function deRupiah($value)
{
    $value = $value;
    $value_str = preg_replace("/[^0-9]/", "", $value);
    $value_int = (int) $value_str;
    return $value_int;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function rp($angka)
{
    $hasil_rupiah = number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal . '-' . $bulan . '-' . $tahun;
}
