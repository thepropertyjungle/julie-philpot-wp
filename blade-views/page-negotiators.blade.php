{{--
    ATTENTION
    =========
    /src/scss/pages/negotiators.blade.php

    Used for displaying negotiators created 
    by creating new users within the
    websites WP Admin.
--}}

<div class="container">
    @if(count($negotiators) > 0)
        <div class="row">
            <div class="col">
                <p>Displaying <strong>{{ count($negotiators) }}</strong> negotiators</p>
            </div>
        </div>
        @foreach ($negotiators as $negotiator)
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            @if($negotiator['has_profile_images'] ?? false)
                            <div class="col-md-4">
                                <img loading="lazy" src="{{ $negotiator['profile_images'][0]['custom_sizes']['medium'] ?? '' }}" class="img-fluid" alt="{{ $negotiator['first_name'] ?? '' }} {{ $negotiator['last_name'] ?? '' }}">
                            </div>
                            @endif
                            <div class="col">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $negotiator['first_name'] ?? '' }} {{ $negotiator['last_name'] ?? '' }}</h3>
                                    @if(isset($negotiator['job_title']))
                                    <h4 class="card-title">{{ $negotiator['job_title'] ?? '' }}</h4>
                                    @endif
                                    @if(isset($negotiator['bio']))
                                    <p class="card-text">{!! $negotiator['bio'] ?? '' !!}</p>
                                    @endif
                                    <ul class="list-unstyled">
                                        @if(isset($negotiator['email']))
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg> <a href="mailto:{{ $negotiator['email'] ?? '' }}">{{ $negotiator['email'] ?? '' }}</a>
                                        </li>
                                        @endif
                                        @if(isset($negotiator['tpj_contact_methods']['tpj_telephone_number']))
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path></svg> <a href="tel:{{ str_replace(' ', '', $negotiator['tpj_contact_methods']['tpj_telephone_number']) }}">{{ $negotiator['tpj_contact_methods']['tpj_telephone_number'] ?? '' }}</a> @if(isset($negotiator['tpj_contact_methods']['tpj_telephone_direct_dial_number']))DDI: {{ $negotiator['tpj_contact_methods']['tpj_telephone_direct_dial_number'] ?? '' }} @endif
                                        </li>
                                        @endif
                                        @if(isset($negotiator['tpj_contact_methods']['tpj_mobile_phone_number']))
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16"><path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/></svg> <a href="tel:{{ str_replace(' ', '', $negotiator['tpj_contact_methods']['tpj_mobile_phone_number']) }}">{{ $negotiator['tpj_contact_methods']['tpj_mobile_phone_number'] ?? '' }}</a>
                                        </li>
                                        @endif
                                    </ul>
                                    @if(isset($negotiator['languages_spoken']))
                                    <p class="card-text"><small><strong>Languages Spoken:</strong> {{ $negotiator['languages_spoken'] ?? '' }}</small></p>
                                    @endif
                                    @if(isset($negotiator['tpj_contact_methods']['tpj_linkedin_profile_url']) || isset($negotiator['tpj_contact_methods']['tpj_facebook_profile_url']) || isset($negotiator['tpj_contact_methods']['tpj_twitter_profile_url']))
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="{{ $negotiator['tpj_contact_methods']['tpj_linkedin_profile_url'] ?? '' }}" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401m-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4"/></svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $negotiator['tpj_contact_methods']['tpj_facebook_profile_url'] ?? '' }}" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ $negotiator['tpj_contact_methods']['tpj_twitter_profile_url'] ?? '' }}" target="_blank" rel="noopener noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16"><path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/></svg>
                                            </a>
                                        </li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col">
                <p>There are no negotiators added to the website.</p>
            </div>
        </div>
    @endif
</div>

@include('debug/debug')