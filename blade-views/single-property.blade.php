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
    <div class="row row-search">
        <!-- Property Images -->
        <div class="col-md-12">

        <a href="javascript:history.back()" class="property-details__summary-link back">
  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
    <g clip-path="url(#clip0_14482_7204)">
      <path d="M7.5 9.75L3.75 6L7.5 2.25" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    <defs>
      <clipPath id="clip0_14482_7204">
        <rect width="12" height="12" fill="white"/>
      </clipPath>
    </defs>
  </svg>
  Back to Search Results
</a>

        
                <div id="ppropertyCarousel" class="slider">
                    @foreach($propertyImages as $index => $property_image)
                        <div>
                            <img loading="lazy" src="{{ $property_image['optimised_image_url'] ?? '' }}/1024" class="d-block w-100" alt="{{ $property['Address']['display_address'] }}" data-media-update-date="{{ $property_image['media_update_date']}}" data-caption="{{ $property_image['caption'] }}">
                        </div>
                    @endforeach
                </div>
          
        </div>
        <!-- Property Images -->

      
    </div>
    <div class="row list-property-card">
        <div class="col-md-8 property__meta">

        <h1>{{ $property['Address']['display_address'] ?? '' }}</h1>

<!-- Price -->

<div class="property__price">
                    <span>{{ ($property['price_qualifier'] != 'Default') ? ($property['price_qualifier'] == 'POA' ? 'POA' : $property['price_qualifier']) : 'Asking Price Of' }}</span>
                    £{{ number_format($property['price']) }} {{ $property['instruction_type'] == 'Letting' ? ($property['rent_frequency'] == 'Weekly' ? 'Per Week' : 'PCM') : '' }}
</div>  

<!-- Price -->

@if ($property['department'] == 'residential' && isset($property['council_tax_band']))
<!-- Council Tax Band -->
<p><strong>Council Tax Band:</strong> {{ $property['council_tax_band'] ?? '' }}</p>
<!-- Council Tax Band -->
@endif

