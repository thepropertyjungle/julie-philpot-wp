{{--
    ATTENTION
    =========
    /blade-views/components/transportation-stations.blade.php

    You can @include this file into your /blade-views/single-property.blade.php
    to display nearest tube and rail stations.

    Pay attention to the data- attributes, you can make a number
    of visual related changes.
--}}

<div
    data-component="TransportationStations"
    class="public-transport"
    data-max-distance-miles="20"
    data-max-results="5"
    data-remove-component-if-no-results="true"
    data-tube-icon="{{ TPJ_BLADE_PUBLIC_URL . '/assets/dist/img/tube-icon.svg' }}"
    data-rail-icon="{{ TPJ_BLADE_PUBLIC_URL . '/assets/dist/img/rail-icon.svg' }}"
    data-lat="{{ $property['Latitude'] }}"
    data-lng="{{ $property['Longitude'] }}"
>
    <div class="tpj-stations-list"></div>
</div>