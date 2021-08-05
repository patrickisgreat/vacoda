<div class="col-sm-4 details-static" v-show="!staticView">
    <div class="details-col sidebar-nav-fixed affix">
        <!-- Progress Bar -->
        <div>
            <span style="color:#6FC4E8;">@{{ progressBar }} Complete</span>
            <span style="float:right;">Required Fields</span>
        </div>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: @{{ progressBar }};color:#000;background-color:
                    #6FC4E8;">
            </div>
        </div>

        <!-- Banner details -->
        <div class="static-details">
            <p><strong>Offer Name:</strong><span>@{{ bannerName }}</span></p>
            <p></p><strong>Name:</strong><span>@{{ form.name }}</span></p>
            <p class="description-preview"><strong>Description:</strong><span>@{{ form.description }}</span></p>
            <p><strong>Active Dates:</strong><span>@{{ activeDates }}</span>
                </p>
            <p class="segmentation-preview"><strong>Marketing Segmentation:</strong><span class="banner-subcategories">@{{ selectedCategoryString }}</span></p>
        </div>

    </div>
</div>