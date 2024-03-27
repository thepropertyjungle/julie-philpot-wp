{{--
    ATTENTION
    =========
    /src/scss/components/rental-yield-calculator-sliders.scss

    You will need to edit the settings on your website by
    going to TPJ Settings -> Calculators and enabling the
    Rental Yield Calculator. You can the use this rental
    yield calculator on any page by shortcode or @include
    on Blade templates.

    [blade_dynamic_shortcode view_name="components/rental-yield-calculator-sliders"]
--}}

<div data-component="RyCalculatorSliders">
    <div class="rentalYield-property-value">
        <div>
            <span>£</span>
            <span class="tpj_property_value_info">0</span>
        </div>
        <input
            type="range"  
            id="property-value-rcs"
            class="form-range"
            name="property_value"
            value="0"
            min="0"
            max="2000000"
            step="5000"
        >
        <label for="property-value-rcs" class="form-label">Property Value</label>
    </div>

    <div class="rentalYield-rental-price">
        <div>
            <span>£</span>
            <span class="tpj_monthly_rental_info">0</span>
        </div>
        <input
            type="range"
            id="monthly-rental-rcs"
            class="form-range"
            name="monthly_rental"
            value="0"
            min="0"
            max="8000"
            step="100"
        >
        <label for="monthly-rental-rcs" class="form-label">Monthly Rental</label>
    </div>

    <div class="rentalYield-estimate">
        <p>Your estimated gross rental yield would be:</p>
        <div><span class="tpj_estimated_gross_rental">0.00</span>%</div>
    </div>
</div>