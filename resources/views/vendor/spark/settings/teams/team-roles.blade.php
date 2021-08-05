<team-roles :user="user" :team="team" inline-template>
    <div>
        <div v-if="user && team">
            <!-- List and Edit Roles -->
            @include('spark::settings.teams.list-edit-roles')
        </div>
    </div>
</team-roles>