<?= $this->extend('layout/layout_main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/page_title') ?>

<!--New Product-->

<div class="mb-3">
    <a href="<?= site_url('/products/new') ?> "class="btn btn-outline-secondary "><i class="fa-solid fa-plus me-2"></i>Novo Produto </a>
</div>

<!--Prodcuts List-->
<div class="text-center mt-5">
    <h4 class="opacity-50 mb-3">Não existem produtos disponíveis.</h4>
    <span>Clique <a href="<?= site_url('/products/new') ?>">aqui</a> para adicionar o primeiro produto do restaurante</span>
</div>

<?= $this->endSection() ?>