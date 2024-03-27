{{--
    ATTENTION
    =========
    /src/scss/pages/branches.scss

    Use for styling your list of branches template.
--}}

@php
    // This code is checking for a GDPR phone number
    // The code here is only required if you wish to display the GDPR phone number
    $gdprPhoneNumber = isset($global_options['gdpr_options']['registrationCompanyPhoneNumber']) && $global_options['gdpr_options']['registrationCompanyPhoneNumber'] !== '' ? $global_options['gdpr_options']['registrationCompanyPhoneNumber'] : 'PHONE NUMBER NEEDED';
@endphp

@if(!empty($branches))
    <div class="row">
        <div class="col">
            <p>We have <strong>{{ count($branches) }}</strong> independently managed branches across <strong>ABC</strong> and <strong>XYZ</strong>.</p>
            <p>Alternatively, you can make a general enquiry by contacting us on <a href="tel:{{ str_replace(' ', '', $gdprPhoneNumber) }}"><strong>{{ $gdprPhoneNumber }}</strong></a>.</p>
        </div>
    </div>
    @foreach ($branches as $index => $branch)
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-3 d-flex align-items-center">
                            <img src="..." class="img-fluid rounded-start" alt="{{ $branch['name'] ?? '' }} Branch">
                        </div>
                        <div class="col d-flex flex-column justify-content-center">
                            <div class="card-body">
                                <h2 class="card-title">{{ $branch['name'] ?? '' }} Branch</h2>
                                @if($branch['meta']['postal_address'])
                                <p><small>{{ $branch['meta']['postal_address'] }}</small><p>
                                @endif
                                @if($branch['description'])
                                <p class="card-text">{{ $branch['description'] ?? '' }}</p>
                                @endif

                                @if(isset($branch['meta']['phone_numbers']) || ($branch['meta']['emails']))
                                <ul class="list-unstyled">
                                    @foreach ($branch['meta']['phone_numbers'] as $phoneNumber)
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/></svg> <a href="tel:{{ str_replace(' ', '', $phoneNumber) }}">{{ $phoneNumber }}</a>
                                    </li>
                                    @endforeach
                                    @foreach ($branch['meta']['emails'] as $email)
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg> <a href="mailto:{{ $email }}">{{ $email }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                        @if(isset($branch['meta']['opening_hours']))
                        <div class="col-md-3">
                            <div class="card card-body">
                                <table class="table">
                                    <tbody>
                                        @foreach ($branch['meta']['opening_hours'] as $day => $hours)
                                            <tr>
                                                <td>{{ $day }}</td>
                                                <td>{{ $hours }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-3">
                            <!-- Google Map using JavaScript API -->
                            {{-- @include('components/map-property-single', [
                                'lat'           => $branch['meta']['geo']['lat'],
                                'lng'           => $branch['meta']['geo']['lng'],
                                'initial_zoom'  => 17
                            ]) --}}
                            <!-- Google Map using JavaScript API -->
                            <!-- Google Map using Embed API -->
                            @include('components/map-property-single-embedded', [
                                'lat'           => $branch['meta']['geo']['lat'],
                                'lng'           => $branch['meta']['geo']['lng'],
                                'initial_zoom'  => 15
                            ])
                            <!-- Google Map using Embed API -->
                            <!-- LeafletJS Map -->
                            {{-- @include('components/map-leafletjs-property-single', [
                                'lat'                               => $branch['meta']['geo']['lat'],
                                'lng'                               => $branch['meta']['geo']['lng'],
                                'initial_zoom'                      => 17,
                                'max_zoom'                          => 18,
                                'min_zoom'                          => 10,
                                'custom_marker_icon_url'            => '',
                                'custom_marker_icon_size_width'     => 50,
                                'custom_marker_icon_size_height'    => 50
                            ]) --}}
                            <!-- LeafletJS Map -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>There aren't any branches to display.</p>
@endif

@include('debug/debug')