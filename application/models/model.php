<?php

/**
 * Description of NewsModel
 *
 * @author Hoang Bui
 */
class Model extends CI_Model {

    protected $table;
    protected $table_prefix = 'sea_';

    public function __construct() {
        parent::__construct();
    }

    public function setTable($table = 'users') {
        $this->table = $this->table_prefix . $table;
    }

    public function getTable() {
        return $this->table;
    }

    public function fetchall($page = 1, $limit = 20, Array $wheres = array(), Array $orders = array(), Array $joins = array(), $groups = "", $having = "") {
        $this->db->select('a.*')->from($this->table . ' as a');
        if (is_array($joins)) {
            foreach ($joins as $join) {
                $this->db->select($join['map_select']);
                $this->db->join($join['map_on'], $join['map_alias'], $join['map_type']);
            }
        }
        if (is_array($wheres)) {
            foreach ($wheres as $where) {
                $this->db->where($where);
            }
        }
        if ($groups):
            $this->db->group($groups);
        endif;

        if ($having):
            $this->db->having($having);
        endif;

        if (!empty($orders)):
            foreach ($orders as $key => $order):
                $this->db->order_by($key, $order);
            endforeach;
        endif;
        if ($limit):
            $this->db->limit($limit, $page);
        endif;
        $result = $this->db->get();
        return $result->result_array();
    }

    public function delete(Array $ids) {
        $this->db->WHERE_IN('id', $ids);
        $this->db->DELETE($this->table);
        return true;
    }

    public function finds($ids) {
        $this->db->SELECT()->FROM($this->table)->WHERE_IN('id', $ids);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function find($id) {
        $this->db->SELECT()->FROM($this->table)->WHERE('id', $id);
        $q = $this->db->get();
        return $q->first_row("array");
    }

    public function many_search($wheres) {
        $this->db->SELECT()->FROM($this->table)->WHERE($wheres);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function search($column, $keyword) {
        $this->db->SELECT()->FROM($this->table)->WHERE($column, $keyword);
        $q = $this->db->get();
        return $q->result_array();
    }

    public function search_one($column, $keyword) {
        $this->db->SELECT()->FROM($this->table)->WHERE($column, $keyword);
        $q = $this->db->get();
        return $q->first_row('array');
    }

    public function count($wheres = "") {
        $this->db->select('id');
        $this->db->from($this->table);
        if ($wheres):
            $this->db->where($wheres);
        endif;
        return $this->db->count_all_results();
    }

    public function save($data) {
        if (isset($data['id'])):
            $this->db->where('id', $data['id']);
            $this->db->update($this->table, $data);
        else:
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        endif;
        return true;
    }

}
