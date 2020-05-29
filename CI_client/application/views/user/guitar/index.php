<div class="container">
<div class="row mt-3">
    <div class="col-md-20">
        <h2 style="color: white">Guitar List</h2>
        <div class="row mt-2">
            <?php foreach($guitar['data'] as $gtr): ?>
                <?php
                // In this code is used for limit the spec description to 75 Char only
    if (strlen($gtr['spec']) > 75) {
        $gtr['spec']= substr($gtr['spec'], 0, 75) . "...";
      }
    ?>
    <!-- Card Content -->
            <div class="col-md-4">
                <div class="card-group">

                    <div class="card text-white bg-dark border-danger mb-3 " style="width: 18rem;">
                    <!-- In image we call the image name from database and then call the image from the folder -->
                        <img class="card-img-top" src="<?php echo base_url().'assets/img/'.$gtr['image'] ?>"  alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title text-white"><?php echo $gtr['item_name']; ?></h5>
                    <p class="card-text"><?php echo $gtr['spec']; ?></p>
                    <a href="<?= base_url(); ?>user/guitar/detail/<?= $gtr['item_id']; ?>" class="btn btn-danger">Detail</a></td>
                    <a href="<?= base_url(); ?>user/guitar/buy/<?= $gtr['item_id']; ?>" class="btn btn-warning">Buy Now !!</a></td>
                    <div class="card-footer text-white">
                        <small class="text-muted text-white">Instrument Type : <?php echo $gtr['inst_type']; ?> <br></small>
                        <small class="text-muted text-white">Item Id :<?php echo $gtr['item_id'];?> </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of card content -->
    <?php endforeach; ?>
    </div>
</script>