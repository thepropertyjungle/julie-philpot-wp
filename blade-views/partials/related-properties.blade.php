{{--
    ATTENTION
    =========
    /src/scss/partials/related-properties.scss

    You can include file file into /blade-views/single-property.blade.php
    to show related properties to the one being viewed.
--}}

@if(!empty($property['related_properties']) && count($property['related_properties']) > 2)
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($property['related_properties'] as $property)
                <div class="col">
                    @include('partials/grid-property')
                </div>
            @endforeach
        </div>
    </div>
@endif
