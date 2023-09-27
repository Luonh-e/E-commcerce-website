<?php
class ProductModel{
    public function getProductList() {
        return [
            'sp 1',
            'sp 2'
        ];
    }

    public function getProductDetail($id) {
        $data = [
            'sp 1',
            'sp 2'
        ];
        return $data[$id];
    }
}