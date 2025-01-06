
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
<div class="dropdown">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{strtoupper($activeFlag)}}
    </a>
    <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item" href="?locale=en">
            English
        </a></li>
        <li><a class="dropdown-item" href="?locale=ar">
            Arabic
        </a></li>
        <li><a class="dropdown-item" href="?locale=tr">
            Turkish
        </a></li>
    </ul>
</div>
