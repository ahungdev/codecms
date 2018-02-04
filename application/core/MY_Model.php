<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $_table;

	public function __construct()
    {
        parent::__construct();
    }

    public function count_by($where = [])
    {
        return $this->db->where($where)
            ->count_all_results($this->_table);
    }

    public function find_by($where = [])
    {
        return $this->db->where($where)
            ->get($this->_table)
            ->row();
    }

    public function count_all()
    {
        return $this->db->count_all_results($this->_table);
    }

    public function fetch_all()
    {
        return $this->db->get($this->_table)->result();
    }

    public function get_list($limit = 10, $offset = 0)
    {
        return $this->db->limit($limit, $offset)
            ->get($this->_table)
            ->result();
    }

    public function get_list_by($limit = 10, $offset = 0, $where = [])
    {
        return $this->db->like($where)
            ->limit($limit, $offset)
            ->get($this->_table)
            ->result();
    }

    public function get_list_export($where = [])
    {
        return $this->db->like($where)
            ->get($this->_table)
            ->result();
    }

    public function check_exist($where = [])
    {
        return $this->db->where($where)
            ->count_all_results($this->_table) > 0;
    }

    public function check_exist_update($where = [], $id = 0)
    {
        return $this->db->where($where)
            ->where('id <>', $id)
            ->count_all_results($this->_table) > 0;
    }

    public function create($data = [])
    {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    public function update($data = [], $where = [])
    {
        return $this->db->where($where)
            ->update($this->_table, $data);
    }

    public function delete($where = [])
    {
        return $this->db->where($where)
            ->delete($this->_table);
    }

    public function publish($where = [])
    {
        return $this->db->where($where)
            ->update($this->_table, ['status' => '1']);
    }

    public function unpublish($where = [])
    {
        return $this->db->where($where)
            ->update($this->_table, ['status' => '0']);
    }

    protected function create_uuid()
    {
        $uuid_query = $this->db->query('SELECT UUID()');
        $uuid_rs = $uuid_query->result_array();
        return $uuid_rs[0]['UUID()'];
    }
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */