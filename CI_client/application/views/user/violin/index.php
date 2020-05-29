
<div class="container">
<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Violin List</h2>
        <div class="row mt-2">
            <?php foreach($violin['data'] as $viol): ?>
                <?php
    if (strlen($viol['spec']) > 75) {
        $viol['spec']= substr($viol['spec'], 0, 75) . "...";
      }
    ?>
            <div class="col-md-4">
                <div class="card-group">

                    <div class="card text-white bg-dark border-danger mb-3 " style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo base_url().'assets/img/'.$viol['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $viol['item_name']; ?></h5>
                    <p class="card-text"><?php echo $viol['spec']; ?></p>
                    <a href="<?= base_url(); ?>user/violin/detail/<?= $viol['item_id']; ?>" class="btn btn-danger">Detail</a>
                    <a href="<?= base_url(); ?>user/violin/buy/<?= $viol['item_id']; ?>" class="btn btn-warning">Buy Now !!</a>
                    <div class="card-footer text-white">
                                <small class="text-muted text-white">Instrument Type : <?php echo $viol['inst_type']; ?> <br></small>
                                <small class="text-muted text-white">Item Id :<?php echo $viol['item_id'];?> </small>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>