<?php
require('form.php');
require('modelmhs.php');

Class Mahasiswa{
    public $nim;
    var $nama;
    var $passwrd;
    var $tahun;
    var $gender;
    var $statuss;
    var $kota;
    var $alamat;

    //method dipanggil ketika object di create(new)
    public function __construct($nim="V3420028",$nama="Devi Anggita A.",$passwrd="12345", $tahun="2002", $gender="P",$statuss="Mahahsiswa UNS",$kota="Sragen",$alamat="Mojopuro,Sumberlawang, Sragen")
    {
        $this-> nim = $nim;
        $this-> nama = $nama;
        $this-> passwrd = $passwrd;
        $this-> tahun = $tahun;
        $this-> gender = $gender;
        $this-> statuss = $statuss;
        $this-> kota = $kota;
        $this-> alamat = $alamat;
    }
       
    public function isiData($nim,$nama,$passwrd, $tahun, $gender,$statuss,$kota,$alamat)
    {
        $this-> nim = $nim;
        $this-> nama = $nama;
        $this-> passwrd = $passwrd;
        $this-> tahun = $tahun;
        $this-> gender = $gender;
        $this-> statuss = $statuss;
        $this-> kota = $kota;
        $this-> alamat = $alamat;
    }

    public function cetakData() {
        $txt= "------------------------------------------------------"."</br>" ;
        $txt.= "Nim   Mahasiswa       :".$this->nim."</br>" ;
        $txt.= "Nama  Mahasiswa       :".$this->nama."</br>" ;
        $txt.= "Tahun Lahir Mahasiswa :".$this->tahun."</br>" ;
        $txt.= "Gender Mahasiswa      :".$this->gender."</br>" ;
        $txt.= "Status Mahasiswa      :".$this->statuss."</br>" ;
        $txt.= "Kota Mahasiswa        :".$this->kota."</br>" ;
        $txt.= "Alamat Mahasiswa      :".$this->alamat."</br>" ;
        $txt.= "Umur Mahasiswa        :".$this->hitungUmur()." tahun ". "</br>" ;
        $txt.= "------------------------------------------------------"."</br>" ;

        return $txt;
    }

    //method void java menggunakan java 
    //method non void 
    //untuk membedakan method void dan non void di php dengan adanya return atau tidak 

    protected function hitungumur()
    {
        $umur= date('Y')-$this -> tahun;
        return $umur;
    }

    public function inputForm(){
        $formmhs = new Form('','Input Mahasiswa');
        $formmhs->addField('nim','NIM Mahasiswa');
        $formmhs->addField('nama','Nama Mahasiswa');
        $formmhs->addField('tahun','Tahun Lahir Mahasiswa');
        $formmhs->addFieldPassword('passwrd','Password Mahasiswa');
        $formmhs->addFieldRadio('gender','Gender Mahasiswa');
        $formmhs->addfieldCheckBox('statuss','Status Mahasiswa');
        $formmhs->addfieldDropDown('kota','Kota Tinggal Mahasiswa');
        $formmhs->addfieldTextArea('alamat','Alamat Lengkap  Mahasiswa');

       //$formmhs->addField('nomor telepon','Nomor Telepon Mahasiswa');

       // post tombol dengan nanti aksinya dari name tombol yakni button
       // button Input Mahasiswa
       // bisa juga dengan name = submit 
       // yang biasanya digunakan pada button submit 
        if(isset($_POST['tombol']))
        {
            $data = $formmhs->getData();
            $password = $formmhs->getPassword();
            $gender = $formmhs->getRadio();
            $status = $formmhs->getCheckBox();
            $kota = $formmhs->getDropDown();
            $alamat = $formmhs->getTextArea();
            

            $this->nim = $data[0];
            $this->nama = $data[1];
            $this->tahun = $data [2];
            $this->password = $password[0];
            $this->gender = $gender[0];
            $this->statuss = $status[0];
            $this->kota = $kota[0];
            $this->alamat = $alamat[0];

            //$this-> cetakData();
            //mengambil data dari echo untuk di cetak di view 
            $cetak = $this -> cetakData();
            require('viewmahasiswa/tampilinput.php');

            require("koneksi.php");
            $this->passwrd = password_hash($this->passwrd, PASSWORD_DEFAULT);
            $modelmhs = new ModelMahasiswa();
            $sql=$modelmhs->insertMhs($this);
            
            // $result = mysqli_query ($conn,$simpan);
            if ($conn->query($sql) === TRUE) {
                echo "New record creared seccessfully";
            }else{
                echo "Error : " .$sql . "<br>".$conn->error;
            }
        }
        else
        {
            //$formmhs->displayForm(); --> menggunakan $cetak agar lebih mudah 
            $cetak=$formmhs->displayForm();
            //echo $cetak;
            //echo $cetak akan masuk ke folder view mahasiswa 
            // masuk ke file formmhs.php 
            require('viewmahasiswa/formmhs.php');
        }
    }
}   