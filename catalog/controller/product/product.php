<?php

class ControllerProductProduct extends Controller {
	private $error = array();

	public function index() {

		$this->load->language('product/product');
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$this->load->model('catalog/category');

		$this->load->model('catalog/manufacturer');

        $catFromProduct = $this->model_catalog_category->getProductCategories($this->request->get['product_id']);

        $data['compare_button_text'] = $this->getCategoryName($catFromProduct);

        $data['product_description'] = $this->generateDescription(end($catFromProduct)['category_id'], $this->request->get['product_id']);

        $this->document->setTitle($this->generateMetaTitle($this->request->get['product_id']));
        $this->document->setDescription($this->generateMetaDescription(end($catFromProduct)['category_id'], $this->request->get['product_id']));

        if(!empty($catFromProduct)) {

            if(count($catFromProduct) > 1) {
                $categories_ids = [];

                foreach ($catFromProduct as $category_id) {
                    $categories_ids[] = $category_id['category_id'];
                }
                $this->getNextBreadCrumbs($categories_ids, $data['breadcrumbs'], 0);
            }
            else {

                $data['breadcrumbs'][] = array(
                    'text' => $this->model_catalog_category->getCategory($catFromProduct[0]['category_id'])['name'],
                    'href' => $this->url->link('product/category', 'path=' . $catFromProduct[0]['category_id'])
                );
            }
        }

		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {

            $product_info['quantity'] = 1;
            $url = '';

			$data['breadcrumbs'][] = array(
				'text' => $product_info['name'],
				'href' => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id'])
			);


			$this->document->setKeywords($product_info['meta_keyword']);
			//$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');
			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

			$data['heading_title'] = $product_info['name'];
            $data['product_id'] = $product_info['product_id'];

			$data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));

			$this->load->model('catalog/review');

			$data['tab_review'] = sprintf($this->language->get('tab_review'), $product_info['reviews']);

			$data['product_id'] = (int)$this->request->get['product_id'];
			$data['manufacturer'] = $product_info['manufacturer'];
			$data['manufacturers'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']);

			$this->load->model('tool/image');

			if ($product_info['image']) {
				$data['popup'] = $product_info['image'];
			} else {
				$data['popup'] = '';
			}

			if ($product_info['image']) {
				$data['thumb'] = $product_info['image'];
			} else {
				$data['thumb'] = '';
			}

			$data['images'] = array();

			$data['share'] = $this->url->link('product/product', 'product_id=' . (int)$this->request->get['product_id']);

			$data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);

			$data['products'] = array();

			$results = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
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
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			$data['tags'] = array();

			if ($product_info['tag']) {
				$tags = explode(',', $product_info['tag']);

				foreach ($tags as $tag) {
					$data['tags'][] = array(
						'tag'  => trim($tag),
						'href' => $this->url->link('product/search', 'tag=' . trim($tag))
					);
				}
			}

			$data['recurrings'] = $this->model_catalog_product->getProfiles($this->request->get['product_id']);

			$this->model_catalog_product->updateViewed($this->request->get['product_id']);
			
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
            $attribute_groups = $this->model_catalog_product->getProductCharacteristics($this->request->get['product_id']);
            /* Потому что атрибуты спаршены через жопу */
            if (isset($attribute_groups['subspecs'])) {
                $data['attribute_groups'][] = $attribute_groups;
            } else {
                $data['attribute_groups'] = $attribute_groups;
            }
            /*-----*/
            $productsRand = $this->model_catalog_product->getProductWithSimilarChars($this->request->get['product_id'], $this->model_catalog_product->getProductManufacturerId($this->request->get['product_id']));

            foreach ($productsRand as $productRand) {
                $fourProduct['products'][] = array(
                    'product_id'  => $productRand['product_id'],
                    'thumb'       => $productRand['image'],
                    'name'        => $this->language->cutText($productRand['name'], 5),
                    'description' => (strlen($productRand['description']) > 93) ? utf8_substr(trim(strip_tags(html_entity_decode($productRand['description'], ENT_QUOTES, 'UTF-8'))), 0, 93) . '...' : $productRand['description'],
                    'rating'      => $productRand['rating'],
                    'href'        => $this->url->link('product/product', '&product_id=' . $productRand['product_id'])
                );

            }

