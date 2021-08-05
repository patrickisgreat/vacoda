<list-edit-roles :user="user" :team="team" inline-template>
    <div class="panel panel-default">
        <div class="panel-heading">Edit Team Roles</div>
        <div class="panel-body">
            <!-- Success Message -->
            <label>Click Text to Edit Role Name, Click Plus to add capabilities.</label>
                <ul class="no-bullet">
                    <template v-for="(index, role) in roles">
                        <li class="roles-list">
                            <i class="@{{ role.id }} fa fa-plus fa-lg" aria-hidden="true" v-on:click="showTheRolesPermissions(role.id)"></i>
                            <input type="text" class="role-name @{{ role.id }}" v-on:click="clearNewRoleText(role, index)" v-model="role.name" />
                            <i class="@{{ role.id }} fa fa-trash fa-lg red" aria-hidden="true" v-on:click="approveRoleDelete(role)"></i>
                        </li>
                        <ul id="@{{role.id}}" class="no-bullet role-permissions">
                            <li v-for="permission in role.permissions">
                                <input type="checkbox" class="@{{ role.id }}" value=@{{permission.id}} v-model="permission.selected">
                                <label for=@{{permission.id}}>@{{permission.label}}</label>
                            </li>
                        </ul>
                    </template>
                </ul>
                <!-- Update Button -->
                <div class="form-group">
                    <div class="col-md-offset-1 col-md-6">
                        <button class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="">

                            Update
                        </button>
                        <button  class="btn btn-primary"
                                @click.prevent="addRole"
                                :disabled="">

                            Add Role
                        </button>
                    </div>
                </div>
        </div>
    </div>
    <!-- Update Team Roles-->
    <div class="modal fade" id="modal-update-team-roles" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Roles Update Successful!
                    </h4>
                </div>
                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                </div>
            </div>
        </div>
    </div>
    <!-- Delete Team Member Modal -->
    <div class="modal fade" id="modal-delete-role" tabindex="-1" role="dialog">
        <div class="modal-dialog" v-if="deletingRole">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Remove Role (@{{ deletingRole.name  }})
                    </h4>
                </div>

                <div class="modal-body">
                    Are you sure you want to remove this Role ?
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, Go Back</button>

                    <button type="button" class="btn btn-danger" @click="delete">
                    Yes, Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
</list-edit-roles>
