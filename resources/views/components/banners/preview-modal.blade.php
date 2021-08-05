<div class="banner-preview-modal modal fade" id="preview-modal-desktop">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size:14px;text-decoration: underline; vertical-align: middle; padding-right: 5px;">close</span><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Banner - Desktop Preview</h4>
            </div>
            <div class="modal-body">
                <div id="preview-desktop">
                    <banner-preview :fields.sync="form" :template="template" :theme="theme"></banner-preview>
                </div>
            </div>
            <div class="modal-footer">
                <span class="toggleModal" style="text-decoration:underline;color:#FFF;cursor:pointer;" >Mobile Banner</span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="banner-preview-modal modal fade" id="preview-modal-mobile">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="font-size:14px;text-decoration: underline; vertical-align: middle; padding-right: 5px;">close</span><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Banner - Mobile Preview</h4>
            </div>
            <div class="modal-body">
                <div id="preview-mobile">
                    <banner-preview type="mobile" :fields.sync="form" :template="template" :theme="theme"></banner-preview>
                </div>
            </div>
            <div class="modal-footer">
                <span class="toggleModal" style="text-decoration:underline;color:#FFF;cursor:pointer;">Desktop Banner</span>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->