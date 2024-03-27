{{--
    ATTENTION
    =========
    /src/search-results/map-search.scss

    This page is used for search results displayed on
    a Google Map.

    The search facility uses the search core example partial with
    a variable of map_search = true. This changes items in the
    core search partial to adjust it for map searches.

    Pay attention to the @include('components/map-properties-search').
    This is the component that displays your Google Map.
--}}

<div class="container">
    <div class="row mb-3">
        <div class="col">
            @include('partials/search-core-example', ['map_search' => 'true'])
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-3">
            <p>Displaying <span class="map_properties_no"></span> properties</p>
        </div>
        <div class="col d-flex justify-content-end">
            @include ('partials/search-views', ['map_search' => 'true'])
        </div>
    </div>
    <div class="row">
        <div class="col">
            <input
                data-component="FormItem"
                data-bind-value-to-events='["MAP_POLY_CHANGE"]'
                name="bounds"
                type="hidden"
            >
            @include('components/map-properties-search', [
                'initial_lat'               => '51.5073509',
                'initial-lng'               => '-0.1277583',
                'initial_zoom'              => 15,
                'supports_drawing_mode'     => true,
                'small_cluster_background'  => '#0d6efd',
                'large_cluster_background'  => '#3C2198'
            ])
        </div>
    </div>
</div>

@include('debug/debug')