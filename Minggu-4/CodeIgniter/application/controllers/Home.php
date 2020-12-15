<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('m_crud');
    }
    
    public function index()
    {
        // cek apakah userdata pada session dengan nama "Status" berisi data "login"
        // jika tidak akan menampilan/load view "home.login" yang berada pada folder : "Aplication/views/home/login.php
        if($this->session->userdata('status') == 'login'){ // if (true) pergi ke Method Article pada Controler/Home.php else akan load views/home/login.php

            // jika userdata session dengan nama "status" miliki data "login" maka akan redirect ke halaman Home/Artcile
            // dimana itu terdapat pada Conntroller/Home.php, dengan Class Home nama Method Article
            redirect('home/article');

        } $this->load->view('home/login');
    }

    public function loginAction()
    {

        // Mengambil data dengan method POST yang dikirimkan oleh Form dari file : Views/home/login.php
        //menampung data username dan password dalam variable $username dan $password
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // variable Where digunkan untuk kondisi sql Where yang nantinya akan dirimkan ke Model dan di oleh oleh model dengan SQL,
        $where = [ 
            // key 'username' pada array diambil dari nama kolom pada database 'tbl_users' yang saya buat.
            // key username diisi dengan data dari variable $username,
            // Note: penjelasan query ada pada file Aplication/Models/M_crud.php
            'username'  => $username,
        ];

        // membuat variabel dengan nama cekQuery, dimana diisi dengan memanggil model m_crud -> dengan method loginQuery(parameternya: var $where)
        // ->row() bergunaa untuk mengambil data yang pertama, jika didapatkan data lebih dari 1, maka data yang muncul paling pertama akan diambil dan di eksekusi.
        // cara baca kode : $this->m_crud (berarti memanggil model m_crud yang ada pada folder : Aplication/Model/M_crud.php) ->loginQuery (nama Method yang ada pada class model M_Crud); dengan dikirmkan parameter dari var $where;
        $cekQuery = $this->m_crud->loginQuery($where)->row();

        // setelah aksi diatas make var $cekQuery akan menerima return berupa true atau false.
        // jika di dalam aksi model diatas menandakan bahwa username tersedia maka var $cekQuery akan menyimpan data yang telah di ambil oleh model melalui query sql.
        // jika data tidak ada maka var $cekQuery akan berisikan kosong, atau false.
        if($cekQuery){
            

            // membuat 2 variable yaitu $truePass dan $roleAccess
            // $truePass untuk memeriksa apakah password yang diinputkan dari form login (Aplication/Views/Login.php) sama dengan password yang ada pada database.
            // karena saya menggunakan password_hash() pada register. maka untuk pencocokannya menggunakan password_verif({data pass dari form }, {data dari pass database})
            // $cekQuery->password maksudnya adalah mengambil data password yang telah kita pilih dengan menggunakan query sql. jadi $cekQuery->password. jika bingung coba untuk tampilkan var $cekQuery dengan cara : print_r($cekQuery); return 0;
            $truePass       = password_verify($password, $cekQuery->password);

            //---------------------------------------------
            // jika kamu tidak menggunakan hash kamu bisa mengganti isi pada var $truePass dengan cara berikut : 
            // --------------------------------------------
            // $truePass = false;
            // if($data->password == $password){
            //  $truePass = true;
            // }
            //---------------------------------------------

            // var $roleAccess digunakan untuk menampung data role dari database untuk hak akses masing masing pengguna.
            // jika kamu penasaran bisa lakukan cek data dengan cara : print_r($cekQuery->role); return 0;
            $roleAccess     = $cekQuery->role;

            // jika $truePass = true maka username dan password sama dengan yang ada pada database, maka login berhasil,
            // jika false maka akan menampilkan pesan "password salah" dan kembali ke halaman login.
            if($truePass){

                // kemudian kita membuat data session, dengan membuat var terlebih dahulu dengan nama $sess_data diikuti dengan nama key pada array
                // ini sama aja serperti : 
                /* 
                    $sess_data = array([
                        'username'      => $cekQuery->username,
                        'email'         => $cekQuery->email,
                        'role'          => $cekQuery->role,
                        dll....
                    ]);
                */
                $sess_data['id']        = $cekQuery->id;
                $sess_data['username']  = $cekQuery->username;
                $sess_data['email']     = $cekQuery->email;
                $sess_data['role']      = $cekQuery->role;
                $sess_data['status']    = "login";

                // ketika sudah di set datanya dan disimpan ke bar $sess_data, maka kita akan simpan ke user data dengan cara
                // set_userdata(parameter: $sess_data);
                // session->set_userdata(parameter: $sess_data) sudah bawaan Session dari CodeIgniter, jadi kalo kita mau menggunakan data auth bisa menggunakan session tanpa harus menggunakan query kembali.
                $this->session->set_userdata($sess_data);

                if($roleAccess == 1002){
                    // echo "user biasa";
                    redirect('home/article');
                    return 0;
                } else if($roleAccess == 1001){
                    // echo "admin";
                    redirect('home/article');
                    return 0;
                }
            } else {
                $this->session->set_flashdata("danger", "Password yang anda Masukkan Salah, Coba kembali.");
                redirect('home');
                return 0;
            }
            //return article
        } else {
            $this->session->set_flashdata("danger", "Akun Tidak ada, Silakan Buat Akun Terlebih Dahulu.");
            redirect('home');
            return 0;
        }  
    }

    public function register()
    {
        // menampilkan atau load view home/register dari file: Aplication/Views/home/register.
        $this->load->view('home/register');
    }

    public function registerProcess()
    {

        // ketiga code ini merupakan sebuah validasi form, dimana saya buat validasi form ini digunakan ketika form itu wajib diisi atau memiliki syarat lainnya, seperti, form harus bertipe email, atau ada batasn max or min dari karakter yang diinput, dll.
        // form_validasion kita ambil dai library yang telah kita pasang di __construct, yaiatu pada library.
        // menggunakan set_rules(), dengan parameter: ->set_rules({nama yang ada form pada file: Aplicaiton/Views/home/register}, {lupa wkwk}, {syarat yang dieprlukan, contoh required}, {pesan jika batasan tidak di penuhi})
        $this->form_validation->set_rules('username','Username','required',array('required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',array('required' => 'Email wajib diisi', 'valid_email' => 'Email Tidak benar'));
        $this->form_validation->set_rules('password','Password','required|trim',array('required' => 'Password wajib diisi'));

        // cek apakah form_validasi jika di jalankan bernilai true atau false, jika true != fasle maka form tetelah dinyatakan lolos syarat
        // jika false != false maka form dinyatakan tidak lolos sesuai syarat, maka akan dialihkan ke method register yang berada pada: Aplication/Controller/home.php; 
        if($this->form_validation->run() != false){

            // disini penjelasannya sama dengan line 31 - 32 diatas, 
            // yaitu mengambil data dari form register yang berada pada: Aplication/views/home/register.php 
            $username   = $this->input->post('username');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');

            // karena saya menggunakan password_hash dikarenakan saya mau menyimpas password saya dengan hash. agar tidak diketahui oleh orang lain
            // jika kamu tidak mau menggunakannya maka hapus saja kode dibawah ini. 
            $password   = password_hash($password, PASSWORD_DEFAULT);

            // var $data ini nantinya akan di masukkan sebagai paramter yang akan dikirimkan ke model, dan di insert ke database
            // oleh karena itu nama key pada array yang ada pada var $data harus sama dengan nama yang ada pada kolom table tbl_users yang ada pada database yang saya buat.  
            $data = [
                'username'  => $username,
                'email'     => $email,
                'password'  => $password,
                'role'      => 1002, // 1002 => user biasa, 1001 => admin
            ];

            //ini akan berinteraksi ke database dengan memanggil method insertuser(parameter: {nama table pada database}, {data: $data}) yang terdapat pada: Aplication/Models/M_crud.php
            $this->m_crud->insertUser('tbl_users', $data);
            $this->session->set_flashdata("success", "Pendaftar Telah Berhasil");
            redirect('home');
        } else {
            $this->register();
        }
    }

    public function article()
    {

        // penjelasannya sama dari line 18 - 27.
        // yang berada pada method index di file : Aplication/Controler/Home.php
        // yang menjadi pembeda adalah menampilkan viewnya.

        if($this->session->userdata("status") == "login"){

            $data['dataArticle'] = $this->m_crud->getArticle()->result();

            $this->load->view('home/dataArticle', $data);            
        } else {
            redirect('home', 'refresh');
        }
    }

    public function tambahArticle()
    {
        // penjelasannya sama dari line 18 - 27.
        // yang berada pada method index di file : Aplication/Controler/Home.php
        // yang menjadi pembeda adalah menampilkan viewnya.

        if($this->session->userdata("status") == "login"){
            $this->load->view('home/addArticle', array('error' => ' '));
        } else {
            redirect('home', 'refresh');
        }
    }

    public function tambahArticles()
    {

        // penjelasananya sama dari line 131 - 133. pada file Aplication/Controller/Home.php
        $this->form_validation->set_rules('title','Title','required',array('required' => 'Judul wajib diisi'));
        $this->form_validation->set_rules('article','Article','required',array('required' => 'Artikel Wajib di Isi'));

        if($this->form_validation->run() != false){
            

            // membuat set config untuk insert gambaar
            // key => uplaod_path untuk merujuk file akan di upload ke : './upload/... ';
            $config['upload_path']			=	'./upload/';
            // type inputan file yang bisa diterima, yaitu gif,png, dan jpg
            $config['allowed_types']		=	'gif|png|jpg';
            //max ukuran file yang bisa di upload : 10000 = 10Mb
            $config['max_size']			    =	10000;

            // setup upload file, ini udah bawaab dari CI setupnya, jadi tinggal pake.
            $this->load->library('upload' ,$config);
            $this->upload->initialize($config);

            // mengambil data form dari file view : Aplication/View/home/addArticle.php
            $title      = $this->input->post('title');
            $article    = $this->input->post('article');

            // jika file error atau file null atau kerusakan pada var $config, maka akan menampikan error sesuai dengan error yang diharapkan
            // dan akan di tampilkan pesan errornya ke view AddArticle yang ada pada file : Aplication/View/home/addArticle.php
            // 'cover_img'  adalah nama dari form inputan type file dari view: Aplication/View/home/addArticle.php
            if (!$this->upload->do_upload('cover_img')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('home/addArticle', $error);
                return 0;
                $this->session->set_flashdata('error_upload_Images' ,'gagal upload Images');
            } else {
    
                // kedua kode dibawah untuk mengambil data dari inputan file yang telah di input, 
                $data = array('upload_data' => $this->upload->data());
                $name = $data['upload_data'];
    
                // menyiapkan var $data untuk di insert ke database, sama dengan penjelasan pada line 152 - 153. yang terdapat pada file: Aplicaiton/Controller/home.php
                $data = array(
                    'user_id'   => $this->session->userdata('id'),
                    'title'     => $title,
                    'article'   => $article,
                    'cover_img' => $name['file_name'],
                );
    
                // memanggil model m_crud dan menggunaka methodnya yang bernama uplaodArticle(parameter: {nama table yang ada pada database},  {data: $data})
                $this->m_crud->uploadArticle('tbl_article', $data);
                $this->session->set_flashdata('success', 'Artikel Berhasil ditambahkan');
                redirect('home/article', 'refresh');
                return 0;
            }
        }
    }

    public function logout()
    {
        // menghapus semua session userdata, menjadi kosong kembali. 
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }

    public function deleteArticle($id)
    {
        
        // var $where nantinya akan digunakan sebagai query yang diolah oleh model, dimana akan menecek data yang ada pada table tbl_article where id = $id
        $where = ['id' => $id];

        // memanggil Model m_crud dengan method deleteArticle(parameter: {dataWhere: $where}, {nama table yang ada pada database})
        $this->m_crud->deleteArticle($where, "tbl_article");
        $this->session->set_flashdata('success', 'Berhasil Menghapus Artikel');

        redirect('home/article');
        return 0;
    }

    public function update($id)
    {
        // var $where nantinya akan digunakan sebagai query yang diolah oleh model, dimana akan menecek data yang ada pada table tbl_article where id = $id
        $where = [ 'id' => $id ];

        // memanggil Model m_crud dengan method getupdate(parameter: {nama table yang ada pada database}, {data: $where})
        // yang disimpan pada var $data dengan array key 'article' yang datanya akan ditampilkan pada view: Aplication/View/Home/updateArticle.php
        $data['article'] = $this->m_crud->getUpdate("tbl_article", $where)->result();
        $this->load->view('home/updateArticle', $data);
    }

    public function updates()
    {

        // pada method ini penjelasannya hampir sama dari line 200 - 255 pada methot tambahArticles pada file : Aplication/Controller/Home.php.
        // yang menjadi pembeda adalah, ketika inputan type:file tidak disi makan akan mengUpdata data title dan article saja, dan memakai cover img yang lama 
        // ketika inputan type:file diisi maka akan memperbaharui cover_img pada article menjadi gambar yang baru dimasukkan. 

        $this->form_validation->set_rules('title','Title','required',array('required' => 'Judul wajib diisi'));
        $this->form_validation->set_rules('article','Article','required',array('required' => 'Artikel Wajib di Isi'));

        if($this->form_validation->run() != false){
            
            $config['upload_path']			=	'./upload   /';
            $config['allowed_types']		=	'gif|png|jpg';
            $config['max_size']			    =	10000;

            $this->load->library('upload' ,$config);
            $this->upload->initialize($config);

            $title      = $this->input->post('title');
            $article    = $this->input->post('article');
            $id         = $this->input->post('id');

            $where = ['id' => $id];

            if (!$this->upload->do_upload('cover_img')) {

                $data = array(
                    'title'     => $title,
                    'article'   => $article,
                );

                $this->m_crud->updateArticle('tbl_article', $data, $where);
                $this->session->set_flashdata('success', 'Berhasil Memperbaharui Artikel');
                redirect('home/article', 'refresh');
            } else {
    
                $data = array('upload_data' => $this->upload->data());
                $name = $data['upload_data'];

                $data = array(
                    'title'     => $title,
                    'article'   => $article,
                    'cover_img' => $name['file_name'],
                );

                $this->m_crud->updateArticle('tbl_article', $data, $where);
                $this->session->set_flashdata('success', 'Berhasil Memperbaharui Artikel');
                redirect('home/article', 'refresh');
                return 0;
            }
        }
    }
}