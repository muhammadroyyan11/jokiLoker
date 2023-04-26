<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BankSoal extends CI_Controller
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
            'soal' => $this->base->get('soal')->result_array(),
            'title' => 'Bank Soal'
        ];
        $this->template->load('template', 'soal/data', $data);
    }

    public function add()
    {
        $soal = new stdClass();
        $soal->id_soal = null;
        $soal->pertanyaan = null;
        $soal->file = null;
        $soal->p_a = null;
        $soal->p_b = null;
        $soal->p_c = null;
        $soal->p_d = null;
        $soal->file_a = null;
        $soal->file_b = null;
        $soal->file_c = null;
        $soal->file_d = null;
        $soal->tipe_file = null;
        $soal->kunci = null;
        $soal->level = null;
        $soal->pengajar_id = null;

        // $where = array('login_id' => $this->session->userdata('login_session')['user']);
        // $ujian = $this->ujian->get($where)->result();

        $data = [
            'title' => 'Bank Soal',
            'row' => $soal,
            'page' => 'add'
            // 'ujian' => $ujian
        ];

        $this->template->load('template', 'soal/add', $data);
    }

    public function file_config()
    {
        $allowed_type     = [
            "image/jpeg", "image/jpg", "image/png", "image/gif",
            "audio/mpeg", "audio/mpg", "audio/mpeg3", "audio/mp3", "audio/x-wav", "audio/wave", "audio/wav",
            "video/mp4", "application/octet-stream"
        ];
        $config['upload_path']      = FCPATH . 'uploads/bank_soal/';
        $config['allowed_types']    = 'jpeg|jpg|png|gif|mpeg|mpg|mpeg3|mp3|wav|wave|mp4';
        $config['encrypt_name']     = TRUE;

        return $this->load->library('upload', $config);
    }

    public function proses()
    {
        $this->file_config();

        // if ($this->upload->do_upload('file_soal')) {
        //     $post['cv'] = $this->upload->data('file_name');
        //     $this->base->update_cv('id_user', userdata('id_user'), $post);
        //     if ($this->db->affected_rows() > 0) {
        //         set_pesan('Data Berhasil Dismpan');
        //         // echo "<script type='text/javascript'>alert('File berhasil disimpan');</script>";
        //     } else {
        //         set_pesan('Data Berhasil Dismpan', false);
        //     }
        //     redirect('Loker');
        // } else {
        //     set_pesan('Terjadi kesalahan saat mengupload data', false);
        // }

        $post = $this->input->post(null, TRUE);

        $data = [
            'pertanyaan' => $this->input->post('soal', true),
            'kunci'   => $this->input->post('kunci', true),
        ];

        $abjad = ['a', 'b', 'c', 'd'];
        // Inputan Opsi
        foreach ($abjad as $abj) {
            $img_src = FCPATH . 'uploads/bank_soal/';
            // $getsoal = $this->soal->getSoalById($this->input->post('id_soal', true));
            $data['p_' . $abj]    = $this->input->post('jawab_' . $abj, true);
            $file_abj = 'file_' . $abj;

            // input jawaban gambar per opsi 

            if (!empty($_FILES[$file_abj]['name'])) {
                if (!$this->upload->do_upload('file_a')) {
                    $error = $this->upload->display_errors();
                    set_pesan($error, 500, 'File Opsi ' . $abj . ' Error');
                    exit();
                } else {
                    if (isset($_POST['edit'])) {
                        if (!unlink($img_src . $getsoal->$file_abj)) {
                            set_pesan('Error saat delete gambar', 500, 'Error Edit Gambar');
                            exit();
                        }
                    }
                    $data['file_a'] = $this->upload->data('file_name');
                }
                // }
                // $i++;
            }
            if (!empty($_FILES[$file_abj]['name'])) {
                if (!$this->upload->do_upload('file_b')) {
                    $error = $this->upload->display_errors();
                    set_pesan($error, 500, 'File Opsi ' . $abj . ' Error');
                    exit();
                } else {
                    if (isset($_POST['edit'])) {
                        if (!unlink($img_src . $getsoal->$file_abj)) {
                            set_pesan('Error saat delete gambar', 500, 'Error Edit Gambar');
                            exit();
                        }
                    }
                    $data['file_b'] = $this->upload->data('file_name');
                }
            }
            if (!empty($_FILES[$file_abj]['name'])) {
                if (!$this->upload->do_upload('file_c')) {
                    $error = $this->upload->display_errors();
                    set_pesan($error, 500, 'File Opsi ' . $abj . ' Error');
                    exit();
                } else {
                    if (isset($_POST['edit'])) {
                        if (!unlink($img_src . $getsoal->$file_abj)) {
                            set_pesan('Error saat delete gambar', 500, 'Error Edit Gambar');
                            exit();
                        }
                    }
                    $data['file_c'] = $this->upload->data('file_name');
                }
            }
            if (!empty($_FILES[$file_abj]['name'])) {
                if (!$this->upload->do_upload('file_d')) {
                    $error = $this->upload->display_errors();
                    set_pesan($error, 500, 'File Opsi ' . $abj . ' Error');
                    exit();
                } else {
                    if (isset($_POST['edit'])) {
                        if (!unlink($img_src . $getsoal->$file_abj)) {
                            set_pesan('Error saat delete gambar', 500, 'Error Edit Gambar');
                            exit();
                        }
                    }
                    $data['file_d'] = $this->upload->data('file_name');
                }
            }

            // End input jawaban soal 
            // foreach ($_FILES as $key => $val) {
            $img_src = FCPATH . 'uploads/bank_soal/';
            // $getsoal = $this->soal->getSoalById($this->input->post('id_soal', true));

            $error = '';
            // // if ($key === 'file_soal') {
            // if (!empty($_FILES['file_soal']['name'])) {
            //     if (!$this->upload->do_upload('file_soal')) {
            //         $error = $this->upload->display_errors();
            //         var_dump($error);
            //         set_pesan($error, 500, 'File Soal Error');
            //         exit();
            //     } else {
            //         if (isset($_POST['edit'])) {
            //             if (!unlink($img_src . $getsoal->file)) {
            //                 set_pesan('Error saat delete gambar <br/>' . var_dump($getsoal), 500, 'Error Edit Gambar');
            //                 exit();
            //             }
            //         }
            //         $data['file'] = $this->upload->data('file_name');
            //         $data['tipe_file'] = $this->upload->data('file_type');
            //     }
            // }
            // // }

            if (!$this->upload->do_upload('file_soal')) {
                $data['file'] = $this->upload->data('file_name');
                $data['tipe_file'] = $this->upload->data('file_type');
                // redirect('Loker');
            } else {
                $error = $this->upload->display_errors();
                var_dump($error);
                // set_pesan('Terjadi kesalahan saat mengupload data', false);
            }
        }

        // $data['ujian_id'] = $this->input->post('ujian_id', true);

        var_dump( $data['file']);

        // if (isset($_POST['add'])) {
        //     //insert data
        //     // var_dump($file_abj);
        //     $this->base->create('soal', $data);
        // } else if (isset($_POST['edit'])) {
        //     //update data
        //     $id_soal = $this->input->post('id_soal', true);
        //     $this->soal->update('tb_soal', $data, 'id_soal', $id_soal);
        // } else {
        //     set_pesan('Method tidak diketahui', FALSE);
        // }
        // redirect('bankSoal');
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
