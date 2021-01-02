<div class="login-box">
    <div class="login-logo">
        <p><b>Login </b> Page</p>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Movement and Tracking System</p>

            <form action="" method="post">
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
                    <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>

                <div class="row mx-1">
                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                </div>
            </form>

            <hr>

            <div class="text-center">
                <a class="small text-dark" href="<?= base_url('auth/registration') ?>">Registration</a>
            </div>
        </div>
    </div>
</div>