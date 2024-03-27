{{--
    ATTENTION
    =========
    This partial will fetch all the property types
    from the property data that has been imported
    into your website.

    Use it within your search form code like so:

    @include('partials/search-property-types', ['filters' => [
        // 'instruction_type' => 'Letting',
        // 'department' => 'Commercial'
    ]])

    You can filter property types by instruction type and
    department if you;re using a tabbed search facility.
--}}

@php
    $property_types = [];
    if (function_exists('tpj_get_available_property_types')) {
        $filters = isset($filters) && is_array($filters) ? $filters : [];
        $property_types = tpj_get_available_property_types($filters);
    }
@endphp

@if (count($property_types) > 0)
    @foreach ($property_types as $property_type)
        <option value="{{ $property_type['label'] ?? '' }}">{{ $property_type['label'] ?? '' }}</option>
    @endforeach
@else
    <option value="">No property types</option>
@endif
