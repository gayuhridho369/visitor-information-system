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
                        <li class="breadcrumb-item active">Inside</li>
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
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Phone</th>
                                        <th>Check In</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php $i = 1; ?>
                                    <?php foreach ($inside as $in) : ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $in['phone'] ?></td>
                                            <td><?= date("d/m/Y  @H:i:s", strtotime($in['check_in'])) ?></td>
                                            <td>
                                                <a onclick="check_out(<?= $in['id'] ?>)" class="btn bg-danger btn-sm"> <i class="fas fa-sign-out-alt bg-red mr-1"></i> Check Out </a>
                                            </td>
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