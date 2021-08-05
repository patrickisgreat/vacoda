<update-team-details :user="user" :team="team" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Update Team Details</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your team details have been updated!
            </div>

            <form class="form-horizontal" role="form">
                <!-- Description -->
                <div class="form-group" :class="{'has-error': form.errors.has('description')}">
                    <label class="col-md-4 control-label">Description</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="description" v-model="form.description">

                        <span class="help-block" v-show="form.errors.has('description')">
                            @{{ form.errors.get('description') }}
                        </span>
                    </div>
                </div>

                <!-- Team Contact Name -->
                <div class="form-group" :class="{'has-error': form.errors.has('team_contact_name')}">
                    <label class="col-md-4 control-label">Team Contact Name</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="team_contact_name" v-model="form.team_contact_name">

                        <span class="help-block" v-show="form.errors.has('team_contact_name')">
                            @{{ form.errors.get('team_contact_name') }}
                        </span>
                    </div>
                </div>

                <!-- Team Contact Email -->
                <div class="form-group" :class="{'has-error': form.errors.has('team_contact_email')}">
                    <label class="col-md-4 control-label">Team Contact Email</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="team_contact_email" v-model="form.team_contact_email">

                        <span class="help-block" v-show="form.errors.has('team_contact_email')">
                            @{{ form.errors.get('team_contact_email') }}
                        </span>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</update-team-details>
