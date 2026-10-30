<?php
require_once __DIR__ . '/../Models/Product.php';

class ProductController
{
    public function index(): void
    {
        $products = Product::all();
        require __DIR__ . '/../Views/products/index.php';
    }

    public function show(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $product = $id ? Product::find((int) $id) : null;
        require __DIR__ . '/../Views/products/show.php';
    }

    public function create(): void
    {
        $errors = [];
        $title = '';
        $price = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $priceInput = trim($_POST['price'] ?? '');

            if ($title === '') {
                $errors[] = 'Укажите наименование товара.';
            }

            if (!is_numeric($priceInput) || (float)$priceInput < 0) {
                $errors[] = 'Цена должна быть числом больше или равным нулю.';
            } else {
                $price = (float)$priceInput;
            }

            if (!$errors) {
                Product::create($title, $price);
                header('Location: index.php?action=products');
                exit;
            }
        }
        require __DIR__ . '/../Views/products/create.php';
    }
}
