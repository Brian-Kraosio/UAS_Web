
<div class="container">
<?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Violin Data <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
<div class="row mt-3">
    <div class="col-md-6">
        <a href="<?= base_url();?>admin/violin/add"class="btn btn-info">Add Violin Data</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Violin List</h2>
    <table class="table table-stripped table-dark">
        <tr>
            <th scope="col">Violin Type</th>
            <th scope="col">Violin Name</th>
            <th scope="col">Colour</th>
            <th scope="col">Spesification</th>
            <th scope="col">Price</th>
        </tr>
        <?php foreach($violin as $viol): ?>
            <tr>
                <td><?= $viol['inst_type']; ?></td>
                <td><?= $viol['item_name']; ?></td>
                <td><?= $viol['color']; ?></td>
                <td><?= $viol['spec']; ?></td>
                <td><?= $viol['price']; ?></td>
                <td> <a href="<?= base_url(); ?>admin/violin/delete/<?= $viol['item_id']; ?>" class="badge badge-warning float-right" onclick="return confirm('Are you sure want to delete this data?')">Hapus</a></td>
                <td> <a href="<?= base_url(); ?>admin/violin/edit/<?= $viol['item_id']; ?>" class="badge badge-light float-right">Edit</a></td>
                <td> <a href="<?= base_url(); ?>admin/violin/detail/<?= $viol['item_id']; ?>" class="badge badge-info float-right">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>
</div>
</div>
</div>