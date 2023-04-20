<?php
if (!is_admin()) {
    return;
}

function manageme_settings_init()
{
    register_setting('manageme', 'manageme_options');
    register_setting('manageme_api', 'manageme_options');

    add_settings_section('manageme_section_account', __('API Access', 'manageme'), 'manageme_section_account_cb', 'manageme_api');
    add_settings_section('manageme_section_settings', __('Slider Settings', 'manageme'), 'manageme_section_settings_cb', 'manageme');
    add_settings_section('manageme_section_display', __('Slider Responsive', 'manageme'), 'manageme_section_display_cb', 'manageme');
    // API1
    add_settings_field(
        'manageme_field_account',
        __('Identifiant 1', 'manageme'),
        'manageme_field_account_cb',
        'manageme_api',
        'manageme_section_account',
        [
        'label_for' => 'manageme_field_account',
        'class' => 'manageme_row'
        ]
    );
    //API2
    add_settings_field(
        'manageme_field_account2',
        __('Identifiant 2', 'manageme'),
        'manageme_field_account_cb2',
        'manageme_api',
        'manageme_section_account',
        [
        'label_for' => 'manageme_field_account2',
        'class' => 'manageme_row'
        ]
    );
    // Autoplay
    add_settings_field(
        'manageme_field_autoplay',
        __('Autoplay', 'manageme'),
        'manageme_field_autoplay_cb',
        'manageme',
        'manageme_section_settings',
        [
        'label_for' => 'manageme_field_autoplay',
        'class' => 'manageme_row'
        ]
    );
    // smartspeed
    add_settings_field(
        'manageme_field_smartspeed',
        __('Speed (ms)', 'manageme'),
        'manageme_field_smartspeed_cb',
        'manageme',
        'manageme_section_settings',
        [
        'label_for' => 'manageme_field_smartspeed',
        'class' => 'manageme_row'
        ]
    );
    // marge
    add_settings_field(
        'manageme_field_marge',
        __('Marge (px)', 'manageme'),
        'manageme_field_marge_cb',
        'manageme',
        'manageme_section_settings',
        [
        'label_for' => 'manageme_field_marge',
        'class' => 'manageme_row'
        ]
    );
    // Loop
    add_settings_field(
        'manageme_field_loop',
        __('Boucle', 'manageme'),
        'manageme_field_loop_cb',
        'manageme',
        'manageme_section_settings',
        [
        'label_for' => 'manageme_field_loop',
        'class' => 'manageme_row'
        ]
    );
    // Navigation texte
    add_settings_field(
        'manageme_field_navtext',
        __('Contenu des boutons Suiv./Prec.', 'manageme'),
        'manageme_field_navtext_cb',
        'manageme',
        'manageme_section_settings',
        [
        'label_for' => 'manageme_field_navtext',
        'class' => 'manageme_row'
        ]
    );
    // small
    add_settings_field(
        'manageme_field_break_small',
        __('Small - Breakpoint(px) ', 'manageme'),
        'manageme_field_break_small_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_break_small',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_display_small',
        __('Small - Items ', 'manageme'),
        'manageme_field_display_small_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_display_small',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_nav_small',
        __('Small - Navigation ', 'manageme'),
        'manageme_field_nav_small_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_nav_small',
        'class' => 'manageme_row'
        ]
    );
    // medium
    add_settings_field(
        'manageme_field_break_medium',
        __('Medium - Breakpoint(px)', 'manageme'),
        'manageme_field_break_medium_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_break_medium',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_display_medium',
        __('Medium - Items', 'manageme'),
        'manageme_field_display_medium_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_display_medium',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_nav_medium',
        __('Medium - Navigation', 'manageme'),
        'manageme_field_nav_medium_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_nav_medium',
        'class' => 'manageme_row'
        ]
    );
    // large
    add_settings_field(
        'manageme_field_break_large',
        __('Large - Breakpoint(px)', 'manageme'),
        'manageme_field_break_large_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_break_large',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_display_large',
        __('Large - Items', 'manageme'),
        'manageme_field_display_large_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_display_large',
        'class' => 'manageme_row'
        ]
    );
    add_settings_field(
        'manageme_field_nav_large',
        __('Large - Navigation', 'manageme'),
        'manageme_field_nav_large_cb',
        'manageme',
        'manageme_section_display',
        [
        'label_for' => 'manageme_field_nav_large',
        'class' => 'manageme_row'
        ]
    );
}


