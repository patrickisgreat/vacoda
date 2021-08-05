 <div class="panel panel-default">
    <div class="panel-heading">Vacoda Settings</div>
    <div class="panel-body">
        <vacoda-settings inline-template>
            <form>
                <div class="form-group" :class="{'has-error': form.errors.has('active_date_precedence')}">
                    <h5>Active Date Precedence</h5>

                    <input type="radio" name="active_date_precedence" id="active_date_banner" value="banner" v-model="form.active_date_precedence">
                    <label for="active_date_banner">Banner</label>

                    <input type="radio" name="active_date_precedence" id="active_date_offer" value="offer" v-model="form.active_date_precedence">
                    <label for="active_date_offer">Offer</label>

                    <span class="help-block" v-show="form.errors.has('active_date_precedence')">
                        @{{ form.errors.get('active_date_precedence') }}
                    </span>
                </div>

                <!-- Save Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"
                            @click.prevent="save"
                            :disabled="form.busy">
                        Save
                    </button>
                </div>
            </form>
        </vacoda-settings>
    </div>
</div>
