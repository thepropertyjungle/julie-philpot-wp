{{--
    ATTENTION
    =========
    /src/scss/components/map-property-single.scss

    This is used on /blade-views/single-property.blade.php to
    show a Google Map using the properties latitude and
    longitude data.

    This component can also used on:
    /blade-views/single-development.blade.php
    /blade-views/page-branches.blade.php

--}}

<div
    data-component="PropertyMap"
    class="property-map" 
    data-lat="{{ $lat ?? '51.5073509' }}" 
    data-lng="{{ $lng ?? '-0.1277583' }}" 
    data-initial-zoom="{{ $initial_zoom ?? '17' }}"
>
</div>