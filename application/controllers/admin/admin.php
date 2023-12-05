<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function index()
    {

        $data['admin'] = $this->m_admin->getadmin();
        $data['page_title'] = 'Admin';
        $this->load->view('admin/dashboard/admin/dashadmin', $data);
    }

    public function tambahadmin()
    {
        $data['page_title'] = 'Admin';
        $this->load->view('admin/aktivitas/admin/tambahadmin', $data);
    }

    public function addadmin()
    {
        $this->m_admin->insertadmin();
        redirect('admin/admin');
    }
    public function ubahadmin($id)
    {
        $data['page_title'] = 'Admin';
        $data['admin'] = $this->m_admin->detailadmin($id);
        $this->load->view('admin/aktivitas/admin/editadmin', $data);
    }
    public function editadmin()
    {
        $this->m_admin->editadmin();
        redirect('admin/admin');
    }
    public function deleteadmin($id)
    {
        $this->m_admin->deleteadmin($id);
        redirect('admin/admin');
    }
}

/* End of file admin.php */