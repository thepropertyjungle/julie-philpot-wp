{{--
    ATTENTION
    =========
    /src/scss/components/load-more.scss

    If you want your search results to auto load, rather
    then be paginated, you can use this file.

    The data-view-name sets the partial file that will
    present your individual property data.

    The included data- attributes will allow you to
    change the amount of properties loaded etc.
--}}

<div class="container" id="tpj-list-search">
    <!-- Include Property Search -->
    <div class="row mb-3">
        <div class="col">
            @include('partials/search-core-example')
        </div>
    </div>
    <!-- Include Property Search -->

    <!-- Search Results Loop -->
    <div
        data-component="PropertiesLoadMore" 
        data-view-name="partials/rest/property-rest-output" 
        data-initialloadno="9"
        data-items-per-page="9"
        data-use-load-more-btn="true"
        data-use-load-more-btn-after-properties-loaded="27" 
        data-per-page-items-using-load-more-btn="9"
    >
        <!-- Info, Filters and Links -->
        <div class="row mb-3">
            <div class="col">
                @include('components/global-load-more-info')
            </div>
            <div class="col d-flex justify-content-end">
                @include('partials/search-filters')
            </div>
            <div class="col d-flex justify-content-end">
                @include ('partials/search-views', ['load_more' => 'true'])
            </div>
        </div>

        <div class="tpj_load-more-content"></div>

        <div class="tpj_load-more-no-results" style="display: none;">We couldn't find any properties with that search criteria.</div>

        <div class="tpj_load-more-preloader" style="display: none;">Loading Properties...</div>
        <a href="#" class="tpj_load-more-button btn btn-primary" style="display: none;">Load More</a>
    </div>
    <!-- Search Results Loop -->
</div>

@include('debug/debug')