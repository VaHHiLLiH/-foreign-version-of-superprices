<?php
class ControllerCommonModalCompare extends Controller {
    public function index() {
        if (!empty($this->session->data['compare'])) {
            $this->load->model('catalog/product');
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
        var_dump($this->session->data['compare']);
        return $this->load->view('common/modal_compare', $data);
    }
}
