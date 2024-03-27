{{--
    ATTENTION
    =========
    /src/scss/pages/developments.scss

    Used for displaying developments created 
    using the Developments editor.

    You'll need to create a dedicated page on
    your website and make sure the
    permalink/URL/Slug is set to /developments/.
    If you want to use a different permalink/URL/Slug
    you can change this using the TPJ Settings
    Property Permalinks options.

    When you've created the page add the following shortcode:

    [blade_developments]
--}}

<div class="container">
    @if(!empty($developments))
        <div class="row">
            <div class="col">
                <p>Displaying <strong>{{ count($developments) }}</strong> developments</p>
            </div>
        </div>
        @foreach ($developments as $development)
            <div class="row">
                <div class="col">
                    <a href="{{ $development['permalink'] ?? '' }}">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img loading="lazy" src="..." class="img-fluid rounded-start" alt="{{ $development['title'] ?? '' }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $development['title'] ?? '' }}</h5>
                                        @if(!empty($development['properties']))
                                            <p class="card-text">{{ count($development['properties'] ?? []) }} Properties, Prices start from <strong>£X</strong> to <strong>£Y</strong></p>
                                        @endif
                                        <p class="card-text">{!! $development['description'] ?? '' !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col">
                <p>There are no Property Developments at this time.</p>
            </div>
        </div>
    @endif
</div>

@include('debug/debug')