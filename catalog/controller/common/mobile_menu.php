<?php
class ControllerCommonMobileMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');

		// Menu
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategoriesSort(0);

		foreach ($categories as $category) {
				// Level 2
                $children_data = array();

                $children = $this->model_catalog_category->getCategoriesSort($category['category_id']);

                foreach ($children as $child) {

                    $post_children_data = [];

                    $post_children = $this->model_catalog_category->getCategoriesSort($child['category_id']);

                    if (!empty($post_children)) {

                        foreach ($post_children as $post_child) {
                            // Level 3
                            $post_children_data[] = array(
                                'id'          => $post_child['category_id'],
                                'parent_name' => $child['category_id'],
                                'parent_id'   => $child['name'],
                                'children'    => '',
                                //'name'        => $post_child['name'],
                                'name'        => $this->cutName($post_child['category_id'], $post_child['name']),
                                'href'        => $this->url->link('product/category', 'path=' . $post_child['category_id']),
                            );

                        }
                    } else {
                        $post_children_data = '';
                    }
                    // Level 2
                    $children_data[] = array(
                        'id'            => $child['category_id'],
                        'parent_name'   => $category['category_id'],
                        'parent_id'     => $category['name'],
                        'children'      => $post_children_data,
                        //'name'          => $child['name'],
                        'name'          => $this->cutName($child['category_id'], $child['name']),
                        'href'          => $this->url->link('product/category', 'path=' . $child['category_id']),
                    );
                }

				// Level 1
				$data['categories'][] = array(
				    'id'       => $category['category_id'],
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
		}

        //var_dump($data['categories']);die();
		return $this->load->view('common/mobile_menu', $data);
	}

    public function cutName($category_id, $category_name)
    {
        $category_info = $this->model_catalog_category->getCategory($category_id);

        $parent_category_info = $this->model_catalog_category->getCategory($category_info['parent_id']);

        return str_replace($parent_category_info['name'], '', $category_name);
    }
}
