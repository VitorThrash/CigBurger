<?= $this->extend('layout/layout_main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/page_title') ?>

<!--New Product-->

<div class="mb-3">
    <a href="<?= site_url('/product/new') ?> "class="btn btn-outline-secondary "><i class="fa-solid fa-plus me-2"></i>Novo Produto </a>
</div>



<?php if(empty('products')):?>
<div class="text-center mt-5">
    <h4 class="opacity-50 mb-3">Não existem produtos disponíveis.</h4>
    <span>Clique <a href="<?= site_url('/product/new') ?>">aqui</a> para adicionar o primeiro produto do restaurante</span>
</div>
<?php else: ?>
    <div class="container-fluid mb-5">
        <div class="row">
            <?php foreach($products as $product):?>
                    <?= view('partials/product', ['product',$product]) ?>
            <?php endforeach;?>
        </div>
    </div>


<?php endif?>


<?= $this->endSection() ?>