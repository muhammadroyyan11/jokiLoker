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
            'title' => 'Lowongan',

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

        $paramsLowongan = [
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

       
        $return_id =   $this->base->insert('lowongan', $paramsLowongan);

        // var_dump($return_id);

        $paramsUjian = [
            'nama_ujian' => 'Test '. $post['nama'],
            'jenis' => $post['jenis'],
            'jumlah_soal' => $post['jumlah'],
            'waktu' => $post['waktu'],
            'tgl_dibuat' => date('Y-m-d h:i:s'),
            'tgl_selesai' => $post['tgl_selesai'],
            'lowongan_id' => $return_id,
            'token' => strtoupper(random_string('alpha', 5)),
        ];

        $this->base->add('ujian', $paramsUjian);

        $paramsWawancara = [
            'nama_wawancara' => 'Wawancara ' . $post['nama'],
            'tanggal'        => $post['tgl_wawancara'],
            'lowongan_id'    => $return_id
        ];

        $this->base->add('wawancara', $paramsWawancara);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        redirect('KelolaLowongan');
    }

    public function report($id)
    {
        $data = [
            'ujian' => $this->ujian->getLead(['ujian_id' => $id, 'el_hasil.status' => 0])->result_array(),
            'row' => $this->ujian->getLead(['ujian_id' => $id, 'el_hasil.status' => 0])->row(),
            'id'    => $id,
            'title' => 'Report Ujian'
        ];
        $this->template->load('template', 'kelolaLowongan/report', $data);
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

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi kesalahan menyimpan data!', FALSE);
        }

        // if (isset($_POST['add'])) {
        //     $dataPengajar = array(
        //         'nip' => $post['nip'],
        //         'nama' => $post['nama'],
        //         'jenis_kelamin' => $post['jenis_kelamin'],
        //         'tempat_lahir' => $post['tempat_lahir'],
        //         'tgl_lahir' => $post['tgl_lahir'],
        //         'alamat' => $post['alamat'],
        //         'foto' => 'user.jpg',
        //         'status' => 0
        //     );

        //     $return_id =  $this->admin->insert($dataPengajar, 'el_pengajar');

        //     // foreach ($return_id as $key => $data) {
        //     //     echo $data->id_pengajar;   
        //     // }
        //     // var_dump($params2,$getId);
        //     $dataLogin = array(
        //         'email' => $post['email'],
        //         'password' => password_hash('password', PASSWORD_DEFAULT),
        //         'pengajar_id' => $return_id,
        //         'role' => 2,
        //     );
        //     $this->admin->insert($dataLogin, 'el_login');
        //     redirect('admin/Datapengajar');
        //     // var_dump($dataLogin);
        // }

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

    public function toggle($getId)
    {
        $status = $this->base_model->getUser('lowongan', ['id_lowongan' => $getId])['is_active'];
        $toggle = $status ? 0 : 1;
        $pesan = $toggle ? 'lowongan diaktifkan.' : 'lowongan dinonaktifkan.';

        if ($this->base_model->update('lowongan', 'id_lowongan', $getId, ['is_active' => $toggle])) {
            set_pesan($pesan);
        }
        redirect('keloaLowongan');
    }
}
