<div v-show="!template.is_image">
    <!-- Theme Select -->
    <div class="form-group" :class="{'has-error': form.errors.has('theme_id')}">
        <label class="control-label">Theme <span class="required-field">*</span></label>

        <div class="theme-selection">
            <array-select resource-name="theme" :selected.sync="form.theme_id" :selected-data.sync="theme" :resource-options="team.themes" data-style="btn-select"></array-select>

            <span class="help-block" v-show="form.errors.has('theme_id')">
                @{{ form.errors.get('theme_id') }}
            </span>
        </div>
    </div>
</div>