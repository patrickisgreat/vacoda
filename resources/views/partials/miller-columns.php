<script type="text/x-handlebars-template" id="taxonomy_terms">

    <div class="miller--terms--container">

        {{#if parent}}
        <div class="miller--terms--selection">
            {{#each parent}} {{#if @index}} &raquo; {{/if}}
            <a href="#" class="crumb" data-depth="{{depth}}">{{name}}</a>
            {{/each}}
        </div>
        {{/if}}

        <ul class="terms">
            {{#each taxonomies}}
            <li class="term {{#if childrenCount}}has-children{{/if}}" data-id="{{id}}">
                <a href="{{url}}" id="{{id}}">
                    <span class="title">{{label}}</span>
                    <em class="icon icon-arrow"></em> <em class="icon icon-search" title="Search for {{label}}"></em>
                    {{#if description}}<span class="description">{{description}}</span>{{/if}}
                </a>
            </li>
            {{/each}}
        </ul>

    </div>

</script>