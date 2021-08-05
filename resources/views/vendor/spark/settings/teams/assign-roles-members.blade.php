<assign-roles-members :user="user" :team="team" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Assign Roles to Team Members</div>

        <div class="panel-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                Your Role Has been Assigned
            </div>

            <form class="form-horizontal" role="form">

                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            Assign
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</assign-roles-members>
