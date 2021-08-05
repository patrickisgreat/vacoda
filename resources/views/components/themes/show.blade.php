@extends('base')
@section('component-headline', 'Theme')

@section('component')
    <theme-show :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>
        <form class="form-horizontal" role="form">
            <!-- Name -->
            <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" v-model="form.name">

                    <span class="help-block" v-show="form.errors.has('name')">
                        @{{ form.errors.get('name') }}
                    </span>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group" :class="{'has-error': form.errors.has('description')}">
                <label class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    <textarea type="text" class="form-control" name="description" v-model="form.description"></textarea>

                    <span class="help-block" v-show="form.errors.has('description')">
                        @{{ form.errors.get('description') }}
                    </span>
                </div>
            </div>

            <!-- Font Color -->
            <div class="form-group" :class="{'has-error': form.errors.has('font_color')}">
                <label class="col-md-4 control-label">Font Color</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="font_color" v-model="form.font_color">

                    <span class="help-block" v-show="form.errors.has('font_color')">
                        @{{ form.errors.get('font_color') }}
                    </span>
                </div>
            </div>

            <!-- Font Color 2 -->
            <div class="form-group" :class="{'has-error': form.errors.has('font_color_secondary')}">
                <label class="col-md-4 control-label">Font Color 2</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="font_color_secondary" v-model="form.font_color_secondary">

                    <span class="help-block" v-show="form.errors.has('font_color_secondary')">
                        @{{ form.errors.get('font_color_secondary') }}
                    </span>
                </div>
            </div>

            <!-- CTA Font Color -->
            <div class="form-group" :class="{'has-error': form.errors.has('cta_font_color')}">
                <label class="col-md-4 control-label">CTA Font Color</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="cta_font_color" v-model="form.cta_font_color">

                    <span class="help-block" v-show="form.errors.has('cta_font_color')">
                        @{{ form.errors.get('cta_font_color') }}
                    </span>
                </div>
            </div>

            <!-- CTA BG Color -->
            <div class="form-group" :class="{'has-error': form.errors.has('cta_bg_color')}">
                <label class="col-md-4 control-label">CTA BG Color</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="cta_bg_color" v-model="form.cta_bg_color">

                    <span class="help-block" v-show="form.errors.has('cta_bg_color')">
                        @{{ form.errors.get('cta_bg_color') }}
                    </span>
                </div>
            </div>

            <!-- Background Color -->
            <div class="form-group" :class="{'has-error': form.errors.has('background_color')}">
                <label class="col-md-4 control-label">Background Color</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="background_color" v-model="form.background_color">

                    <span class="help-block" v-show="form.errors.has('background_color')">
                        @{{ form.errors.get('background_color') }}
                    </span>
                </div>
            </div>

            <!-- Save Button -->
            <div class="form-group">
                <div class="col-md-offset-4 col-md-6">
                    <button type="submit" class="btn btn-primary"
                            @click.prevent="save"
                            :disabled="form.busy">
                        Save
                    </button>

                    @can('destroy_theme')
                        <button type="submit" class="btn btn-default"
                                @click.prevent="approveDelete"
                                :disabled="form.busy"
                                v-show="resourceId">
                            Archive
                        </button>
                    @endcan
                </div>
            </div>
        </form>
    </theme-show>
@endsection
