<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User extends CI_Controller{
	
	public function __construct()
		{
			parent::__construct();
			$this->load->model('model_user');
			$this->load->helper(array('form', 'url'));
			$this->load->library('session');

			
		}	

	public function index(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//print_r($data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('index');
			$this->load->view('footer');
		}
		else{
			redirect('user/index','refresh');
		}
	
	}

	public function set_login(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
			$check = $this->model_user->checkUser();
		//	print_r($check);
			if ($check == "true") {
				$session = array(
					'username' => $username,
					'status' => 'true');
				$this->session->set_userdata($session);
				$data['username']=$this->session->userdata('username');
				$data['status']=$this->session->userdata('status');
		//	print_r($data);
				redirect('user/home','refresh');
				}
			else{
				$this->session->set_userdata('status','false');
				redirect('user/index');
				}
	}

	public function home(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
				
	}

	public function signup(){
		
		$this->load->library('form_validation');
		$data['query'] = $this->model_user->aktifitas();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('usia', 'Usia', 'required');
		$this->form_validation->set_rules('jk', 'Jk', 'required');
		$this->form_validation->set_rules('berat', 'Berat', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
		$this->form_validation->set_rules('aktifitas', 'Aktifitas', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('signup', $data);
				$this->load->view('footer');
			}
			else{
				redirect('user/getsignup','refresh');
			}
			
	}

	public function getsignup(){
			
		$usia     		= $this->input->post('usia');
		if ($usia <14) {
			redirect('user/signup','refresh');
		}
		else
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$nama     		= $this->input->post('nama');
		$jeniskelamin 	= $this->input->post('jk');
			if ($jeniskelamin == 'Laki-laki') {	
			$jeniskelamin= str_replace($jeniskelamin,'L', $jeniskelamin);
			}
			else
			$jeniskelamin= str_replace($jeniskelamin,'P', $jeniskelamin);
		
		$beratbadan     = $this->input->post('berat');
		$tinggibadan 	= $this->input->post('tinggi');
		$aktifitas 		= $this->input->post('aktifitas');
		$check = $this->model_user->checkUser();
		if($check == "false"){
			$insertUser = $this->model_user->insertUser();
			$insertPI   = $this->model_user->insertPI();
		//	$lihatProfil= $this->model_user->lihatProfil();
		//	print_r($lihatProfil);
			redirect('user/index','refresh');	
		}
		//masih error
		else{
			echo "Akun $username sudah terdaftar";
		}

	}

	public function logout(){
		
		$this->session->sess_destroy();
		redirect('user/index');

	}

	public function profil(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['aktifitas'] = $this->model_user->aktifitas();
			$data['query'] = $this->model_user->profilku($data['username']);
			$this->load->view('header');
			$this->load->view('profil', $data);
			$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');		
		}

	}

	/*public function updateProfil(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$this->load->library('form_validation');
		$data['query'] = $this->model_user->profilku($data['username']);
		$data['query1'] = $this->model_user->aktifitas();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('usia', 'Usia', 'required');
		$this->form_validation->set_rules('jk', 'Jk', 'required');
		$this->form_validation->set_rules('berat', 'Berat', 'required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
		$this->form_validation->set_rules('aktifitas', 'Aktifitas', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('editprofil', $data);
				$this->load->view('footer');
			}
			else{
				redirect('user/profil','refresh');
			}
		
	}*/

	/*public function getUpdateProfil(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$nama     		= $this->input->post('nama');
		$usia     		= $this->input->post('usia');
		$jeniskelamin 	= $this->input->post('jk');
		$beratbadan     = $this->input->post('berat');
		$tinggibadan 	= $this->input->post('tinggi');
		$aktifitas 		= $this->input->post('aktifitas ');

		if ($data['status']== 'true') {
			$this->model_user->updatePI($username,$nama,$usia,$jeniskelamin,$beratbadan,$tinggibadan,$aktifitas);
			redirect('user/profil','refresh');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');	
		}

	}*/

	public function insertRekamKonsumsi(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$gizi		= $this->input->post('gizi');
		$harga 		= $this->input->post('harga');
		$tanggal	= date("Y-m-d");
		if ($data['status']== 'true') {
			$checkTanggal = $this->model_user->checkTanggal($tanggal);
			if ($checkTanggal == 'false') {
				$data['query'] = $this->model_user->insertRekamKebutuhan($tanggal,$data['username'],$gizi,$harga);		
				redirect('user/rekamkonsumsi','refresh');	
			}
			else{
				$this->load->view('header');
				$this->load->view('errorRekam');
				$this->load->view('footer');
			}
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	}

	public function rekamkonsumsi(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		if ($data['status']== 'true') {
			$data['query'] = $this->model_user->rekamKebutuhan($data['username']);

			$this->load->view('header');
			$this->load->view('rekamkonsumsi', $data);
			$this->load->view('footer');		
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	}

	public function menumakanan(){ 
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['query'] = $this->model_user->makanan();
			$this->load->view('header');
			$this->load->view('menumakanan', $data);
			$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}

	public function pilihmakanan(){
		
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');
		if ($data['status']== 'true') {
			$data['makanan']= $this->model_user->makanan();
				$this->load->view('header');
				$this->load->view('pilihmakanan', $data);
				$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}

	private function hitungNutrisi($data,$pilihmakanan){
		
		$profil= $this->model_user->profilku($data['username']);
			//	print_r($profil[0]->nama);
		if ($profil[0]->jenis_kelamin == 'L') {
			$BMR = 88.362  + ( 13.397  * $profil[0]->berat_badan) + ( 4.799  * $profil[0]->tinggi_badan )  
					- (5.677 * $profil[0]->usia );
		}
		else{
			$BMR = 447.593  + ( 9.247  * $profil[0]->berat_badan) + ( 3.098  * $profil[0]->tinggi_badan )  
					- (4.330 * $profil[0]->usia );
		}

			if ($profil[0]->id_aktifitas == 1) {
				$TEE= $BMR * 1.2 ;
			} 
			elseif ($profil[0]->id_aktifitas == 2) {
				$TEE= $BMR * 1.3 -1.375 ;
			}
			elseif ($profil[0]->id_aktifitas == 3) {
				$TEE= $BMR * 1.5 -1.55 ;
			}
			elseif ($profil[0]->id_aktifitas == 4) {
				$TEE= $BMR * 1.7 ;
			}
			else{
				$TEE= $BMR * 1.9 ;
			}

		$protein_BB 	 = ($TEE * 0.1)/4 ;
		$protein_BA 	 = ($TEE * 0.35)/4 ;
		$Carbohidrate_BB = ($TEE * 0.45)/4 ;
		$Carbohidrate_BA = ($TEE * 0.65)/4 ;
		$Fat_BB 		 = ($TEE * 0.2)/9 ;
		$Fat_BA 		 = ($TEE * 0.35)/9 ;

		//$nutrisiuser = array($protein_BA,$Carbohidrate_BA,$Fat_BA,$protein_BB,$Carbohidrate_BB,$Fat_BB,$TEE);
		$nutrisiuser = array('protein_BA' => $protein_BA,'Fat_BA' => $Fat_BA,'Carbohidrate_BA' => $Carbohidrate_BA,
								'protein_BB' => $protein_BB,'Fat_BB' => $Fat_BB,'Carbohidrate_BB' => $Carbohidrate_BB,
									'TEE' => $TEE);

		return $nutrisiuser;
	
	}

	private function getMakanan($data,$pilihmakanan){
		
		foreach ($pilihmakanan as $row) {
			$getMakanan[] = $this->model_user->getMakanan($row);
		}
			
		return $getMakanan ;
	
	}

	private function countMakanan($pilihmakanan){
		
		$jumlahMakanan= count($pilihmakanan);
		return $jumlahMakanan ;
	
	}

	private function countNutrisi($nutrisiuser){
		
		$batasNutrisi = count($nutrisiuser);
		return $batasNutrisi ;
	
	}

	private function fungsiTujuan($getMakanan,$jumlahMakanan){
		
		$Z="";
		for ($i=0; $i < $jumlahMakanan; $i++) { 
			if ($i<$jumlahMakanan-1) {
				$Z=	$Z.$getMakanan[$i]['harga']."x".($i+1)."+"; 
			}
			else{
				$Z = $Z.$getMakanan[$i]['harga']."x".($i+1) ;			
			}
		}
			
		return $Z ;
	
	}

	private function fungsiKendala($nutrisiuser,$jumlahMakanan,$batasNutrisi,$getMakanan,$minKendala){
		
		$batas[]="";
		//	var_dump($nutrisiuser) ;
		for ($i=0; $i < $batasNutrisi; $i++) { 
			for ($j=0; $j < $jumlahMakanan; $j++) {
				if ($i==0) {
				 		if ($j<$jumlahMakanan-1) {
				 			$batas[$i] = $batas[$i].$getMakanan[$j]['protein']."x".($j+1)."+" ;
				 		//	echo $batas[$i];
				 		}
				 		else{
				 			$batas[$i] = $batas[$i].$getMakanan[$j]['protein']."x".($j+1)." <= ".$nutrisiuser['protein_BA'] ;
						//	echo $batas[$i]."<br>";	
				 		}
				}	
				else if ($i==1) {
						if ($j<$jumlahMakanan-1) {
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['lemak']."x".($j+1)."+" ;
						 }
						 else{
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['lemak']."x".($j+1)." <= ".$nutrisiuser['Fat_BA'] ;
				 		 }	
				}
				else if ($i==2) {
						if ($j<$jumlahMakanan-1) {
							@$batas[$i] = $batas[$i].$getMakanan[$j]['karbohidrat']."x".($j+1)."+" ;
				 		}
						 else{
				 			@$batas[$i] = $batas[$i].$getMakanan[$j]['karbohidrat']."x".($j+1)." <= ".$nutrisiuser['Carbohidrate_BA'];
						 }	
				}
				else if ($i==3) {
						if ($j<$jumlahMakanan-1) {
					 		@$batas[$i] = $batas[$i].$getMakanan[$j]['protein']."x".($j+1)."+" ;
					 	}
					 	else{
					 		@$batas[$i] = $batas[$i].$getMakanan[$j]['protein']."x".($j+1)." >= ".$nutrisiuser['protein_BB'] ;
					 	}
				}
				else if ($i==4) {
						if ($j<$jumlahMakanan-1) {
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['lemak']."x".($j+1)."+" ;
						 }
						 else{
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['lemak']."x".($j+1)." >= ".$nutrisiuser['Fat_BB'] ;		
						}
				}		
				else if ($i==5) {
						if ($j<$jumlahMakanan-1) {
							@$batas[$i] = $batas[$i].$getMakanan[$j]['karbohidrat']."x".($j+1)."+" ;
						}
						else{
							 @$batas[$i] = $batas[$i].$getMakanan[$j]['karbohidrat']."x".($j+1)." >= ".$nutrisiuser['Carbohidrate_BB'] ;								
						}
				}		
				else{
						if ($j<$jumlahMakanan-1) {
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['kalori']."x".($j+1)."+" ;
						 }
						 else{
						 	@$batas[$i] = $batas[$i].$getMakanan[$j]['kalori']."x".($j+1)." = ".$nutrisiuser['TEE'] ;
				 		}
				}
			} //end for $j
		} //end for $i
		
		for ($k=0; $k < $jumlahMakanan ; $k++) { 
			$batas[$k+7] = 	"x".($k+1)." >=".$minKendala ;					
		}						
				
		return $batas ;
	
	}

	private function modelStandar($jumlahMakanan,$batasNutrisi,$batas,$Z,$minKendala){
		
		for ($i=0; $i < $jumlahMakanan+4; $i++) { 
			$Z = $Z."+ MA".($i+1) ;
		}
				
		for ($j=0; $j < $batasNutrisi+$jumlahMakanan; $j++) { 
			//var_dump($batas[$ju]) ;
			$replace = array(">=","<=");
			$s=$j+1;
			$a=$j-2 ;
				if ($j<3) {
					$batasbaru[$j]= (str_replace($replace, "+ S$s =", $batas[$j]));	
				}
				else if ($j==6) {
					$batasbaru[$j]= (str_replace("=", "+ A$a =", $batas[$j]));
				}
				else{
					$batasbaru[$j]= (str_replace($replace, "- S$s + A$a =", $batas[$j]));
				}	
		}
		
		return array($Z,$batasbaru) ;
	
	}

	private function tabelMatriksAwal($nutrisiuser,$jumlahMakanan,$getMakanan,$minKendala){
				
		$M = 10000 ;
		$Jum_KolomSurplus = 10;
		$Jum_KolomSurplus_flex = 2* $jumlahMakanan;
		$Jum_Kolom = $jumlahMakanan + $Jum_KolomSurplus + $Jum_KolomSurplus_flex + 1 ;
		$Jum_Baris = 7 + $jumlahMakanan ;
		
		$mIdentity = array();
		//membuat matriks identitas
		for ($i=0; $i < $jumlahMakanan; $i++) { 
			for ($j=0; $j < $jumlahMakanan; $j++) { 
				if ($i == $j) {
					$mIdentity[$i][$j] = 1;
				} else {
					$mIdentity[$i][$j] = 0;
				}
			}
		}
		
		
		//mengisi matriks kolom flesibel 1 
		for ($i=-1; $i <= $Jum_Baris; $i++) { 
			for ($j=-1; $j <= $jumlahMakanan; $j++) { 
				if ($i==-1 && $j==-1) {
					$MATRIKS[$i][$j] = "Kolom" ;
				}
				else if ($i==-1 && $j==0) {
					$MATRIKS[$i][$j] = "Variabel" ;
				}
				else if (($i==-1) and (0<$j and $j<=$jumlahMakanan)) {
					$MATRIKS[$i][$j] = "x$j" ;
				}
				else if ($i==0 && $j<1) {
					$MATRIKS[$i][$j] = "Cj" ;
				}
				else if (($i==0) && (0<$j and $j<=$jumlahMakanan)) {
					$MATRIKS[$i][$j] = $getMakanan[$j-1]['harga'] ;
				}
				else if ((0<$i and $i<4) && ($j==-1)) {
					$MATRIKS[$i][$j] = 0 ;
				}
				else if ((3<$i and $i<=$Jum_Baris) && ($j==-1)) {
					$MATRIKS[$i][$j] = $M ;
				}
				else if ((0<$i and $i<4) && ($j==0)) {
					$MATRIKS[$i][$j] = "S$i" ;
				}
				else if ((3<$i and $i<=$Jum_Baris) && ($j==0)) {
					$a = $i -3;
					$MATRIKS[$i][$j] = "A$a" ;
				}
				else if(($i==1 || $i== 4) && (0<$j and $j<=$jumlahMakanan)){
					$MATRIKS[$i][$j] = $getMakanan[$j-1]['protein'] ;
				}
				else if(($i==2 || $i== 5) && (0<$j and $j<=$jumlahMakanan)){
					$MATRIKS[$i][$j] = $getMakanan[$j-1]['lemak'] ;
				}
				else if(($i==3 || $i== 6) && (0<$j and $j<=$jumlahMakanan)){
					$MATRIKS[$i][$j] = $getMakanan[$j-1]['karbohidrat'] ;
				}
				else if(($i==7) && (0<$j and $j<=$jumlahMakanan)){
					$MATRIKS[$i][$j] = $getMakanan[$j-1]['kalori'] ;
				}
				else {
					$MATRIKS[$i][$j] = 0 ;		//jika tidak ada dalam matrix diisi 0	
				}					
			}
		}

		// mengisi matriks identitas pada baris ke-8 dst
		$mi = 0;
		for ($i=8; $i <=$Jum_Baris; $i++) {
		$mj = 0 ;
			for ($j=1; $j <= $jumlahMakanan; $j++) { 
			 	$MATRIKS[$i][$j] = $mIdentity[$mi][$mj];
				$mj++;
			 }$mi++; 
		}

		//mengisi matriks kolom 2 statis ()
		$var_basis 	= array("S1","S2","S3","S4","A1","S5","A2","S6","A3","A4"); 
		$cj_basis	= array(0,0,0,0,$M,0,$M,0,$M,$M) ;
		$nilai_basis	= array(array(1,0,0,0,0,0,0,0,0,0),
							array(0,1,0,0,0,0,0,0,0,0),
							array(0,0,1,0,0,0,0,0,0,0),
							array(0,0,0,-1,1,0,0,0,0,0),
							array(0,0,0,0,0,-1,1,0,0,0),
							array(0,0,0,0,0,0,0,-1,1,0),
							array(0,0,0,0,0,0,0,0,0,1));
		$bataskebutuhan	 = array($nutrisiuser['protein_BA'],$nutrisiuser['Fat_BA'],$nutrisiuser['Carbohidrate_BA'],
									$nutrisiuser['protein_BB'],$nutrisiuser['Fat_BB'],$nutrisiuser['Carbohidrate_BB'],
									$nutrisiuser['TEE']);
		
		for ($i=-1; $i <= $Jum_Baris; $i++) { 
			for ($j=$jumlahMakanan+1; $j <= $jumlahMakanan+10; $j++) { 
				if (($i==-1) and ($jumlahMakanan<$j and $j<=$jumlahMakanan+10)) {
					$MATRIKS[$i][$j] = $var_basis[$j-$jumlahMakanan-1];
				}
				else if(($i==0) and ($jumlahMakanan<$j and $j<=$jumlahMakanan+10)) {
					$MATRIKS[$i][$j] =	$cj_basis[$j-$jumlahMakanan-1];
				}
				else if ((0<$i and $i<=7) and ($jumlahMakanan<$j and $j<=$jumlahMakanan+10)) {
					$MATRIKS[$i][$j] =  $nilai_basis[$i-1][$j-$jumlahMakanan-1] ;
				}
				else{
					$MATRIKS[$i][$j] = 0 ;
				}
				
			}
		}
		
		//mengisi matriks kolom flesibel 3 
		$initS = 7;
		$initA = 5;
		
		for ($i=-1; $i <= $Jum_Baris; $i++) { 
			for ($j=$jumlahMakanan+11; $j <= $Jum_Kolom; $j++) { 
				if (($i==-1) and ($jumlahMakanan+10<$j and $j<$Jum_Kolom )) {
					if (substr($MATRIKS[$i][$j-1], 0, 1) == "A") {
						$MATRIKS[$i][$j] = "S".($initS);
						$initS++;
					} else {
						$MATRIKS[$i][$j] = "A".($initA);
						$initA++;
					}
				}
				else if(($i==0) and ($jumlahMakanan+10<$j and $j<$Jum_Kolom)) { 
					if (substr($MATRIKS[-1][$j],0,1 ) == "A") {
						$MATRIKS[$i][$j] = $M ;
					}
					else{
						$MATRIKS[$i][$j] = 0 ;
					}
				}
				else if ((0<$i and $i<=7) and ($jumlahMakanan+10<$j and $j<$Jum_Kolom)) {
					$MATRIKS[$i][$j] =  0 ;
				}
				else if ($i > 7 and $i<=$Jum_Baris and $j < $Jum_Kolom) {
					if($MATRIKS[$i][0] === $MATRIKS[-1][$j+1]) {
						$MATRIKS[$i][$j] = -1;
						$MATRIKS[$i][$j+1] = 1;
					} else {
						$MATRIKS[$i][$j] = 0;
						$MATRIKS[$i][$j+1] = 0;
					}
					$j++;
				}
				else if ((0<$i and $i<=7) and ($j==$Jum_Kolom)) {
					$MATRIKS[$i][$j] = $bataskebutuhan[$i-1] ;
				}
				else if ((7<$i and $i<=$Jum_Baris) and ($j==$Jum_Kolom)) {
					$MATRIKS[$i][$j] = $minKendala;
				}
				else{
					$MATRIKS[$i][$j] = "BATAS" ;
				}
				
			}
		}
		
		return array($MATRIKS,$Jum_Baris,$Jum_Kolom) ;
	
	}

	private function cjzj($MATRIKS,$Jum_Baris,$Jum_Kolom){
		
		$Zj = array();
		$CjZj = array();

		for ($i=1; $i <= $Jum_Kolom; $i++) {
		$Zj[$i] = 0 ;
			for ($j=1; $j <= $Jum_Baris ; $j++) {
			$Zj[$i] += ($MATRIKS[$j][-1] * $MATRIKS[$j][$i]);
				if ($i>0 and $i<$Jum_Kolom) {
					$CjZj[$i] = $MATRIKS[0][$i] - $Zj[$i] ;
					//	echo $Zj[$i]."=".$MATRIKS[$j][-1]."*".$MATRIKS[$j][$i]."<br/>";	
				}
				else{
					$CjZj[$i] = null ;
				}
			}
		}
		
		return array($Zj,$CjZj);
	
	}

	private function kolomPengganti($MATRIKS,$Jum_Baris,$Jum_Kolom,$Zj,$CjZj){
		
		$CjZjKolTerpilih = $CjZj[1];
		$indexKolTerpilih = 1;
		for ($i=1; $i <$Jum_Kolom ; $i++) { 
			if ($CjZjKolTerpilih > $CjZj[$i]) {
				$CjZjKolTerpilih = $CjZj[$i] ;
				$indexKolTerpilih = $i ;
			}

		}
			
		return array($CjZjKolTerpilih,$indexKolTerpilih) ;	
	
	}

	private function barisTerganti($MATRIKS,$Jum_Baris,$Jum_Kolom,$indexKolTerpilih){
		
		$hasilBagi = array();
		$barTerpilih =1000000000000;
		$indexBarTerpilih = 1;
		for ($i=1; $i <= $Jum_Baris ; $i++) { 

			$namakolom[$i] = $MATRIKS[$i][0] ;
			$kolomterpilih[$i] = $MATRIKS[$i][$indexKolTerpilih] ;
			$batas[$i] = $MATRIKS[$i][$Jum_Kolom] ; 
			if ($kolomterpilih[$i] != 0) {
				$hasilBagi[$i] = $batas[$i] / $kolomterpilih[$i] ;
				if ($hasilBagi[$i] > 0) {
					if ($barTerpilih > $hasilBagi[$i]) {
						$barTerpilih = $hasilBagi[$i] ;
						$indexBarTerpilih = $i ;
					}	
				}	
			}
			else{
				$hasilBagi[$i] = "infinity" ;
			}		
		}	//end of for

		return array($hasilBagi,$barTerpilih,$indexBarTerpilih);

	}

	private function revKoefisienBaru($MATRIKS,$Jum_Baris,$Jum_Kolom,$indexKolTerpilih,$indexBarTerpilih){

		//menghitung koefisien terpilih
		for ($i=-1; $i <=$Jum_Kolom ; $i++) { 
			if ($i>0) {
				$MATRIKS_BARU[$indexBarTerpilih][$i] = $MATRIKS[$indexBarTerpilih][$i] / $MATRIKS[$indexBarTerpilih][$indexKolTerpilih] ;
			}
			elseif ($i == 0) {
				$MATRIKS_BARU[$indexBarTerpilih][$i] = $MATRIKS[-1][$indexKolTerpilih] ;

			}
			else{
				$MATRIKS_BARU[$indexBarTerpilih][$i] = $MATRIKS[0][$indexKolTerpilih] ; 
			} 
			
		}

		//revisi koefisien baris lainnya
		for ($i=-1; $i <= $Jum_Baris ; $i++) { 
			for ($j=-1; $j <= $Jum_Kolom ; $j++) { 
				if (($i != $indexBarTerpilih and $i>0) and ($j>0 and $j<=$Jum_Kolom)) {
					$MATRIKS_BARU[$i][$j] = $MATRIKS[$i][$j] - 
											($MATRIKS_BARU[$indexBarTerpilih][$j] * $MATRIKS[$i][$indexKolTerpilih] ) ;
				}
				else if (($i != $indexBarTerpilih and $i>0 ) and ($j==0 or $j==-1)) {
					$MATRIKS_BARU[$i][$j] = $MATRIKS[$i][$j] ;
				}
				else if ($i==0 or $i==-1) {
					$MATRIKS_BARU[$i][$j] = $MATRIKS[$i][$j] ;
				}
				else{
					$MATRIKS_BARU[$i][$j];
				}
			}
		}

		return $MATRIKS_BARU ;
	
	}

	private function tampilTabelAwal($MATRIKS,$Jum_Baris,$Jum_Kolom){
		echo	"<table border='1px'>
				<caption>Tabel Matriks</caption>
				<tbody>" ;
			for ($i=-1; $i <= $Jum_Baris; $i++) { 
		echo	"<tr>" ;
				for ($j=-1; $j <= $Jum_Kolom ; $j++) {
					if ($i>0 and $j>0) {
					 	echo "<td align='center'>".round($MATRIKS[$i][$j], 3)."</td>" ;
					 }
					 else{
					 	echo "<td align='center'>".$MATRIKS[$i][$j]."</td>" ;
					 } 
				 } 
		echo	"</tr>" ;
				 }
		echo	"</tbody>
				</table>" ;
	
	}

	private function tampilCJZJ($MATRIKS,$Zj,$CjZj,$CjZjKolTerpilih,$indexKolTerpilih,$Jum_Kolom){
		//menampilkan tabel Zj dan Cj-Zj
			echo"<table border='1px'>
				<tbody>
				<thead>
					<tr>
					<th></th>" ;
					for ($i=1; $i <= $Jum_Kolom; $i++) {
			echo	"<th>".$MATRIKS[-1][$i] ."</th>" ;
					} 
			echo	"</tr>
				</thead>
				<tr>
				<td>Zj</td>" ;
				for ($i=1; $i <= $Jum_Kolom; $i++) { 
			echo	"<td>".$Zj[$i]."</td>";			
					} 
			echo"</tr>
				<tr>
				<td>Cj-Zj</td>" ;
				for ($i=1; $i <= $Jum_Kolom; $i++) { 
			echo	"<td>".$CjZj[$i]."</td>" ;			
				}
			echo	"</tr>
				</tbody>
				</table>";

			echo "Kolom Kuncinya adalah ".$MATRIKS[-1][$indexKolTerpilih]."<br>" ;
			echo "Dengan nilai CjZj adalah ".$CjZjKolTerpilih."<br>" ;
			echo "indeks Kolom Kunci adalah ".$indexKolTerpilih."<br><br>" ;
	
	}

	private function tampilBarisKunci($MATRIKS,$barTerpilih,$indexBarTerpilih,$indexKolTerpilih,$hasilBagi,$Jum_Kolom,$Jum_Baris){
		//menampilkan tabel baris kunci 
		echo	"<table border='1px'>
			<caption>Menghitung Baris Kunci</caption>
			<thead>
				<tr>
					<th>Kolom</th>";
		echo		"<th>".$MATRIKS[-1][$indexKolTerpilih]."</th>" ;
		echo		"<th>Batas</th>
					<th>Hasil Bagi</th>
				</tr>
			</thead>
			<tbody>";
				for ($j=1; $j <= $Jum_Baris ; $j++) { 
			echo	"<tr>";
			echo	"<td>".$MATRIKS[$j][0]."</td>";
			echo	"<td>".$MATRIKS[$j][$indexKolTerpilih]."</td>" ;
			echo	"<td>".$MATRIKS[$j][$Jum_Kolom]."</td>" ;
			echo	"<td>".$hasilBagi[$j]."</td>";
			echo	"</tr>" ;
				}
		echo	"</tbody>
		</table>";

		echo "Dengan nilai Baris Kunci adalah ".$barTerpilih ."<br>" ;
		echo "indeks Baris Kunci adalah Baris ke-".$indexBarTerpilih ."<br>";
	
	}

	private function tampilTabel($MATRIKS,$Jum_Baris,$Jum_Kolom){
		//menampilkan tabel matriks
		echo	"<table border='1px'>
				<caption>Tabel Matriks</caption>
				<tbody>" ;
			for ($i=-1; $i <= $Jum_Baris; $i++) { 
		echo	"<tr>" ;
				for ($j=-1; $j <= $Jum_Kolom ; $j++) {
					if ($i>0 and $j>0) {
					 	echo "<td align='center'>".$MATRIKS[$i][$j]."</td>" ;
					 }
					 else{
					 	echo "<td align='center'>".$MATRIKS[$i][$j]."</td>" ;
					 } 
				 } 
		echo	"</tr>" ;
				 }
		echo	"</tbody>
				</table>" ;
	
	}

	private function cekPositif($array){
		$jum_positif = 0;
		for ($i=1; $i < count($array) ; $i++) { 
		//		echo $array[$i]." ";
			if ($array[$i] < 0) {
				return false;
			} 
			else {
				$jum_positif++;
			}
		}
	/*	echo "<br/>";
		echo "Jumlah Positif: ". $jum_positif. "<br/>";
		echo "count array: ". count($array);*/

		if ($jum_positif == (count($array) - 1)) {
			return true;
		} else {
			return false;
		}
	}

	private function result($MATRIKS,$Jum_Kolom,$Jum_Baris,$getMakanan,$jumlahMakanan){
		$hasil = array() ;
		$cek = array() ;
		$x = array() ;
		$count = 0 ;

		//memasukkan identitas x dan nama
		for ($i=0; $i < $jumlahMakanan; $i++) { 
			$x[$i][0] = "x".($i+1);
			$x[$i][1] = $getMakanan[$i]['nama_makanan'] ;
		}

		//cek apakah ada var x dalam matriks
		for ($i=1; $i <= $Jum_Baris ; $i++) { 
			if (substr($MATRIKS[$i][0], 0, 1) == "x") {
					$cek[$count][0] = $MATRIKS[$i][0];
					$cek[$count][1] = $MATRIKS[$i][$Jum_Kolom];
					$count++;	
			}
		}
		
		$temp = array();
		for ($i=0; $i < $jumlahMakanan; $i++) {
			$flag = false;

			for ($j=0; $j < $count ; $j++) { 
			
				if ($x[$i][0] == $cek[$j][0]) {
					$flag = true;
					$temp[0] = $x[$i][0] ;
					$temp[1] = $x[$i][1] ;
					$temp[2] = $cek[$j][1];	
				}
				
			}
			if ($flag == true)
			{
				$hasil[$i][0] = $temp[0] ;
				$hasil[$i][1] = $temp[1] ;
				$hasil[$i][2] = $temp[2];				
			}
			else{
				$hasil[$i][0] = $x[$i][0] ;
				$hasil[$i][1] = $x[$i][1] ;
				$hasil[$i][2] = 0;
				}
		}
		
		return $hasil ;
	}

	public function nutrisiuser(){
		$data['username']=$this->session->userdata('username');
		$data['status']=$this->session->userdata('status');

		$data['pilihmakanan']=$this->input->post("pilihmakanan");
		$data['minKendala'] = 1;

		if ($data['status']== 'true') {
			$data['kebutuhanUser'] = $this->hitungNutrisi($data,$data['pilihmakanan']);
			
			$data['getMakanan'] = $this->getMakanan($data,$data['pilihmakanan']);	
			$data['countMakanan'] = $this->countMakanan($data['getMakanan']) ;
			$data['countNutrisi'] = $this->countNutrisi($data['kebutuhanUser']) ;
			if ($data['countMakanan'] == 0) {
				redirect('user/pilihmakanan','refresh') ;
			}
			else
			$data['fungsiTujuan'] = $this->fungsiTujuan($data['getMakanan'],$data['countMakanan']);
			$data['fungsiKendala'] = $this->fungsiKendala($data['kebutuhanUser'],$data['countMakanan'],$data['countNutrisi'],$data['getMakanan'],$data['minKendala']);
			$modelStandar = $this->modelStandar($data['countMakanan'],$data['countNutrisi'],$data['fungsiKendala'],$data['fungsiTujuan'],$data['minKendala']);
			$data['modelStandar_Tujuan'] = $modelStandar[0] ;
			$data['modelStandar_Kendala'] = $modelStandar[1] ;
			// fungsi tabel matriks awal
			$tabelMatriksAwal = $this->tabelMatriksAwal($data['kebutuhanUser'],$data['countMakanan'],$data['getMakanan'],$data['minKendala']);
			$data['MATRIKS'] = $tabelMatriksAwal[0];
			$data['MATRIKS_AWAL'] = $tabelMatriksAwal[0];
			$data['Jum_Baris'] = $tabelMatriksAwal[1];
			$data['Jum_Kolom'] = $tabelMatriksAwal[2];


		//	$this->tampilTabelAwal($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom']) ;
			$data['countIterasi'] = 0;
			do {
		//		echo "Iterasi ke -".$data['countIterasi'];
				$zj_cjzj= $this->cjzj($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom']);
				$data['Zj'] = $zj_cjzj[0];
				$data['CjZj'] = $zj_cjzj[1];
				
				// minimum negatif CjZj terbesar(kolom pengganti)
				$kolomPengganti =  $this->kolomPengganti($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['Zj'],$data['CjZj']) ;
				$data['CjZjKolTerpilih'] = $kolomPengganti[0] ;
				$data['indexKolTerpilih'] = $kolomPengganti[1] ;
		//		$this->tampilCJZJ($data['MATRIKS'],$data['Zj'],$data['CjZj'],$data['CjZjKolTerpilih'],$data['indexKolTerpilih'],$data['Jum_Kolom']);

				// mencari baris yang terganti 
				$barisTerganti = $this->barisTerganti($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['indexKolTerpilih']) ;
				$data['hasilBagi'] =$barisTerganti[0] ;
				$data['barTerpilih'] = $barisTerganti[1] ;
				$data['indexBarTerpilih'] = $barisTerganti[2] ;
		//		$this->tampilBarisKunci($data['MATRIKS'],$data['barTerpilih'],$data['indexBarTerpilih'],$data['indexKolTerpilih'],$data['hasilBagi'],$data['Jum_Kolom'],$data['Jum_Baris']);

				//koefisien baru yang masuk
		//		$setMatriks = array();
					
				$data['MATRIKS'] = $this->revKoefisienBaru($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom'],$data['indexKolTerpilih'],$data['indexBarTerpilih']);
		//		$this->tampilTabel($data['MATRIKS'],$data['Jum_Baris'],$data['Jum_Kolom']) ;
				
		//		$setMatriks[] = $data['MATRIKS'];
				$data['countIterasi']++;
				$data['CjZj'] = $zj_cjzj[1];
			/*	if ($data['countIterasi'] == 15) {
					break;
				}
				echo "<br> nilai CjZj = ".$data['CjZj'] ;*/

			}
			while($this->cekPositif($data['CjZj']) == false);
		//	$data['SETMATRIKS'] = $setMatriks;	
			
			$data['result'] = $this->result($data['MATRIKS'],$data['Jum_Kolom'],$data['Jum_Baris'],$data['getMakanan'],$data['countMakanan']);

			$this->load->view('header');
			$this->load->view('nutrisiuser', $data);
			$this->load->view('footer') ;
		}
		else{
			$this->load->view('header');
			$this->load->view('belumlogin');
			$this->load->view('footer');
		}
	
	}
	
}