function manageme_section_account_cb($args)
{
    ?>
<p id="<?php echo esc_attr($args['id']); ?>">
	<?php esc_html_e('Utiliser un ou des identifiants de sociétés ( par ex:  E9384F2E-B17E-41C1-B182-525360XXXXXX )', 'manageme'); ?>
	<br><strong>Cette valeur est obligatoire</strong>
</p>
<?php
}


function manageme_section_display_cb($args)
{
    ?>
<p id="<?php echo esc_attr($args['id']); ?>">
	<?php esc_html_e("Réglages d'affichage en fonction de trois tailles (small, medium, large)", 'manageme'); ?>
</p>
<?php
}
function manageme_section_settings_cb($args)
{
    ?>
<p id="<?php echo esc_attr($args['id']); ?>">
	<?php esc_html_e("Paramètres", 'manageme'); ?>
</p>
<?php
}



function get_manageme_options($field)
{
    $options = get_option('manageme_options');
    if (is_array($options)) {
        if (array_key_exists($field, $options)) {
            return $options;
        } else {
            return array($field => '');
        }
    }
}

// API1
function manageme_field_account_cb($args)
{
    $options = get_manageme_options('manageme_field_account');
    ?>
<input type="text" class="large-text"
	value="<?php echo esc_attr($options['manageme_field_account']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo $args['label_for']; ?>]">
<?php
}
// API2
function manageme_field_account_cb2($args)
{
    $options = get_manageme_options('manageme_field_account2');
    ?>
<input type="text" class="large-text"
	value="<?php echo esc_attr($options['manageme_field_account2']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
<?php
}

// Display Autoplay Settings

function manageme_field_autoplay_cb($args)
{
    $options = get_manageme_options('manageme_field_autoplay');
    ?>
<input
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]"
	type="checkbox" value="1" <?php checked(
        '1',
        esc_attr($options[ 'manageme_field_autoplay'])
    ); ?> />
<?php
}
// Display SmartSpeed Settings

function manageme_field_smartspeed_cb($args)
{
    $options = get_manageme_options('manageme_field_smartspeed');
    // if ( $options['manageme_field_smartspeed'] === '' ) {
    // 	$options['manageme_field_smartspeed'] = '500' ;
    // }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_smartspeed']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 500)
<?php
}
// Display Loop Settings

function manageme_field_loop_cb($args)
{
    $options = get_manageme_options('manageme_field_loop');
    ?>
<input
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]"
	type="checkbox" value="1" <?php checked(
        '1',
        esc_attr($options[ 'manageme_field_loop'])
    ); ?>
/>
<?php
}
// Display Marge Settings

