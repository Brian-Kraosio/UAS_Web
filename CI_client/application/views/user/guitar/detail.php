<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- Card Content -->
            <div class="card">
                <div class="card-header">
                    Guitar Details
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $guitar['item_name']; ?></h5>
                    <p class="card-text">
                        <label for=""><b>Instrument Type</b> : </label>
                        <?= $guitar['inst_type'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Color</b> : </label>
                        <?= $guitar['color'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Spesification</b> : </label>
                        <?= $guitar['spec'];?> 
                    </p>
                    <p class="card-text">
                        <label for=""><b>Price</b> : Rp.</label>
                        <?= $guitar['price'];?> 
                    </p>
                    <a href="<?= base_url();?>user/guitar" class="btn btn-info">Go back</a>
                </div>
            </div>
            <!-- End of card content -->
        </div>
    </div>
</div>