<!-- Rooms -->
<ul class="property__rooms">
            @if (!empty($property['bedrooms']))
            <li>
                <svg enable-background="new 0 0 22 16" viewBox="0 0 22 16" xmlns="http://www.w3.org/2000/svg" class="icon__bed"><path d="M21.1,7.3c-0.1,0-0.2-0.1-0.2-0.2V0.4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0H1.5C1.3,0,1.1,0.2,1.1,0.4c0,0,0,0,0,0v6.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.4C0.2,7.3,0,7.4,0,7.6c0,0,0,0,0,0v5.8c0,0.2,0.2,0.4,0.4,0.4c0,0,0,0,0,0h0.5c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v1.6c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V14c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0V7.6c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0L21.1,7.3z M1.8,0.9c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h18c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v6.2c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4c0-0.2-0.2-0.4-0.4-0.4c0,0,0,0,0,0h-7.3c-0.2,0-0.4,0.2-0.4,0.4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-0.4c-0.1,0-0.2-0.1-0.2-0.2l0,0V4c0-0.2-0.2-0.4-0.4-0.4H2.9C2.7,3.6,2.6,3.8,2.6,4c0,0,0,0,0,0v3.1c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0L1.8,0.9z M18.5,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0h-6.2c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H18.5z M9.7,4.4c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.5c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H3.5c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V4.5c0-0.1,0.1-0.2,0.2-0.2l0,0H9.7z M21.3,12.9c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0v-1.1c0-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V12.9z M21.3,10.7c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V8.2C0.7,8.1,0.8,8,0.9,8c0,0,0,0,0,0h20.2c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0V10.7z"></path></svg>
                {{ $property['bedrooms'] }} </li>
            @endif
            @if (!empty($property['reception_rooms']))
            <li>
                <svg enable-background="new 0 0 22 14" viewBox="0 0 22 14" xmlns="http://www.w3.org/2000/svg" class="icon__reception"><path d="M20.2,4.5h-0.4c-0.3,0-0.6,0.1-0.9,0.3c-0.1,0-0.2,0-0.2-0.1V1.9c0-1-0.8-1.9-1.8-1.9H5.1c-1,0-1.8,0.8-1.8,1.9v2.8c0,0.1-0.1,0.1-0.2,0.1C2.8,4.6,2.5,4.5,2.2,4.5H1.8C0.8,4.5,0,5.4,0,6.4v3.8c0,1,0.8,1.9,1.8,1.9h0.5c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h15c0.1,0,0.2,0.1,0.2,0.2l0,0v1.3c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4c0,0,0,0,0,0v-1.3c0-0.1,0.1-0.2,0.2-0.2l0,0h0.5c1,0,1.8-0.8,1.8-1.9V6.4C22,5.4,21.2,4.5,20.2,4.5z M4,1.9c0-0.6,0.5-1.1,1.1-1.1h11.7c0.6,0,1.1,0.5,1.1,1.1v5.3c0,0.2-0.2,0.4-0.4,0.4c0,0,0,0,0,0H4.4C4.2,7.6,4,7.4,4,7.2c0,0,0,0,0,0L4,1.9z M21.3,10.2c0,0.6-0.5,1.1-1.1,1.1H1.8c-0.6,0-1.1-0.5-1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1v0.8c0,0.6,0.5,1.1,1.1,1.1h13.2c0.6,0,1.1-0.5,1.1-1.1V6.4c0-0.6,0.5-1.1,1.1-1.1h0.4c0.6,0,1.1,0.5,1.1,1.1L21.3,10.2z"></path></svg>
                {{ $property['reception_rooms'] }}</li>
            @endif            
            @if (!empty($property['bathrooms']))
            <li>
                <svg enable-background="new 0 0 21 21" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg" class="icon__bath"><path d="M2.3,11.9c-0.1,0-0.2-0.1-0.2-0.2c0,0,0,0,0,0V2.6c0-0.9,0.7-1.6,1.6-1.6c0.1,0,0.1,0,0.2,0C4,1.1,4,1.2,4,1.2c0,0,0,0,0,0.1C3.7,1.7,3.5,2.1,3.5,2.6c0,0.7,0.2,1.3,0.7,1.8c0.1,0.1,0.4,0.1,0.5,0l3.1-3.1c0.1-0.1,0.1-0.4,0-0.5c0,0,0,0,0,0C7.4,0.3,6.8,0,6.2,0c-0.5,0-1,0.2-1.4,0.5c-0.1,0.1-0.2,0.1-0.3,0C4.2,0.4,3.9,0.4,3.7,0.4c-1.2,0-2.2,0.9-2.3,2.1c0,0,0,0,0,0c0,0,0,0,0,0c0,0,0,0,0,0v9.3c0,0.1-0.1,0.2-0.2,0.2c0,0,0,0,0,0H0.3c-0.2,0-0.3,0.2-0.3,0.4c0,0.2,0.2,0.3,0.3,0.3h0.9c0.1,0,0.2,0.1,0.2,0.2c0,0,0,0,0,0v2.6c0,1.4,0.7,2.6,1.9,3.3c0.1,0.1,0.2,0.2,0.2,0.3v1.6c0,0.2,0.1,0.4,0.3,0.4c0.2,0,0.4-0.1,0.4-0.3c0,0,0,0,0,0v-1.4c0-0.1,0.1-0.1,0.2-0.1c0,0,0,0,0,0c0.3,0.1,0.6,0.1,0.9,0.1h10.5c0.3,0,0.6,0,0.9-0.1c0.1,0,0.2,0,0.2,0.1c0,0,0,0,0,0v1.4c0,0.2,0.2,0.3,0.4,0.3s0.4-0.2,0.4-0.3l0,0V19c0-0.1,0.1-0.2,0.2-0.3c1.2-0.7,1.9-2,1.9-3.3v-2.6c0-0.1,0.1-0.2,0.2-0.2h0.9c0.2,0,0.3-0.2,0.3-0.4c0-0.2-0.2-0.3-0.3-0.3L2.3,11.9z M4.8,1.3C5.2,1,5.7,0.7,6.2,0.7c0.2,0,0.5,0.1,0.7,0.2C7,0.9,7,1,6.9,1.1c0,0,0,0,0,0L4.6,3.4c-0.1,0.1-0.1,0-0.2,0c0,0,0,0,0,0C4.2,3.1,4.2,2.9,4.2,2.6C4.2,2.1,4.5,1.7,4.8,1.3z M18.9,15.4c0,1.7-1.4,3.1-3.2,3.1H5.2c-1.7,0-3.1-1.4-3.2-3.1v-2.6c0-0.1,0.1-0.2,0.2-0.2h16.5c0.1,0,0.2,0.1,0.2,0.2L18.9,15.4z"></path></svg>
                {{ $property['bathrooms'] }} </li>
            @endif
