<?php
    class Operator extends CI_Controller{

        public function __construct () {
             parent::__construct();
             $this->load->model('M_Operator');
        }

        public function index(){
            $this->select();
            
        }

        public function select(){
            
            
            $data['judul']="Data Nama Operator";
            $data['operator']=$this->M_Operator->Tampil();
            $this->load->view('template/header' ,$data);
            $this->load->view('operator/view_data' ,$data);
            $this->load->view('template/footer');
            
            
        }

        public function tambah(){
            $data['judul']="Tambah Data Nama Operator";
            $this->load->view('template/header' ,$data);
            $this->load->view('operator/form_tambah');
            $this->load->view('template/footer');
        }

        public function insert(){
            $nama=$this->input->post('nama');
            $alamat=$this->input->post('alamat');
            $jk=$this->input->post('jk');
            $telp=$this->input->post('telp');
            //echo $anggota.$alamat;
            $this->M_Operator->save($nama, $alamat, $jk, $telp,);
            redirect('operator'); 
        }

        public function get_edit(){
            $id=$this->uri->segment(3);
            //echo "$id";
            $hasil=$this->M_Operator->pilih_operator($id);
            $o=$hasil->row_array();
            $data = array(
                'nama' => $o['nama'],
                'alamat' => $o['alamat'],
                'jk' => $o['jk'],
                'telp' => $o['telp'],
                'id' => $o['id']
            );

            $data['judul']="Ubah Data Nama Operator";
            $this->load->view('template/header' ,$data);
            $this->load->view('operator/form_ubah', $data);
            $this->load->view('template/footer');

        }

        public function update(){
            $id=$this->input->post('id');
            $nama=$this->input->post('nama');
            $alamat=$this->input->post('alamat');
            $jk=$this->input->post('jk');
            $telp=$this->input->post('telp');
            //echo "$id.$alamat.$anggota "; 
            
            $this->M_Operator->edit($id,$nama,$alamat,$jk,$telp);
            redirect('operator');

        }
        public function hapus(){
            $id=$this->uri->segment(3);
            //echo"hapus".$id;
            $this->M_Operator->delete($id);
            redirect('operator');
        }
    }
?>