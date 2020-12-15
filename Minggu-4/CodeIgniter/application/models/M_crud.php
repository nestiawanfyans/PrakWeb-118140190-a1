<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model {

    // semua yang ada pada model ini saling terhubungkan dengan Controller yang ada pada: Aplication/Controller/Home.php

    public function loginQuery($where)
    {
        // ketika method loginQuery mendapatkan parameter untuk mengisi sql WHERE.
        // maka selanjutnya method ini akan menampilkan nilai data yang ada pada table tbl_user pada database, dimana(WHERE) username = $username (data dari $where)
        // kemudian data akan diambil dan di kirimkan ke Aplication/Controller/Home.php
        return $this->db->select('*')->from("tbl_users")->where($where)->get();
    }

    public function insertUser($table, $data)
    {
        // menmabahan data ke dalam data table "tbl_user" yang diterima dari parameter $table. dengan data dari parameter $data
        // ex: insert into $table('tbl_users') values $data(data yang dikirimkan dari controller: Aplication/Controller/Home.php)
        return $this->db->insert($table, $data);
    }

    public function uploadArticle($table, $data)
    {
        // menmabahan data ke dalam data table "tbl_article" yang diterima dari parameter $table. dengan data dari parameter $data
        // ex: insert into $table('tbl_article') values $data(data yang dikirimkan dari controller: Aplication/Controller/Home.php)
        return $this->db->insert($table, $data);
    }

    public function getArticle()
    {
        // mengambil data seluruhnya dari table 'tbl_article' dimana datanya diurut dari yang terbaru kemudian datanya diambil dan dikirimkan
        // dikirimkan ke contoller: Aplication/Controller/Home.php
        return $this->db->select("*")->from("tbl_article")->order_by("created_at", "desc")->get();
    }

    public function deleteArticle($data, $table)
    {
        // menima parameter $data('id' => $id (dari controller: Aplication/Controller/Home.php)) dan nama table yaitu $table('tbl_article');
        // where($data) => Where id = $id;
        $this->db->where($data);
        // Delete Form tbl_article
        $this->db->delete($table);

        // digabung menjadi : Delete Form tbl_article where($data) => Where id = $id;
    }

    public function getUpdate($table, $data)
    {
        // mengambil data dari nama table: $table('tbl_article') dimana(Where) $data('id' = $id)
        return $this->db->get_where($table, $data);
    }

    public function updateArticle($table, $data, $where)
    {
        //penjelasan yang sama pada line 39 - 45, pada Model: Aplication/Models/M_crud.php

        $this->db->where($where);
        $this->db->update($table, $data);
    }
}