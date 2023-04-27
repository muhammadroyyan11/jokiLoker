<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubKategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->model('Chart_model', 'chart');
    }

    public function index()
    {
        $data = [
            'sub' => $this->base->getSub()->result_array(),
            'kategori' => $this->base->get('kategori')->result_array(),
            'title' => 'Sub Kategori'
        ];

        $this->template->load('template', 'SubKategori/data', $data);
    }

    public function add()
    {
        $data = [
            'sub' => $this->base->getSub()->result_array(),
            'kategori' => $this->base->get('kategori')->result_array(),
            'title' => 'Sub Kategori'
        ];


        // $this->template->load('template', 'SubKategori/data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);

        $params = [
            'nama_sub' => $post['nama_sub'],
            'kategori_id' => $post['kategori'],
        ];

        $this->base->add('sub_kategori', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('SubKategori');
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
        $this->base->del('sub_kategori', ['id_sub' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Terjadi kesalahan menghapus data!', FALSE);
        }

        redirect('subKategori');
    }
}
