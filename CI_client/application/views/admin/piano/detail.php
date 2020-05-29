<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Piano Details
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $piano['item_name']; ?></h5>
                    <p class="card-text">
                        <label for=""><b>Instrument Type</b> : </label>
                        <?= $piano['inst_type'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Color</b> : </label>
                        <?= $piano['color'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Spesification</b> : </label>
                        <?= $piano['spec'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Price</b> : Rp.</label>
                        <?= $piano['price'];?> 
                    </p>
                    <a href="<?= base_url();?>admin/piano" class="btn btn-info">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>