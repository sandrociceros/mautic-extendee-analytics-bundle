<?php

return [
    'name'        => 'MauticExtendeeAnalyticsBundle',
    'description' => 'Google Analytics integration for Mautic',
    'author'      => 'kuzmany.biz',
    'version'     => '1.0.0',
    'routes'      => [
        'public' => [
            
        ],
    ],
    'services'    => [
        'events'       => [
            'mautic.plugin.extendee.analytics.inject.custom.content.subscriber' => [
                'class'     => \MauticPlugin\MauticExtendeeAnalyticsBundle\EventListener\InjectCustomContentSubscriber::class,
                'arguments' => [
                    'mautic.helper.integration',
                    'mautic.helper.templating',
                    'translator',
                    'router',
                ],
            ],
        ],
        'integrations' => [
            'mautic.integration.EAnalytics' => [
                'class' => \MauticPlugin\MauticExtendeeAnalyticsBundle\Integration\EAnalyticsIntegration::class,
            ],
        ],
    ],
];
