<?php

namespace MauticPlugin\MauticExtendeeAnalyticsBundle\Integration;

use Mautic\CoreBundle\Form\Type\SortableListType;
use Mautic\PluginBundle\Integration\AbstractIntegration;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class EAnalyticsIntegration extends AbstractIntegration
{
    public function getName()
    {
        // should be the name of the integration
        return 'EAnalytics';
    }

    public function getAuthenticationType()
    {
        /* @see \Mautic\PluginBundle\Integration\AbstractIntegration::getAuthenticationType */
        return 'none';
    }

    /**
     * Get icon for Integration.
     *
     * @return string
     */
    public function getIcon()
    {
        return 'plugins/MauticExtendeeAnalyticsBundle/Assets/img/ExtendeeAnalytics.png';
    }

    /**
     * @param \Mautic\PluginBundle\Integration\Form|FormBuilder $builder
     * @param array                                             $data
     * @param string                                            $formArea
     */
    public function appendToForm(&$builder, $data, $formArea)
    {
        if ($formArea == 'keys') {
            $builder->add(
                'clientId',
                TextType::class,
                [
                    'label'       => 'plugin.extendee.analytics.form.client_id',
                    'attr'        => [
                        'class' => 'form-control',
                    ],
                    'required'    => true,
                    'constraints' => [
                        new NotBlank(
                            ['message' => 'mautic.core.value.required']
                        ),
                    ],
                ]
            );

            $builder->add(
                'viewId',
                TextType::class,
                [
                    'label'       => 'plugin.extendee.analytics.form.view_id',
                    'attr'        => [
                        'class' => 'form-control',
                    ],
                    'required'    => true,
                    'constraints' => [
                        new NotBlank(
                            ['message' => 'mautic.core.value.required']
                        ),
                    ],
                ]
            );

            $builder->add(
                'ecommerce',
                'yesno_button_group',
                [
                    'label'      => $this->translator->trans('plugin.extendee.analytics.ecommerce'),
                    'label_attr' => ['class' => 'control-label'],
                    'attr'       => [
                        'class' => 'form-control',
                    ],
                    'data'=> !empty($data['ecommerce']) ? true: false,
                    'required' => false,
                ]
            );

            $builder->add(
                'currency',
                TextType::class,
                [
                    'label'       => 'plugin.extendee.analytics.form.currency',
                    'attr'        => [
                        'class' => 'form-control',
                        'data-show-on' => '{"integration_details_apiKeys_ecommerce_1":["checked"]}',
                    ],
                    'required' => false,
                ]
            );


            $builder->add(
                'goal',
                'yesno_button_group',
                [
                    'label'      => $this->translator->trans('plugin.extendee.analytics.goals.enabled'),
                    'label_attr' => ['class' => 'control-label'],
                    'attr'       => [
                        'class' => 'form-control',
                    ],
                    'data'=> !empty($data['goal']) ? true : false,
                    'required' => false,
                ]
            );

            $builder->add(
                'goals',
                SortableListType::class,
                [
                    'with_labels'            => true,
                    'label'            => $this->translator->trans('plugin.extendee.analytics.goals'),
                    'add_value_button' => $this->translator->trans('mautic.core.form.add'),
                    'option_notblank'  => false,
                    'attr'=> [
                        'data-show-on' => '{"integration_details_apiKeys_goal_1":["checked"]}',
                    ],
                    'option_required' => false,

                ]
            );

        }
    }

    /**
     * {@inheritdoc}
     *
     * @param $section
     *
     * @return string|array
     */
    public function getFormNotes($section)
    {
        if ('custom' === $section) {
            return [
                'template'   => 'MauticExtendeeAnalyticsBundle:Integration:extendee-analytics.html.php',
                'parameters' => [
                ],
            ];
        }

        return parent::getFormNotes($section);
    }
}
