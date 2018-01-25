<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
    //tampilan login
    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null,true);
        }

        //validasi
        if (!$this->login->validate()) {
            $this->load->view('login_form', compact('input'));
            return;
        }

        if ($this->login->login($input)) {
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error','Username atau password salah');
        }

        redirect('login');
    }

    //function logout
    public function logout()
    {
        $this->login->logout();
        redirect(base_url());
    }
}