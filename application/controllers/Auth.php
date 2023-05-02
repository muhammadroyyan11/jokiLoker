<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Base_model', 'base');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        // $data['title'] = 'Login Aplikasi';
        // $this->template->load('tempauth', 'auth/auth', $data);

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('tempauth', 'auth/auth', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_email = $this->auth->cek_email($input['email']);
            if ($cek_email > 0) {
                $password = $this->auth->get_password($input['email']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['email']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'nama'  => $user_db['nama'],
                            'role'  => $user_db['role'],
                            'foto'  => $user_db['foto'],
                            'cv'    => $user_db['cv'],
                            'agama'  => $user_db['agama'],
                            'jenjang_pendidikan'  => $user_db['jenjang_pendidikan'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);

                        if ($user_db['role'] != 1) {
                            redirect('loker');
                        } else {
                            redirect('dashboard');
                        }
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('email belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function proses()
    {
        $input = $this->input->post(null, true);

        var_dump($input);

        $cek_email = $this->auth->cek_email($input['email']);

        var_dump($cek_email);
        if ($cek_email > 0) {
            $password = $this->auth->get_password($input['email']);
            if (password_verify($input['password'], $password)) {
                $user_db = $this->auth->userdata($input['email']);
                if ($user_db['is_active'] != 1) {
                    set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                    redirect('auth');
                } else {
                    $userdata = [
                        'user'  => $user_db['id_user'],
                        'role'  => $user_db['role'],
                        'timestamp' => time()
                    ];
                    $this->session->set_userdata('login_session', $userdata);
                    redirect('dashboard');
                }
            } else {
                set_pesan('password salah', false);
                redirect('auth');
            }
        } else {
            //     set_pesan('email belum terdaftar', false);
            //     redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('home');
    }

    public function register()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('jenjang_pendidikan', 'Jenjang Pendidikan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->template->load('tempauth', 'auth/register', $data);
        } else {
            $input = $this->input->post(null, true);

            // var_dump($input);
            unset($input['password2']);
            $input['nama']          = $input['nama'];
            $input['no_telp']       = $input['no_telp'];
            $input['alamat']        = $input['alamat'];
            $input['email']         = $input['email'];
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role']          = 3;
            $input['is_active']     = 1;
            $input['foto']          = 'user.png';
            $input['agama']         = $input['agama'];
            $input['jenjang_pendidikan']     = $input['jenjang_pendidikan'];

            $query = $this->base->insert('user', $input);
            if ($query) {
                set_pesan('Pendaftaran berhasil.');
                redirect('auth');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }
}
