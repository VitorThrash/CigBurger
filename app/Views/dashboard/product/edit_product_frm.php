<?= $this->extend('layout/layout_main') ?>
<?= $this->section('content') ?>

<?= $this->include('partials/page_title') ?>

<div class="content-box">

    <?= form_open_multipart('product/edit_submit', ['novalidate' => true]) ?>
    <input type="hidden" name="id_product" value="<?= Encrypt($product->id) ?>">
    <div class="row">

        <div class="col-lg-4 col-12 px-5 pt-5">

            <div class="text-center">
                <img src=" <?= base_url('assets/images/products/') . $product->image ?>" class="product-image img-fluid" id="product_image">
            </div>

            <div class="mt-3 text-start">
                <label for="file_image" class="form-label">Imagem do produto</label>
                <input type="file" name="file_image" id="file_image"
                    class="form-control" accept="image/png">

                <?= display_errors('file_image', $validation_errors) ?>
            </div>

        </div>

        <div class="col-lg-6 col-12 p-5">

            <!-- name -->
            <div class="mb-3">
                <label class="form-label">Nome do produto</label>
                <input type="text" name="text_name" id="text_name"
                    class="form-control" placeholder="Nome do produto" value="<?= old('text_name',$product->name) ?>">

                <?= display_errors('text_name', $validation_errors) ?>
            </div>

            <!-- description -->
            <div class="mb-3">
                <label class="form-label">Descrição do produto</label>
                <input type="text" name="text_description" id="text_description"
                    class="form-control" placeholder="Descrição do produto" value="<?= old('text_description',$product->description) ?>">

                <?= display_errors('text_description', $validation_errors) ?>
            </div>

            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>

                        <input list="list_categories"
                            name="text_category"
                            id="text_category"
                            class="form-control"
                            placeholder="Categoria" value="<?= old('text_category',$product->category) ?>">
                        <?= display_errors('text_category', $validation_errors) ?>
                        
                        <datalist id="list_categories">

                            <?php foreach($categories as $category):?>
                                <option value="<?= $category->category ?>">
                            <?php endforeach; ?>

                        </datalist>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label">Preço</label>

                        <input type="text" name="text_price" id="text_price"
                            class="form-control" placeholder="Preço" value="<?= old('text_price', number_format($product->price, 2, ',', '.')) ?>">
                        <?= display_errors('text_price', $validation_errors) ?>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-6 col-12 align-self-center mb-3">
                    <input type="checkbox" name="check_available"
                        id="check_available"<?= $product-> availability ? 'checked' : ''?>>

                    <label class="form-label">Produto disponível.</label>
                </div>

                <div class="col-lg-6 col-12 mb-3">
                    <label class="form-label">Promoção</label>

                    <input type="text" name="text_promotion"
                        id="text_promotion"
                        class="form-control"
                        placeholder="Promoção" value="<?= old('text_promotion',intval($product->promotion) )?>">

                    <?= display_errors('text_promotion', $validation_errors) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6 col-12 mb-3">
                    <label class="form-label">Limite mínimo de estoque</label>

                    <input type="text" name="text_stock_minimum_limit"
                        id="text_stock_minimum_limit"
                        class="form-control"
                        placeholder="Limite mínimo de estoque" value="<?= old('text_stock_minimum_limit',$product->stock) ?>">
                    <?= display_errors('text_stock_minimum_limit', $validation_errors) ?>
                </div>

            </div>

        </div>

    </div>

    <!-- submit -->
    <div class="row">
        <div class="col px-5 pb-5">

            <a href="<?= site_url('product') ?>"
                class="btn btn-outline-secondary px-5">
                <i class="fas fa-ban me-2"></i>Cancelar
            </a>

            <button type="submit"
                class="btn btn-outline-success px-5">
                <i class="fas fa-check me-2"></i>Editar produto
            </button>

        </div>
    </div>

    <?= form_close() ?>

</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {

        const fileInput = document.querySelector("#file_image");

        if (!fileInput) return;

        fileInput.addEventListener('change', function() {

            const product_image = document.querySelector("#product_image");
            const file = this.files[0];

            let reader = new FileReader();

            reader.onloadend = function() {
                product_image.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                product_image.removeAttribute('src');
            }
        });
    });
</script>

<?= $this->endSection() ?>