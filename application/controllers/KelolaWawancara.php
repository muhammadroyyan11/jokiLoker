<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaWawancara extends CI_Controller
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
            'wawancara' => $this->base->getWawancara()->result_array(),
            'title' => 'Wawancara',

        ];
        $this->template->load('template', 'kelolaWawancara/data', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Lowongan',
            'kategori'  => $this->base->getSub()->result_array()
        ];
        $this->template->load('template', 'kelolaLowongan/add', $data);
    }

    public function report($id)
    {
        $data = [
            'wawancara' => $this->base->getPeserta(['wawancara_id' => $id])->result_array(),
            // 'row' => $this->ujian->getLead(['ujian_id' => $id, 'el_hasil.status' => 0])->row(),
            // 'id'    => $id,
            'title' => 'Daftar Peserta Wawancara'
        ];
        $this->template->load('template', 'kelolaWawancara/report', $data);
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Lowongan',
            'row'       => $this->base->get('lowongan', ['id_lowongan' => $id])->row(),
            'kategori'  => $this->base->getSub()->result_array()
        ];
        $this->template->load('template', 'kelolaLowongan/edit', $data);
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
            'section'   => $post['section'],
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
            'title' => $post['nama'],
            'seo_title' => slugify($post['nama']),
            'requirements' => $post['requrement'],
            'deskripsi' => $post['deskripsi'],
            'dept_id' => $post['dept_id'],
            'tipe' => $post['tipe'],
            'created' => date('Y-m-d'),
            'section'   => $post['section'],
            'is_active' => '1'
        ];

        // if ($post['dept_id'] != null) {
        //     $params['dept_id'] = $post['dept_id'];
        // }


        // if ($post['tipe'] != null) {
        //     $params['tipe'] = $post['tipe'];
        // }


        $this->base->edit('lowongan', $params, ['id_lowongan' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('kelolaLowongan');
    }

    public function delete($id)
    {
        $this->base->del('lowongan', ['id_lowongan' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Terjadi kesalahan menghapus data!', FALSE);
        }

        redirect('kelolaLowongan');
    }
}