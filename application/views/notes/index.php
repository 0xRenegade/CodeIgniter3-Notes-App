<div class="row">
    <div class="text-center col-12">
        <h1 class="text-center mt-5 mb-3">
            Notes
        </h1>
    </div>
</div>
<div class="new-note d-flex justify-content-end">
    <button class="btn btn-primary">
        <a class="button-link" href="<?=base_url()?>notes/create">
            Create Note
        </a>
    </button>   
</div>
<hr>
<?php if (count($notes) < 1 || !$notes) { ?>
    <div class="error text-center">
        <div class="error-message mb-3">
            There are no notes available.
        </div>
        <button class="btn btn-primary">
            <a class="primary-button-link" href="<?=base_url()?>notes/create">Create one!</a>
        </button>
    </div> 
<?php } else { ?>
<div class="row"> 
    <?php foreach ($notes as $note) { ?>
        <div class="mb-4 col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <?=$note->title?>
                    </h3>
                </div>
                <div class="home-note card-body">
                    <div class="card-text">
                        <?=$note->text?>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">
                        <a class="button-link" href="<?=base_url()?>notes/show/<?=$note->id?>">View</a>
                    </button>
                    <button class="btn btn-warning">
                        <a class="button-link" href="<?=base_url()?>notes/edit/<?=$note->id?>">Edit</a>
                    </button>
                    <button data-id="<?=$note->id?>" class="btn btn-danger delete-btn">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php } ?>