<?php

class Global_model extends CI_Model{

     function encrypt_decrypt($action, $string) {
         $output = false;
         $encrypt_method = "AES-256-CBC";
         $secret_key = 'Candra Adi Nugroho';
         $secret_iv = 'NUGROHO ADI CANDRA';
         // hash
         $key = hash('sha256', $secret_key);

         // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
         $iv = substr(hash('sha256', $secret_iv), 0, 16);
         if ( $action == 'encrypt' ) {
             $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
             $output = base64_encode($output);
         } else if( $action == 'decrypt' ) {
             $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
         }
         return $output;
     }

     function terbilang($x){

          $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
          if ($x < 12)
            return " " . $abil[$x];
          elseif ($x < 20)
            return $this->terbilang($x - 10) . " belas";
          elseif ($x < 100)
            return $this->terbilang($x / 10) . " puluh" . $this->terbilang($x % 10);
          elseif ($x < 200)
            return " seratus" . $this->terbilang($x - 100);
          elseif ($x < 1000)
            return $this->terbilang($x / 100) . " ratus" . $this->terbilang($x % 100);
          elseif ($x < 2000)
            return " seribu" . $this->terbilang($x - 1000);
          elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " ribu" . $this->terbilang($x % 1000);
          elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " juta" . $this->terbilang($x % 1000000);
        elseif($x < 1000000000000)
          return $this->terbilang($x / 1000000000) . " miliar" . $this->terbilang($x % 1000000000);
        }


    function getBulan($angka){
        if($angka == "01"){
          return "Januari";
      }elseif($angka == "02"){
          return "Februari";
      }elseif($angka == "03"){
          return "Maret";
      }elseif($angka == "04"){
          return "April";
      }elseif($angka == "05"){
          return "Mei";
      }elseif($angka == "06"){
          return "Juni";
      }elseif($angka == "07"){
          return "Juli";
      }elseif($angka == "08"){
          return "Agustus";
      }elseif($angka == "09"){
          return "September";
      }elseif($angka == "10"){
          return "Oktober";
      }elseif($angka == "11"){
          return "November";
      }elseif($angka == "12"){
          return "Desember";
      }else{
          return "";
      }
  }

    function getHari($date){
      $day 		= date('D', strtotime($date));
      $dayList 	= array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
      );
    return $dayList[$day];
    }


    function formatTanggalID($date){
    	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    	$tahun = substr($date, 0, 4);
    	$bulan = substr($date, 5, 2);
    	$tgl   = substr($date, 8, 2);

    	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    	return($result);
    }

    function formatTglID($date){
    	$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");

    	$tahun = substr($date, 0, 4);
    	$bulan = substr($date, 5, 2);
    	$tgl   = substr($date, 8, 2);

    	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    	return($result);
    }
	
	function noNota($idMaster){
		$paramNota	= $this->db->get_where("m_nota_parameter",["status"=>"Y"])->row();	
		if(empty($paramNota)){
			$noNota = "AA-".str_pad($idMaster, 5, '0', STR_PAD_LEFT);
		}else{
			$idSeq	= $idMaster - $paramNota->noAkhirNotaSebelum;
			$noNota = $paramNota->kodeNota."-".str_pad($idSeq, 5, '0', STR_PAD_LEFT);
		}
		
		return $noNota;
    }
}
