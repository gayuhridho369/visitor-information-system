<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">

                    <?php if ($status == 'in' || $status == 'verify') : ?>
                        <h1 class="m-0 text-center text-dark"> Welcome to <strong> <?= $public_space['name'] ?></strong></h1>
                    <?php elseif ($status == 'out') : ?>
                        <h1 class="m-0 text-center text-dark"> Hello <strong> <?= $phone ?></strong></h1>
                    <?php endif ?>

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
                            <?php if ($status == 'in') : ?>
                                <div class="bg-gradient-success rounded p-2 text-center">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Hey <b> <?= $phone ?> </b>, you has been <b> Check In</b>. Scan the qr code at the exit to <b> Check Out</b>.
                                </div>
                            <?php elseif ($status == 'verify') : ?>
                                <div class="bg-gradient-info rounded p-2 text-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    Waiting verification from <b> <?= $phone ?></b>. Please open <b> SMS </b> on your phone and click the link.
                                </div>
                            <?php elseif ($status == 'out') : ?>
                                <div class="bg-gradient-dark rounded p-2 text-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <b>You are outside</b>, you can Check In without input phone number before your session expired.
                                </div>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>