<?php
class goLive extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('goLiveModel');
    }
    function index()
    {
        $data['detail_hosting'] = $this->goLiveModel->getData_hosting();
        $this->load->view('goLive/v_goLive', $data);
    }
    function hosting_index()
    {
        $data['detail_hosting'] = $this->goLiveModel->getData_hosting();
        $this->load->view('goLive/v_hosting', $data);
    }
    function hosting_insert()
    {
        if ($this->input->post()) {
            $data_input_hosting = $this->input->post();
            $result = $this->goLiveModel->insertData_hosting($data_input_hosting);
            if ($result > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                   INSERT SUCCESS!
                  </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                    INSERT ERROR!
                   </div>');
            }
            redirect('goLive/hosting_index');
        } else {
            $data['title'] = "ADD NEW DATA";
            $this->load->view('goLive/v_hostingForm', $data);
        }
    }
    function hosting_update($id_hosting = NULL)
    {
        if ($this->input->post()) {
            $update_data = $this->input->post();
            $result = $this->goLiveModel->updateData_hosting($update_data);
            if ($result > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                   UPDATE SUCCESS!
                  </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                    UPDATE ERROR!
                   </div>');
            }
            redirect('goLive/hosting_index');
        } else {
            $data['title'] = "UPDATE DATA";
            $data['detail_hosting'] = $this->goLiveModel->get_one($id_hosting);
            $this->load->view('goLive/v_hostingUpdate', $data);
        }
    }
    function hosting_delete($id_hosting)
    {
        $result = $this->goLiveModel->deleteData_Hosting($id_hosting);
        if ($result > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-sdanger" role="alert">
               DELETE ERROR!
              </div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                DELETE SUCCESS!
               </div>');
        }
        redirect('goLive/hosting_index');
    }
    function pembelian_index()
    {
        $data['detail_pembelian'] = $this->goLiveModel->getData_pembelian();
        $this->load->view('goLive/v_pembelian', $data);
    }
    function pembelian_insert()
    {
        $data['hosting'] = $this->goLiveModel->get_hostingID();

        if ($this->input->post()) {
            $data_input_pembelian = $this->input->post();

            $domainExists = $this->goLiveModel->cekDomain($data_input_pembelian['domain']);

            if (count($domainExists) > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    NAMA DOMAIN SUDAH ADA!
                    </div>');
                redirect('goLive/pembelian_insert');
            }


            $result = $this->goLiveModel->insertData_pembelian($data_input_pembelian);
            if ($result > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    INSERT SUCCESS!
                    </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                        INSERT ERROR!
                    </div>');
            }

            redirect('goLive/pembelian_index');
        } else {
            $data['title'] = "ORDER FORM";
            $this->load->view('goLive/v_pembelianForm', $data);
        }
    }
    function pembelian_update($k_pembelian = NULL)
    {
        $data['hosting'] = $this->goLiveModel->get_hostingID();
        if ($this->input->post()) {
            $update_data = $this->input->post();
            $result = $this->goLiveModel->updateData_pembelian($update_data);
            if ($result > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                   UPDATE SUCCESS!
                  </div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">
                    UPDATE ERROR!
                   </div>');
            }
            redirect('goLive/pembelian_index');
        } else {
            $data['title'] = "UPDATE DATA";
            $data['detail_pembelian'] = $this->goLiveModel->get_one_pembelian($k_pembelian);
            $this->load->view('goLive/v_pembelianUpdate', $data);
        }
    }
    function pembelian_delete($k_pembelian)
    {
        $result = $this->goLiveModel->deleteData_pembelian($k_pembelian);
        if ($result > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-sdanger" role="alert">
               DELETE ERROR!
              </div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                DELETE SUCCESS!
               </div>');
        }
        redirect('goLive/pembelian_index');
    }
}
