<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <?=$notes->title?>
                </h3>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <?=$notes->text?>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-warning button-link">
                    <a class="button-link" href="<?=base_url()?>notes/edit/<?=$notes->id?>">Edit</a>
                </button>
                <button data-id="<?=$notes->id?>" class="btn btn-danger delete-btn">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>