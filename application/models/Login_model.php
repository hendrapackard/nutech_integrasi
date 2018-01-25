<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends MY_Model
{
    public $table = 'user';

    //Mendapatkan aturan validasi
    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    //Memberikan nilai default ketika pertama kali ditampilkan
    public function getDefaultValues()
    {
        return [
            'username' => '',
            'password' => ''
        ];
    }

    //query untuk login dan menambahkan data session
    public function login($input)
    {
        $input->password = md5($input->password);

        $user = $this->db->where('username',$input->username)
            ->where('password',$input->password)
            ->where('status', 'aktif')
            ->limit(1)
            ->get($this->table)
            ->row();

        if (count($user)) {
            $data = [
                'username' => $user->username,
                'level' => $user->level,
                'id_user' => $user->id_user,
                'nama' => $user->nama,
                'is_login' => true
            ];

            $this->session->set_userdata($data);
            return true;
        }

        return false;
    }

    //menghapus data session
    public function logout()
    {
        $data = [
            'username' => null,
            'level' => null,
            'id_user' => null,
            'nama' => null,
            'is_login' => null
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
    }
}

