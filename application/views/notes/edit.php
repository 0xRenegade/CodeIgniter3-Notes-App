<script>
    const noteId = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
</script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Note: 
                </h3>
            </div>
            <div class="card-body">
                <form id="edit-note-form" action="" method="POST">
                    <div class="form-group">
                        <label for="title">Note Title: </label>
                        <input placeholder="<?=$notes->title?>" type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="text">Note Text: </label>
                        <textarea placeholder="<?=$notes->text?>" class="form-control" id="text" rows="3" name="text"></textarea>
                    </div>
                </form>
                <div class="status">
                </div
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" id="edit-note-form-button" form="edit-note-form" class="btn btn-outline-primary">
                    Save Note
                </button>
            </div>
        </div>
    </div>
</div>