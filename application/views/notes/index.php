<div class="row">
    <div class="text-center col-12">
        <h1 class="text-center mt-5 mb-3">
            Notes
        </h1>
    </div>
</div>
<?php if (count($notes) < 1 || !$notes) { ?>
    <div class="error">
        There are no notes available.
    </div>
<?php } else { ?>
<div class="row"> 
    <?php foreach ($notes as $note) { ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <?=$note->title?>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <?=$note->text?>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">
                        <a href="<?=base_url()?>notes/show/<?=$note->id?>">View</a>
                    </button>

                    <button class="btn btn-warning">
                        <a href="<?=base_url()?>notes/edit/<?=$note->id?>">Edit</a>
                    </button>

                    <button class="btn btn-danger">
                        <a href="<?=base_url()?>notes/delete/<?=$note->id?>">Delete</a>
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php } ?>