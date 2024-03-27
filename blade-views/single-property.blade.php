{{--
    ATTENTION
    =========
    /src/scss/singles/single-property.scss

    This is your property details page. Property
    details are made-up with partials and logic.
--}}

@php
    // Are there images for this property?
    $propertyImages = $property['images'] ?? [];

    // Set a what3words variable
    $what3words = $property['additional_data']['what_three_words']['words'] ?? false;
@endphp

<section class="container" data-branch-name="{{ $property['branch']['name'] }}" data-branch-ID="{{ $property['branch']['meta']['branch_remote_id'] }}" data-property-remote-ID="{{ $property['tpj_remote_id'] }}" data-department="{{ $property['department'] }}" data-property-type="{{ $property['property_type'] }}">
    <div class="row">
        <!-- Property Images -->
        <div class="col-md-7">
            @include('partials/search-results-corner-flash')

            @if(count($propertyImages) == 1)
                <img loading="lazy" src="{{ $propertyImages[0]['optimised_image_url'] ?? '' }}/1024" class="img-fluid" alt="{{ $property['Address']['display_address'] }}" data-media-update-date="{{ $property[0]['images']['media_update_date']}}" data-caption="{{ $property[0]['images']['caption'] }}">
            @elseif(count($propertyImages) > 1)
                <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($propertyImages as $index => $indicator)
                            <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">
                        @foreach($propertyImages as $index => $property_image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img loading="lazy" src="{{ $property_image['optimised_image_url'] ?? '' }}/1024" class="d-block w-100" alt="{{ $property['Address']['display_address'] }}" data-media-update-date="{{ $property_image['media_update_date']}}" data-caption="{{ $property_image['caption'] }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>No Images Added for this property</p>
            @endif
        </div>
        <!-- Property Images -->

        <!-- Property Meta Data -->
        <div class="col">
            <h1>{{ $property['Address']['display_address'] ?? '' }}</h1>

            <!-- Price -->
            <p>
                <strong>
                    {{ isset($property['price_qualifier']) && $property['price_qualifier'] != 'Default' ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : '' }} £{{ number_format($property['price']) }}{{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'PW' : ($property['rent_frequency'] == 'Monthly' ? 'PCM' : ($property['rent_frequency'] == 'Yearly' ? 'PA' : ''))) : '' }}

                    {{--
                        ATTENTION
                        =========

                        Below is code to display prices in other currencies.
                        Remove it if you don't need it.
                        
                        @php 
                            $price = $property['price'] ?? '';

                            // Create a NumberFormatter instance for formatting currency
                            $formatter = new NumberFormatter('en_GB', NumberFormatter::CURRENCY);

                            // Set the number of fraction digits to zero to remove the decimal point
                            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);

                            // by default the base is GBP (assuming the properties prices use GBP)
                            // Original price is GBP
                            // the output price will be in EUR
                            $convertedPrice = __blade_convert_to_currency($price, 'EUR');
                            echo $formatter->formatCurrency($convertedPrice, 'EUR');

                            // Other currencies can be used as base
                            // in the example below, the base is GBP, that means the properties prices use GBP
                            // Original price is GBP
                            // the output price will be in EUR
                            // $convertedPrice = __blade_convert_to_currency($price, 'EUR', 'GBP');
                            // echo $formatter->formatCurrency($convertedPrice, 'EUR');

                            // Note!
                            // to format currency the following class can be used 
                            // NumberFormatter::formatCurrency(float $amount, string $currency): string|false
                        @endphp
                    --}}
                </strong>
            </p>
            <!-- Price -->

            @if ($property['department'] == 'residential' && isset($property['council_tax_band']))
            <!-- Council Tax Band -->
            <p><strong>Council Tax Band:</strong> {{ $property['council_tax_band'] ?? '' }}</p>
            <!-- Council Tax Band -->
            @endif

            <!-- Rooms -->
            <ul class="property__rooms">
                @if (!empty($property['bedrooms']))
                    <li>{{ $property['bedrooms'] }} Bedroom{{ $property['bedrooms'] > 1 ? 's' : '' }}</li>
                @endif
                @if (!empty($property['bathrooms']))
                <li>{{ $property['bathrooms'] }} Bathroom{{ $property['bathrooms'] > 1 ? 's' : '' }}</li>
                @endif
                @if (!empty($property['reception_rooms']))
                <li>{{ $property['reception_rooms'] }} Reception{{ $property['reception_rooms'] > 1 ? 's' : '' }}</li>
                @endif
                @if (!empty($property['internal_area']))
                <li>{{ number_format($property['internal_area']) }} sq.ft</li>
                @endif
            </ul>
            <!-- Rooms -->

            <!-- Property Summary -->
            {!! $property['summary'] ?? '' !!}
            <!-- Property Summary -->

            @if($property['features'])
            <!-- Property Features -->
            <p><strong>Property Features</strong></p>
            <ul>
                @foreach ($property['features'] as $feature)
                <li>{{ $feature }}</li>
                @endforeach
            </ul>
            <!-- Property Features -->
            @endif

            <!-- Shortlist -->
            <div data-component="ShortlistButtons" data-property-id="{{ $property['ID'] }}">
                <button class="btn btn-success tpj_add_to_shortlist">Save</button>
                <button class="btn btn-danger tpj_remove_from_shortlist">Remove</button>
            </div>
            <!-- Shortlist -->

        </div>
        <!-- Property Meta Data -->
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>Property Description</h2>
            {!! $property['description'] ?? '' !!}
        </div>
        <div class="col">
            <p><strong>Nearest Tube & Rail Stations</strong></p>
            @include('components/transportation-stations', [
                'property' => $property ?? []
            ])

            @if($what3words)
            <!-- what3words Location -->
            <a href="{{ $property['additional_data']['what_three_words']['url'] ?? '' }}" id="property__w3w" title="This link will take you to the what3words website" rel="noopener noreferrer" target="_blank">
                <span class="type-icon">
                    <img loading="lazy" src="{{ TPJ_BLADE_PUBLIC_URL . '/assets/dist/img/w3w-block.svg' }}" width="20" height="20" alt="what3words Precise Location">
                </span> {{ $what3words }}
            </a>
            <!-- what3words Location -->
            @endif

            @if($global_options['property_qr_settings']['displays_qr_code'] ?? false)
                @include('components/qr', [
                    'permalink' => $property['permalink'] ?? ''
                ])
            @endif
        </div>
    </div>
    <div class="row lazy-load-html">
        @if($property['floor_plans'])
        <div class="col">
            @foreach ($property['floor_plans'] as $floorplan)
            <img loading="lazy" src="{{ $floorplan['optimised_image_url'] }}/600" class="img-fluid" alt="Floorplan for {{ $property['Address']['display_address'] ?? '' }}">
            @endforeach
        </div>
        @endif

        @if($property['epcs'])
        <div class="col">
            @foreach ($property['epcs'] as $epcs)
            <img loading="lazy" src="{{ $epcs['media_url'] }}" class="img-fluid" alt="EPC for {{ $property['Address']['display_address'] ?? '' }}">
            @endforeach
        </div>
        @endif
    </div>
    @if(isset($property['related_blog_posts']) && is_array($property['related_blog_posts']) && sizeof($property['related_blog_posts']) > 0)
    <div class="row">
        <div class="col">
            @foreach ($property['related_blog_posts'] as $blog_post)
                <a href="{{ $blog_post['permalink'] }}">
                    @if($blog_post['featured_image_url'])
                    <img loading="lazy" src="{{ $blog_post['featured_image_url'] }}" alt="{{ $property['Address']['display_address'] ?? '' }}">
                    @endif
                    {{ $blog_post['post_title'] }}
                </a>
            @endforeach
        </div>
    </div>
    @endif
    <div class="row lazy-load-html">
        <div class="col">
            <!-- Related Properties -->
            @include('partials/related-properties')
            <!-- Related Properties -->
        </div>
    </div>
    <div class="row lazy-load-html">
        <div class="col">
            <!-- Google Map using JavaScript API -->
            @include('components/map-property-single', [
                'lat'           => $property['Latitude'],
                'lng'           => $property['Longitude'],
                'initial_zoom'  => 17
            ])
            <!-- Google Map using JavaScript API -->
        </div>
    </div>
    <div class="row lazy-load-html">
        <div class="col">
            <!-- Google Map using Embed API -->
            @include('components/map-property-single-embedded', [
                'lat'           => $property['Latitude'],
                'lng'           => $property['Longitude'],
                'initial_zoom'  => 17
            ])
            <!-- Google Map using Embed API -->
        </div>
    </div>
    <div class="row lazy-load-html">
        <div class="col">
            <!-- LeafletJS Map -->
            @include('components/map-leafletjs-property-single', [
                'lat'                               => $property['Latitude'],
                'lng'                               => $property['Longitude'],
                'initial_zoom'                      => 17,
                'max_zoom'                          => 18,
                'min_zoom'                          => 10,
                'custom_marker_icon_url'            => '',
                'custom_marker_icon_size_width'     => 50,
                'custom_marker_icon_size_height'    => 50
            ])
            <!-- LeafletJS Map -->
        </div>
    </div>
</section>

@include('debug/debug')