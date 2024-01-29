<?php
class M_data extends CI_Model{
//untuk update data ganti password
function update_data($table,$data,$where) {
$this->db->where($where);
$this->db->update($table,$data);
}
}
