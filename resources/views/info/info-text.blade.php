@include('includes.header')

<div id='info-container'>

    <p class='info-title'>{{ __('info_general.TitlePurpose') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('info_general.Purpose') }}</p>
    </div>

    <p class='info-title'>{{ __('info_general.TitleAdvantages') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('info_general.Advantages') }}</p>
    </div>

    <p class='info-title'>{{ __('info_general.TitleReferences') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('info_general.References') }}</p>
    </div>

    <p class='info-title'>{{ __('info_general.TitleExclusion') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('info_general.Exclusion') }}</p>
    </div>

</div>

@include('includes.footer')