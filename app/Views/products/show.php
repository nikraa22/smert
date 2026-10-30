<?php require __DIR__ . '/../../../include/header.php'; ?>
<?php if ($product): ?>
    <article class="product-card">
        <h1 class="page__title">Карточка товара</h1>
        <dl class="product-card__details">
            <div class="product-card__row">
                <dt class="product-card__label">ID товара</dt>
                <dd class="product-card__value"><?= (int) $product['id'] ?></dd>
            </div>
            <div class="product-card__row">
                <dt class="product-card__label">Наименование</dt>
                <dd class="product-card__value"><?= e($product['title']) ?></dd>
            </div>
            <div class="product-card__row">
                <dt class="product-card__label">Стоимость</dt>
                <dd class="product-card__value"><?= number_format((float)$product['price'], 2, '.', ' ') ?> руб.</dd>
            </div>
        </dl>
    </article>
<?php else: ?>
    <div class="alert alert--warning">
        <h1 class="page__title">Товар не найден</h1>
        <p>Запрашиваемая позиция отсутствует в каталоге.</p>
    </div>
<?php endif; ?>
<p><a class="button button--secondary" href="index.php?action=products">Назад к каталогу</a></p>
<?php require __DIR__ . '/../../../include/footer.php'; ?>
