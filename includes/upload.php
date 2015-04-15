<section class="section-contact" id="section-contact">

    <div class="row">
        <h2 class="section-title">Upload a new image</h2>

        <div class="alert alert-warning" role="alert">
            <button class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            You may need to refresh the page after upload for new images to show up
        </div>
            
        <?php if (isset($result)): ?>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php foreach ($result as $message):  ?>
                    <p><?= $message ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data" id="uploadImage" class="">
            <div class="col-md-6 form-group">
                <label for="image">Upload image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
                <input type="file" name="image[]" id="image" class="form-control" multiple>
            </div>
              
            <div class="col-md-12 form-group">
                <button type="submit" name="upload" class="btn btn-default">Upload</button>
            </div>
        </form>
    </div>

</section>