</ul>         
<!-- Rooms -->

<!-- tabs -->
<div class="property-details__summary-links">

<!-- gallery -->
<a href="#" class="property-details__summary-link scroll" data-toggle="modal" data-target="#galleryModal">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_14482_7245)">
    <path d="M16.875 3.75H5.625C5.27982 3.75 5 4.02982 5 4.375V13.125C5 13.4702 5.27982 13.75 5.625 13.75H16.875C17.2202 13.75 17.5 13.4702 17.5 13.125V4.375C17.5 4.02982 17.2202 3.75 16.875 3.75Z" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M13.875 6.5625C13.875 6.80412 13.6791 7 13.4375 7C13.1959 7 13 6.80412 13 6.5625C13 6.32088 13.1959 6.125 13.4375 6.125C13.6791 6.125 13.875 6.32088 13.875 6.5625Z" fill="#211F47" stroke="#211F47"/>
    <path d="M5 10.0539L7.99531 7.05782C8.05336 6.99971 8.12229 6.95361 8.19816 6.92215C8.27404 6.8907 8.35537 6.87451 8.4375 6.87451C8.51963 6.87451 8.60096 6.8907 8.67684 6.92215C8.75271 6.95361 8.82164 6.99971 8.87969 7.05782L12.7586 10.9375L14.7656 8.93282C14.8828 8.81569 15.0417 8.7499 15.2074 8.7499C15.3731 8.7499 15.532 8.81569 15.6492 8.93282L17.5 10.7859" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M15 13.75V15.625C15 15.7908 14.9342 15.9497 14.8169 16.0669C14.6997 16.1842 14.5408 16.25 14.375 16.25H3.125C2.95924 16.25 2.80027 16.1842 2.68306 16.0669C2.56585 15.9497 2.5 15.7908 2.5 15.625V6.875C2.5 6.70924 2.56585 6.55027 2.68306 6.43306C2.80027 6.31585 2.95924 6.25 3.125 6.25H5" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7245">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>
Gallery</a>

<!-- Bootstrap Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="galleryModalLabel">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
    </div>
  </div>
</div>
<!-- gallery -->











    
   <!--location  -->
 

<a href="#location" class="property-details__summary-link scroll"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_14482_7248)">
    <path d="M7.5 14.375V3.125" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.5 5.625V16.875" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M7.5 14.375L2.5 15.625V4.375L7.5 3.125L12.5 5.625L17.5 4.375V15.625L12.5 16.875L7.5 14.375Z" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7248">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>
    Location</a>


<!--location  -->

<!--Virtual Tour  -->





@if(is_array($property['virtual_tours'] ?? false))
@foreach ($property['virtual_tours'] as $property_virtualtour)
<a  href="{{ $property_virtualtour['media_url'] ?? '' }}" target="_blank" class="property-details__summary-link scroll"  role="button">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_14482_7251)">
    <path d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z" stroke="#211F47" stroke-miterlimit="10"/>
    <path d="M12.5 10L8.75 7.5V12.5L12.5 10Z" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7251">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>
Video</a>
@endforeach
@endif


<!--Virtual Tour  -->
 
   

<!--Floor plan -->   


    @if(!empty($property['floor_plans']))
