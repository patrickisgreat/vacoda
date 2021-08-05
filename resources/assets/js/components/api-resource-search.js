Vue.component('resource-search', {
    props: {
        selected: [],
        selectedData: [],
        resourceName: '',
        searchTarget: '', // which property on the resource to search
        haystackLimit: [],
        showId: false,
    },

    data() {
        return {
            resourceUri: `/api/${this.resourceName}/`,
            resource: [],
            search: '',
            isLoading: true,
            isSearching: false,
        }
    },

    computed: {
        haystack() {
            if (this.haystackLimit && this.haystackLimit.length > 0) {
                return _.filter(this.resource, (item) => {
                    return _.contains(this.haystackLimit, item.id);
                });
            }

            return this.resource;
        },
    },

    watch: {
        selected() {
            this.setSelectedData();
        },

        haystackLimit() {
            this.selected = _.intersection(this.selected, this.haystackLimit);
        },
    },

    template: `
<div class="resource-search" id="resource-search-{{ _uid }}">
    <input type="search" v-model="search" id="resource-search-{{ _uid }}-input" class="form-control" placeholder="Search" />
    <span v-show="isSearching" class="resource-search-reset" @click="reset"><i class="fa fa-times" aria-hidden="true"></i></span>

    <div v-show="isSearching" class="resource-search-results" id="resource-search-{{ _uid }}-results">
        <label v-for="item in haystack | filterBy search in 'id' searchTarget" for="{{ resourceName }}-{{ item.id }}" class="resource-search-result control-label {{ isSelected(item.id) ? 'selected' : '' }}">
            <input type="checkbox" value="{{ item.id }}" number v-model="selected" id="{{ resourceName }}-{{ item.id }}" />
            <i class="fa {{ isSelected(item.id) ? 'fa-minus' : 'fa-plus' }}" aria-hidden="true"></i>
            <span v-show="showId">{{ item.id }} - </span>
            <span v-text="item[searchTarget]"></span>
        </label>

        <div v-show="isLoading" class="resource-search-loading">Loading...</div>
        <div class="resource-search-no-results">No results found.</div>
    </div>

    <div v-show="selected.length > 0 && !isSearching" class="resource-search-selections">
        <template v-for="item in haystack">
            <label v-if="isSelected(item.id)" for="{{ resourceName }}-{{ item.id }}" class="resource-search-result control-label {{ isSelected(item.id) ? 'selected' : '' }}">
                <input type="checkbox" value="{{ item.id }}" number v-model="selected" id="{{ resourceName }}-{{ item.id }}" />
                <i class="fa {{ isSelected(item.id) ? 'fa-minus' : 'fa-plus' }}" aria-hidden="true"></i>
                <span v-show="showId">{{ item.id }} - </span>
                <span v-text="item[searchTarget]"></span>
            </label>
        </template>
    </div>
</div>`,

    created() {
        this.getResource();
    },

    ready() {
        $(`#resource-search-${ this._uid }-input`).focus(() => {
            this.isSearching = true;
        });

        // click outside closes search results
        $(document).click(event => {
            if(!$(event.target).closest(`#resource-search-${this._uid}`).length) {
                if($(`#resource-search-${this._uid} .resource-search-results`).is(":visible")) {
                    this.isSearching = false;
                }
            }
        });
    },

    methods: {
        getResource() {
            this.$http.get(this.resourceUri)
                .then(response => {
                    console.log('response');
                    console.log(response);
                    this.resource = response.data;
                    this.isLoading = false;
                });
        },

        isSelected(id) {
            return _.contains(this.selected, id);
        },

        setSelectedData() {
            if (this.selected) {
                this.selectedData = _.filter(this.haystack, (item) => {
                    return _.contains(this.selected, item.id);
                });
            } else {
                this.selectedData = [];
            }
        },

        reset() {
            this.search = '';
        },
    },
});
