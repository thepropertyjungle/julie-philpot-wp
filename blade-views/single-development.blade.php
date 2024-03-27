{{--
    ATTENTION
    =========
    /src/scss/singles/single-development.scss

    This template is used to display all the details
    and properties for a development.

    Since a development is created by a client, there
    is a lot of logic in this template to try and
    mitigate errors and lack of data that can occur
    when handing over data entry to clients.
--}}

@php
    // Are there marketing images for this development?
    $marketingImages = $development['marketing_images'] ?? [];

    //Are there development images for this development?
    $developmentImages = $development['properties_images'] ?? [];

    // The code is switching property layout according to the amount added
    $propertyCount = isset($development['properties']) ? count($development['properties']) : 0;
@endphp

<div class="container">
    <!-- Development Navigation -->
    <div class="row sticky-top mb-3">
        <div class="col">
            <nav class="btn-group d-flex">
                <a href="#dev_details" class="btn btn-primary">Details</a>
                @if(isset($development['video_tour_url']))
                <a href="#dev_video" class="btn btn-primary">Video Tour</a>
                @endif
                <a href="#dev_properties" class="btn btn-primary">Homes for Sale</a>
                @if(isset($development['properties_images']))
                <a href="#dev_images" class="btn btn-primary">Images</a>
                @endif
                @if(isset($development['brochure_url']))
                <a href="{{ $development['brochure_url'] ?? '' }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Brochure</a>
                @endif
                <a href="#dev_location" class="btn btn-primary">Location</a>
                @if(isset($development['development_url']))
                <a href="{{ $development['development_url'] ?? '' }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Website</a>
                @endif
            </nav>
        </div>
    </div>
    <!-- Development Navigation -->

    <!-- Development Details -->
    <div id="dev_details" class="row">
        <section class="col-sm-5">
            <h1>{{ $development['title'] ?? '' }}</h1>
            <div>
                <p>Prices start from <strong>£X</strong> to <strong>£Y</strong></p>
            </div>
            {!! $development['description'] ?? '' !!}
            @if(isset($development['site_contact']))
            Contact us today on: {{ $development['site_contact'] ?? ''}}
            @endif
            @if(isset($development['opening_hours']))
                <!-- Opening Hours -->
                <p>Our Opening Hours:</p>
                <table class="table">
                    <tbody>
                        @foreach ($development['opening_hours'] as $day => $hours)
                            <tr>
                                <td>{{ $day }}</td>
                                <td>{{ $hours }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Opening Hours -->
            @endif
        </section>
        <div class="col">
            @if(count($marketingImages) == 1)
                <img loading="lazy" src="{{ $marketingImages[0]['custom_sizes']['large'] ?? '' }}" class="img-fluid" alt="{{ $development['title'] ?? '' }}">
            @elseif(count($marketingImages) > 1)
                <div id="marketingCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($marketingImages as $index => $indicator)
                            <button type="button" data-bs-target="#marketingCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($marketingImages as $index => $marketing_image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img loading="lazy" src="{{ $marketing_image['custom_sizes']['large'] ?? '' }}" class="d-block w-100" alt="{{ $development['title'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#marketingCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#marketingCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>No Marketing Images Added for this Development</p>
            @endif
            <!-- CTA -->
            <div class="btn-group d-flex">
                @if(isset($development['brochure_url']))
                <a href="{{ $development['brochure_url'] ?? '' }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/></svg> Brochure
                </a>
                @endif
                @if($global_options['property_qr_settings']['displays_qr_code'] ?? false)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16"><path d="M2 2h2v2H2z"/><path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"/><path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"/><path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"/><path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"/></svg> QR Code
                </button>
                @endif
                @if(isset($development['development_url']))
                <a href="{{ $development['development_url'] ?? '' }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/><path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/></svg> Website
                </a>
                @endif
            </div>
            <!-- CTA -->
        </div>
    </div>
    <!-- Development Details -->

    @if(isset($development['video_tour_url']))
    <!-- Development Video -->
    <div id="dev_video" class="card">
        <div class="card-body">
            <div class="ratio ratio-16x9">
                @include('components/video-embed', [
                    'videoUrl' => $development['video_tour_url'],
                    'title' => $development['title']
                ])
            </div>
        </div>
    </div>
    <!-- Development Video -->
    @endif

    @if($propertyCount > 0 && $propertyCount <= 2)
        <!--
            Display Properties in a List if greater
            than 0 and less than or equal to 2
        -->
        <div id="dev_properties" class="row">
            <div class="col">
                @foreach ($development['properties'] as $property)
                    @include('partials/list-property')
                @endforeach
            </div>
        </div>
    @elseif($propertyCount > 2)
        <!-- Display Properties in a grid if there are more than 2 -->
        <div id="dev_properties" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($development['properties'] as $property)
                <div class="col">
                    @include('partials/grid-property')
                </div>
            @endforeach
        </div>
    @else
        <div id="dev_properties" class="row">
            <div class="col">
                <p>This development doesn't have any properties selected</p>
            </div>
        </div>
    @endif

    <!-- Development Images -->
    <div id="dev_images" class="row">
        <div class="col">
            @if(count($developmentImages) == 1)
                <img loading="lazy" src="{{ developmentImages[0]['custom_sizes']['large'] ?? '' }}" class="img-fluid" alt="{{ $development['title'] ?? '' }}">
            @elseif(count($developmentImages) > 1)
                <div id="developmentCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($developmentImages as $index => $indicator)
                            <button type="button" data-bs-target="#developmentCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach($developmentImages as $index => $development_image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img loading="lazy" src="{{ $development_image['custom_sizes']['large'] ?? '' }}" class="d-block w-100" alt="{{ $development['title'] ?? '' }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#developmentCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#developmentCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>No Marketing Images Added for this Development</p>
            @endif
        </div>
    </div>
    <!-- Development Images -->

    <!-- Location, pick a map style -->
    <section id="dev_location">
        <div class="row">
            <div class="col">
                <!-- Google Map using JavaScript API -->
                @include('components/map-property-single', [
                    'lat'           => $development['Latitude'],
                    'lng'           => $development['Longitude'],
                    'initial_zoom'  => 17
                ])
                <!-- Google Map using JavaScript API -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Google Map using Embed API -->
                @include('components/map-property-single-embedded', [
                    'lat'           => $development['Latitude'],
                    'lng'           => $development['Longitude'],
                    'initial_zoom'  => 17
                ])
                <!-- Google Map using Embed API -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- LeafletJS Map -->
                @include('components/map-leafletjs-property-single', [
                    'lat'                               => $development['Latitude'],
                    'lng'                               => $development['Longitude'],
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
    <!-- Location, pick a map style -->
</div>

@if($global_options['property_qr_settings']['displays_qr_code'] ?? false)
<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">QR Code for {{ $development['title'] ?? '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('components/qr', [
                    'permalink' => $development['permalink'] ?? ''
                ])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- QR Code Modal -->
@endif

@include('debug/debug')