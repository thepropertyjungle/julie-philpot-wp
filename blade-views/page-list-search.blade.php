{{--
    ATTENTION
    =========
    /src/scss/search-results/list-search.scss

    Search results comprise of a series of partials.
--}}

<div class="contain" id="tpj-list-search">
    <!-- Include Property Search -->
    <div class="row-search mb-3">
        <div class="coll">
            @include('partials/search-core-example')
        </div>

 
        
    </div>
    <!-- Include Property Search -->

    <!-- Info, Filters and Links -->
    <div class="row mb-3">
      



        <div class="sort-options">

        @if(!empty($properties))
        <div class="col">
            <p>Displaying <strong>{{ count($properties) }}</strong> of <strong>{{ $total_posts }}</strong> Properties</p>
        </div>
        @endif




            <a
            href="{{ $global_options['dynamic_options']['search_results_list']['permalink'] ?? '' }}@php _e_blade_query_string() @endphp"
            class="view-btn active btn-hide"
            ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
<g clip-path="url(#clip0_14443_7946)">
<path d="M3.125 5H16.875" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.125 8.125H13.125" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.125 11.25H16.875" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.125 14.375H13.125" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_14443_7946">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>
            List </a>
           
            <a
            href="/list-search/"
            class="view-btn"
            ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_14443_7950)">
    <path d="M16.25 8.125C16.25 13.75 10 18.125 10 18.125C10 18.125 3.75 13.75 3.75 8.125C3.75 6.4674 4.40848 4.87769 5.58058 3.70558C6.75269 2.53348 8.3424 1.875 10 1.875C11.6576 1.875 13.2473 2.53348 14.4194 3.70558C15.5915 4.87769 16.25 6.4674 16.25 8.125Z" fill="#A09BAE"/>
    <path d="M10 10.625C11.3807 10.625 12.5 9.50571 12.5 8.125C12.5 6.74429 11.3807 5.625 10 5.625C8.61929 5.625 7.5 6.74429 7.5 8.125C7.5 9.50571 8.61929 10.625 10 10.625Z" fill="white" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14443_7950">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>
            Map </a>
           
            <a class="view-btn search">
            @include('partials/search-filters')
            </a>

           
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