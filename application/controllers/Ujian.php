<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
    }

    public function index()
    {
        $data = [
            'ujian' => $this->base->get('ujian')->result_array(),
            'lowongan' => $this->base->get('lowongan')->result_array(),
            'title' => 'Ujian'
        ];
        $this->template->load('template', 'Ujian/data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);

        $cek_ujian = $this->base->get('ujian', ['lowongan_id' => $post['lowongan_id']])->num_rows();

        if ($cek_ujian > 0) {
            set_pesan('Ujian dengan lowongan tersebut sudah ada', FALSE);
        } else {
            $params = [
                'nama_ujian' => $post['ujian'],
                'jenis' => $post['jenis'],
                'jumlah_soal' => $post['jumlah'],
                'waktu' => $post['waktu'],
                'tgl_dibuat' => date('Y-m-d h:i:s'),
                'tgl_selesai' => $post['tgl_selesai'],
                'lowongan_id' => $post['lowongan_id'],
                'token' => strtoupper(random_string('alpha', 5)),
            ];
            // var_dump($params);
            $this->base->add('ujian', $params);

            if ($this->db->affected_rows() > 0) {
                set_pesan('Data berhasil disimpan');
            } else {
                set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
            }
        }

        redirect('Ujian');

    }

    public function prosesEdit($id)
    {
        $post = $this->input->post(null, true);

        $params = [
            'nama_ujian' => $post['ujian']
        ];

        $this->base->edit('ujian', $params, ['id_ujian' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('Ujian');
    }

    public function delete($id)
    {
        $this->base->del('Ujian', ['id_Ujian' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Terjadi kesalahan menghapus data!', FALSE);
        }

        redirect('Ujian');
    }
}
