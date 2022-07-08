<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Create Note: 
                </h3>
            </div>
            <div class="card-body">
                <form id="create-note-form" action="" method="POST">
                    <div class="form-group">
                        <label for="title">Note Title: </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="text">Note Text: </label>
                        <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                    </div>
                </form> 
                <div class="status">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" id="create-note-form-button" form="create-note-form" class="btn btn-outline-primary">
                    Save Note
                </button>
            </div>
        </div>
    </div>
</div>