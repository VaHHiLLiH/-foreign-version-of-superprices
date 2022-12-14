<?php
class ControllerExtensionModuleCategory extends Controller {
	public function index() {
		$this->load->language('extension/module/category');
        $parent_category_id = (int)$this->request->get['path'];
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}

		if (isset($parts)) {
		    $current_category_id = end($parts);
        }

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		//$categories = $this->model_catalog_category->getCategories(0);
        $categories = $this->model_catalog_category->getCategoriesSort($current_category_id);

        if (empty($categories)) {
            $current_category_parent_id = $this->model_catalog_category->getCategory($current_category_id);
            $categories = $this->model_catalog_category->getCategoriesSort($current_category_parent_id['parent_id']);
        }
        $parent_category_name = $this->model_catalog_category->getCategory($parent_category_id);
		foreach ($categories as $category) {
			$children_data = array();

			/*if ($category['category_id'] == $data['category_id']) {
				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach($children as $child) {
					$filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);
					$children_data[] = array(
						'category_id' => $child['category_id'],
						'name' => $child['name'],
						'href' => $this->url->link('product/category', 'path=' . $child['category_id'])
					);
				}
			}*/
			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				//'name'        => $category['name'],
                'name'          => $this->cutName($category['category_id'], $category['name']),
				/*'children'    => $children_data,*/
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
                //'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $category['category_id']),
			);
		}

		return $this->load->view('extension/module/category', $data);
	}

	public function cutName($category_id, $category_name)
    {
        $category_info = $this->model_catalog_category->getCategory($category_id);

        $parent_category_info = $this->model_catalog_category->getCategory($category_info['parent_id']);

        return str_replace($parent_category_info['name'], '', $category_name);
    }
}