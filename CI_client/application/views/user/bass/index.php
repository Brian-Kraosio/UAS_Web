<div class="container">
<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Bass List</h2>
        <div class="row mt-2">
            <?php foreach($bass['data'] as $bss): ?>
                <?php
    if (strlen($bss['spec']) > 75) {
        $bss['spec']= substr($bss['spec'], 0, 75) . "...";
      }
    ?>
            <div class="col-md-4">
                <div class="card-group">

                    <div class="card text-white bg-dark border-danger mb-3 " style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo base_url().'assets/img/'.$bss['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $bss['item_name']; ?></h5>
                    <p class="card-text"><?php echo $bss['spec']; ?></p>
                    <a href="<?= base_url(); ?>user/bass/detail/<?= $bss['item_id']; ?>" class="btn btn-danger">Detail</a>
                    <a href="<?= base_url(); ?>user/bass/buy/<?= $bss['item_id']; ?>" class="btn btn-warning">Buy Now !!</a>
                    <div class="card-footer text-white">
                        <small class="text-muted text-white">Instrument Type : <?php echo $bss['inst_type']; ?> <br></small>
                        <small class="text-muted text-white">Item Id :<?php echo $bss['item_id'];?> </small>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    </div>