<?php

namespace Mask_Form_Elementor;


/**
 * Form to Google Sheet Action
 */

if (!defined('ABSPATH')) {
    exit;
}

use HelloPlus\Modules\Forms\Classes\Action_Base;

class Sheet_HelloPlus_Action extends Action_Base
{
    /**
     * Unique action name (slug!)
     */
    public function get_name() : string {
        return 'Save Submissions in Google Sheet';
    }

    /**
     * Label shown in UI
     */
    public function get_label(): string {
        return esc_html__('Save Submissions in Google Sheet','mask-form-elementor');
    }

    public function add_prefix( $id ) {
        return 'fdbgp_' . $id;
    }

    /**
     * Settings panel
     */
    public function register_settings_section($widget) {
        $widget->start_controls_section(
             $this->add_prefix('section_google_sheets'),
            [
                'label'     => esc_html__('Save Submissions in Google Sheet','mask-form-elementor'),
                'condition' => [
                    'cool_formkit_submit_actions' => $this->get_name(),
                ],
            ]
        );

        $widget->add_control(
            $this->add_prefix('fdbgp_plugin_marketing'),
            [
                'name'      => 'fdbgp_plugin_marketing',
                'label'     => '',
                'type'      => \Elementor\Controls_Manager::RAW_HTML,
                'raw'       => '<div class="elementor-control-raw-html cool-form-wrp"><div class="elementor-control-notice elementor-control-notice-type-info">
											<div class="elementor-control-notice-icon"><img class="mfe-highlight-icon" src="' . esc_url(MFE_PLUGIN_URL . 'admin/marketing/images/mfe-highlight-icon.svg') . '" width="250" alt="Highlight Icon" /></div>
											<div class="elementor-control-notice-main">
												
												<div class="elementor-control-notice-main-content">Save Form Submissions to Google Sheets.</div>
												<div class="elementor-control-notice-main-actions">
												<button type="button" class="elementor-button e-btn e-info e-btn-1 mfe-install-plugin" data-plugin="form-db" data-nonce="' . esc_attr(wp_create_nonce('mfe_install_nonce')) . '">Install FormsDB</button>
											</div></div>
											</div></div>',

            ]
        );

        $widget->end_controls_section();
    }

    /**
     * Export handler
     */
    public function on_export($element) {
    }

    /**
     * Run on submit
     */
    public function run($record, $ajax_handler) {
        
    }

    
}