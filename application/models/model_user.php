<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Model_user extends CI_Model
{
      
	function checkUser(){
	$sql = "SELECT * FROM user WHERE username=? AND password=?";
        $data = array($this->input->post('username'),
                        $this->input->post('password'));
        $query = $this->db->query($sql,$data);
        if($query->num_rows() > 0) {
                return "true"; } 
        else {
                return "false";
	       }
        }       

        function aktifitas(){
        $query=$this->db->query("SELECT * FROM aktifitas");
        return $query->result() ;
        }

        //insert user account
        function insertUser(){
        $sql = "INSERT INTO user(username,password) VALUES (?,?)";
        $data = array($this->input->post('username'),
                        $this->input->post('password'));
        $query = $this->db->query($sql,$data);
        }

        //insert profil individu
        function insertPI(){
        $sql = "INSERT INTO profil_individu(username,nama,usia,jenis_kelamin,berat_badan,tinggi_badan,id_aktifitas) 
                VALUES (?,?,?,?,?,?,?)";
        $data= array($this->input->post('username'),
                        $this->input->post('nama'),
                        $this->input->post('usia'),
                        $this->input->post('jk'),
                        $this->input->post('berat'),
                        $this->input->post('tinggi'),
                        $this->input->post('aktifitas'));                                                                       
        $query = $this->db->query($sql,$data);
        }

        function updatePI($username,$nama,$usia,$jk,$bb,$tb,$id_aktifitas){
        $query = $this->db->query("UPDATE profil_individu 
                                SET nama='$nama',usia='$usia',jenis_kelamin='$jk',
                                berat_badan='$bb',tinggi_badan='$tb',id_aktifitas='$id_aktifitas' 
                                WHERE username='$username' ");        
        }

        function profilku($username){
        $query=$this->db->query("SELECT * FROM profil_individu p JOIN user u ON p.username=u.username                                   
                                        JOIN aktifitas a ON p.id_aktifitas=a.id_aktifitas
                                        WHERE p.username='$username'");
        return $query->result() ;      
        }

        function lihatProfil(){
        $query=$this->db->query("SELECT * FROM profil_individu");
        return $query->result() ;
        }

        function makanan(){
        $query=$this->db->query("SELECT * FROM makanan");
        return $query->result() ;
        }

        function getMakanan($pilihmakanan){
        $query = $this->db->query("SELECT * FROM makanan WHERE id_makanan = '$pilihmakanan' ");
        return $query->row_array();
        }
       
        function checkTanggal($tanggal){
        $sql= "SELECT * FROM rekam_kebutuhan WHERE tanggal='$tanggal' " ;
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            return "true"; } 
        else {
            return "false";
              }
       }

        function insertRekamKebutuhan($tanggal,$username,$gizi,$harga){
       $sql = "INSERT INTO rekam_kebutuhan(tanggal,username,takaran_konsumsi,total_harga) 
                VALUES ('$tanggal','$username','$gizi','$harga')";                                                                   
       $query = $this->db->query($sql);
       }

        function rekamKebutuhan($username){
       $sql = "SELECT * FROM rekam_kebutuhan WHERE username='$username' ";                                                                   
       $query = $this->db->query($sql);
       return $query->result();
       }  
}