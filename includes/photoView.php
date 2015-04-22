<section class="section-photos" id="section-photos">
    <div class="row" role="tabpanel">  

    <?php if (empty($tabs)): ?>
        <h2 class="section-title">No images to display</h2>
   
   <?php else: ?>
        <div class="section-title">Your photos</div>

        
        <!-- Nav tabs -->
        <ul class="nav nav-pills nav-justified" role="tablist">
            <!-- Counter checks if it is the first element, if so it adds the class active -->
            <?php $counter = 0;
            foreach ($tabs as $key): ?>
                <li role="presentation"  class="<?= ($counter++ == 0) ? 'active' : ''; ?>">
                    <a href="#<?= $key ?>" aria-controls="<?= $key ?>" role="tab" data-toggle="tab"><?= ucfirst($key) ?></a>
                </li>
            <?php endforeach ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content row">
            
            <!-- Counter checks if it is the first element, if so it adds the class active -->
            <?php $counter = 0;
                  $clearfixCounter = 0; 
            foreach ($tabs as $key): ?>

                <div role="tabpanel" class="tab-pane <?= ($counter++ == 0) ? 'active' : ''; ?>" id="<?= $key ?>">  

                <?php foreach ($db_man->imageList($userID) as $key2 => $value): 
                    if ($value[2] == $key): 
                        $clearfixCounter++;?>     

                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="thumbnail">

                            <!-- Image -->
                            <a href="<?= $path . 'users/images/' . $db_man->getImageInfo($value[0])[2]; ?>" data-lightbox="<?= $counter ?>">
                                <img src="<?= 'images/thumb/' . $db_man->getImageInfo($value[0])[2]; ?>" alt="<?= $db_man->getImageInfo($value[0])[3]; ?>" class="img-responsive">
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
                            
                        </div>
                    </div> 

                <?php 
                // Clearfix for md
                if ($clearfixCounter % 4 == 0) echo '<div class="clearfix hidden-xs hidden-sm"></div>';
                // Clearfix for sm
                if ($clearfixCounter % 3 == 0) echo '<div class="clearfix hidden-xs hidden-md hidden-lg"></div>';
                // Clearfix for xs
                if ($clearfixCounter % 2 == 0) echo '<div class="hidden-sm hidden-md hidden-lg"></div>';

                endif; endforeach; ?>    
                </div>

            <?php endforeach ?>
        
        </div>
    <?php endif ?>
    </div>
</section>