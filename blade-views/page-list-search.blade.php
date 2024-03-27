{{--
    ATTENTION
    =========
    /src/scss/search-results/list-search.scss

    Search results comprise of a series of partials.
--}}

<div class="container" id="tpj-list-search">
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
            @include ('partials/search-views', ['list_search' => 'true'])
        </div>
    </div>
    <!-- Info, Filters and Links -->

    <!-- Search Results Loop -->
    <div class="row">
        <div class="col">
            @if(!empty($properties))
                @foreach ($properties as $property)
                    <div class="row">
                        @include('partials/list-property')
                    </div>
                @endforeach
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        @include('partials/pagination')
                    </div>
                </div>
            @else
                <p>We couldn't find any properties with that search criteria.</p>
            @endif
        </div>
    </div>
    <!-- Search Results Loop -->
</div>

@include('debug/debug')