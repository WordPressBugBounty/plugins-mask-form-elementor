<?php

// Ensure the file is being accessed through the WordPress admin area
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound	

if (!defined('ABSPATH')) {
    die;
}

$form_mask_installed_date = get_option('fme-installDate');
$conditional_fields_installed_date = get_option('cfef-installDate');
$conditional_fields_pro_installed_date = get_option('cfefp-installDate');
$country_code_installed_date = get_option('ccfef-installDate');

// New: read stored oldest plugin (set once)
$stored_oldest_plugin = get_option('oldest_plugin');

$plugins_dates = [
    'fim_plugin'  => $form_mask_installed_date,
    'cfef_plugin' => $conditional_fields_installed_date,
    'cfefp_plugin' => $conditional_fields_pro_installed_date,
    'ccfef_plugin' => $country_code_installed_date,
];

$plugins_dates = array_filter($plugins_dates);

$install_by_plugin = get_option('mask-form-install-by');

if ( ! empty( $install_by_plugin ) ) {
    $first_plugin = $install_by_plugin;
} elseif ( ! empty( $stored_oldest_plugin ) ) {
    $first_plugin = $stored_oldest_plugin;
} else {

    if (!empty($plugins_dates)) {
        asort($plugins_dates);
        $first_plugin = key($plugins_dates);
    } else {
        $first_plugin = 'mfe_plugin';
    }

    // Store it so it never changes on re-install
    update_option('oldest_plugin', $first_plugin);
}




?>
<div class="cfkef-license-box">
    <div class="wrapper-header">
        <div class="cfkef-save-all">
            <div class="cfkef-title-desc">
                <h2><?php esc_html_e('License Key', 'mask-form-elementor'); ?></h2>
            </div>
            <div class="cfkef-save-controls">
                <span><?php esc_html_e('Free', 'mask-form-elementor'); ?></span>
                <a class="button button-primary upgrade-pro-btn" target="_blank" href="https://coolformkit.com/pricing/?utm_source=<?php echo esc_attr($first_plugin); ?>&utm_medium=inside&utm_campaign=get_pro&utm_content=license_dashboard">
                    <img class="crown-diamond-pro" src="<?php echo esc_url(MFE_PLUGIN_URL . 'assets/images/crown-diamond-pro.png'); ?>" alt="Cool FormKit Logo">
                    <?php esc_html_e('Upgrade To Pro', 'mask-form-elementor'); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="wrapper-body">
        <p><?php esc_html_e('Your license key provides access to pro version updates and support.', 'mask-form-elementor'); ?></p>
        <p><?php esc_html_e('You\'re using ', 'mask-form-elementor'); ?><strong><?php esc_html_e('free plugin ', 'mask-form-elementor'); ?></strong><?php esc_html_e('- no license needed. Enjoy! 😊', 'mask-form-elementor'); ?></p>
        <div class="cfkef-license-upgrade-box">
            <p><?php esc_html_e('To unlock more features, consider ', 'mask-form-elementor'); ?><a href="https://coolformkit.com/pricing/?utm_source=<?php echo esc_attr($first_plugin); ?>&utm_medium=inside&utm_campaign=get_pro&utm_content=license_dashboard" target="_blank"><?php esc_html_e('upgrading to Pro', 'mask-form-elementor'); ?></a>.
            </p>
            <em><?php esc_html_e('As a valued user, you automatically receive an exclusive discount on the Annual License and an even greater discount on the POPULAR Lifetime License at checkout!', 'mask-form-elementor'); ?></em>
        </div>


        <div class="pro-plugin-buy cfkef-license-upgrade-box">

            <p><?php esc_html_e('Have you purchased pro plugin?', 'mask-form-elementor'); ?></p>



            <div class="pro-plugin-buy-buttons-con">

                <a class="button button-primary pro-bought-btn" target="_blank" href="https://my.coolplugins.net/account/downloads">
                    <?php esc_html_e('Yes', 'mask-form-elementor'); ?>
                </a>


                <a class="button button-primary no-pro-buy-btn" target="_blank" href="https://coolformkit.com/pricing/?utm_source=<?php echo esc_attr($first_plugin); ?>&utm_medium=inside&utm_campaign=get_pro&utm_content=license_dashboard">
                    <?php esc_html_e('No', 'mask-form-elementor'); ?>
                </a>
            </div>

            <em>If you've purchased the Pro plugin, download it from <a href="https://my.coolplugins.net/account/downloads/">my.coolplugins.net</a>, deactivate the free plugin, then install and activate the Pro version along with the license.</em>

        </div>

    </div>
</div>