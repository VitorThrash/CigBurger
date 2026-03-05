<div class="col">
    <div class=" row content-box">
        <div class="col-lg-9 col-12 align-items-center">

            <div class="d-flex align-items-center">

                <!--product image-->
                <div class="me-3">
                    <?php if (!file_exists('assets/images/products/' . $product->image)): ?>
                        <img src="<?= base_url('assets/images/products/no_image.png') ?>" class="img-fluid stock-image" alt="Sem imagem">
                    <?php else: ?>
                        <img src="<?= base_url('assets/images/products/' . $product->image) ?>" class="img-fluid stock-image" class="" alt="<?= $product->image ?>">
                    <?php endif; ?>
                </div>

                <!--Nome do produto e descrição-->
                <div>
                    <h4 class="mb-4"><strong><?= $product->name ?></strong></h4>
                    <p class="mb-0"><?= $product->description ?></p>
                    <?php if (!$product->availability): ?>
                        <span class="badge bg-danger">Indisponível</span>
                    <?php endif;  ?>
                </div>
            </div>

            <!--Stock atual-->
        </div>
        <div class="col-lg-3 col-12 text-end align-self-center">
            <div>
                <h5>Stock atual</h5>
                <h3 class="<?= $product->stock <= $product->stock_min_limit ? 'text-danger' : '' ?>"><strong><?= $product->stock ?></strong></h3>
            </div>
        </div>
        <!--Botão de ação-->
        <div class="xol-12 text-end">
            <a href="" class="btn btn-sm btn-outline-success px-3 m-1"><i class="fa-regular fa-square-plus me-2"></i>Adicionar Estoque</a>
            <a href="" class="btn btn-sm btn-outline-success px-3 m-1"><i class="fa-regular fa-square-minus me-2"></i>Eliminar Estoque</a>
            <a href="" class="btn btn-sm btn-outline-success px-3 m-1"><i class="fa fa-solid fa-right-left me-2"></i>Entradas e saidas</a>


        </div>


    </div>

</div>