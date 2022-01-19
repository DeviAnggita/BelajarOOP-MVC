<?php
 require("koneksi.php");
class ModelMahasiswa
{
    public function insertMhs($data)
    {

        if (empty($this->statuss)) {
            $this->statuss = "Tidak Mahasiswa Aktif UNS";
        }

        
        $sql = "INSERT INTO tb_mahasiswa( nim, nama, passwrd, tahun, gender, statuss, kota, alamat) 
        VALUES (
        '" .   $data-> nim ."','" 
        .$data-> nama ."','" 
        .$data-> passwrd ."','" 
        .$data-> tahun ."','" 
        .$data-> gender."','" 
        .$data-> statuss ."','" 
        .$data-> kota ."','" 
        .$data-> alamat ."')";

        return $sql;
    }
}
