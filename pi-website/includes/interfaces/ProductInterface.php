<?php
interface ProductInterface {
    public function getProducts($lang, $type);
    public function getProduct($lang, $type, $name);
}

