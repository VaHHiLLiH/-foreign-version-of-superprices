<?php
class ControllerCommonHome extends Controller {
	public function index() {

		$this->document->setTitle('Electronics Technical Specifications and Features on ' . $this->config->get('config_name'));
		$this->document->setDescription('Detailed info and all main Technical Specifications of Computer Equipment and Electronics (Monitors, GPU, CPU, Cameras, Smartphones, etc.). Compare Specs of different models on ' . $this->config->get('config_name') . '.');
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

        $data['featured_products'] = $this->load->controller('product/featured_products');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
