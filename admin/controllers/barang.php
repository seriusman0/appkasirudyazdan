<?php
class Barang
{
    public $id_barang = '';
    public $nama_barang = '';
    public $modal_barang = '';
    public $harga_barang = '';
    public $stok_barang = '';

    function __construct($id_barang, $nama_barang, $modal_barang, $harga_barang, $stok_barang)
    {
        $this->id_barang = $id_barang;
        $this->nama_barang = $nama_barang;
        $this->modal_barang = $modal_barang;
        $this->harga_barang = $harga_barang;
        $this->stok_barang = $stok_barang;
    }

    function getBarang($id_barang)
    {
        global $conn;
        $r = "SELECT * FROM tb_barang WHERE id ='$id_barang'";
        return mysqli_query($conn, $r);
    }
}
