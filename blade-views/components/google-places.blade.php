{{--
    ATTENTION
    =========
    This input is required when using Google Places autocomplete
    within your search form.

    @include('components/google-places')

    If your search form is within an Elementor Popup, please use
    /blade-views/components/google-places-elementor-popup.blade.php instead.
--}}

<div
    data-component="GooglePlaces" style="position: relative;"
    data-parent-form-id="{{ isset($parent_form_id) ? $parent_form_id : '' }}"
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
    {{--data-onvaluechange-trigger-events='["MAP_CHANGE_FILTERS"]'--}}
>
    <label for="google_places_address_keyword" class="form-label visually-hidden-focusable">Location, area or postcode</label>
    <input
        data-component="FormItem"
        type="text"
        name="place"
        id="google_places_address_keyword"
        class="tpj_search_input form-control"
        placeholder="Location, area or postcode"
    >
    <div class="tpj_clear_google_places">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/></svg>
    </div>
</div>