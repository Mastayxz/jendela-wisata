<?php

defined('BASEPATH') or exit('No direct script access allowed');

class event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_event');
    }
    public function index()
    {
        $data['page_title'] = 'event';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['event'] = $this->M_event->getData();
        $this->load->view('user/event/index', $data);
    }
}

/* End of file Home_ak.php */
