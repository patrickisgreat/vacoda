Vue.component('category-select', {
    props: {
        team: {},
        selected: [],
        selectedString: '',
    },

    data() {
        return {
            programOptions: [],
            categoryOptions: [],
            search: '',
            open: [],
        }
    },

    computed: {
        filteredCategories() {
            let searchKey = this.search.toLowerCase(),
                results = [];

            _.each(this.categoryOptions, function (category) {
                if (String(category.cell_label).toLowerCase().indexOf(searchKey) > -1) {
                    results.push(category.id);
                }
            });

            return results;
        },

        noSearchResults() {
            return this.search.length > 0 && this.filteredCategories.length === 0;
        },

        selectedCategories() {
            let selectedIds = this.selected;

            return _.filter(this.categoryOptions, function (category) {
                return _.contains(selectedIds, category.id);
            });
        },

        selectedString() {
            let selectedCategories = this.selectedCategories,
                selectedString = '';

            _.each(selectedCategories, function (category, i, list) {
                if (i === list.length - 1){
                    // last item, no comma
                    selectedString += category.cell_label;
                } else {
                    selectedString += category.cell_label + ', ';
                }
            });

            return selectedString;
        },
    },

    created() {
        this.loading = true;
        this.getPrograms();
        this.getCategories();
    },

    ready()  {
        //
    },

    methods: {
        getPrograms() {
            this.$http.get('/api/programs/')
                .then(response => {
                    this.programOptions = response.data;
                });
        },

        getCategories() {
            this.$http.get('/api/categories/')
                .then(response => {
                    this.categoryOptions = response.data;
                });
        },

        visibleCategory(id) {
            return this.search.length === 0 ? true : _.contains(this.filteredCategories, id);
        },

        isSelected(id) {
            let selectedIds = this.selected;
            return _.contains(selectedIds, id);
        },

        toggleOpen(id) {
            if (_.contains(this.open, id)) {
                this.open = _.without(this.open, id);
            } else {
                this.open.push(id);
            }
        },

        isOpen(id) {
            return this.search.length > 0 ? true : _.contains(this.open, id);
        },
    },
});
