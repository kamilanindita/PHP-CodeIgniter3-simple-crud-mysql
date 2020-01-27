<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_Model extends CI_Model
{

	private $table = 'buku';
	    
    public function getBuku(){
        try
        {
            $hasil=$this->db->get($this->table)->result_array();
            return $hasil;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function addBuku(){
        $data=[
            "penulis"=>$this->input->post('penulis',true),
            "judul"=>$this->input->post('judul',true),
            "kota"=>$this->input->post('kota',true),
            "penerbit"=>$this->input->post('penerbit',true),
            "tahun"=>$this->input->post('tahun',true)
        ];

        try
        {
            $hasil=$this->db->insert($this->table,$data);
            if($hasil==1){
                return TRUE;
            }

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }

    public function getBukuBy($id){
        try
        {
            $hasil=$this->db->get_where($this->table,['id'=>$id])->row_array();
            return $hasil;

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function updateBukuBy($id){
        $data=[
            "penulis"=>$this->input->post('penulis',true),
            "judul"=>$this->input->post('judul',true),
            "kota"=>$this->input->post('kota',true),
            "penerbit"=>$this->input->post('penerbit',true),
            "tahun"=>$this->input->post('tahun',true)
        ];

        try
        {
            $this->db->where('id',$id);
            $hasil=$this->db->update($this->table,$data);
            if($hasil==1){
                return TRUE;
            }

        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function deleteBukuBy($id){
        try
        {
            $hasil=$this->db->delete($this->table,['id'=>$id]);
            if($hasil==1){
                return TRUE;
            }

        }catch(Exception $e)
        {
           echo $e->getMessage();
        }
    }

}