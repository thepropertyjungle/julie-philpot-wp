{{--
    ATTENTION
    =========
    You can call this partial into your search form(s)
    so you don't have to update number of bedrooms in
    multiple places.

    Notice the bedrooms exact logic. You can use this
    like so:

    @include('partials/search-bedrooms', ['bedrooms_type' => 'exact'])
--}}

<option value="1">1 Bedroom/Studio</option>
<option value="2">2 Bedrooms</option>
<option value="3">3 Bedrooms</option>
<option value="4">4 Bedrooms</option>
@if (isset($bedrooms) && $bedrooms_type == 'exact')
<option value="5">5 Bedrooms</option>
<option value="6">6 Bedrooms</option>
<option value="7">7 Bedrooms</option>
<option value="8">8 Bedrooms</option>
<option value="9">9 Bedrooms</option>
<option value="10">10 Bedrooms</option>
@else
<option value="5">5+ Bedrooms</option>
@endif