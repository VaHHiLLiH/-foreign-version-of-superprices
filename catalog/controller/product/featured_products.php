<?php
class ControllerProductFeaturedProducts extends Controller {
    public function index() {
        $this->load->model('catalog/product');
        $this->load->language('product/four_products');
        $data['products'] = $this->model_catalog_product->getFeaturedProducts();

        return $this->load->view('product/randomFourProducts', $data);
    }
}
