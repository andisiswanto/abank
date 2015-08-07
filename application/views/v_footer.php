<?php
//$_SESSION['MemberOnline']=date('Y-m-d H:i:s');
	//echo $_SESSION['MemberOnline']; exit;
	$now=date("Y-m-d");
	$ip = $_SERVER['REMOTE_ADDR']."{}";
	if(!isset($_SESSION['MemberOnline'])){
	//$cek = mysql_query("SELECT Tanggal,ipAddress FROM sys_traffic WHERE Tanggal='".date("Y-m-d")."'");
		$cekTodayVisitor=$this->m_visitor->cekJumlah(date("Y-m-d"));
		$cekTodayVisitorData=$this->m_visitor->cekData(date("Y-m-d"));
		//var_dump($cekTodayVisitor); exit;
		//Cek Jumlah Row Hari ini
		//while($cek=mysql_fetch_object($cekTodayVisitor)){
			//$jumlahnya=$cek->jumlahnya;
            $jumlahnya=$cekTodayVisitor;
		//}
		//echo $jumlahnya;exit;
		//while($dat=mysql_fetch_object($cekTodayVisitorData)){
        foreach($cekTodayVisitorData as $dat){
            $dataIp=$dat->ipAddress;
			$dataJumlah=$dat->jumlah;
        }
			
		//}
					
					
		//echo $dataJumlah; exit;
		if($jumlahnya==0){
			$dataNya = array(
				'tanggal' => date("Y-m-d"),
				'ipAddress' => $ip,
				'jumlah' => '1',		
			);
			/*$kolom=implode(",",array_keys($dataNya));
				$escapeValue=array_map('mysql_real_escape_string', array_values($dataNya));
			$nilai="'".implode("','", $escapeValue)."'";
			//$up = mysql_query("INSERT  INTO sys_traffic (Tanggal,ipAddress,Jumlah) VALUES ('".."','".$ip."','1')");
            */
			//$up = allInsertSave($kolom,$nilai,'trs_counter');
            $this->m_visitor->allInsertSave($dataNya,'trs_counter');
			$_SESSION['MemberOnline']=date('Y-m-d H:i:s');
		}
		else{
			$dataNya2 = array(
				'ipAddress' => $ip,
				'jumlah' => $dataJumlah+1,
			);
			/*foreach ($dataNya2 as $key => $value) {
                $value = mysql_real_escape_string($value); // this is dedicated to @Jon
                $value = "'$value'";
                $dataUpdates[] = "$key = $value";
            }
			$kolom=implode(",",array_keys($dataUpdates));
				$escapeValue=array_map('mysql_real_escape_string', array_values($dataUpdates));
			$nilai=implode(",", $dataUpdates);
					
			$ipaddr = $dataIp.$ip;*/
			//$up=allEditSave('trs_counter',$nilai,'tanggal',$now);
            $this->m_visitor->allEditSave($dataNya2,$now,'trs_counter','tanggal');
			$_SESSION['MemberOnline']=date('Y-m-d H:i:s');
		}
				
	}
			
			
	$yesterday 	= date("Y-m-d",mktime(0,0,0,date('m'),date('d')-1,date('Y')));
	//echo $yesterday; exit;
			
	/*$masaLampau=get_allDetailVisitor('SUM(jumlah) AS totalLampau','trs_counter','tanggal',$now);
	$sekarang=get_allDetailVisitor2('jumlah AS Visitor','trs_counter','tanggal',$now,'1');
	$kemarin=get_allDetailVisitor2('jumlah AS Visitor','trs_counter','tanggal',$yesterday,'1');
	$totalnya=get_allDetailVisitor3('SUM(jumlah) as Total','trs_counter');
    */
    $masaLampau=$this->m_visitor->get_allDetailVisitor('SUM(jumlah)','trs_counter','tanggal',$now);
	$sekarang=$this->m_visitor->get_allDetailVisitor2('jumlah','trs_counter','tanggal',$now,'1');
	$kemarin=$this->m_visitor->get_allDetailVisitor2('jumlah','trs_counter','tanggal',$yesterday,'1');
	$totalnya=$this->m_visitor->get_allDetailVisitor3('SUM(jumlah)','trs_counter');
?>   

<?php
    foreach($footer as $fot){
        $name=$fot->ctcname;
        $alamat=$fot->ctcaddress;
        $email=$fot->ctcemail;
        $kodepos=$fot->ctczip;
        $telp=$fot->ctcphone;
        $fax=$fot->ctcfax;
    }
?>

<div class="container">
<footer class="panel-footer voffset4">
    <blockquote class="text-right">
  <label style="color: white; outline-color: white;">
    <?php echo $name;?> <br />
    <?php echo $alamat." Jakarta Pusat ".$kodepos;?> <br />
    <?php echo "Telp : ".$telp.", Fax : ".$fax;?> 
    <br />
      <?php
      echo "Jumlah Pengunjung : ".$this->m_visitor->num_toimage($totalnya,5);
      ?>
  </label>
  </blockquote>
  </footer>
<div class="container">