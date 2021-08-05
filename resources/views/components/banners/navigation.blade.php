<div class="col-sm-2 nav-steps" v-show="!staticView">
    <div class="banner-navigation sidebar-nav-fixed affix">
        <ul class="banner-nav-list">
            <li>
                <div class="banner-nav-tab"><a href="#section-details">Details</a></div>
            </li>
          
            <li v-show="!template.is_image">
                <div class="banner-nav-tab"><a href="#section-design">Design</a></div>
            </li>
            <li class="lastNav" v-show="template.is_image">
                <div class="banner-nav-tab"><a href="#section-design">Design</a></div>
            </li>
            <li v-show="!template.is_image">
                <div class="banner-nav-tab"><a href="#section-content">Content</a></div>
            </li>
            <li class="lastNav" v-show="!template.is_image">
                <div class="banner-nav-tab"><a href="#section-output">Output</a></div>
            </li>
        </ul>
    </div>

</div>

