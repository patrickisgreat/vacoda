module.exports = {
    /**
     * The component's data.
     */
    data() {
        return {
            tree_dom_element: null,
            category_tree: [],
        };
    },

    methods: {
        /**
         * Renders DOM for the tree
         */
        renderDomTree() {
            let component = this;
            let html = [];

            html.push("<ul>");

            _.each(component.category_tree, function (category, index) {
                let child = component.renderNode(category, html);
                html.push(child);
            });

            html.push("</ul>");

           $(component.tree_dom_element).append(html.join(''));
        },

        renderNode(node, html) {
            let component = this;

            html.push("<li><a href='#'>"+node.name+"</a>");

            if (node.children.length > 0) {
                html.push("<ul>");
                _.each(node.children, function (child, index) {
                    component.renderNode(child, html);
                });
                html.push("</ul>");
            }

            html.push('</li>');

            return html;
        }
    }
};