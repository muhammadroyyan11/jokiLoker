<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data = [
            'title'     => 'Lowongan Open',
            'lowongan'  => $this->base->getLowongan()->result_array(),
            'lamaran'   => $this->base->getLamaran(userdata('id_user'))->result_array(),
            'lamaranCount'   => $this->base->getLamaran(userdata('id_user'))->num_rows(),
            'cv'        => $this->base->get('user', ['id_user' => userdata('id_user')])->row()
        ];

        $this->template->load('front/template', 'front/lowongan/data', $data);
    }

    public function view($slug)
    {
        $data = [
            'title'     => 'Lowongan Open',
            'lowongan'  => $this->base->getLowongan($slug)->row()
        ];

        $this->template->load('front/template', 'front/lowongan/read', $data);
    }

    public function lamar($slug)
    {
        $data = [
            'title'     => 'Lowongan Open',
            'lowongan'  => $this->base->getLowongan($slug)->row(),
            'user'        => $this->base->get('user', ['id_user' => userdata('id_user')])->row()
        ];

        $this->template->load('front/template', 'front/lowongan/lamar', $data);
    }

    public function prosesLamar(Type $var = null)
    {
        $post = $this->input->post(null, true);

        $params = [
            'user_id'       => $post['user_id'],
            'lowongan_id'   => $post['lowongan_id'],
            'deskripsi'     => $post['deskripsi'],
            'status'        => 0
        ];

        var_dump($params);

        $this->base->add('lamaran', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Berhasil melamar, Silahkan cek kelola ujian untuk melakukan pre-test');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('loker');

    }

    public function upload_cv()
    {
        $post = $this->input->post(null, TRUE);

        $config['upload_path']          = './assets/uploads/cv/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = 'CV-'.userdata('nama') . date('ymd') . '-' . substr(md5(rand()), 0, 6);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('cv')) {
            $post['cv'] = $this->upload->data('file_name');
            $this->base->update_cv('id_user', userdata('id_user'), $post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Data Berhasil Dismpan');
                // echo "<script type='text/javascript'>alert('File berhasil disimpan');</script>";
            } else {
                set_pesan('Data Berhasil Dismpan', false);
            }
            redirect('Loker');
        } else {
            set_pesan('Terjadi kesalahan saat mengupload data', false);
        }
    }
}
