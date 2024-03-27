{{--
    ATTENTION
    =========
    /src/scss/components/qr.scss

    With this file, you can display a QR code
    on your /blade-views/single-property.blade.php file.

    You can also use is on /blade-views/single-development.blade.php

    You will need to edit the settings on your website by
    going to TPJ Settings -> Property QR Code Settings.

    Notice the @php logic in use here. If a user is logged
    in to the website they will see a download button so that
    they can download the QR code if they want to use it in
    marketing materials.
--}}

<div
    data-component="PropertyQr" 
    data-permalink="{{ $permalink ?? '' }}" 
    data-size-small="200" 
    data-size-large="1500" 
    data-override-color-light="{{ $color_light ?? '' }}" 
    data-override-color-dark="{{ $color_dark ?? '' }}" 
    data-qr-file-name="{{ $qr_filename ?? 'qr.png' }}"
>
    <div class="tpj_qr_canvas_ui"></div>
    @if(is_user_logged_in())
    <button class="tpj_download_qr_btn btn btn-primary">Download QR Code</button>
    @endif
</div>