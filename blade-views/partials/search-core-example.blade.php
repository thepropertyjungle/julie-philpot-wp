{{--
    ATTENTION
    =========
    /src/scss/partials/search-core-example.scss

    This is your starting place to understand how property searches are built.

    There is Blade logic included within this form. You'll see $map_search referenced
    a few times, which is a way to determine if the search form is included on a map
    search or not. Other logic used is to display sales or lettings prices.

    Please make sure you have set your search pages within your website and created
    your Global Dynamic Options.

    You'll need to add your main search page to the forms action="" attribute.

    E.g. {{ $global_options['dynamic_options']['_replace_this_']['permalink'] }}

    If in doubt, please refer to:
    https://tpjwiki.wpengine.com/wordpress/tpj-plugin-global-options-explained/
--}}

@php
    $searchFormID = 'search-core-example';
@endphp

<section class="card">
   
    <form
        data-component="SearchForm"
        data-prevent-default-submit="false"
        data-subscribe-submit-to-event="SEARCH_CORE"
        id="{{ $searchFormID }}"
        action="{{ isset($global_options['dynamic_options']['search_results_list']['permalink']) ? $global_options['dynamic_options']['search_results_list']['permalink'] : '' }}"
    >
        <input
            type="hidden"
            data-component="FormItem" 
            data-bind-value-to-events='["ORDER_BY_CHANGE_EVENT"]'
            name="orderby"
        >
        <div class="card-body">
          
            <div class="row mb-3">


            <div class="col">
                    <label for="department" class="form-label visually-hidden-focusable">Department</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="department"
                        id="department"
                        class="form-control"
                    >
                        <option value="residential" selected>Choose a Department</option>
                        <option value="residential">Residential</option>
                        <option value="student">Student</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>






                <div class="col">
                    <div class="sales-prices">
                        <label for="minprice-sales" class="form-label visually-hidden-focusable">Min Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="minprice"
                            id="minprice-sales"
                            class="form-control"
                        >
                            <option value="" selected disabled>Min Price</option>
                            @include('partials/search-prices', ['sales' => 'true'])
                        </select>
                    </div>
                   
                </div>




                <div class="col">
                    <div class="sales-prices">
                        <label for="maxprice-sales" class="form-label visually-hidden-focusable">Max Price</label>
                        <select
                            data-component="FormItem"
                            @if(isset($map_search) && $map_search)
                            data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                            @endif
                            name="maxprice"
                            id="maxprice-sales"
                            class="form-control"
                        >
                            <option value="" selected disabled>Max Price</option>
                            @include('partials/search-prices', ['sales' => 'true'])
                        </select>
                    </div>
                    
                </div>
          
              
                <div class="col">
                    <label for="exact-bedrooms" class="form-label visually-hidden-focusable">Bedrooms</label>
                    <select
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="exact_bedrooms"
                        id="exact-bedrooms"
                        class="form-control"
                    >
                        <option value="" selected disabled>Bedrooms</option>
                        @include('partials/search-bedrooms', ['bedrooms_type' => 'exact'])
                    </select>
                </div>


                <div class="col">
                    <label for="property-type-sales" class="form-label visually-hidden-focusable">Property Type</label>
                    <select 
                        data-component="FormItem"
                        @if(isset($map_search) && $map_search)
                        data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'
                        @endif
                        name="property_type"
                        id="property-type-sales"
                        class="form-control"
                    >
                        <option value="" selected disabled>Property Type</option>
                        @include('partials/search-property-types', ['filters' => [
                            // 'instruction_type' => 'Letting',
                            // 'department' => 'Commercial'
                        ]])
                    </select>
                </div>
        

                <div class="col">

                    @if(!isset($map_search) || !$map_search)
                    <div class="sub">
                        <button type="submit" class="btn btn-success btn-lg">Search</button>
                    </div>
                    @endif

                 </div>
          
        </div>
      
    </form>
</section>