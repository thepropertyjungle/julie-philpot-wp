{{--
    ATTENTION
    =========
    /src/scss/search-results/grid-search.scss

    Search results comprise of a series of partials.
--}}

<div class="container" id="tpj-grid-search">
    <!-- Include Property Search -->
    <div class="row mb-3">
        <div class="col">
            @include('partials/search-core-example')
        </div>
    </div>
    <!-- Include Property Search -->

    <!-- Info, Filters and Links -->
    <div class="row mb-3">
        @if(!empty($properties))
        <div class="col">
            <p>Displaying <strong>{{ count($properties) }}</strong> of <strong>{{ $total_posts }}</strong> Properties</p>
        </div>
        @endif
        <div class="col d-flex justify-content-end">
            @include('partials/search-filters')
        </div>
        <div class="col d-flex justify-content-end">
            @include ('partials/search-views', ['grid_search' => 'true'])
        </div>
    </div>
    <!-- Info, Filters and Links -->

    @if(!empty($properties))
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($properties as $property)
            <div class="col">
                @include('partials/grid-property')
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            @include('partials/pagination')
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <p>No properties found within that search criteria.</p>
        </div>
    </div>
    @endif
</div>

@include('debug/debug')