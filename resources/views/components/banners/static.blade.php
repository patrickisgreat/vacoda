<div class="col-sm-12 banner-static-blade" v-show="staticView">
    <div class="col-sm-5"><h4>Banner Details for @{{ form.name }}</h4><br/></div>
    <div class="col-sm-8">
        <div class="row">
                <div class="col-xs-2">
                    <strong>Banner ID</strong>
                </div>
                <div class="col-xs-10">
                    @{{ resourceId }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Associated offer</strong>
                </div>
                <div class="col-xs-10">
                    @{{ bannerName }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Banner name</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.name }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Banner description</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.description }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Dates active</strong>
                </div>
                <div class="col-xs-10">
                    @{{ activeDates }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Legal</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.legal_copy }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Segmentation</strong>
                </div>
                <div class="col-xs-10">
                    <span class="banner-subcategories">@{{ selectedCategoryString }}</span>
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>URL</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.url }}
                </div>
        </div>
        <br/>
        <div class="row">
                <div class="col-xs-2">
                    <strong>Design used</strong>
                </div>
                <div class="col-xs-10">
                    @{{ template.name }}
                </div>
        </div>
        <br/>
        <div class="row" v-show="template.is_image">
                <div class="col-xs-2">
                    <strong>ALT Text</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.image_alt }}
                </div>
        </div>
        <br/>
        <div class="row" v-show="!template.is_image">
                <div class="col-xs-2">
                    <strong>Headline copy</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.headline }}
                </div>
        </div>
        <br/>
        <div class="row" v-show="!template.is_image">
                <div class="col-xs-2">
                    <strong>Body copy</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.body }}
                </div>
        </div>
        <br/>
        <div class="row" v-show="!template.is_image">
                <div class="col-xs-2">
                    <strong>Call to action copy</strong>
                </div>
                <div class="col-xs-10">
                    @{{ form.cta }}
                </div>
        </div>
        <br/>
        <div class="col-sm-10">
            <div class="row banner-buttons">
                    <div>
                        <!-- Restore Button -->
                        @can('restore_banner')
                            <div v-show="form.deleted_at" class="pull-left">
                                <button type="submit" id="restore" class="btn btn-default"
                                        @click.prevent="approveRestore"
                                        :disabled="form.busy"
                                        v-show="resourceId">
                                    Unarchive
                                </button>
                            </div>
                        @endcan

                        @can('destroy_banner')
                            <div class="pull-left">
                                <button type="submit" id="archive" class="btn btn-default"
                                        @click.prevent="approveDelete"
                                        :disabled="form.busy"
                                        v-show="resourceId && !form.deleted_at">
                                    Archive
                                </button>
                            </div>
                        @endcan

                        @can('copy_banner')
                            <div class="pull-left">
                                <button type="submit" id="copy" class="btn btn-default"
                                        @click.prevent="copy"
                                        :disabled="form.busy"
                                        v-show="resourceId">
                                    Duplicate
                                </button>
                            </div>
                        @endcan

                        <div v-show="showEditButton" class="pull-left">
                            <span class="btn-tooltip">
                                <button class="btn btn-default" @click.prevent="toggleStaticView" data-toggle="tooltip" data-placement="top" title="If an approved banner is edited and saved, it will change the status in SFMC and will no longer be displayed in emails." id="edit">Edit</button>
                            </span>
                        </div>

                        <div class="pull-left">
                            <span v-show="form.status === 'Pending' && !form.deleted_at">
                                @can('approve_banner')
                                    <!-- Deny Button -->
                                        <button type="submit" id="deny" class="btn btn-default"
                                                @click.prevent="deny"
                                                :disabled="form.busy">
                                            Deny
                                        </button>
                                @endcan
                            </span>
                        </div>

                        <span v-show="form.status === 'Pending' && !form.deleted_at" class="pull-left">
                            <!-- Approve Button -->
                            @can('approve_banner')
                                <button type="submit" id="approve" class="btn btn-default"
                                        @click.prevent="approve"
                                        :disabled="form.busy">
                                    Approve
                                </button>
                            @endcan
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @include('components.banners.banner-activity')
</div>