function manageme_field_marge_cb($args)
{
    $options = get_manageme_options('manageme_field_marge');
    if ($options['manageme_field_marge'] === '') {
        $options['manageme_field_marge'] = '10' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_marge']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 10)
<?php
}
// Display navtext Settings

function manageme_field_navtext_cb($args)
{
    $options = get_manageme_options('manageme_field_navtext');

    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_navtext']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : [&#x27;next&#x27;,&#x27;prev&#x27;])
<?php
}

// Small Display
// display nb large field cb
function manageme_field_break_small_cb($args)
{
    $options = get_manageme_options('manageme_field_break_small');
    if ($options['manageme_field_break_small'] === '') {
        $options['manageme_field_break_small'] = '0' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_break_small']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 0)
<?php
}
// display nb small field cb
function manageme_field_display_small_cb($args)
{
    $options = get_manageme_options('manageme_field_display_small');
    if ($options['manageme_field_display_small'] === '') {
        $options['manageme_field_display_small'] = '1' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_display_small']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 1)
<?php
}
// display nb small field cb
function manageme_field_nav_small_cb($args)
{
    $options = get_manageme_options('manageme_field_nav_small');
    if ($options['manageme_field_nav_small'] === '') {
        $options['manageme_field_nav_small'] = '0' ;
    }
    ?>
<input
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]"
	type="checkbox" value="1" <?php checked(
        '1',
        esc_attr($options[ 'manageme_field_nav_small'])
    ); ?> />
<?php
}
// Medium Display
// display nb large field cb
function manageme_field_break_medium_cb($args)
{
    $options = get_manageme_options('manageme_field_break_medium');
    if ($options['manageme_field_break_medium'] === '') {
        $options['manageme_field_break_medium'] = '600' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_break_medium']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 600)
<?php
}
// display nb medium field cb
function manageme_field_display_medium_cb($args)
{
    $options = get_manageme_options('manageme_field_display_medium');
    if ($options['manageme_field_display_medium'] === '') {
        $options['manageme_field_display_medium'] = '3' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_display_medium']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 3)
<?php
}
// display nb medium field cb
function manageme_field_nav_medium_cb($args)
{
    $options = get_manageme_options('manageme_field_nav_medium');
    if ($options['manageme_field_nav_medium'] === '') {
        $options['manageme_field_nav_medium'] = '0' ;
    }
    ?>
<input
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]"
	type="checkbox" value="1" <?php checked(
        '1',
        esc_attr($options[ 'manageme_field_nav_medium'])
    ); ?> />
<?php
}

// Large Display
// display nb large field cb
function manageme_field_break_large_cb($args)
{
    $options = get_manageme_options('manageme_field_break_large');
    if ($options['manageme_field_break_large'] === '') {
        $options['manageme_field_break_large'] = '1000' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_break_large']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 1000)
<?php
}

// display nb large field cb
function manageme_field_display_large_cb($args)
{
    $options = get_manageme_options('manageme_field_display_large');
    if ($options['manageme_field_display_large'] === '') {
        $options['manageme_field_display_large'] = '4' ;
    }
    ?>
<input type="text"
	value="<?php echo esc_attr($options['manageme_field_display_large']); ?>"
	id="<?php echo esc_attr($args['label_for']); ?>"
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]">
(default : 4)
<?php
}
// display nb large field cb
function manageme_field_nav_large_cb($args)
{
    $options = get_manageme_options('manageme_field_nav_large');
    if ($options['manageme_field_nav_large'] === '') {
        $options['manageme_field_nav_large'] = '0' ;
    }
    ?>
<input
	name="manageme_options[<?php echo esc_attr($args['label_for']); ?>]"
	type="checkbox" value="1" <?php checked(
        '1',
        esc_attr($options[ 'manageme_field_nav_large'])
    ); ?> />
<?php
}

/**
 * top level menu
 */


function manageme_options_page()
{
    // add top level menu page
    add_menu_page(
        'Slider', // string $page_title,
        'ManageMe', // string $menu_title,
        'manage_options', // string $capability,
        'manageme', // string $menu_slug,
        'manageme_options_page_html',// callable $function = '',
        '',  // string $icon_url = '',
        '' // int $position = null
    );
    add_submenu_page(
        'manageme',
        'API',
        'API',
        'manage_options',
        'manageme_api',
        'manageme_options_page_api_html',// callable $function = '',
        '',  // string $icon_url = '',
        '' // int $position = null
    );
}


/**
 * top level menu:
 * callback functions
 */
function manageme_options_page_api_html()
{
    // check user capabilities
    if (! current_user_can('manage_options')) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('manageme_messages', 'manageme_message', __('Settings Saved', 'manageme'), 'updated');
    }

    // show error/update messages
    settings_errors('manageme_messages');

    ?>
<div class="wrap">
	<h1>
		<?php echo esc_html(get_admin_page_title()); ?>
	</h1>
	<div class="notice notice-info">
		exemple de shortcode à utiliser dans les pages du site
		<pre>
			Identifiant 1 : [manageme_slider societyID="id1" serviceid="E665BBD2-88C7-40B2-A7C9-54E8E37FB8BE"]
			Identifiant 2 : [manageme_slider societyID="id2" serviceid="E665BBD2-88C7-40B2-A7C9-54E8E37FB8BE"]
			</pre>
		à savoir : le serviceid est un identifiant de prestations (cf doc API)
	</div>
	<form action="options.php" method="post">
		<?php
            // output security fields for the registered setting "manageme"
            settings_fields('manageme_api');
    // output setting sections and their fields
    // (sections are registered for "manageme", each field is registered to a specific section)
    do_settings_sections('manageme_api');
    ?>
		<?php echo submit_button('Save Settings'); ?>
	</form>
</div>
<?php
}
/**
 * top level menu:
 * callback functions
 */
function manageme_options_page_html()
{
    // check user capabilities
    if (! current_user_can('manage_options')) {
        return;
    }

    // add error/update messages

    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('manageme_messages', 'manageme_message', __('Settings Saved', 'manageme'), 'updated');
    }

    // show error/update messages
    settings_errors('manageme_messages');

    ?>
<div class="wrap">
	<h1>
		<?php echo esc_html(get_admin_page_title()); ?>
	</h1>
	<form action="options.php" method="post">
		<?php
            // output security fields for the registered setting "manageme"
            settings_fields('manageme');
    // output setting sections and their fields
    // (sections are registered for "manageme", each field is registered to a specific section)
    do_settings_sections('manageme');
    ?>
		<?php echo submit_button('Save Settings'); ?>
	</form>
</div>
<?php
}

?>