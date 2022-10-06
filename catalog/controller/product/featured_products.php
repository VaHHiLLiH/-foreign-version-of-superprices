<?php
class ControllerProductFeaturedProducts extends Controller {
    public function index() {
        $this->load->model('catalog/product');
        $this->load->language('product/four_products');
        $products = $this->model_catalog_product->getFeaturedProducts();
        foreach ($products as $product) {
            $product['description'] = 'я пишу этот текст для того, чтобы понять сколько символов будет влезать в описание прогдуктов в блочках с похожими товарами, с рекомендуемыми товарами и так далее и таких символов 183';
            $data['products'][] = [
                'product_id'    => $product['product_id'],
                'name'          => $product['name'],
                'description'   => (strlen($product['description']) > 93) ? utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8'))), 0, 93) . '...' : $product['description'],
                'thumb'         => $product['image'],
                'href'          => $this->url->link('product/product', '&product_id='.$product['product_id']),
            ];
        }

        return $this->load->view('product/randomFourProducts', $data);
    }
}
