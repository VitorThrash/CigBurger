<!-- Quadro dos produtos-->

<div class="col-xxl-6 col-12 ">

    <div class="content-box shadow overflow-hidden">
        <div class="d-flex">
            <div>
                <img src="<?= base_url('assets/images/products/' . $product->image) ?>" class="img-fluid" alt="<?= $product->image ?>">
            </div>
            <div class="ms-4 w-100">
                <h3 class="m-0"><strong><?= $product->name ?></strong></h3>
                <p class="m-0"><?= $product->description ?></p>
                <p class="m-0 opacity-50"><?= $product->category ?></p>

                <?php if ($product->promotion == 0) : ?>

                <h3 class="m-0 text-primary"><strong><?= normalize_price($product->price) . '$' ?></strong></h3>
            <?php else : ?>
               <s><h3 class="color-red m-0"><?= normalize_price($product->price) . '$' ?></s>  <span class="text-primary"><strong>  <?= normalize_price (calculate_promotion($product->price, $product->promotion)) ?>$</strong></span></h3>
                <span class="badge bg-success">(Com promoção de <?= intval($product->promotion) ?> %)</span>
            <?php endif; ?>
            <div class="text-end align-items-bottom">
                <a href="<?=site_url('product/edit/' . Encrypt( $product->id))  ?>" class="btn btn-sm btn-outline-secondary px-3 m-1"><i class="fa-regular fa-pen-to-square me-2"></i>Editar</a>
                <a href="<?=site_url('stocks/product/'. Encrypt($product->id))  ?>" class="btn btn-sm btn-outline-secondary px-3 m-1"><i class="fa-solid fa-cubes-stacked me-2"></i>Stock</a>
                <a href="<?=site_url('product/delete/'. Encrypt( $product->id))?>" class="btn btn-sm btn-outline-secondary px-3 m-1"><i class="fa-regular fa-trash-can me-2"></i>Eliminar</a>
            </div>
            </div>
        </div>
    </div>
</div>