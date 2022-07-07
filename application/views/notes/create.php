<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Create Note: 
                </h3>
            </div>
            <div class="card-body">
                <? if ($this->session->flashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <?=$this->session->flashdata('errors')?>
                    </div>
                <? endif; ?>
                <form id="create-note-form" action="<?=base_url('notes/store')?>" method="POST">
                    <div class="form-group">
                        <label for="title">Note Title: </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="text">Note Text: </label>
                        <textarea class="form-control" id="text" rows="3" name="text"></textarea>
                    </div>  
                </form> 
            </div>
            <div class="card-footer">
                <button type="submit" for="create-note-form" class="btn btn-outline-primary">
                    Save Note
                </button>
            </div>
        </div>
    </div>
</div>