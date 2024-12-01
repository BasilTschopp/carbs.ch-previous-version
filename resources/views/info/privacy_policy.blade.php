@include('includes.header')

<div id='info-container'>

    <p class='info-title'>{{ __('privacy_policy.TitlePrivacyPolicy') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('privacy_policy.PrivacyPolicy') }}</p>
    </div>

    <p class='info-title'>{{ __('privacy_policy.TitleYourRights') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('privacy_policy.YourRights') }}</p>
    </div>

    <p class='info-title'>{{ __('privacy_policy.TitleCollectedDatas') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('privacy_policy.CollectedDatas') }}</p>
    </div>

    <p class='info-title'>{{ __('privacy_policy.TitleGoogleAnalytics') }}</p>
    <div class='info-box'>
        <p class='info-text'>{{ __('privacy_policy.GoogleAnalytics') }}</p>
    </div>

</div>

@include('includes.footer')