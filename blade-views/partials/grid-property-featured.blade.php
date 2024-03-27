{{--
    ATTENTION
    =========
    /src/scss/partials/grid-property.scss

    This partial is used to display your property search
    results in a grid style.
--}}

@php
    $hasImages = is_array($property['images'] ?? '') && count($property['images']) > 0;
@endphp

<a href="{{ $property['permalink'] ?? ''}}" class="card index-featured h-100 property-grid{{ $property['featured'] ?? false ? ' property--featured' : '' }}" data-branch-name="{{ $property['branch']['name'] }}" data-branch-ID="{{ $property['branch']['meta']['branch_remote_id'] }}" data-property-remote-ID="{{ $property['tpj_remote_id'] }}" data-department="{{ $property['department'] }}" data-property-type="{{ $property['property_type'] }}">
    @if ($hasImages)
        <img loading="lazy" src="{{ $property['images'][0]['optimised_image_url'] ?? '' }}/360" class="card-img-top" alt="{{ $property['Address']['display_address'] ?? '' }}" data-media-update-date="{{ $property['images'][0]['media_update_date']}}" data-caption="{{ $property['images'][0]['caption'] }}">
    @else
        <img src="" class="card-img-top" alt="Awaiting Images for {{ $property['Address']['display_address'] }}">
    @endif
    <div class="card-body property__meta">
        <h3 class="card-title property__address">
            {{ $property['Address']['display_address'] ?? '' }}
        </h3>
        <h4 class="card-title property__price">Offers in excess of 
            {{ isset($property['price_qualifier']) && $property['price_qualifier'] != 'Default' ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }}
            £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : ($property['rent_frequency'] == 'Monthly' ? 'PCM' : ($property['rent_frequency'] == 'Yearly' ? 'PA' : ''))) : '' }}
        </h4>
        
       
    </div>
    
</a>