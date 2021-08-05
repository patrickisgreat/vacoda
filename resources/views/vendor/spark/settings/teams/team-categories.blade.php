<team-categories :user="user" :team="team" inline-template>
    <div>
        <div v-if="user && team">
            <!-- List and Edit Roles -->
            @include('spark::settings.teams.list-edit-import-categories')
        </div>
    </div>
</team-categories>