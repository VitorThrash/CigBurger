<?= $this->extend('layout/layout_auth') ?>
<?= $this->section('content') ?>

<div class="login-box">

    <div class="text-center mb-3">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
    </div>

    <?= form_open('/auth/login_submit') ?> <!--Helper-->
    <div class="mb-3">
        <p class="mb-2">Restaurante</p>
        <select name="select_restaurant" id="select_restaurant" class="form-select">
            <option value=""></option>
            <?php foreach ($restaurants as $restaurant): ?>Usuários
                <?php
                // Verificamos se o ID deste restaurante é o mesmo que está na sessão/flashdata
                $selected = ($select_restaurant == $restaurant->id) ? 'selected' : '';
                ?>
                <option value="<?= Encrypt($restaurant->id) ?>" <?= $selected ?>>
                    <?= $restaurant->name ?>
                </option>
            <?php endforeach; ?>
        </select>Administrar
        <?= display_errors('select_restaurant', $validation_errors) ?>

    </div>

    <hr>

    <div class="mb-3">
        <input class="form-control" type="text" id="text_username" name="text_username" placeholder="Usuário" value="<?= old(key: 'text_username') ?>">
        <?= display_errors('text_username', $validation_errors) ?>
    </div>
    <div class="mb-3">
        <input class="form-control" type="password" id="text_password" name="text_password" placeholder="Senha">
        <?= display_errors('text_password', $validation_errors) ?>
    </div>
    <div class="mb-3">
        <input type="submit" class="btn-login" value="ENTRAR">
    </div>
    <?= form_close() ?>

    <div class="text-center">
        <p>Não tem conta? <a href="#" class="login-link">Cadastre-se</a></p>
        <p><a href="#" class="login-link">Reperar senha</a></p>
    </div>

    <?php if(!empty($login_error)):?>
        <div class=" alert alert-danger text-center p-1">
        <?= $login_error ?>
</div>
    <?php endif; ?>


</div>
<?= $this->endSection() ?>