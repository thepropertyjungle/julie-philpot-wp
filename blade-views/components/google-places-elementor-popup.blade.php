{{--
    ATTENTION
    =========
    If you wish to use the Google Places autocomplete feature in
    an Elementor Popup, you will ned to use this version.

    Elementor Popups do not render within the page until you click
    on the link that triggers them. So additional JavaScript is
    required for Google Places to work correctly.

    data-ison-elementor-popup="true" is the key factor in this file.
--}}

<div
    data-component="GooglePlaces"
    style="position: relative;" 
    data-ison-elementor-popup="true" 
    data-parent-form-id="{{ $parent_form_id }}" 
    data-fallback-to-address-search="true" 
    data-search-developments="true" 
    data-include-developments-properties-no="true" 
    data-development-entry-template="{{ esc_html('<span class="development-name"></span><span>(<span class="properties-count"></span>)</span>') }}" 
    data-place-entry-template="{{ esc_html('<span class="place-icon"><img src="' . TPJ_BLADE_PUBLIC_URL . '/assets/dist/img/location_map_marker_icon.svg" /></span><span class="place-name"></span>') }}" 
    data-max-google-results="5" 
    data-developments-entries-title="DEVELOPMENTS" 
    data-places-entries-title="LOCATIONS" 
    data-max-developments-results="5" 
    data-developments-show-first="true" 
    data-debounce-milliseconds="250" 
    data-places-use-radius-or-bounds="bounds" 
    data-debug-mode="false" 
    data-autocomplete-search-types="{{ json_encode(['postal_code', 'postal_town', 'locality', 'political']) }}" 
    data-search-countries="{{ json_encode(['uk']) }}"
>
    
    <input
        data-component="FormItem" 
        type="text"
        name="place"
        class="tpj_search_input form-control"
        placeholder="Location, area or postcode"
    >

</div>