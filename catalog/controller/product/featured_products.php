<?php
class ControllerProductFeaturedProducts extends Controller {
    public function index() {
        $this->load->model('catalog/product');
        $this->load->language('product/four_products');
        $products = $this->model_catalog_product->getFeaturedProducts();
        foreach ($products as $product) {
            $data['products'][] = [
                'product_id'    => $product['product_id'],
                'name'          => $this->language->cutText($product['name'], 5),
                'description'   => (strlen($product['description']) > 93) ? utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, 93) . '...' : $product['description'],
                'thumb'         => $product['image'],
                'trueRating'  => $this->model_catalog_product->getProductRating($product['product_id']),
                'fakeRating' => floor($this->model_catalog_product->getProductRating($product['product_id'])),
                'href'          => $this->url->link('product/product', '&product_id='.$product['product_id']),
            ];
        }

        return $this->load->view('product/randomFourProducts', $data);
    }
}
