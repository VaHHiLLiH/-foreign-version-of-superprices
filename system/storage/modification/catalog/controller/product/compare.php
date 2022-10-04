<?php
class ControllerProductCompare extends Controller {
	public function index() {
		$this->load->language('product/compare');
		$this->load->language('extension/theme/nice'); // Nice Theme

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
		}

		if (isset($this->request->get['remove'])) {
			$key = array_search($this->request->get['remove'], $this->session->data['compare']);

			if ($key !== false) {
				unset($this->session->data['compare'][$key]);

				$this->session->data['success'] = $this->language->get('text_remove');
			}

			$this->response->redirect($this->url->link('product/compare'));
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('product/compare')
		);

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['review_status'] = $this->config->get('config_review_status');

		$data['products'] = array();

		$data['attribute_groups'] = array();
        $spec_attr = [];
		foreach ($this->session->data['compare'] as $key => $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);

			if ($product_info) {
				if ($product_info['image']) {
					$image = $product_info['image'];
				} else {
					$image = false;
				}
				$price = false;
                $special = false;
                $availability = $this->language->get('text_instock');

				$attribute_data = array();

                $attribute_groups = $this->model_catalog_product->getProductCharacteristics($product_id);
				foreach ($attribute_groups as $attribute_group) {
                    foreach ($attribute_group['subspecs'] as $attribute) {
                        $spec_attr[$attribute_group['name']][$attribute['name']][$key] = $attribute['value'];
					}
				}

				$data['products'][$product_id] = array(
					'product_id'   => $product_info['product_id'],
					'name'         => $product_info['name'],
					'thumb'        => $image,
					'description'  => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, 200) . '..',
					'manufacturer' => $product_info['manufacturer'],
					'href'         => $this->url->link('product/product', 'product_id=' . $product_id),
					'remove'       => $this->url->link('product/compare', 'remove=' . $product_id)
				);

			} else {
				unset($this->session->data['compare'][$key]);
			}
		}

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

        foreach ($spec_attr as $key1 => $group_attr) {
            foreach ($group_attr as $key2 => $attribute) {
                for ($i = 0; $i < count($this->session->data['compare']); $i++) {
                    if (!isset($attribute[$i])) {
                        $spec_attr[$key1][$key2][$i] = '-';
                    }
                }
                ksort($spec_attr[$key1][$key2]);
            }
        }
        $data['spec_attr'] = $spec_attr;
		$this->response->setOutput($this->load->view('product/compare', $data));
	}

	public function add() {
		$this->load->language('product/compare');
		$this->load->language('extension/theme/nice'); // Nice Theme

		$json = array();

		if (!isset($this->session->data['compare'])) {
			$this->session->data['compare'] = array();
		}

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {
			if (!in_array($this->request->post['product_id'], $this->session->data['compare'])) {
				if (count($this->session->data['compare']) >= 4) {
					array_shift($this->session->data['compare']);
				}

				$this->session->data['compare'][] = $this->request->post['product_id'];
			}

			$json['success'] = sprintf($this->language->get('text_success'), $this->url->link('product/product', 'product_id=' . $this->request->post['product_id']), $product_info['name'], $this->url->link('product/compare'));

			$json['total'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
			
			// Nice Theme . Begin
			$json['nice_text_modal_compare_title'] = $this->language->get('nice_text_modal_compare_title');
			$json['nice_text_modal_button_to_continue'] = $this->language->get('nice_text_modal_button_to_continue');
			// Nice Theme . End
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
