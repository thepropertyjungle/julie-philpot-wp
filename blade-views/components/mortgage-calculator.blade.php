{{--
    ATTENTION
    =========
    /src/scss/components/mortgage-calculator.scss

    You will need to enable the mortgage calculator within the
    TPJ Settings -> Calculators section. You can then include
    this in your /blade-views/single-property.blade.php
    file using the @include method below:

    @include('components/mortgage-calculator', [
        'loan_amount' => 200000, 
        'length_of_loan_in_years' => 25, 
        'interest_rate' => 2.9, 
        'autocalculate_if_preffield' => true, 
        'use_inline_currency_format_on_load' => false, // override default
        'use_inline_currency_format' => false, // override default
        'use_currency_symbol' => '£', // override default
    ])
--}}

<form
    id="mortgage_calculator"
    data-autocalculate-if-preffield="{{ isset($autocalculate_if_preffield) && $autocalculate_if_preffield === true ? 'true' : '' }}"
    data-use-inline-currency-format={{ isset($use_inline_currency_format) && $use_inline_currency_format === false ? '' : 'true' }}
    data-use-currency-symbol={{ isset($use_currency_symbol) ? $use_currency_symbol : '£' }}
    data-use_inline_currency_format_on_load={{ isset($use_inline_currency_format_on_load) && $use_inline_currency_format_on_load === false ? '' : 'true' }} 
    action=""
>
    <div>
        <input id="loan_amount" class="form-control" type="text" value="{{ $loan_amount ?? '' }}" placeholder="Amount" required>
    </div>
    <div>
        <input id="length_of_loan_in_years" class="form-control" type="text" value="{{ $length_of_loan_in_years ?? '' }}" placeholder="Length of loan in years" required>
    </div>
    <div>
        <input id="interest_rate" class="form-control" type="text" data-initial="4.9" value="{{ $interest_rate ?? '' }}" placeholder="Interest rate" required>
    </div>
    <button type="submit" class="btn btn-primary">Calculate</button>
</form>

<div id="mortgage_calculator_success" style="display:none;">
    Here is the result (Monthly)
    <div>£<span id="mortgage_calculator_success_value"></span></div>
</div>

<div id="mortgage_calculator_error" style="display:none;">
    All fields must be numbers
</div>