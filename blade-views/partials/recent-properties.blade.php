{{--
    ATTENTION
    =========
    /src/scss/partials/recent-properties.scss
    
    By default, search results will show the most recently added properties
    in descending order. To display the most recently added properties as a
    section on your website, you can use the following shortcode.

    [blade_list_search results_per_page="3" instruction_type="sale" view_name="partials/recent-properties"]

    Please see https://tpjwiki.wpengine.com/wordpress/basic-search-query-parameters/ for a list of search parameters that you can use in the above shortcode.

    Notice @include('partials/list-property') is being used to display the property data.
--}}

@if(count($properties) > 0)
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($properties as $property)
                <div class="col">
                    @include('partials/grid-property')
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="row">
        <div class="col">
            <p>There are no recent properties to display.</p>
        </div>
    </div>
@endif