{{--
    ATTENTION
    =========
    This partial allows you to call in a selection of
    predefined prices for your search forms.

    You can use an @include parameter to select either
    sales or lettings to be displayed.

    @include('partials/search-prices', ['sales' => 'true'])
    @include('partials/search-prices', ['lettings' => 'true'])
--}}

@isset($sales)
    <option value="50000">£50,000</option>
    <option value="100000">£100,000</option>
    <option value="150000">£150,000</option>
    <option value="200000">£200,000</option>
    <option value="250000">£250,000</option>
    <option value="300000">£300,000</option>
    <option value="350000">£350,000</option>
    <option value="400000">£400,000</option>
    <option value="450000">£450,000</option>
    <option value="500000">£500,000</option>
    <option value="550000">£550,000</option>
    <option value="600000">£600,000</option>
    <option value="650000">£650,000</option>
    <option value="700000">£700,000</option>
    <option value="750000">£750,000</option>
    <option value="800000">£800,000</option>
    <option value="850000">£850,000</option>
    <option value="900000">£900,000</option>
    <option value="950000">£950,000</option>
    <option value="1000000">£1,000,000</option>
    <option value="2000000">£2,000,000</option>
    <option value="3000000">£3,000,000</option>
    <option value="4000000">£4,000,000</option>
    <option value="5000000">£5,000,000</option>
    <option value="6000000">£6,000,000</option>
    <option value="7000000">£7,000,000</option>
    <option value="8000000">£8,000,000</option>
    <option value="9000000">£9,000,000</option>
    <option value="10000000">£10,000,000</option>
@endisset
@isset($lettings)
    <option value="350">&pound;350 PCM</option>
    <option value="350">&pound;350 PCM</option>
    <option value="450">&pound;450 PCM</option>
    <option value="500">&pound;500 PCM</option>
    <option value="550">&pound;550 PCM</option>
    <option value="600">&pound;600 PCM</option>
    <option value="650">&pound;650 PCM</option>
    <option value="700">&pound;700 PCM</option>
    <option value="800">&pound;800 PCM</option>
    <option value="1000">&pound;1000 PCM</option>
    <option value="1500">&pound;1500 PCM</option>
    <option value="2000">&pound;2000 PCM</option>
    <option value="3000">&pound;3000 PCM</option>
    <option value="4000">&pound;4000 PCM</option>
    <option value="5000">&pound;5000 PCM</option>
    <option value="6000">&pound;6000 PCM</option>
    <option value="7000">&pound;7000 PCM</option>
    <option value="8000">&pound;8000 PCM</option>
    <option value="9000">&pound;9000 PCM</option>
    <option value="10000">&pound;10,000 PCM</option>
@endisset