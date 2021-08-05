<div class="row preview-panes">
    <div id="previews col-md-12 col-sm-12 col-xs-12">

        <div class="preview-desktop-wrapper pull-left">
            <div id="preview-desktop" class="preview-desktop">
                <banner-preview :fields.sync="form" :template="template" :theme="theme"></banner-preview>
            </div>

            <div class="pull-left no-gutters preview-scale-titles-div">
                <p class="preview-modal-link preview-scale-titles" data-toggle="modal" data-target="#preview-modal-desktop">
                    <a>Desktop Preview</a>
                    <span v-show="!template.is_image">(@{{ displayScaleDesktop }})</span>
                </p>
            </div>
        </div>

        <div class="preview-mobile-wrapper pull-right">
            <div id="preview-mobile">
                <banner-preview type="mobile" :fields.sync="form" :template="template" :theme="theme"></banner-preview>
            </div>

            <div class="pull-left preview-scale-titles-div">
            <p class="preview-modal-link preview-scale-titles" data-toggle="modal" data-target="#preview-modal-mobile">
                <a>Mobile Preview</a>
                <span v-show="!template.is_image">(@{{ displayScaleMobile }})</span>
            </p>
        </div>
        </div>
    </div>
</div>

<div class="page-title navbar-fixed-top preview-scale-titles">
    <div class="row">



    </div>
</div>
