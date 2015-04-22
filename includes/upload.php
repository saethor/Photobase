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

        <form action="<?= $path ?>users/" method="post" enctype="multipart/form-data" id="uploadImage" class="col-md-6">
            <label for="image">Upload image</label>
            <div class="input-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
                <input type="file" name="image[]" id="image" class="form-control" multiple>

                <span class="input-group-btn">
                    <button type="submit" name="upload" class="btn btn-default">Upload</button>
                </span>
            </div>
        </form>

        <form action="search.php" method="GET" class="col-md-6 pull-right">
            <label for="searchInput">Search</label>
            <div class="input-group">
                <input type="text" name="q" id="searchInput" placeholder="Search Images" class="form-control">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="Search" id="searchSubmit">
                </span>
            </div>
        </form>  
    </div>

</section>