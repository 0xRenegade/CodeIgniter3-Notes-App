<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <?=$note['title']?>
                </h3>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <?=$note['text']?>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-warning">
                    <a href="<?=base_url('notes/edit/'.$note->id)?>">Edit</a>
                </button>

                <button class="btn btn-danger">
                    <a href="<?=base_url('notes/delete/'.$note->id)?>">Delete</a>
                </button>
            </div>
        </div>
    </div>
</div>