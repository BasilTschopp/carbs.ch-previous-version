@include('includes.header')

<div id='info-container'>

    <p class='info-title'>{{ __('imprint.TitleCompany') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('imprint.Company') }}</p>
    </div>

    <p class='info-title'>{{ __('imprint.TitleContact') }}</p>
    <div class='info-box'>
        <p class='info-text'>{!! __('imprint.Contact') !!}</p>
    </div>

    <p class='info-title'>{{ __('info_general.TitleExclusion') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('info_general.Exclusion') }}</p>
    </div>

</div>

@include('includes.footer')