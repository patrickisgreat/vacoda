<div>
    <div class="text-fields" v-show="!template.is_image">
        <!-- Headline -->
        <div class="form-group" :class="{'has-error': form.errors.has('headline')}">
            <label class="control-label">Headline <span class="required-field">*</span></label>

            <div>
                <input type="text" @keyup="scalePreview" @blur="scalePreview" @click="scalePreview" class="form-control" name="headline" v-model="form.headline">

                <span class="help-block" v-show="form.errors.has('headline')">
                    @{{ form.errors.get('headline') }}
                </span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Headline Font Size</label>


            <div class="font-size-range-input">
                <div class="range-control">

                    <input id="headline_font_size"  class="form-control" name="headline_font_size" type="text"  min="16" max="100" v-model="form.headline_font_size" @change="scalePreview" @keyup="scalePreview" @input="scalePreview">
                    <input name="headline_font_size"  type="range" min="16" max="100" v-model="form.headline_font_size"  @input="scalePreview" style="display:none;"/>

                    <span class="help-block" v-show="form.errors.has('headline_font_size')">
                        @{{ form.errors.get('headline_font_size') }}
                    </span>
                </div>

            </div>
        </div>

        <!-- Body -->
        <div class="form-group" :class="{'has-error': form.errors.has('body')}">
            <label class="control-label">Body</label>

            <div>
                <textarea type="text" @keyup="scalePreview" @blur="scalePreview" @click="scalePreview" class="form-control" name="body" v-model="form.body"></textarea>

                <span class="help-block" v-show="form.errors.has('body')">
                    @{{ form.errors.get('body') }}
                </span>

            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Body Font Size</label>

            <div class="font-size-range-input">
                <div class="range-control">

                    <input id="body_font_size"  class="form-control" name="headline_font_size" type="text"  min="10" max="30" v-model="form.body_font_size" @change="scalePreview" @keyup="scalePreview" @input="scalePreview">
                    <input name="body_font_size"  type="range" min="10" max="30" v-model="form.body_font_size"  @input="scalePreview" style="display:none;"/>

                    <span class="help-block" v-show="form.errors.has('headline_font_size')">
                        @{{ form.errors.get('body_font_size') }}
                    </span>
                </div>

            </div>
        </div>

        <!-- CTA -->
        <div class="form-group" v-show="template.has_cta" :class="{'has-error': form.errors.has('cta')}">
            <label class="control-label">CTA</label>

            <div>
                <select v-show="!template.has_alt_ctas" @change="scalePreview" class="form-control" name="cta" v-model="form.cta">
                    <option value="">Select CTA</option>
                    <option value="SHOP NOW &gt;">SHOP NOW &gt;</option>
                    <option value="LEARN MORE &gt;">LEARN MORE &gt;</option>
                    <option value="SHOP ALL &gt;">SHOP ALL &gt;</option>
                </select>

                <select v-show="template.has_alt_ctas" @change="scalePreview" class="form-control" name="cta" v-model="form.cta">
                    <option value="">Select CTA</option>
                    <option value="SHOP NOW">SHOP NOW &gt;</option>
                    <option value="LEARN MORE">LEARN MORE &gt;</option>
                    <option value="SHOP ALL">SHOP ALL &gt;</option>
                </select>

                <span class="help-block" v-show="form.errors.has('cta')">
                    @{{ form.errors.get('cta') }}
                </span>
            </div>
        </div>
    </div>

    <!-- URL -->
    <div class="form-group" :class="{'has-error': form.errors.has('url')}">
        <label class="control-label">URL <span class="required-field">*</span></label>

        <div>
            <input type="text" class="form-control" name="url" v-model="form.url">

            <span class="help-block" v-show="form.errors.has('url')">
            @{{ form.errors.get('url') }}
        </span>
        </div>
    </div>

    <!-- Legal -->
    <div class="form-group" :class="{'has-error': form.errors.has('legal_copy')}">
        <label class="control-label">Legal</label>

        <div>
            <textarea class="form-control" name="legal_copy" v-model="form.legal_copy"></textarea>

            <span class="help-block" v-show="form.errors.has('legal_copy')">
            @{{ form.errors.get('legal_copy') }}
        </span>
        </div>
    </div>
</div>
