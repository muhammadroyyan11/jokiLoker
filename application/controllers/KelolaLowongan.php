<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaLowongan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Base_model', 'base');
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data = [
            'lowongan' => $this->base->get('lowongan')->result_array(),
            'title' => 'Lowongan'
        ];
        $this->template->load('template', 'kelolaLowongan/data', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Lowongan',
            'kategori'  => $this->base->getSub()->result_array()
        ];
        $this->template->load('template', 'kelolaLowongan/add', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);

        $params = [
            'title' => $post['nama'],
            'seo_title' => slugify($post['nama']),
            'requirements' => $post['requrement'],
            'deskripsi' => $post['deskripsi'],
            'dept_id' => $post['dept_id'],
            'tipe' => $post['tipe'],
            'created' => date('Y-m-d'),
            'is_active' => '1'
        ];

        $this->base->add('lowongan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('KelolaLowongan');
    }

    public function prosesEdit($id)
    {
        $post = $this->input->post(null, true);

        $params = [
            'nama_kategori' => $post['kategori']
        ];

        $this->base->edit('kategori', $params, ['id_kategori' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('Kategori');
    }

    public function delete($id)
    {
        $this->base->del('kategori', ['id_kategori' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Terjadi kesalahan menghapus data!', FALSE);
        }

        redirect('Kategori');
    }
}
