Vue.component('team-member-select', {
    props: {
        team: {
            type: Object,
            required: true
        },

        fieldName: {
            type: String,
            required: true
        },

        selected: [String, Number],
    },

    template: `
<select class="form-control" :name="fieldName" v-model="selected">
    <option value="">Select User</option>
    <option v-for="member in team.users" :value="member.id">
        {{ member.name }}
    </option>
</select>`,
});
