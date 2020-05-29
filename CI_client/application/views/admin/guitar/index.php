<div class="container">
<?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Guitar Data <strong> Sucessfully </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
<div class="row mt-3">
    <div class="col-md-6">
        <a href="<?= base_url();?>admin/guitar/add"class="btn btn-info">Add Guitar Data</a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Guitar List</h2>
    <table class="table table-stripped table-dark">
            <tr>
                <th scope="col">Guitar Type</th>
                <th scope="col">Guitar Name</th>
                <th scope="col">Colour</th>
                <th scope="col">Spesification</th>
                <th scope="col">Price</th>
            </tr>    
        <?php foreach($guitar as $gtr): ?>
            <tr>
                <td><?= $gtr['inst_type']; ?></td>
                <td><?= $gtr['item_name']; ?></td>
                <td><?= $gtr['color']; ?></td>
                <td><?= $gtr['spec']; ?></td>
                <td><?= $gtr['price']; ?></td>
                <td> <a href="<?= base_url(); ?>admin/guitar/delete/<?= $gtr['item_id']; ?>" class="badge badge-warning float-right" onclick="return confirm('Are you sure want to delete this data?')">Hapus</a></td>
                <td> <a href="<?= base_url(); ?>admin/guitar/edit/<?= $gtr['item_id']; ?>" class="badge badge-light float-right">Edit</a></td>
                <td> <a href="<?= base_url(); ?>admin/guitar/detail/<?= $gtr['item_id']; ?>" class="badge badge-info float-right">Detail</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>
</div>
</div>
		</div>