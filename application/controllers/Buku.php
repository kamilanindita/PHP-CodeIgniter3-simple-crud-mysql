<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function index()
	{   
        $data=$this->Buku_model->getBuku();
        $this->load->view('buku/index',['data'=>$data]);        
    }
    
    public function tambah(){
        $this->load->view('buku/tambah');
    }

    public function simpan(){
        $hasil=$this->Buku_model->addBuku();
        if($hasil==TRUE){
            redirect('buku');
        }
    }

    public function edit(){
        $id=$this->uri->segment('3');
        $data=$this->Buku_model->getBukuBy($id);
        $this->load->view('buku/edit',['buku'=>$data]);
    }

    public function update(){
        $id=$this->input->post('id',true);
        $hasil=$this->Buku_model->updateBukuBy($id);
        if($hasil==TRUE){
            redirect('buku');
        }
    }

    public function hapus(){
        $id=$this->uri->segment('3');
        $hasil=$this->Buku_model->deleteBukuBy($id);
        if($hasil==TRUE){
            redirect('buku');
        }
    }
}