<a href="#" class="property-details__summary-link scroll" role="button" data-toggle="modal" data-target="#floorplanModal">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
    <path d="M12.6786 2.49954H17.5V17.4995H2.5V2.49954H6.78571L10 4.6424M8.92857 17.4995V9.99954M6.25 9.99954H11.6071M14.8214 9.99954H17.5" stroke="#211F47"/>
  </svg>
  Floorplan
</a>
@endif

<!-- Bootstrap Modal -->
<div class="modal fade" id="floorplanModal" tabindex="-1" role="dialog" aria-labelledby="floorplanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Add modal-dialog-centered class -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="floorplanModalLabel">Floorplan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if($property['floor_plans'])
        <div class="col">
            @foreach ($property['floor_plans'] as $floorplan)
            <img loading="lazy" src="{{ $floorplan['optimised_image_url'] }}/600" class="img-fluid" alt="Floorplan for {{ $property['Address']['display_address'] ?? '' }}">
            @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<!--Floor plan -->            
               

<!--epc -->  
@if($property['epcs'])       
<a href="#" class="property-details__summary-link scroll" data-toggle="modal" data-target="#epcModal">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <g clip-path="url(#clip0_14482_7257)">
    <path d="M6.875 18.125H13.125" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M6.14853 13.0469C5.40554 12.4665 4.80374 11.7252 4.38833 10.8789C3.97293 10.0325 3.75472 9.10297 3.7501 8.16016C3.73135 4.77266 6.4626 1.95313 9.84932 1.875C11.1618 1.84321 12.451 2.22555 13.534 2.96777C14.6169 3.70999 15.4387 4.77439 15.8826 6.00996C16.3265 7.24553 16.37 8.58952 16.007 9.85123C15.644 11.1129 14.8929 12.2283 13.8603 13.0391C13.6325 13.2157 13.4479 13.4418 13.3205 13.7004C13.1932 13.9589 13.1263 14.243 13.1251 14.5313V15C13.1251 15.1658 13.0592 15.3247 12.942 15.4419C12.8248 15.5592 12.6659 15.625 12.5001 15.625H7.5001C7.33434 15.625 7.17536 15.5592 7.05815 15.4419C6.94094 15.3247 6.8751 15.1658 6.8751 15V14.5313C6.8748 14.2449 6.8092 13.9623 6.6833 13.7051C6.5574 13.4479 6.37451 13.2228 6.14853 13.0469Z" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M10.625 4.375C12.1875 4.63828 13.4852 5.9375 13.75 7.5" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7257">
      <rect width="20" height="20" fill="white"/>
    </clipPath>
  </defs>
</svg>
    EPC</a>
@endif
      


<!-- Bootstrap Modal -->
<div  class="modal fade" id="epcModal" tabindex="-1" role="dialog" aria-labelledby="epcModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document"> <!-- Add modal-dialog-centered class -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="floorplanModalLabel">EPC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if($property['epcs'])
        <div class="col">
            @foreach ($property['epcs'] as $epcs)
            <img loading="lazy" src="{{ $epcs['media_url'] }}" class="img-fluid" alt="EPC for {{ $property['Address']['display_address'] ?? '' }}">
            @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

<!--epc -->  






               

           </div>

<!-- tabs -->








 

 






        <div class="description  height">

            <h2>Description</h2>

            <!-- Property Summary -->
            {!! $property['summary'] ?? '' !!}
            <!-- Property Summary -->

            {!! $property['description'] ?? '' !!}


        </div>


        <div class="read">
            <p>Read More</p>
        </div>




        <div class="row map" id="location">
        <div class="col">
        <h4>{{ $property['Address']['display_address'] ?? '' }}</h4>
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




    <div class="row calc">

    <h2>Mortgage Calculator</h2>
     
    @include('components/mortgage-calculator')



    <p>These results are for a repayment mortgage and are only intended as a guide. Make sure you obtain accurate figures from your lender before committing to any mortgage. Your home may be repossessed if you do not keep up repayments on a mortgage. </p>



    </div>









     </div>

