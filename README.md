# MautixExtendeeAnalyticsBundle

Extension for Mautic from Extendee family www.extendee.com Translations and improvements are welcome as pull requests.

### Docs

https://docs.mtcextendee.com/#analytics

### Installation

1. Install by running 

`composer require kuzmany/mautic-extendee-analytics-bundle`

2. Go to Mautic - Plugins and click to the button Install/Upgrade plugins

3. See new integrations EAnalyticsBundle

Note: This plugin require pull request [Inject new custom content hooks below graphs](https://github.com/mautic/mautic/pull/6016) from Mautic repository. Hope will merged in upcomming Mautic 2.14.

### Setup integration

Plugin use  [Google Analalytics Embed API](https://developers.google.com/analytics/devguides/reporting/embed/v1/). You have to follow [Google API setup](https://developers.google.com/api-client-library/javascript/start/start-js#Setup), generate Client ID and take View ID of your Google Analytics view.

Plugin integration

![image](https://user-images.githubusercontent.com/462477/40825598-57d75716-6578-11e8-9707-4e47fe3876f4.png)

Plugin setup

![image](https://user-images.githubusercontent.com/462477/40825555-2de38308-6578-11e8-8ba6-9de8c824aeab.png)

Google Analaytics report in Mautic

![Extendee Analytics](https://user-images.githubusercontent.com/462477/39583389-4aeb5190-4ef0-11e8-883f-258b75ba4c08.PNG)
