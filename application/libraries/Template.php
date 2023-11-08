<?php

class Template {

    //variable untuk menampung instance object dr CI
    protected $_ci;

    function __construct() {
        //memanggil instance object CI
        $this->_ci = &get_instance();
    }

    function use_template($template=NULL, $data = NULL) {
        if($template!=NULL)
            $data['_content'] = $this->_ci->load->view($template, $data, TRUE);

        $data['_header'] = $this->_ci->load->view('goLive/template/header', $data, TRUE);
        $data['_sidebar'] = $this->_ci->load->view('goLive/template/sidebar', $data, TRUE);
        $data['_footer'] = $this->_ci->load->view('goLive/template/footer', $data, TRUE);
        $data['_template'] = $this->_ci->load->view('goLive/template/template', $data);
    }


}

?>