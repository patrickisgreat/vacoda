Vue.component('list-edit-import-categories', {
    mixins: [
        require('../api-resource'),
        require('../render-tree')
    ],

    props: ['user', 'team', 'resourceId'],

    /**
     * The component's data.
     */
    data() {
        return {
            updatingUri: `/api/categories/teams/${this.team.id}/update`,
            resourceUri: `/api/categories/teams/${this.team.id}`,
            tree_dom_element: '.categories',
            deletingCategory: null,
            category_tree: [],
            category: null,
            open: false,
            node: null,
            list: true,
            //may need later
            form: new SparkForm({})
        };
    },

    created() {

    },

    /**
     * Prepare the component.
     */
    ready() {
        this.registersClickHandlers();
    },

    events: {
        updateCategoriesHere() {
            this.getResource();
        }
    },

    methods: {
        initJsTree() {
            let self = this;

            $(this.tree_dom_element).jstree({
                "plugins" : [
                    "contextmenu", "dnd", "search",
                    "state", "checkbox"
                ],
                "core" : {
                    "animation" : 0,
                    "check_callback" : true,
                    "themes": {
                        "name": "default",
                        "dots": true,
                        "icons": true
                    }
                },

            });
        },

        rename() {
            let ref = $(this.tree_dom_element).jstree(true),
                sel = ref.get_selected();
            if(!sel.length) { return false; }
            sel = sel[0];
            ref.edit(sel);
        },

        showModal(type) {
          if (type === 'import') {
              $('#modal-import-categories').modal('show');
          }
        },

        registersClickHandlers() {
            const self = this;

            $('.offer-import').on('click', function(e) {
                $('#modal-import-categories').modal('hide');
            });
        },

        /**
         * Called after the resource is retrieved.
         */
        //
        getResourceSuccess() {
            if (typeof this.resource != "undefined") {
                this.category_tree = this.resource;
                this.renderDomTree();
                this.initJsTree();
            }
        },

        /**
         * Update an resource.
         */
        update() {
        },

        /**
         * Delete the given category.
         */
        delete() {
            Spark.delete(this.urlForDeleting, this.deleteRoleForm)
                .then(() => {
                    this.$dispatch('updateCatsHere');
                    this.$dispatch('broadcastCatUpdate');
                    $('#modal-delete-category').modal('hide');
                });
        },

        /**
         * Called after the resource is updated.
         */
        updateSuccess() {
            this.$dispatch('updateCategoriesHere');
            this.$dispatch('broadcastCatUpate');
            $('#modal-update-team-categories').modal('show');
        }
    },

    computed: {
        /**
         * Get the URL for deleting a role.
         */
        urlForDeleting() {
            return `/api/categories/teams/${this.team.id}/category/${this.deletingCategory.id}`;
        }
    }
});