            if (!empty($fourProduct['products'])) {
                $data['similarProducts'] = $this->load->view('product/randomFourProducts', $fourProduct);
            }
            /*-----*/

			$this->response->setOutput($this->load->view('product/product', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
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

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/product', $url . '&product_id=' . $product_id)
			);

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

	public function review() {
		$this->load->language('product/product');

		$this->load->model('catalog/review');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['reviews'] = array();

		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);

		foreach ($results as $result) {
			$data['reviews'][] = array(
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = 5;
		$pagination->url = $this->url->link('product/product/review', 'product_id=' . $this->request->get['product_id'] . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($review_total - 5)) ? $review_total : ((($page - 1) * 5) + 5), $review_total, ceil($review_total / 5));

		$this->response->setOutput($this->load->view('product/review', $data));
	}

	public function write() {
		$this->load->language('product/product');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}

			if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
				$json['error'] = $this->language->get('error_rating');
			}

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}

			if (!isset($json['error'])) {
				$this->load->model('catalog/review');

				$this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getRecurringDescription() {
		$this->load->language('product/product');
		$this->load->model('catalog/product');

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->post['recurring_id'])) {
			$recurring_id = $this->request->post['recurring_id'];
		} else {
			$recurring_id = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		$product_info = $this->model_catalog_product->getProduct($product_id);
		
		$recurring_info = $this->model_catalog_product->getProfile($product_id, $recurring_id);

		$json = array();

		if ($product_info && $recurring_info) {
			if (!$json) {
				$frequencies = array(
					'day'        => $this->language->get('text_day'),
					'week'       => $this->language->get('text_week'),
					'semi_month' => $this->language->get('text_semi_month'),
					'month'      => $this->language->get('text_month'),
					'year'       => $this->language->get('text_year'),
				);

				if ($recurring_info['trial_status'] == 1) {
					$price = $this->currency->format($this->tax->calculate($recurring_info['trial_price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_text = sprintf($this->language->get('text_trial_description'), $price, $recurring_info['trial_cycle'], $frequencies[$recurring_info['trial_frequency']], $recurring_info['trial_duration']) . ' ';
				} else {
					$trial_text = '';
				}

				$price = $this->currency->format($this->tax->calculate($recurring_info['price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

				if ($recurring_info['duration']) {
					$text = $trial_text . sprintf($this->language->get('text_payment_description'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				} else {
					$text = $trial_text . sprintf($this->language->get('text_payment_cancel'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				}

				$json['success'] = $text;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    public function getNextBreadCrumbs($categories_ids, &$breadcrumbs, $parent_id, $parent_name = '') {

        $actualCategory = $this->model_catalog_category->getCategoryFromParentID(implode(',', $categories_ids), $parent_id);

        if (!empty($actualCategory)) {

            $breadcrumbs[] = array(
                'text' => str_replace($parent_name,'',$actualCategory['name']),
                'href' => $this->url->link('product/category', 'path=' . $actualCategory['category_id'])
            );
            $this->getNextBreadCrumbs($categories_ids, $breadcrumbs, $actualCategory['category_id'], $actualCategory['name']);
        }

    }

    public function generateDescription($category_id, $product_id)
    {
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');

        $parent_category = $this->model_catalog_product->getParentCategory($product_id);
        switch ($parent_category) {
            case 1:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Techprocess'            => false,
                        'Socket'                => false,
                        'CPU frequency'    => false,
                        'Number of Cores'       => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        $brand = $this->generateBrand($product_id);
                        return sprintf($this->language->get('CPU'), $this->generateH1($product_id), $const_char['Techprocess'], $const_char['Socket'], $const_char['CPU frequency'], $const_char['Number of Cores'], $brand);
                    } else {
                        return sprintf($this->language->get('CPU_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('CPU_empty'), $this->generateH1($product_id));
                }
                break;
            case 2:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Diagonal'    => false,
                        'Permission'       => false,
                        'Inputs'       => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('Monitors'), $this->generateH1($product_id), $const_char['Diagonal'], $const_char['Permission'], $const_char['Inputs'], $this->generateH1($product_id));
                    } else {
                        return sprintf($this->language->get('Monitors_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('Monitors_empty'), $this->generateH1($product_id));
                }
                break;
            case 3:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Type'    => false,
                        'Diagonal'       => false,
                        'RAM'    => false,
                        'Battery capacity'       => false,
                        'Number of SIM cards'    => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('Phones'), $this->generateH1($product_id), $const_char['Type'], $const_char['Diagonal'], $const_char['RAM'], $const_char['Battery capacity'], $const_char['Type'], $const_char['Number of SIM cards']);
                    } else {
                        return sprintf($this->language->get('Phones_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('Phones_empty'), $this->generateH1($product_id));
                }
                break;
            case 4:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Total number of pixels'    => false,
                        'Camera type'       => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('Cameras'), $this->generateH1($product_id), $const_char['Total number of pixels'], $const_char['Camera type'], $this->generateH1($product_id));
                    } else {
                        return sprintf($this->language->get('Cameras_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('Cameras_empty'), $this->generateH1($product_id));
                }
                break;
            case 5:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $category_path = $this->model_catalog_category->getCategoryPath($category_id);
                    switch ($category_path[1]['path_id']) {
                        case 42:
                            // Accordion
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Tool type' => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    return sprintf($this->language->get('Accordion'), $this->generateH1($product_id), $const_char['Tool type']);
                                } else {
                                    return sprintf($this->language->get('Accordion_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Accordion_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 38:
                            //Digital Piano
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of keys'  => false,
                                    'Key size'  => false,
                                    'Pedals'    => false,
                                    'The weight'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('Digital Pianos'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of keys'], $const_char['Key size'], $const_char['Pedals'], $const_char['The weight']);
                                } else {
                                    return sprintf($this->language->get('Digital_Pianos_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Digital_Pianos_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 40:
                            //Electric bass
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of strings'  => false,
                                    'Corpus material'  => false,
                                    'Neck material'  => false,
                                    'Pickup Diagram'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('Electric Bass'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of strings'], $const_char['Corpus material'], $const_char['Neck material'], $const_char['Pickup Diagram']);
                                } else {
                                    return sprintf($this->language->get('Electric_Bass_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Electric_Bass_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 36:
                            // Electric guitar
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of strings'  => false,
                                    'Corpus material'  => false,
                                    'Neck material'  => false,
                                    'Pickup Diagram'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('Electric Guitars'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of strings'], $const_char['Corpus material'], $const_char['Neck material'], $const_char['Pickup Diagram']);
                                } else {
                                    return sprintf($this->language->get('Electric_Guitars_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Electric_Guitars_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 39:
                            // MIDI Keyboard
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of keys'  => false,
                                    'Key size'  => false,
                                    'Pedals'  => false,
                                    'The weight'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('MIDI Keyboards'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of keys'], $const_char['Key size'], $const_char['Pedals'], $const_char['The weight']);
                                } else {
                                    return sprintf($this->language->get('MIDI_Keyboards_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('MIDI_Keyboards_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 41:
                            // Semi-acoustic
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of strings'  => false,
                                    'Corpus material'  => false,
                                    'Neck material'  => false,
                                    'Pickup Diagram'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('Semi-Acoustic'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of strings'], $const_char['Corpus material'], $const_char['Neck material'], $const_char['Pickup Diagram']);
                                } else {
                                    return sprintf($this->language->get('Semi-Acoustic_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Semi-Acoustic_empty'), $this->generateH1($product_id));
                            }
                            break;
                        case 37:
                            // Synthesizer
                            $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                            if (!empty($product_chars)) {
                                $const_char = [
                                    'Type'  => false,
                                    'Number of keys'  => false,
                                    'Frame'  => false,
                                ];
                                if ($this->checkToChars($const_char, $product_chars)) {
                                    $brand = $this->generateBrand($product_id);
                                    return sprintf($this->language->get('Synthesizers'), $this->generateH1($product_id), $brand, $const_char['Type'], $const_char['Number of keys'], $const_char['Frame'], $this->generateH1($product_id));
                                } else {
                                    return sprintf($this->language->get('Synthesizers_empty'), $this->generateH1($product_id));
                                }
                            } else {
                                return sprintf($this->language->get('Synthesizers_empty'), $this->generateH1($product_id));
                            }
                            break;
                    }
                }
                break;
            case 6:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Battery capacity'    => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('Smartwatches'), $this->generateH1($product_id), $const_char['Battery capacity'], $this->generateH1($product_id));
                    } else {
                        return sprintf($this->language->get('Smartwatches_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('Smartwatches_empty'), $this->generateH1($product_id));
                }
                break;
            case 7:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Type'           => false,
                        'Connectors'       => false,
                        'Communications'  => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('Consoles'), $this->generateH1($product_id), $const_char['Type'], $const_char['Connectors'], $const_char['Communications'], $this->generateH1($product_id));
                    } else {
                        return sprintf($this->language->get('Consoles_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('Consoles_empty'), $this->generateH1($product_id));
                }
                break;
            case 8:
                $product_chars = $this->model_catalog_product->getProductCharacteristics($product_id);
                if (!empty($product_chars)) {
                    $const_char = [
                        'Video memory size'    => false,
                        'Type video memory'    => false,
                        'Frequency video memory'    => false,
                    ];
                    if ($this->checkToChars($const_char, $product_chars)) {
                        return sprintf($this->language->get('GPU'), $this->generateH1($product_id), $const_char['Video memory size'], $const_char['Type video memory'], $const_char['Frequency video memory']);
                    } else {
                        return sprintf($this->language->get('GPU_empty'), $this->generateH1($product_id));
                    }
                } else {
                    return sprintf($this->language->get('GPU_empty'), $this->generateH1($product_id));
                }
                break;
        }
        return '';
    }

    public function generateMetaTitle($product_id)
    {
        return $this->generateH1($product_id).' Technical Scpecifications and Additional Info';
    }

    public function generateMetaDescription($category_id, $product_id)
    {
        return htmlspecialchars('Check ' . $this->generateH1($product_id) . ' Technical Specs (' . $this->generateCharacteristics(3, $category_id) . ') and Details on '. $this->config->get('config_name') . '.');
    }

    public function checkToChars(&$const_char, $product_chars)
    {
        foreach ($product_chars as $group_chars) {
            if (empty($group_chars['subspecs'])) {
                return false;
            }
            foreach ($group_chars['subspecs'] as $chars) {
                if (array_key_exists($chars['name'], $const_char) && !$const_char[$chars['name']]){
                    $const_char[$chars['name']] = $chars['value'];
                }
            }
        }
        foreach ($const_char as $char_const) {
            if (!$char_const){
                return false;
            }
        }
        return true;
    }

    public function generateH1($product_id)
    {
        $product_h1 = $this->model_catalog_product->getProduct($product_id);

        return $product_h1['name'];
    }

    public function generateBrand($product_id)
    {
        $product_info = $this->model_catalog_product->getProduct($product_id);

        if (!empty($product_info)) {
            return $product_info['manufacturer'];
        } else {
            return '';
        }
    }

    public function generateCharacteristics($limit, $category_id)
    {
        $chars_count = $this->model_catalog_category->getCountChars($category_id);

        $charsOnPage = 5000;
        $currentPage = 1;
        $maxPage = ceil($chars_count/$charsOnPage);

        $chars_string = '';

        while($currentPage <= $maxPage) {
            $from = ($currentPage-1)*$charsOnPage;

            $characteristics = $this->model_catalog_category->getProductsChars($category_id, $from, $charsOnPage);
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
            $currentPage++;
        }

        return trim($chars_string, ', ');
    }

    public function getCategoryName(array $category_path) : string
    {
        $first_category = array_shift($category_path)['category_id'];
        if ((int)$first_category !== 5) {
            $category = $this->model_catalog_category->getCategory($first_category);

            return $category['name'];
        } else {
            $second_category = array_shift($category_path)['category_id'];
            $category = $this->model_catalog_category->getCategory($second_category);

            return $category['name'];
        }
    }
}
