(function() {
    var client = algoliasearch('WKMELACEWN', 'd1d63bc0cfbc54374de3d97ca5de413f');
    var index = client.initIndex('category_index');
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input', {
        hint: false
    }, {
        source: autocomplete.sources.hits(index, {
            hitsPerPage: 10
        }),
        //value to be displayed in input control after user's suggestion selection
        displayKey: 'cat_name',
        //hash of templates used when rendering dataset
        templates: {
            //'suggestion' templating function used to render a single suggestion
            suggestion: function(suggestion) {
                const markup = `
                            <div class="algolia-result">
                                <span>
                                    ${suggestion._highlightResult.cat_name.value}
                                </span>
                            </div>
                        `;
                return markup;
            },
            empty: function(result) {
                return 'Xin lỗi, chúng tôi không tìm thấy kết quả với từ khóa "' + result
                    .query + '"';
            }
        }
    }).on('autocomplete:selected', function(event, suggestion, dataset) {
        window.location.href = window.location.origin +
            '/VIETPRO-STORE/public/trang-quản-trị/danh-mục/search/' + suggestion.cat_id;
        enterPressed = true;
    });
})();