<?php
class ControllerCommonModalCompare extends Controller {
    public function index() {
        $this->load->model('catalog/product');
        if (isset($this->session->data['compare']) && isset($this->session->data['compare_parent_category_id'])) {
            if ($this->request->get['route'] == 'product/category') {
                if ($this->model_catalog_product->getParentCategoryOfACategory($this->request->get['path']) !== $this->model_catalog_product->getParentCategoryOfACategory($this->session->data['compare_parent_category_id'])) {
                    unset($this->session->data['compare']);
                    unset($this->session->data['compare_parent_category_id']);
                }
            } else if ($this->request->get['route'] == 'product/product') {
                if ($this->model_catalog_product->getParentCategory($this->request->get['product_id']) !== $this->model_catalog_product->getParentCategoryOfACategory($this->session->data['compare_parent_category_id'])) {
                    unset($this->session->data['compare']);
                    unset($this->session->data['compare_parent_category_id']);
                }
            }
        }
        if (!empty($this->session->data['compare'])) {
            foreach ($this->session->data['compare'] as $key => $product_id) {
                $product_info = $this->model_catalog_product->getProduct($product_id);

                if ($product_info) {
                    $data['products'][$key] = array(
                        'product_id'   => $product_info['product_id'],
                        'name'         => $product_info['name'],
                        'href'         => $this->url->link('product/product', 'product_id=' . $product_id),
                        'remove'       => $this->url->link('product/compare', 'remove=' . $product_id)
                    );

                } else {
                    unset($this->session->data['compare'][$key]);
                }
            }
        }
        $data['link_on_compare'] = $this->url->link('product/compare');
        $data['autocompleteProducts'] = 'Выберите товар';
        return $this->load->view('common/modal_compare', $data);
    }
}
