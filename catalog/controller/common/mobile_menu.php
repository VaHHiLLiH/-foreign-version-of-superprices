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

    public function generateChildCategory()
    {
        $this->load->model('catalog/category');

        $parent_category_id = $this->request->post['parent_category_id'];
        $parent_category = $this->model_catalog_category->getCategory($parent_category_id);

        $categories = $this->model_catalog_category->getCategoriesSort($parent_category_id);

        foreach ($categories as $key => $category) {
            $categories[$key]['children'] = $this->model_catalog_category->getCategoriesSort($category['category_id']);
        }

        $html_content = '<li class="back-to-parent" data-parent-id="' . $parent_category_id . '"><a href="' . $this->url->link("product/category", "path=" . $parent_category_id) . '">See all&nbsp;' . $parent_category['name'] . '</a></li>
                <hr>';

        foreach ($categories as $category) {
            $html_content .= '<li class="my-dropdown-over" data-item-id="' . $category['category_id'] . '">';

            $html_content .= (empty($category['children'])) ? '<a href="' . $this->url->link("product/category", "path=" . $category['category_id']) . '"  data-id="' . $category['category_id'] . '" data-parent-name="' . $parent_category['name'] . '">' . $category['name'] . '</a>' : '<p data-id="' . $category['category_id'] . '" data-parent-name="' . $parent_category['name'] . '">' . $category['name'] . '</p>';

            $html_content .= (empty($category['children'])) ? '' : '<span class="to-close"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                        <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/></svg></span>';
            $html_content .= '</li>';
        }

        echo $html_content;
    }

    public function generatePostChildCategory()
    {
        $this->load->model('catalog/category');

        $parent_category_id = $this->request->post['parent_category_id'];
        $parent_category = $this->model_catalog_category->getCategory($parent_category_id);

        $categories = $this->model_catalog_category->getCategoriesSort($parent_category_id);

        $html_content = '<ul class="post-child-categories mobile-menu" data-parent-id="' . $parent_category_id . '">
                                <li><a href="' . $this->url->link("product/category", "path=" . $parent_category_id) . '">See all&nbsp;' . $parent_category['name'] . '</a><span class="caret back-to-parent" data-parent-id="' . $parent_category_id . '"></span></li>
                                <hr>';
        foreach ($categories as $key => $category) {
            $html_content .= '<li data-item-id="' . $category['category_id'] . '">
                                        <a href="' . $this->url->link("product/category", "path=" . $category['category_id']) . '">' . $category['name'] . '</a>
                                    </li>';
        }
        $html_content .= '</ul>';
        echo $html_content;
    }
}
