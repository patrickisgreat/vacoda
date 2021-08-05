@extends('base')
@section('component-headline', 'Offer')

@section('component')
    <offer-show id="offer-show" :user="user" :team="currentTeam" :resource-id="{{ $resource_id }}" inline-template>

        <form role="form">
            <!-- Name -->
            <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                <label class="control-label">Name <span class="required-field">*</span></label>

                <div>
                    <input type="text" class="form-control" name="name" v-model="form.name">

                    <span class="help-block" v-show="form.errors.has('name')">
                        @{{ form.errors.get('name') }}
                    </span>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group" :class="{'has-error': form.errors.has('description')}">
                <label class="control-label">Description <span class="required-field">*</span></label>

                <div>
                    <textarea type="text" class="form-control" name="description" v-model="form.description"></textarea>

                    <span class="help-block" v-show="form.errors.has('description')">
                        @{{ form.errors.get('description') }}
                    </span>
                </div>
            </div>

            <!-- Department Select -->
            <div class="form-group" :class="{'has-error': form.errors.has('department_id')}">
                <label class="control-label">Department</label>

                <div>
                    <resource-select resource-name="option" field-name="department_id" placeholder="Select Department" :selected.sync="form.department_id"></resource-select>

                    <span class="help-block" v-show="form.errors.has('department_id')">
                        @{{ form.errors.get('department_id') }}
                    </span>
                </div>
            </div>

            <!-- Legal Display Copy -->
            <div class="form-group" :class="{'has-error': form.errors.has('legal_display_copy')}">
                <label class="control-label">Legal Display Copy</label>

                <div>
                    <textarea type="text" class="form-control" name="legal_display_copy" v-model="form.legal_display_copy"></textarea>

                    <span class="help-block" v-show="form.errors.has('legal_display_copy')">
                        @{{ form.errors.get('legal_display_copy') }}
                    </span>
                </div>
            </div>

            <!-- External Offer ID -->
            <div class="form-group" :class="{'has-error': form.errors.has('external_offer_id')}">
                <label class="control-label">External Offer ID</label>

                <div>
                    <input type="text" class="form-control" name="external_offer_id" v-model="form.external_offer_id">

                    <span class="help-block" v-show="form.errors.has('external_offer_id')">
                        @{{ form.errors.get('external_offer_id') }}
                    </span>
                </div>
            </div>

            <!-- Offer Owner -->
            <div class="form-group" :class="{'has-error': form.errors.has('owner_id')}">
                <label class="control-label">Offer Owner</label>

                <div>
                    <team-member-select :team="team" field-name="owner_id" :selected.sync="form.owner_id"></team-member-select>

                    <span class="help-block" v-show="form.errors.has('owner_id')">
                        @{{ form.errors.get('owner_id') }}
                    </span>
                </div>
            </div>

            <!-- Offer Active Dates -->
            <div class="form-group" :class="{'has-error': form.errors.has('start_date') || form.errors.has('end_date')}">
                <label class="control-label">Start Date </label>

                <div>
                    <div class='input-group date datetimepicker' id='datetimepicker3'>
                        <input type='text' class="form-control" v-model="form.start_date">
                        <span class="input-group-addon">
                            <span class="icon-icon_calendar"></span>
                        </span>
                    </div>

                    <span class="help-block" v-show="form.errors.has('start_date')">
                        @{{ form.errors.get('start_date') }}
                    </span>
                </div>
                <br/>

                <label class="control-label">End Date </label>

                <div>
                    <div class='input-group date datetimepicker' id='datetimepicker4'>
                        <input type='text' class="form-control" v-model="form.end_date">
                        <span class="input-group-addon">
                            <span class="icon-icon_calendar"></span>
                        </span>
                    </div>

                    <span class="help-block" v-show="form.errors.has('end_date')">
                        @{{ form.errors.get('start_date') }}
                    </span>
                </div>
            </div>

            <!-- Save Button -->
            <div class="form-group">
                @can('restore_offer')
                    <span v-show="form.deleted_at">
                        <div class="col-md-offset-4 col-md-6">
                            <button type="submit" class="btn btn-primary"
                                    @click.prevent="approveRestore"
                                    :disabled="form.busy"
                                    v-show="resourceId">
                                Restore
                            </button>
                        </div>
                    </span>
                @endcan

                <span v-show="!form.deleted_at">
                <div>
                    <button type="submit" class="btn btn-primary"
                            @click.prevent="save"
                            :disabled="form.busy">
                        Save
                    </button>

                    @can('destroy_offer')
                        <button type="submit" class="btn btn-default"
                                @click.prevent="approveDelete"
                                :disabled="form.busy"
                                v-show="resourceId">
                            Archive
                        </button>
                    @endcan

                    @can('copy_offer')
                        <button type="submit" id="copy" class="btn btn-default"
                                @click.prevent="copy"
                                :disabled="form.busy"
                                v-show="resourceId">
                            Duplicate
                        </button>
                    @endcan
                </div>
                </span>
            </div>
        </form>
    </offer-show>
@endsection
