<?php
    class M_Operator extends CI_Model {

         public function Tampil(){
         $query = $this->db->get('tbl_operator');
         $data=$query->result_array();
         return $data;
        }
        public function save($nama,$alamat,$jk,$telp){
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'jk' => $jk,
            'telp' => $telp
        );
    
        $this->db->insert('tbl_operator', $data);
    }

    public function pilih_operator($id){
        $query = $this->db->get_where('tbl_operator', array('id' => $id));
        return $query;
    }

    public function edit($id,$nama,$alamat,$jk,$telp){
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'jk' => $jk,
            'telp' => $telp
                );
    
        $this->db->where('id', $id);
        $this->db->update('tbl_operator', $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_operator');
    }

}
?>