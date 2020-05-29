<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Bass Details
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $bass['item_name']; ?></h5>
                    <p class="card-text">
                        <label for=""><b>Instrument Type</b> : </label>
                        <?= $bass['inst_type'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Color</b> : </label>
                        <?= $bass['color'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Spesification</b> : </label>
                        <?= $bass['spec'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Price</b> : Rp.</label>
                        <?= $bass['price'];?> 
                    </p>
                    <a href="<?= base_url();?>admin/bass" class="btn btn-info">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>