<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
	parent::__construct();
        log_message('debug', 'MY_Controller Initialized');
    }

    public function index()
    {
    }

    protected function display($pagina, $data = array(), $web = false, $dataHeader = array(), $dataSidebar = array()) {
      
            $this->load->view('includes/header', $data);

            $this->load->view('includes/sidebar', $data);

            $this->load->view($pagina, $data);
            
            $this->load->view('includes/footer');
        }
    

}
?>
