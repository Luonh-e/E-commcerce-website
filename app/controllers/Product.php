<?php

class Product extends Controller{
    public $data = [];
    public function index() {
        echo 'Danh sach san pham';
    }

    public function list_product() {
        $product = $this->model('ProductModel');
        $dataProduct = $product->getProductList();

        $this->data['product_list'] = $dataProduct;
        $this->data['content'] = 'products/list';

        // Render view
        $this->render('layouts/client_layout', $this->data);
    }

    public function detail($id = 0) {
        $product = $this->model('ProductModel');
        $this->data['info'] = $product->getProductDetail($id);
        $this->data['content'] = 'products/detail';
        // Render view
        $this->render('layouts/client_layout', $this->data);
    }

}