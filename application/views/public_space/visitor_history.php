<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Visitor</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-dark"><i class="fas fa-users fa-lg"></i></li>
                        <li class="breadcrumb-item active">Visitor</li>
                        <li class="breadcrumb-item active">History</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <form action="" method="get">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="input-group mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"> <i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="reservation" name="date" value=" <?= $_GET ? $_GET['date']  : '' ?> ">
                                                <div class=" input-group-append">
                                                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-search mr-1"></i> <b> Search</b></button>
                                                </div>
                                                <div class=" input-group-append">
                                                    <a href="<?= base_url('public_space/visitor_history') ?>" class="btn btn-success btn-sm ml-3 pt-2"> <i class="fas fa-sync-alt mr-1"></i> <b> Refresh</b></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <h3 class="card-title float-right mt-3">Result : <b>" <?= $_GET ? $_GET['date']  : 'All Time'  ?> " </b></h3>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Phone</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($history as $hs) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $hs['phone'] ?></td>
                                            <td><?= date("d/m/Y  @H:i:s", strtotime($hs['check_in'])) ?></td>
                                            <?php if ($hs['check_out']) : ?>
                                                <td><?= date("d/m/Y  @H:i:s", strtotime($hs['check_out'])) ?></td>
                                            <?php else : ?>
                                                <td>-</td>
                                            <?php endif ?>

                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>