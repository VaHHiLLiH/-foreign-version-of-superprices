<?php
class ControllerCommonMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		// Nice MegaMenu . Begin
		$data['categories'] = $this->cache->get('nice_megamenu.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id'));
		
		if ($data['categories']) {
			goto menu_view;
		}
		// Nice MegaMenu . End

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					// Nice MegaMenu . Begin
					
					// Level 3
					$grandchildren_data = array();
					
					$grandchildren = $this->model_catalog_category->getCategories($child['category_id']);
					
					foreach ($grandchildren as $grandchild) {
						$filter_data = array(
							'filter_category_id'  => $grandchild['category_id'],
							'filter_sub_category' => true
						);
						
						$grandchildren_data[] = array(
							'name'  => $grandchild['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
							'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $grandchild['category_id'])
						);
					}
					// Nice MegaMenu . End

					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'grandchildren' => $grandchildren_data, // Nice MegaMenu
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id']),
					'nmm_promo_status' => $category['nmm_promo_status'],
					'nmm_image'=> ($this->request->server['HTTPS'] ? $this->config->get('config_ssl') : $this->config->get('config_url')) . 'image/' .  $category['nmm_image'],
					'nmm_alt'  => $category['nmm_alt'],
					'nmm_title'=> $category['nmm_title'],
					'nmm_text' => html_entity_decode($category['nmm_text'], ENT_QUOTES, 'UTF-8'),
					'nmm_link' => $category['nmm_link'],
					'nmm_anchor' => $category['nmm_anchor'],
				);
			}
		}

		// Nice MegaMenu . Begin
		$this->cache->set('nice_megamenu.' . (int)$this->config->get('config_language_id') . '.' . (int)$this->config->get('config_store_id'), $data['categories']);
		
		menu_view:			
			
		// Columns
		$length = 15; // TODO... set in category settings?
		
		$categories_columned = [];
		
		foreach ($data['categories'] as $key => $category) {

			foreach ($category as $index => $item) {
				$categories_columned[$key][$index] = $item;
				unset($categories_columned[$key]['children']);
			}

			$data['categories'][$key]['n'] = 0;
			$column = 1;

			foreach ($category['children'] as $key2 => $child) {
				if ($data['categories'][$key]['n'] >= $length) {
					$column++;

					$data['categories'][$key]['n'] = 0;
				}

				$data['categories'][$key]['n'] ++;

				$categories_columned[$key]['children'][$column][$key2] = $child;

				foreach ($child['grandchildren'] as $key3 => $grandchild) {
					$data['categories'][$key]['n'] ++;
				}
			}

			$categories_columned[$key]['nice_menu_category_columns'] = $column;
		}
		
		$data['categories_columned'] = $categories_columned;
		// Nice MegaMenu . End

		//return $this->load->view('common/menu', $data);
		return $this->load->view('common/nice_megamenu', $data); // Nice MegaMenu
	}
}
