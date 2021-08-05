<!-- Category Select -->
<div class="form-group" :class="{'has-error': form.errors.has('categories')}">
    <category-select :team="team" :selected.sync="form.categories" :selected-string.sync="selectedCategoryString" inline-template>
        <div class="category-select">
            <label class="control-label">Marketing Segmentation <span class="required-field">*</span></label>

            <input type="search" v-model="search" placeholder="Search" id="category-search" class="search form-control" />

            <div class="category-options">
                <div v-for='program in programOptions' class="program-container">
                    <label v-show="search.length === 0" @click="toggleOpen(program.id)" for="program-@{{ program.id }}" class="program-row control-label">
                        <span>@{{ program.name }}</span>
                        <small class="toggle">@{{ isOpen(program.id) ? 'Collapse' : 'Expand' }}</small>
                    </label>

                    <div v-show="isOpen(program.id)" class="category-container">
                        <label v-for='category in program.categories' v-show="visibleCategory(category.id)" for="category-@{{ category.id }}" class="category-row control-label @{{ isSelected(category.id) ? 'selected' : '' }}">
                            <div class="category">
                                <input type="checkbox" value="@{{ category.id }}" number v-model="selected" id="category-@{{ category.id }}" />
                                <i class="fa @{{ isSelected(category.id) ? 'fa-minus' : 'fa-plus' }}" aria-hidden="true"></i>
                                <span>@{{ category.cell_label }}</span>
                            </div>
                            <div class="program">
                                <small>@{{ program.name }}</small>
                            </div>
                        </label>
                    </div>
                </div>

                <div v-show="noSearchResults" class="no-results">No categories found</div>
            </div>

            <label v-show="selected.length > 0" class="control-label">Selected Categories</label>

            <div v-show="selected.length > 0" class="category-selections">
                <template v-for='program in programOptions'>
                    <template v-for='category in program.categories'>
                        <label v-if="isSelected(category.id)" for="category-@{{ category.id }}" class="category-row selected control-label">
                            <div class="category">
                                <input type="checkbox" value="@{{ category.id }}" number v-model="selected" id="category-@{{ category.id }}" />
                                <i class="fa @{{ isSelected(category.id) ? 'fa-minus' : 'fa-plus' }}" aria-hidden="true"></i>
                                <span>@{{ category.cell_label }}</span>
                            </div>
                            <div class="program">
                                <small>@{{ program.name }}</small>
                            </div>
                        </label>
                    </template>
                </template>
            </div>
        </div>
    </category-select>

    <span class="help-block" v-show="form.errors.has('categories')">
        Please select at least one category.
    </span>
</div>