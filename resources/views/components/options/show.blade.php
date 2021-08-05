@extends('base')
@section('component-headline', 'Option')

@section('component')
    <option-show :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>
        <form class="form-horizontal" role="form">

            <!-- Option Type Select -->
            <div class="form-group" :class="{'has-error': form.errors.has('option_type_id')}">
                <label class="col-md-4 control-label">Option Type</label>

                <div class="col-md-6">
                    <resource-select resource-name="option-type" placeholder="Select Option Type" :selected.sync="form.option_type_id"></resource-select>

                    <span class="help-block" v-show="form.errors.has('option_type_id')">
                        @{{ form.errors.get('option_type_id') }}
                    </span>
                </div>
            </div>

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

            <!-- Abbreviation -->
            <div class="form-group" :class="{'has-error': form.errors.has('abbreviation')}">
                <label class="col-md-4 control-label">Abbreviation</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="abbreviation" v-model="form.abbreviation">

                    <span class="help-block" v-show="form.errors.has('abbreviation')">
                        @{{ form.errors.get('abbreviation') }}
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

                    @can('destroy_option')
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
    </option-show>
@endsection
