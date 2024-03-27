{{--
    ATTENTION
    =========
    You can reference this partial in any Blade template
    or using a shortcode within other pages to show featured
    properties.

    [blade_featured_properties view_name="partials/featured-properties" instruction_type="Sale" max_featured_results="6"]
--}}

@if(!empty($properties))
    <div class="container">
        <div class="row row-cols-1 featured-props row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($properties as $property)
                <div class="col">
                    @include('partials/grid-property-featured')
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="row">
        <div class="col">
            <p>There are no featured properties to display.</p>
        </div>
    </div>
@endif

@include('debug/debug')