<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends MY_Controller
{
    //Menampilkan tampilan home
    public function index()
    {
        $main_view = 'home/index';
        $this->load->view('template',compact('main_view'));
    }

}