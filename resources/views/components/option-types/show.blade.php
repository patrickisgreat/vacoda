@extends('base')
@section('component-headline', 'Option Type')

@section('component')
    <option-type-show :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>
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

            <!-- Save Button -->
            <div class="form-group">
                <div class="col-md-offset-4 col-md-6">
                    <button type="submit" class="btn btn-primary"
                            @click.prevent="save"
                            :disabled="form.busy">
                        Save
                    </button>

                    @can('destroy_optiontype')
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
    </option-type-show>
@endsection
