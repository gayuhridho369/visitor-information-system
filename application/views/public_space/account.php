<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Account</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-dark"><i class="fas fa-address-card fa-lg"></i></li>
                        <li class="breadcrumb-item active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-dark card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center mb-3">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets') ?>/dist/img/user2-160x160.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $public_space['name'] ?></h3>
                            <p class="text-muted text-center">Created on <?= $public_space['created'] ?></p>
                            <a href="<?= base_url('public_space/print_qrcode') ?>" target="blank" class="btn btn-dark btn-block"><b>Print QR Code</b></a>
                            <hr>

                            <form action="" action="get">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong></i> Name</strong>
                                        <input type="text" name="change" value="name" hidden>
                                        <p class="text-muted"><?= $public_space['name'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </form>

                            <form action="" action="get">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong></i> Address</strong>
                                        <input type="text" name="change" value="address" hidden>
                                        <p class="text-muted"><?= $public_space['address'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </form>

                            <form action="" action="get">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong></i> Email</strong>
                                        <input type="text" name="change" value="email" hidden>
                                        <p class="text-muted"><?= $public_space['email'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </form>

                            <form action="" action="get">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong></i> Password</strong>
                                        <input type="text" name="change" value="password" hidden>
                                        <p class="text-muted">********</p>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <?php if ($_GET) :  ?>
                        <?php if ($get_change == 'name') :  ?>
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Change Name</h3>
                                </div>

                                <form action="" method="post">
                                    <div class="card-body py-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : null ?>" placeholder="<?= $public_space['name'] ?>" value="<?= set_value('name'); ?>" name="name">
                                            <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark float-right ml-3">Save</button>
                                        <a href="<?= base_url('public_space/account') ?>" class="btn btn-secondary text-light float-right float-right">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>

                        <?php if ($get_change == 'address') :  ?>
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Change Address</h3>
                                </div>

                                <form action="" method="post">
                                    <div class="card-body py-3">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control <?= form_error('address') ? 'is-invalid' : null ?>" placeholder="<?= $public_space['address'] ?>" value="<?= set_value('address'); ?>" name="address">
                                            <?= form_error('address', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark float-right ml-3">Save</button>
                                        <a href="<?= base_url('public_space/account') ?>" class="btn btn-secondary text-light float-right float-right">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>

                        <?php if ($get_change == 'email') :  ?>
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Change Email</h3>
                                </div>

                                <form action="" method="post">
                                    <div class="card-body py-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : null ?>" placeholder="<?= $public_space['email'] ?>" value="<?= set_value('email'); ?>" name="email">
                                            <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" name="password" value="<?= set_value('password'); ?>">
                                            <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Repeat Password</label>
                                            <input type="password" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>" name="passconf" value="<?= set_value('passconf'); ?>">
                                            <?= form_error('passconf', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark float-right ml-3">Save</button>
                                        <a href="<?= base_url('public_space/account') ?>" class="btn btn-secondary text-light float-right float-right">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>

                        <?php if ($get_change == 'password') :  ?>
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h3 class="card-title">Change Password</h3>
                                </div>

                                <form action="" method="post">
                                    <div class="card-body py-3">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control <?= form_error('passcurr') ? 'is-invalid' : null ?>" value="<?= set_value('passcurr'); ?>" name="passcurr">
                                            <?= form_error('passcurr', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control <?= form_error('passnew') ? 'is-invalid' : null ?>" name="passnew" value="<?= set_value('passnew'); ?>">
                                            <?= form_error('passnew', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Repeat New Password</label>
                                            <input type="password" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>" name="passconf" value="<?= set_value('passconf'); ?>">
                                            <?= form_error('passconf', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-dark float-right ml-3">Save</button>
                                        <a href="<?= base_url('public_space/account') ?>" class="btn btn-secondary text-light float-right float-right">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
</div>