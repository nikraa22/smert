<?php require __DIR__ . '/../../../include/header.php'; ?>
<section class="product-list">
    <h1 class="page__title">Каталог товаров</h1>
    <p> class="page__lead">Список доступных товаров в базе данных.</p>
    <p><a class="button button--primary" href="index.php?action=product-create">Добавить товар</a></p>
    <?php if (!$products): ?>
        <p class="product-list__empty">В каталоге пока нет товаров.</p>
    <?php else: ?>
        <ul class="product-list__items">
        <?php foreach ($products as $product): ?>
            <li class="product-list__item">
                <a class="product-list__link" href="index.php?action=product&amp;id=<?= (int) $product['id'] ?>">
                    <?= e($product['title']) ?>
                </a>
                <span class="product-list__price"><?= number_format((float)$product['price'], 2, '.', ' ') ?> руб.</span>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
<?php require __DIR__ . '/../../../include/footer.php'; ?>