<?php
    class Anggota extends CI_Controller{

        public function __construct () {
             parent::__construct();
             $this->load->model('M_Anggota');
        }

        public function index(){
            $this->select();
            
        }

        public function select(){
            
            
            $data['judul']="Data Anggota Perpustakaan";
            $data['anggota']=$this->M_Anggota->Tampil();
            $this->load->view('template/header' ,$data);
            $this->load->view('anggota/view_data' ,$data);
            $this->load->view('template/footer');
            
            
        }

        public function tambah(){
            $data['judul']="Tambah Data Anggota Perpustakaan";
            $this->load->view('template/header' ,$data);
            $this->load->view('anggota/form_tambah');
            $this->load->view('template/footer');
        }

        public function insert(){
            $anggota=$this->input->post('anggota');
            $alamat=$this->input->post('alamat');
            //echo $anggota.$alamat;
            $this->M_Anggota->save($anggota,$alamat);
            redirect('anggota'); 
        }

        public function get_edit(){
            $id=$this->uri->segment(3);
            //echo "$id";
            $hasil=$this->M_Anggota->pilih_anggota($id);
            $i=$hasil->row_array();
            $data = array(
                'anggota' => $i['anggota'],
                'alamat' => $i['alamat'],
                'idanggota' => $i['idanggota']
            );

            $data['judul']="Ubah Data Anggota Perpustakaan";
            $this->load->view('template/header' ,$data);
            $this->load->view('anggota/form_ubah', $data);
            $this->load->view('template/footer');

        }

        public function update(){
            $id=$this->input->post('idanggota');
            $anggota=$this->input->post('anggota');
            $alamat=$this->input->post('alamat');
            //echo "$id.$alamat.$anggota "; 
            
            $this->M_Anggota->edit($id,$anggota,$alamat);
            redirect('anggota');

        }
        public function hapus(){
            $id=$this->uri->segment(3);
            //echo"hapus".$id;
            $this->M_Anggota->delete($id);
            redirect('anggota');
        }
    }
?>