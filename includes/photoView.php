<section class="section-photos" id="section-photos">
    <div class="row" role="tabpanel">

    <?php if (empty($tabs)): ?>
        <h2 class="section-title">No images to display</h2>
   
   <?php else: ?>
        <h2 class="section-title">Your photos</h2>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <!-- Counter checks if it is the first element, if so it adds the class active -->
            <?php $counter = 0;
            foreach ($tabs as $key): ?>
                <li role="presentation"  class="<?= ($counter++ == 0) ? 'active' : ''; ?>">
                    <a href="#<?= $key ?>" aria-controls="<?= $key ?>" role="tab" data-toggle="tab"><?= ucfirst($key) ?></a>
                </li>
            <?php endforeach ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            
            <!-- Counter checks if it is the first element, if so it adds the class active -->
            <?php $counter = 0; 
            foreach ($tabs as $key): ?>

                <div role="tabpanel" class="tab-pane <?= ($counter++ == 0) ? 'active' : ''; ?>" id="<?= $key ?>">          
                <?php foreach ($db_man->imageList($userID) as $key2 => $value): 
                    if ($value[2] == $key): ?>     

                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail">

                            <!-- Image -->
                            <a href="<?= $path . 'users/images/' . $db_man->getImageInfo($value[0])[2]; ?>" data-lightbox="roadtrip">
                                <img src="<?= 'images/' . $db_man->getImageInfo($value[0])[2]; ?>" alt="<?= $db_man->getImageInfo($value[0])[3]; ?>" class="img-responsive">
                            </a>

                            <div class="caption">
                                <!-- img caption -->
                                <p><?= $db_man->getImageInfo($value[0])[3]; ?> </p>
                                
                                <!-- Buttons -->
                                <div class="btn-group btn-group-justified" role="group" aria-label="image-links">
                                    <a href="<?= $path . 'users/change.php?id=' . $db_man->getImageInfo($value[0])[0];?>" class="btn btn-info text-center">Change</a>
                                    <a href="<?= $path . 'users/download.php?file=' . $db_man->getImageInfo($value[0])[2];?>" class="btn btn-success text-center">Download</a>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div> 

                <?php endif; endforeach; ?>    
                </div>

            <?php endforeach ?>
        
        </div>
    <?php endif ?>
    </div>
</section>