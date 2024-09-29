
@php 
$l=App::getLocale();
switch($l){
    case 'en':
        $activeFlag='us';
        break;
    case 'ar':
        $activeFlag='sa';
        break;
    case 'tr':
        $activeFlag='tr';
        break;
    default:
        $l='us';
}
@endphp
<div class="dropdown text-end">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        <picture>
            <source
                type="image/webp"
                srcset="https://flagcdn.com/16x12/{{$activeFlag}}.webp,
                https://flagcdn.com/32x24/{{$activeFlag}}.webp 2x,
                https://flagcdn.com/48x36/{{$activeFlag}}.webp 3x">
            <source
                type="image/png"
                srcset="https://flagcdn.com/16x12/{{$activeFlag}}.png,
                https://flagcdn.com/32x24/{{$activeFlag}}.png 2x,
                https://flagcdn.com/48x36/{{$activeFlag}}.png 3x">
            <img
                src="https://flagcdn.com/16x12/{{$activeFlag}}.png"
                width="16"
                height="12"
                >
        </picture>
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="?locale=en">
            <picture>
                <source
                    type="image/webp"
                    srcset="https://flagcdn.com/16x12/us.webp,
                    https://flagcdn.com/32x24/us.webp 2x,
                    https://flagcdn.com/48x36/us.webp 3x">
                <source
                    type="image/png"
                    srcset="https://flagcdn.com/16x12/us.png,
                    https://flagcdn.com/32x24/us.png 2x,
                    https://flagcdn.com/48x36/us.png 3x">
                <img
                    src="https://flagcdn.com/16x12/us.png"
                    width="16"
                    height="12"
                    >
            </picture> English
        </a></li>
        <li><a class="dropdown-item" href="?locale=ar">
            <picture>
                <source
                    type="image/webp"
                    srcset="https://flagcdn.com/16x12/sa.webp,
                    https://flagcdn.com/32x24/sa.webp 2x,
                    https://flagcdn.com/48x36/sa.webp 3x">
                <source
                    type="image/png"
                    srcset="https://flagcdn.com/16x12/sa.png,
                    https://flagcdn.com/32x24/sa.png 2x,
                    https://flagcdn.com/48x36/sa.png 3x">
                <img
                    src="https://flagcdn.com/16x12/sa.png"
                    width="16"
                    height="12"
                    >
            </picture>
            Arabic
        </a></li>
        <li><a class="dropdown-item" href="?locale=tr">
            <picture>
                <source
                    type="image/webp"
                    srcset="https://flagcdn.com/16x12/tr.webp,
                    https://flagcdn.com/32x24/tr.webp 2x,
                    https://flagcdn.com/48x36/tr.webp 3x">
                <source
                    type="image/png"
                    srcset="https://flagcdn.com/16x12/tr.png,
                    https://flagcdn.com/32x24/tr.png 2x,
                    https://flagcdn.com/48x36/tr.png 3x">
                <img
                    src="https://flagcdn.com/16x12/tr.png"
                    width="16"
                    height="12"
                    >
            </picture>
            Turkish
        </a></li>
    </ul>
</div>

