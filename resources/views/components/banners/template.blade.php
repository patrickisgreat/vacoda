<div>
    <!-- Template Select -->
    <div class="form-group" :class="{'has-error': form.errors.has('template_id')}">
        <label class="control-label">Template <span class="required-field">*</span></label>

        <div class="template-selection">
            <array-select @change="scalePreview" resource-name="template" :selected.sync="form.template_id" :selected-data.sync="template" :resource-options="team.templates"></array-select>

            <span class="help-block" v-show="form.errors.has('template_id')">
                @{{ form.errors.get('template_id') }}
            </span>
        </div>
    </div>

    <div class="image-fields" v-show="template.is_image">
        <div class="form-group" :class="{'has-error': form.errors.has('image_path')}">
            <label for="image" class="control-label">Image <span class="required-field">*</span></label>

            <div>
                <div id="errorBlock" class="help-block"></div>

                {{-- Drag and Drop --}}
                <div class="box">
                    <div class="box__input">

                        <input id="bnr-img-upload" class="box__file" ref="image" @change="handleImageChange" @drop="handleImageChange" name="image" id="image" type="file" accept="image/*" />
                        <label for="file"><span class="box__dragndrop"> Drag files here<br/></span> or <u>choose files to upload</u>.</label>

                    </div>

                </div>


                <br>
                <small>The image must be:
                    <ul>
                        <li>@{{ template.width_desktop }}px wide</li>
                        <li>.jpg, .jpeg, .gif, or .png format</li>
                        <li>Under 1mb file size</li>
                    </ul>
                </small>

                <span class="help-block" v-show="form.errors.has('image_path')">
                    @{{ form.errors.get('image_path') }}
                </span>
            </div>
        </div>

        <div class="form-group" :class="{'has-error': form.errors.has('image_alt')}">
            <label for="image" class="control-label">Image Alt Text <span class="required-field">*</span></label>

            <div>
                <input type="text" class="form-control" name="image_alt" v-model="form.image_alt">
                <span class="help-block" v-show="form.errors.has('image_alt')">
                    @{{ form.errors.get('image_alt') }}
                </span>
            </div>
        </div>

        <!-- URL -->
        <div class="form-group" :class="{'has-error': form.errors.has('url')}" v-show="template.is_image">
            <label class="control-label">URL <span class="required-field">*</span></label>

            <div>
                <input type="text" class="form-control" name="url" v-model="form.url">

                <span class="help-block" v-show="form.errors.has('url')">
                @{{ form.errors.get('url') }}
                </span>
            </div>
        </div>

        <!-- Legal -->
        <div class="form-group" :class="{'has-error': form.errors.has('legal_copy')}" v-show="template.is_image">
            <label class="control-label">Legal</label>

        <div>
            <textarea class="form-control" name="legal_copy" v-model="form.legal_copy"></textarea>

            <span class="help-block" v-show="form.errors.has('legal_copy')">
            @{{ form.errors.get('legal_copy') }}
            </span>
        </div>

        </div>

    </div>
</div>
