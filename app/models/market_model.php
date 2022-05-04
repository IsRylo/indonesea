<?php

class market_model // extends database
{
    public function getAllCategories()
    {
        $json = '../app/database/categories.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        return $data;
    }

    public function getAllProductPreviews()
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $allowed = ['id','name', 'images', 'price'];
        $products = [];
        foreach ($data as $product) {
            $product = array_intersect_key($product, array_flip($allowed));
            array_push($products, $product);
        }
        return $products;
    }

    public function getProductPreviews($query)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $allowed = ['id','name', 'images', 'price'];
        $products = [];
        foreach ($data as $product) {
            if (strpos(strtolower($product['name']), strtolower($query)) !== false) {
                $product = array_intersect_key($product, array_flip($allowed));
                array_push($products, $product);
            }
        }
        return $products;
    }

    public function getProductPreview($id)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $allowed = ['id','name', 'images', 'supplier'];
        $product = [];
        foreach ($data as $product) {
            if ($product['id'] == $id) {
                $product = array_intersect_key($product, array_flip($allowed));
                return $product;
            }
        }
        return $product;
    }

    public function getProductPreviewsByCategory($category)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        $allowed = ['id','name', 'images', 'price'];
        $products = [];
        foreach ($data as $product) {
            if ($product['category'] == $category) {
                $product = array_intersect_key($product, array_flip($allowed));
                array_push($products, $product);
            }
        }
        return $products;
    }

    public function getProductDetails($id)
    {
        $json = '../app/database/products.json';
        $data = file_get_contents($json);
        $data = json_decode($data, true);
        foreach ($data as $product)
        {
            if ($product['id'] == $id) {
                return $product;
            }
        }
        return null;
    }
}