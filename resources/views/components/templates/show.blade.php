@extends('base')
@section('component-headline', 'Template')

@section('component')
    <template-show :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>
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

            <!-- HTML -->
            <div class="form-group" :class="{'has-error': form.errors.has('html')}">
                <label class="col-md-4 control-label">HTML</label>

                <div class="col-md-6">
                    <textarea type="text" class="form-control" name="html" v-model="form.html"></textarea>

                    <span class="help-block" v-show="form.errors.has('html')">
                        @{{ form.errors.get('html') }}
                    </span>
                </div>
            </div>

            <!-- CSS -->
            <div class="form-group" :class="{'has-error': form.errors.has('css')}">
                <label class="col-md-4 control-label">CSS</label>

                <div class="col-md-6">
                    <textarea type="text" class="form-control" name="css" v-model="form.css"></textarea>

                    <span class="help-block" v-show="form.errors.has('css')">
                        @{{ form.errors.get('css') }}
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

                    @can('destroy_template')
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
    </template-show>
@endsection
