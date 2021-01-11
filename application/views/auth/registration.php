<div class="register-box">
    <div class="register-logo">
        <p><b>Registration </b> Page</p>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Visitor Information System</p>

            <form action="" method="post" class="needs-validation">
                <div class="input-group mb-2">
                    <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" placeholder="Name" name="name" value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>


                <div class="input-group mb-2">
                    <input type="text" class="form-control <?= form_error('address') ? 'is-invalid' : null ?>" placeholder="Address" name="address" value="<?= set_value('address'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('address', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>

                <div class="input-group mb-2">
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : null ?>" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>

                <div class="input-group mb-2">
                    <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" placeholder="Password" name="password" value="<?= set_value('password'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>

                <div class="input-group mb-2">
                    <input type="password" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>" placeholder="Repeat password" name="passconf">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('passconf', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>

                <div class="row mx-1">
                    <button type="submit" class="btn btn-dark btn-block">Register</button>
                </div>
            </form>

            <hr>

            <div class="text-center">
                <a class="small text-dark" href="<?= base_url('auth') ?>">Login</a>
            </div>
        </div>
    </div>
</div>