<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <h1 class="m-0 text-center text-dark"> Welcome to <strong> <?= $public_space['name'] ?></strong></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-dark card-outline shadow">
                        <div class="card-body">
                            <div class="bg-gradient-dark rounded p-2 text-center">
                                <i class="fas fa-edit mr-1"></i>
                                Please input your<b> Phone Number</b>.
                            </div>

                            <form action="" method="post">
                                <div class="input-group mt-3">
                                    <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid' : null ?>" placeholder="Phone Number" name="phone" value="<?= set_value('phone'); ?>">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-2 mt-1">
                                    <?= form_error('phone', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="row mt-2 mx-1">
                                    <div class="col-7">
                                    </div>
                                    <div class="col-5 text-right">
                                        <button type="submit" class="btn btn-dark shadow btn-block">Check In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>