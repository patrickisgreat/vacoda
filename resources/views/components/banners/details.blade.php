<div>
    <!-- Offer Select -->
    <div class="banner-offer-selection form-group" :class="{'has-error': form.errors.has('offer_id')}">
        <label class="control-label">Please pick your associated offer <span class="required-field">*</span></label>

        <div>
            <resource-select resource-name="offer" :selected.sync="form.offer_id"
                             :selected-data.sync="offerNameString" id="offer_id"></resource-select>

            <span class="help-block" v-show="form.errors.has('offer_id')">
                @{{ form.errors.get('offer_id') }}
            </span>
        </div>
    </div>

    <!-- Name -->
    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
        <label class="control-label">Banner Name <span class="required-field">*</span></label>
        <div class="form_name_input">
            <input type="text" @keyup="scalePreview" @blur="scalePreview" @click="scalePreview" class="form-control"
                   name="name" v-model="form.name">
            <span class="custom-tooltip">
                <div class="icon-icon_tool_tip" data-toggle="tooltip" data-placement="right"
                     title="Please name your banner. The name you choose will appear in display and search."></div>
            </span>

            <span class="help-block" v-show="form.errors.has('name')">
                @{{ form.errors.get('name') }}
            </span>
        </div>
    </div>

    <!-- Description -->
    <div class="form-group" :class="{'has-error': form.errors.has('description')}">
        <label class="control-label">Banner Description</label>

        <div>
            <textarea type="text" class="form-control" name="description" v-model="form.description"></textarea>

            <span class="help-block" v-show="form.errors.has('description')">
                @{{ form.errors.get('description') }}
            </span>
        </div>
    </div>

    <!-- Banner Active Dates -->
    <div class="banner-dates form-group"
         :class="{'has-error': form.errors.has('start_date') || form.errors.has('end_date')}">
        <label class="control-label">Start Date <span class="required-field">*</span></label>

        <div>
            <div class='input-group date datetimepicker' id='datetimepicker1'>
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

        <label class="control-label">End Date <span class="required-field">*</span></label>
        <div>
            <div class='input-group date datetimepicker' id='datetimepicker2'>
                <input type='text' class="form-control" v-model="form.end_date">
                <span class="input-group-addon">
                <span class="icon-icon_calendar"></span>
                </span>
            </div>

            <span class="help-block" v-show="form.errors.has('end_date')">
                @{{ form.errors.get('end_date') }}
            </span>
        </div>
        <br/>


    </div>
</div>
