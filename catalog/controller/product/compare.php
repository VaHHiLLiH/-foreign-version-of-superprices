<?php
class ControllerProductCompare extends Controller {
	public function index() {
		$this->load->language('product/compare');

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
        $spec_attr = array();
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
                $key_product = 0;
                /* Потому что придумал херово */
                /*foreach ($this->session->data['compare'] as $session_product_id){
                    if ($session_product_id == $product_id) {
                        break;
                    }
                    $key_product++;
                }*/
                /* Потому что атрибуты спаршены через жопу */
                if (!empty($attribute_groups)) {
                    if (empty($attribute_groups['subspecs'])) {
                        foreach ($attribute_groups as $attribute_group) {
                            if (!empty($attribute_group['subspecs'])) {
                                foreach ($attribute_group['subspecs'] as $attribute) {
                                    $spec_attr[$attribute_group['name']][$attribute['name']][$key] = $attribute['value'];
                                }
                            }
                        }
                    } else {
                        foreach ($attribute_groups['subspecs'] as $attribute) {
                            $spec_attr[$attribute_groups['name']][$attribute['name']][$key] = $attribute['value'];
                        }
                    }
                }
				$data['products'][$key] = array(
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

        if(count($this->session->data['compare']) > 1) {
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
            ksort($data['products']);
        }

        $data['spec_attr'] = $spec_attr;
		$this->response->setOutput($this->load->view('product/compare', $data));
	}

	/*public function add() {
		$this->load->language('product/compare');

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
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}*/

    public function setLeftValue()
    {
        $this->load->model('catalog/product');

        $json = [];
        if (empty($this->session->data['compare']) || $this->validateAdding($this->session->data['compare'][1], $this->request->post['left_product_id'])) {
            if (empty($this->session->data['compare']) || (isset($this->request->post['left_product_id']) && !in_array($this->request->post['left_product_id'], $this->session->data['compare']))) {
                unset($this->session->data['compare'][0]);
                $this->session->data['compare'][0] = $this->request->post['left_product_id'];
                unset($this->session->data['compare_parent_category_id']);
                $this->session->data['compare_parent_category_id'] = $this->model_catalog_product->getParentCategory($this->request->post['left_product_id']);
            } else {
                $json['error'] = 'there is no product id or such id is already in comparison';
            }
        } else {
            $json['error'] = 'that product can`t be comparing with a product from the comparison block';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
    public function setRightValue()
    {
        $this->load->model('catalog/product');

        $json = [];
        if (empty($this->session->data['compare']) || $this->validateAdding($this->session->data['compare'][0], $this->request->post['right_product_id'])) {
            if (empty($this->session->data['compare']) || (isset($this->request->post['right_product_id']) && !in_array($this->request->post['right_product_id'], $this->session->data['compare']))) {
                unset($this->session->data['compare'][1]);
                if (count($this->session->data['compare']) == 0){
                    unset($this->session->data['compare_parent_category_id']);
                    $this->session->data['compare_parent_category_id'] = $this->model_catalog_product->getParentCategory($this->request->post['right_product_id']);
                }
                $this->session->data['compare'][1] = $this->request->post['right_product_id'];
            } else {
                $json['error'] = 'there is no product id or such id is already in comparison';
            }
        } else {
            $json['error'] = 'that product can`t be comparing with a product from the comparison block';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function offsetComparisonProducts()
    {
        $this->load->model('catalog/product');

        $json = [];

        if ($this->validateAdding($this->session->data['compare'][1], $this->request->post['new_right_value'])) {
            if (isset($this->request->post['new_right_value']) && !in_array($this->request->post['new_right_value'], $this->session->data['compare'])) {
                $new_left_value = $this->session->data['compare'][1];
                unset($this->session->data['compare_parent_category_id']);
                $this->session->data['compare_parent_category_id'] = $this->model_catalog_product->getParentCategory($this->session->data['compare'][1]);
                unset($this->session->data['compare']);
                $this->session->data['compare'][0] = $new_left_value;
                $this->session->data['compare'][1] = $this->request->post['new_right_value'];
            } else {
                $json['error'] = 'there is no product id or such id is already in comparison';
            }
        } else {
            $json['error'] = 'that product can`t be comparing with a product from the comparison block';
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function getRightSide()
    {
        $json = [];
        if (!empty($this->session->data['compare'])) {
            if (!in_array($this->request->post['product_id'], $this->session->data['compare'])) {

                if (count($this->session->data['compare']) == 2) {
                    $json['side'] = 'offset';
                } else {
                    if (empty($this->session->data['compare'][0])) {
                        $json['side'] = 'left';
                    } else {
                        $json['side'] = 'right';
                    }
                }
            } else {
                $json['side'] = 'nothing';
            }
        } else {
            $json['side'] = 'left';
        }


        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    public function deleteCompareProduct()
    {
        $key = array_search($this->request->post['product_id'], $this->session->data['compare']);
        if ($key !== false) {
            unset($this->session->data['compare'][$key]);
        }
        /*$json['left_id'] = $this->session->data['compare'][0];
        $json['right_id'] = $this->session->data['compare'][1];

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));*/
    }

    public function validateAdding($main_product_id, $dop_product_id)
    {
        $this->load->model('catalog/product');
        if ($this->model_catalog_product->getParentCategory($main_product_id) == $this->model_catalog_product->getParentCategory($dop_product_id)){
            return true;
        } else {
            return false;
        }
    }

    public function autocompleteCompareProducts() {

        $json = array();

        if (isset($this->request->get['product_name'])) {
            $this->load->model('catalog/product');

            $filter_data = array(
                'filter_name'  => $this->request->get['product_name'],
                'start'        => 0,
                'limit'        => 10,
                'category_id'  => (isset($this->session->data['compare_parent_category_id'])) ? $this->session->data['compare_parent_category_id'] : '',
            );
            $results = $this->model_catalog_product->getProductsToCompare($filter_data);

            foreach ($results as $result) {

                $json[] = array(
                    'product_id' => $result['product_id'],
                    'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