<!-- col small -->
        <div class="col btn-col">
          

        <a href="#elementor-action%3Aaction%3Dpopup%3Aopen%26settings%3DeyJpZCI6IjQ3NyIsInRvZ2dsZSI6ZmFsc2V9" class="property-details__summary-link pink  ">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M18 4.375L10.5 11.25L3 4.375" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M3 4.375H18V15C18 15.1658 17.9342 15.3247 17.8169 15.4419C17.6997 15.5592 17.5408 15.625 17.375 15.625H3.625C3.45924 15.625 3.30027 15.5592 3.18306 15.4419C3.06585 15.3247 3 15.1658 3 15V4.375Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M9.13662 10L3.19287 15.4484" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M17.807 15.4484L11.8633 10" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
Request a Viewing</a>

    <a href="tel:01926257540" class="property-details__summary-link clear ">
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <g clip-path="url(#clip0_14482_7413)">
    <path d="M13.343 11.3547C13.4295 11.2971 13.5291 11.262 13.6326 11.2526C13.7362 11.2432 13.8404 11.2597 13.9359 11.3008L17.6203 12.9516C17.7445 13.0046 17.8481 13.0965 17.9157 13.2134C17.9833 13.3303 18.0112 13.4659 17.9953 13.6C17.8739 14.5071 17.4273 15.3392 16.7383 15.9416C16.0494 16.544 15.1652 16.8757 14.25 16.875C11.4321 16.875 8.72957 15.7556 6.73699 13.763C4.74442 11.7704 3.625 9.06792 3.625 6.25C3.6243 5.33484 3.956 4.45058 4.55841 3.76166C5.16082 3.07275 5.99293 2.62606 6.9 2.50469C7.03409 2.48876 7.16973 2.51668 7.28662 2.58428C7.40351 2.65188 7.49537 2.75552 7.54844 2.87969L9.19922 6.56718C9.23978 6.6619 9.2563 6.76516 9.2473 6.8678C9.2383 6.97044 9.20408 7.06926 9.14766 7.15547L7.47813 9.14062C7.4189 9.22998 7.38388 9.33318 7.37649 9.44013C7.3691 9.54708 7.38958 9.65412 7.43594 9.75078C8.08203 11.0734 9.44922 12.4242 10.7758 13.0641C10.873 13.1102 10.9805 13.1302 11.0878 13.1222C11.195 13.1141 11.2983 13.0782 11.3875 13.018L13.343 11.3547Z" stroke="#211F47" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7413">
      <rect width="20" height="20" fill="white" transform="translate(0.5)"/>
    </clipPath>
  </defs>
</svg>
01926 257 540</a>



    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($property['permalink']) }}" class="property-details__summary-link share ">
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <g clip-path="url(#clip0_14482_7373)">
    <path d="M5.5 12.5C6.88071 12.5 8 11.3807 8 10C8 8.61929 6.88071 7.5 5.5 7.5C4.11929 7.5 3 8.61929 3 10C3 11.3807 4.11929 12.5 5.5 12.5Z" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M14.25 18.125C15.6307 18.125 16.75 17.0057 16.75 15.625C16.75 14.2443 15.6307 13.125 14.25 13.125C12.8693 13.125 11.75 14.2443 11.75 15.625C11.75 17.0057 12.8693 18.125 14.25 18.125Z" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M14.25 6.875C15.6307 6.875 16.75 5.75571 16.75 4.375C16.75 2.99429 15.6307 1.875 14.25 1.875C12.8693 1.875 11.75 2.99429 11.75 4.375C11.75 5.75571 12.8693 6.875 14.25 6.875Z" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M12.1476 5.72656L7.60229 8.64844" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
    <path d="M7.60229 11.3516L12.1476 14.2734" stroke="#A09BAE" stroke-linecap="round" stroke-linejoin="round"/>
  </g>
  <defs>
    <clipPath id="clip0_14482_7373">
      <rect width="20" height="20" fill="white" transform="translate(0.5)"/>
    </clipPath>
  </defs>
</svg>
    Share Property</a>

           
        </div>

<!--col small -->


    </div>
   
   
 
  
 
</section>

@include('debug/debug')