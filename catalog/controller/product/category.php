<?php
class ControllerProductCategory extends Controller {
	public function index() {
		$this->load->language('product/category');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$limit = (int)$this->request->get['limit'];
		} else {
			$limit = $this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit');
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['path'])) {
			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				/*if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path . $url)
					);
				}*/
			}
		} else {
			$category_id = 0;
		}

        $category_path = $this->model_catalog_category->getCategoryPath($category_id);

		foreach ($category_path as $cat_id) {

		    $cat_info = $this->model_catalog_category->getCategory($cat_id['path_id']);

            $data['breadcrumbs'][] = array(
                'text' => $cat_info['name'],
                'href' => $this->url->link('product/category', 'path=' . $cat_id['path_id']),
            );
        }

		$category_info = $this->model_catalog_category->getCategory($category_id);


		$data['category_description'] = /*$this->generateDescription($category_id);*/'';
		if ($category_info) {
			$this->document->setTitle($this->generateMetaTitle($category_id));
			$this->document->setDescription($this->generateMetaDescription($category_id));
			$this->document->setKeywords($category_info['meta_keyword']);

			//$data['heading_title'] = $category_info['name'];

			$data['heading_title'] = $this->getFullCategoryName($category_info['category_id']);

			$data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));

			// Set the last category breadcrumb
			/*$data['breadcrumbs'][] = array(
				'text' => $category_info['name'],
				'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'])
			);*/

			if ($category_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_category_height'));
			} else {
				$data['thumb'] = '';
			}

			$data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$data['compare'] = $this->url->link('product/compare');

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['categories'] = array();

			$results = $this->model_catalog_category->getCategories($category_id);

			/*foreach ($results as $result) {
				$filter_data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);

				$data['categories'][] = array(
					'name' => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}*/

			$data['products'] = array();

			$filter_data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter,
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);

			$product_total = $this->model_catalog_product->getTotalProducts($filter_data);

			$results = $this->model_catalog_product->getProducts($filter_data);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $result['image'];
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $this->language->cutText($result['name'], 5),
					'description' => (strlen($result['description']) > 93) ? utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, 93) . '...' : $result['description'],
                    'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating'      => $result['rating'],
					'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['sorts'] = array();

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			);

			if ($this->config->get('config_review_status')) {
				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
				);

				$data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
			);

			$data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
			);

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$data['limits'] = array();

			$limits = array_unique(array($this->config->get('theme_' . $this->config->get('config_theme') . '_product_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach($limits as $value) {
				$data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $value)
				);
			}

			$url = '';

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

			$data['pagination'] = $pagination->render();

			$data['results'] = sprintf($this->language->get('text_pagination'), ($product_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($product_total - $limit)) ? $product_total : ((($page - 1) * $limit) + $limit), $product_total, ceil($product_total / $limit));

			// http://googlewebmastercentral.blogspot.com/2011/09/pagination-with-relnext-and-relprev.html
			if ($page == 1) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id']), 'canonical');
			} else {
				$this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. $page), 'canonical');
			}
			
			if ($page > 1) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . (($page - 2) ? '&page='. ($page - 1) : '')), 'prev');
			}

			if ($limit && ceil($product_total / $limit) > $page) {
			    $this->document->addLink($this->url->link('product/category', 'path=' . $category_info['category_id'] . '&page='. ($page + 1)), 'next');
			}

			$data['sort'] = $sort;
			$data['order'] = $order;
			$data['limit'] = $limit;

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
            var_dump('WHY are you falling?');die();
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('product/category', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			/*$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/category', $url)
			);*/

			$this->document->setTitle($this->language->get('text_error'));

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function generateDescription($category_id)
    {
        $this->load->model('catalog/manufacturer');

        $category_path = $this->model_catalog_category->getCategoryPath($category_id);

        if (count($category_path) == 1 && $category_path[0]['path_id'] == 1) {

            return $this->language->get('CPU');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 1) {

            return sprintf($this->language->get('CPU_child'), $this->generateH1($category_id), $this->generateSubCategories(5, $category_id), $this->generateBrands(1, $category_id));

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 1) {

            return sprintf($this->language->get('CPU_post_child'), $this->generateH1($category_id), $this->generateParentH1($category_id), $this->generateParentH1($category_id), $this->generateProducts(5, $category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 2) {

            return $this->language->get('Monitors');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 2){

            return sprintf($this->language->get('Monitors_child'), $this->generateH1($category_id), $this->generateCountProducts($category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 3) {

            return sprintf($this->language->get('Phones'), $this->generateBrands(3, $category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 3 && $category_path[0]['category_id'] == 501) {

            return $this->language->get('Phone_button');

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 3 && $category_path[1]['path_id'] == 501) {

            return sprintf($this->language->get('Phone_smart_child'), $this->generateH1($category_id), $this->generateH1($category_id));

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 3 && $category_path[0]['category_id'] == 500) {

            return $this->language->get('Phone_smart');

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 3 && $category_path[1]['path_id'] == 500) {

            return sprintf($this->language->get('Phone_button_child'), $this->generateH1($category_id), $this->generateH1($category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 4) {

            return $this->language->get('Cameras');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 4) {

            return sprintf($this->language->get('Cameras_child'), $this->generateH1($category_id), $this->generateBrands(3, $category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 4) {

            return sprintf($this->language->get('Cameras_post_child'), $this->generateH1($category_id), $this->generateH1($category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 5) {

            return $this->language->get('Musical');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 5) {

            return sprintf($this->language->get('Musical_child'), $this->generateH1($category_id), $this->generateBrands(3, $category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 5) {

            return sprintf($this->language->get('Musical_post_child'), $this->generateH1($category_id), $this->generateH1($category_id), $this->generateCharacteristics(5, $category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 6) {

            return $this->language->get('Smartwatches');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 6) {

            return sprintf($this->language->get('Smartwatch_child'), $this->generateH1($category_id), $this->generateCountProducts($category_id));

        } else if (count($category_path) == 3 && $category_path[0]['path_id'] == 6) {

            return sprintf($this->language->get('Smartwatch_child'), $this->generateH1($category_id), $this->generateCountProducts($category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 7) {

            return $this->language->get('Consoles');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 7) {

            return sprintf($this->language->get('Consoles_child'), $this->generateH1($category_id), $this->generateH1($category_id));

        } else if (count($category_path) == 1 && $category_path[0]['path_id'] == 8) {

            return $this->language->get('GPU');

        } else if (count($category_path) == 2 && $category_path[0]['path_id'] == 8){

            return sprintf($this->language->get('GPU_child'), $this->generateBrands(1, $category_id), $this->generateBrands(1, $category_id), $this->generateProducts(5, $category_id));

        }


        return '';
    }

    public function generateMetaTitle($category_id)
    {
        return $this->generateH1($category_id).' Technical Specifications, Details and Parameters';
    }

    public function generateMetaDescription($category_id)
    {
        return 'Find out all ' . $this->generateH1($category_id) . ' Technical Specs and Detailed Information. Compare ' . $this->generateH1($category_id) . ' main Features (' . $this->generateCharacteristics(3, $category_id) . ') and browse more Info on '. $this->config->get('config_name') . '.';
    }

    public function generateCountProducts($category_id)
    {
        $countProducts = $this->model_catalog_category->getProductsCount($category_id);

        return $countProducts['count'].' ';
    }

    public function generateH1($category_id)
    {
        $category_h1 = $this->model_catalog_category->getCategory($category_id);

        return $category_h1['name'];
    }

    public function generateParentH1($category_id)
    {
        $parent_category_h1 = $this->model_catalog_category->getParentCategory($category_id);

        return $parent_category_h1['name'];
    }

    public function generateBrands($limit, $category_id)
    {
        $brands = $this->model_catalog_category->getBrandsProduct($limit, $category_id);

        $brands_string = '';
        foreach ($brands as $brand) {
            $brands_string .= $brand['name'].', ';
        }

        return trim($brands_string, ', ');
    }

    public function generateProducts($limit, $category_id)
    {
        $products = $this->model_catalog_category->getProductsCategory($limit, $category_id);

        $name_string = '';
        foreach ($products as $product) {
            $name_string .= $product['name'].', ';
        }

        return trim($name_string, ', ');
    }

    public function generateSubCategories($limit, $category_id)
    {
        $sub_categories = $this->model_catalog_category->getSubCategories($limit, $category_id);

        $sub_categories_string = '';
        foreach ($sub_categories as $category) {
            $sub_categories_string .= $category['name'].', ';
        }

        return trim($sub_categories_string, ', ');
    }

    public function generateCharacteristics($limit, $category_id)
    {
        $characteristics = $this->model_catalog_category->getProductsChars($category_id);
        // Строка для характеристик
        $chars_string = '';
        // массив где будет кол-во каждой характеристики
        $count_chars = [];
        // в $characteristics характеристики всех товаров, разворачиваю на характеристики каждого товара
        foreach ($characteristics as $json_product_chars) {
            // разворачиваю характеристики для каждого товара
            $product_chars = json_decode($json_product_chars['spec'], true);
            if (!empty($product_chars)) {
                // Потому что спаршено через жопу
                if (!empty($product_chars['subspecs'])) {
                    foreach ($product_chars['subspecs'] as $char) {
                        $count_chars[$char['name']] = (!empty($count_chars[$char['name']])) ? ($count_chars[$char['name']] + 1) : 1;
                    }
                } else {
                    foreach ($product_chars as $group_chars) {
                        // Достаю сами характеристики и начинаю их считать
                        if (!empty($group_chars['subspecs'])) {
                            foreach ($group_chars['subspecs'] as $char) {
                                $count_chars[$char['name']] = (!empty($count_chars[$char['name']])) ? ($count_chars[$char['name']] + 1) : 1;
                            }
                        }
                    }
                }
            }
        }
        arsort($count_chars);

        $chars_ar = array_slice($count_chars, 0, $limit);

        foreach ($chars_ar as $key => $char){
            $chars_string .= $key.', ';
        }
        return trim($chars_string, ', ');
    }

    public function getFullCategoryName($category_id)
    {
        $category_info = $this->model_catalog_category->getCategory($category_id);
        $array_categories_ids = [500, 501, 36, 37, 38, 39, 40, 41, 42, 268, 269];
        if ($category_info['parent_id'] != 0 && (!in_array($category_id, $array_categories_ids))) {
            $category_parent_info = $this->model_catalog_category->getCategory($category_info['parent_id']);

            return $category_parent_info['name'] . ' ' . str_replace($category_parent_info['name'], '', $category_info['name']);
        } else {
            return $category_info['name'];
        }
        /*$category_name = [];
        foreach ($category_path as $path) {
            $category_info = $this->model_catalog_category->getCategory($path['path_id']);
            $current_category_name = $category_info['name'];

            if(!empty($category_name)) {
                foreach ($category_name as $name) {
                    $current_category_name = str_replace($name, '', $current_category_name);
                }
            }

            $category_name[] = $current_category_name;
        }*/

        //return trim(implode(' ', $category_name));

    }
}
