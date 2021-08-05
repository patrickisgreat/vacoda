@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <!-- Banner Show -->
        <div class="row banner-edit">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" id="banner-show">
                        <banner-show :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>
                            @include('components.banners.preview-modal')
                            <div id="previews" class="previews-container navbar-fixed-top">
                                <h3 class="page-title">
                                    <span v-show="!resourceId">Create your banner</span>
                                    <span v-show="resourceId">Banner ID --  @{{ resourceId }}</span>
                                </h3>
                                @include('components.banners.preview')
                            </div>

                            {{--<div class="page-title navbar-fixed-top">
                                <div class="panel-heading">
                                    Create Banner : Banner ID --  @{{ resourceId }}

                                </div>
                            </div>--}}
                        <!--create banner navigation/form/details-->
                            <div class="row">
                                @include('components.banners.navigation')
                                <div class="col-sm-6 content">
                                    <form class="tab-content" role="form" >
                                        <div class="create-section" id="section-details"  v-show="!staticView">
                                            <h3>Details</h3>

                                            <fieldset name="details" id="details">
                                                @include('components.banners.details')
                                            </fieldset>

                                            <fieldset name="category" id="category">
                                                @include('components.banners.categories')
                                            </fieldset>
                                        </div>
                                        <br/>

                                        <div class="create-section" id="section-design"  v-show="!staticView">
                                            <h3>Design</h3>

                                            <fieldset name="template" id="template">
                                                @include('components.banners.template')
                                            </fieldset>

                                            <fieldset name="theme" id="theme" v-show="template.has_themes">
                                                @include('components.banners.theme')
                                            </fieldset>
                                        </div>
                                        <br/>

                                        <div v-show="!staticView">
                                            <div class="create-section" id="section-content" v-show="!template.is_image">
                                                <h3>Content</h3>

                                                <fieldset name="contents" id="contents">
                                                    @include('components.banners.contents')
                                                </fieldset>
                                            </div>

                                            <div class="create-section" id="section-output" v-show="!template.is_image">
                                                <h3>Output</h3>

                                                <!-- Export Image -->
                                                <div class="form-group" :class="{'has-error': form.errors.has('export_image')}">
                                                    <div v-if="template.image_export_required == 1">
                                                        <input type="checkbox" id="export_image" value="1" v-model="form.export_image" class="checkbox-custom" checked disabled>
                                                        <label class="control-label checkbox-custom-label" for="export_image">Export Image to ESP</label>

                                                        <input type="hidden" value="1" v-model="form.export_image" />
                                                    </div>

                                                    <div v-else>
                                                        <input type="checkbox" id="export_image" value="1" v-model="form.export_image" class="checkbox-custom">
                                                        <label class="control-label checkbox-custom-label" for="export_image">Export Image to ESP</label>
                                                    </div>

                                                    <span class="help-block" v-show="form.errors.has('export_image')">
                                                        @{{ form.errors.get('export_image') }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Save Button -->
                                        <div id="save-archive-buttons" class="form-group" v-show="!staticView">
                                            <div>
                                                @can('update_banner')
                                                    <button type="submit" class="btn btn-primary"
                                                            @click.prevent="save"
                                                            :disabled="form.busy">
                                                        Save
                                                    </button>
                                                @endcan
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                @include('components.banners.progress')
                            </div>
                            <!--//create banner navigation/form/details-->

                            @include('components.banners.static')
                        </banner-show>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
