<?= $this->extend('layout/layout_main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/page_title') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Produtos</h3>

            <?php if (empty($products)): ?>
    <h4 class="opacity-50 mb-3">Não existem produtos disponíveis.</h4>
    <span>Clique <a href="<?= site_url('/product/new') ?>">aqui</a> para adicionar o primeiro produto do restaurante</span>
            <?php else: ?>

            <?php endif ?>

        </div>
    </div>
</div>


<?= $this->endSection() ?>