<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modal-import-offers" tabindex="-1" role="dialog" aria-labelledby="modal-offers">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/upload/offers" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Spreadsheet</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file" name="spreadsheet" multiple>
                    </span>
                </span>
                        <input type="text" class="form-control offer-import-input" readonly>
                    </div>
                    <span class="help-block">
                Select a CSV or XLS spreadsheet formatted with the correct headers.
            </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary offer-import">Upload File</button>
                </div>
            </div>
        </form>
    </div>
</div>