<?php
	/*
	Plugin Name: Backend Localization
	Plugin URI: http://kau-boys.com/230/wordpress/kau-boys-backend-localization-plugin
	Description: This plugin enables you to run your blog in a different language than the backend of your blog. So you can serve your blog using e.g. German as the default language for the users, but keep English as the language for the administration.
	Version: 2.1.10
	Requires at least: 3.2
	Tested up to: 4.1
	Author: Bernhard Kau
	Author URI: http://kau-boys.com
	*/

	define( 'BACKEND_LOCALIZATION_URL', WP_PLUGIN_URL . '/' . str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ) );

	$wp_locale_all = array();

	function init_backend_localization() {
		global $wp_locale_all;

		load_plugin_textdomain( 'backend-localization', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

		// locales available in the I18n repository: http://svn.automattic.com/wordpress-i18n/
		// Names lookup: http://svn.glotpress.org/trunk/locales/locales.php, http://www-01.sil.org/iso639-3/codes.asp
		$wp_locale_all = array(
			'af'     => __( 'Afrikaans', 'backend-localization' ),
			'am'     => __( 'Amharic', 'backend-localization' ),
			'an'     => __( 'Aragonese', 'backend-localization' ),
			'ar'     => __( 'Arabic', 'backend-localization' ),
			'as'     => __( 'Assamese', 'backend-localization' ),
			'az'     => __( 'Azerbaijani', 'backend-localization' ),
			'az_TR'  => __( 'Azerbaijani (Turkey)', 'backend-localization' ),
			'azb'    => __( 'South Azerbaijani', 'backend-localization' ),
			'bcc'    => __( 'Balochi Southern', 'backend-localization' ),
			'bel'    => __( 'Belarusian', 'backend-localization' ),
			'bg_BG'  => __( 'Bulgarian', 'backend-localization' ),
			'bn_BD'  => __( 'Bengali', 'backend-localization' ),
			'bo'     => __( 'Tibetan', 'backend-localization' ),
			'bs_BA'  => __( 'Bosnian', 'backend-localization' ),
			'ca'     => __( 'Catalan', 'backend-localization' ),
			'ckb'    => __( 'Kurdish', 'backend-localization' ),
			'co'     => __( 'Corsican', 'backend-localization' ),
			'cpp'    => __( 'Cape Verdean Creole', 'backend-localization' ),
			'cs_CZ'  => __( 'Czech', 'backend-localization' ),
			'cy'     => __( 'Cymraeg (Welsh)', 'backend-localization' ),
			'da_DK'  => __( 'Danish', 'backend-localization' ),
			'de_DE'  => __( 'German', 'backend-localization' ),
			'de_CH'  => __( 'German (Switzerland)', 'backend-localization' ),
			'dv'     => __( 'Divehi/Maldivian', 'backend-localization' ),
			'el'     => __( 'Greek', 'backend-localization' ),
			'en_AU'  => __( 'English (Australia)', 'backend-localization' ),
			'en_US'  => __( 'English', 'backend-localization' ),
			'en_CA'  => __( 'English (Canada)', 'backend-localization' ),
			'en_GB'  => __( 'English (United Kingdom)', 'backend-localization' ),
			'eo'     => __( 'Esperanto', 'backend-localization' ),
			'es_AR'  => __( 'Spanish (Argentina)', 'backend-localization' ),
			'es_CL'  => __( 'Spanish (Chile)', 'backend-localization' ),
			'es_ES'  => __( 'Spanish', 'backend-localization' ),
			'es_MX'  => __( 'Spanish (Mexico)', 'backend-localization' ),
			'es_PE'  => __( 'Spanish (Peru)', 'backend-localization' ),
			'es_VE'  => __( 'Spanish (Venezuela)', 'backend-localization' ),
			'et'     => __( 'Estonian', 'backend-localization' ),
			'eu'     => __( 'Basque', 'backend-localization' ),
			'fa_AF'  => __( 'Persian (Afghanistan)', 'backend-localization' ),
			'fa_IR'  => __( 'Persian', 'backend-localization' ),
			'fi'     => __( 'Finnish', 'backend-localization' ),
			'fo'     => __( 'Faroese', 'backend-localization' ),
			'fr_BE'  => __( 'French (Belgium)', 'backend-localization' ),
			'fr_FR'  => __( 'French', 'backend-localization' ),
			'fuc'    => __( 'Fulah', 'backend-localization' ),
			'fy'     => __( 'Western Frisian', 'backend-localization' ),
			'ga'     => __( 'Gaeilge/Irish', 'backend-localization' ),
			'gd'     => __( 'Scottish Gaelic', 'backend-localization' ),
			'gl_ES'  => __( 'Galician', 'backend-localization' ),
			'gsw'    => __( 'Swiss German', 'backend-localization' ),
			'gu'     => __( 'Gujarati', 'backend-localization' ),
			'haw_US' => __( 'Hawaiian', 'backend-localization' ),
			'haz'    => __( 'Hazaragi', 'backend-localization' ),
			'he_IL'  => __( 'Hebrew', 'backend-localization' ),
			'hi_IN'  => __( 'Hindi', 'backend-localization' ),
			'hr'     => __( 'Croatian', 'backend-localization' ),
			'hu_HU'  => __( 'Hungarian', 'backend-localization' ),
			'hy'     => __( 'Armenian', 'backend-localization' ),
			'id_ID'  => __( 'Indonesian', 'backend-localization' ),
			'ido'    => __( 'Ido', 'backend-localization' ),
			'is_IS'  => __( 'Icelandic', 'backend-localization' ),
			'it_IT'  => __( 'Italian', 'backend-localization' ),
			'ja'     => __( 'Japanese', 'backend-localization' ),
			'jv_ID'  => __( 'Javanese', 'backend-localization' ),
			'ka_GE'  => __( 'Georgian', 'backend-localization' ),
			'kea'    => __( 'Kabuverdianu', 'backend-localization' ),
			'kin'    => __( 'Kinyarwanda', 'backend-localization' ),
			'kk'     => __( 'Kazakh', 'backend-localization' ),
			'kn'     => __( 'Kannada', 'backend-localization' ),
			'ko_KR'  => __( 'Korean', 'backend-localization' ),
			'ku'     => __( 'Kurdish', 'backend-localization' ),
			'ky_KY'  => __( 'Kyrgyz', 'backend-localization' ),
			'la'     => __( 'Latin', 'backend-localization' ),
			'li'     => __( 'Limburgish', 'backend-localization' ),
			'lo'     => __( 'Lao', 'backend-localization' ),
			'lt_LT'  => __( 'Lithuanian', 'backend-localization' ),
			'lv'     => __( 'Latvian', 'backend-localization' ),
			'me_ME'  => __( 'Montenegrin', 'backend-localization' ),
			'mg_MG'  => __( 'Malagasy', 'backend-localization' ),
			'mk_MK'  => __( 'Macedonian', 'backend-localization' ),
			'ml_IN'  => __( 'Malayalam', 'backend-localization' ),
			'mn'     => __( 'Mongolian', 'backend-localization' ),
			'mr'     => __( 'Marathi', 'backend-localization' ),
			'mri'    => __( 'Maori', 'backend-localization' ),
			'ms_MY'  => __( 'Malay', 'backend-localization' ),
			'my_MM'  => __( 'Burmese (Myanmar)', 'backend-localization' ),
			'nb_NO'  => __( 'Norwegian (Bokm&aring;l)', 'backend-localization' ),
			'ne_NP'  => __( 'Nepali', 'backend-localization' ),
			'nl'     => __( 'Dutch', 'backend-localization' ),
			'nl_BE'  => __( 'Dutch (Belgium)', 'backend-localization' ),
			'nl_NL'  => __( 'Dutch (Netherlands)', 'backend-localization' ),
			'nn_NO'  => __( 'Norwegian (Nynorsk)', 'backend-localization' ),
			'ory'    => __( 'Oriya', 'backend-localization' ),
			'os'     => __( 'Ossetic/Ossetian', 'backend-localization' ),
			'pa_IN'  => __( 'Punjabi', 'backend-localization' ),
			'pap'    => __( 'Papiamento', 'backend-localization' ),
			'pl_PL'  => __( 'Polish', 'backend-localization' ),
			'pt_BR'  => __( 'Portuguese (Brazil)', 'backend-localization' ),
			'pt_PT'  => __( 'Portuguese', 'backend-localization' ),
			'rhg'    => __( 'Rohingya', 'backend-localization' ),
			'ro_RO'  => __( 'Romanian', 'backend-localization' ),
			'ru_RU'  => __( 'Russian', 'backend-localization' ),
			'ru_UA'  => __( 'Russian (Ukraine)', 'backend-localization' ),
			'sa_IN'  => __( 'Sanskrit', 'backend-localization' ),
			'sah'    => __( 'Sakha', 'backend-localization' ),
			'sd_PK'  => __( 'Sindhi', 'backend-localization' ),
			'si_LK'  => __( 'Sinhalese', 'backend-localization' ),
			'sk_SK'  => __( 'Slovak', 'backend-localization' ),
			'sl_SI'  => __( 'Slovenian', 'backend-localization' ),
			'so_SO'  => __( 'Somali', 'backend-localization' ),
			'sq'     => __( 'Albanian', 'backend-localization' ),
			'sr_RS'  => __( 'Serbian', 'backend-localization' ),
			'srd'    => __( 'Sardinian', 'backend-localization' ),
			'su_ID'  => __( 'Sundanese', 'backend-localization' ),
			'sv_SE'  => __( 'Swedish', 'backend-localization' ),
			'sw'     => __( 'Swahili', 'backend-localization' ),
			'ta_IN'  => __( 'Tamil', 'backend-localization' ),
			'ta_LK'  => __( 'Tamil (Sri Lanka)', 'backend-localization' ),
			'te'     => __( 'Telugu', 'backend-localization' ),
			'tg'     => __( 'Tajik', 'backend-localization' ),
			'th'     => __( 'Thai', 'backend-localization' ),
			'tl'     => __( 'Tagalog', 'backend-localization' ),
			'tr_TR'  => __( 'Turkish', 'backend-localization' ),
			'tt_RU'  => __( 'Tatar', 'backend-localization' ),
			'tuk'    => __( 'Turkmen', 'backend-localization' ),
			'tzm'    => __( 'Tamazight (Central Atlas)', 'backend-localization' ),
			'ug_CN'  => __( 'Uighur', 'backend-localization' ),
			'uk'     => __( 'Ukrainian', 'backend-localization' ),
			'ur'     => __( 'Urdu', 'backend-localization' ),
			'uz_UZ'  => __( 'Uzbek', 'backend-localization' ),
			'vi'     => __( 'Vietnamese', 'backend-localization' ),
			'zh_CN'  => __( 'Chinese', 'backend-localization' ),
			'zh_HK'  => __( 'Chinese (Hong Kong)', 'backend-localization' ),
			'zh_TW'  => __( 'Chinese (Taiwan)', 'backend-localization' )
		);
	}

	function backend_localization_admin_menu() {
		global $wp_locale_all;

		add_options_page( "Kau-Boy's Backend Localization settings", __( 'Backend Language', 'backend-localization' ), 'manage_options', 'backend_localization', 'backend_localization_admin_settings' );

		$backend_locale_array = backend_localization_get_languages();

		foreach ( $backend_locale_array as $locale_value ) {
			$link = add_query_arg( 'kau-boys_backend_localization_language', $locale_value );
			$link = ( strpos( $link, 'wp-admin/' ) === false ) ? preg_replace( '#[^?&]*/#i', '', $link ) : preg_replace( '#[^?&]*wp-admin/#i', '', $link );

			if ( strpos( $link, '?' ) === 0 || strpos( $link, 'index.php?' ) === 0 ) {
				if ( current_user_can( 'manage_options' ) ) {
					$link = 'options-general.php?page=backend_localization&godashboard=1&kau-boys_backend_localization_language=' . $locale_value;
				} else {
					$link = 'edit.php?lang=' . $locale_value;
				}
			}

			add_menu_page( __( $wp_locale_all[ $locale_value ], 'backend_localization' ), $wp_locale_all[ $locale_value ], 'read', $link, null, BACKEND_LOCALIZATION_URL . 'flag_icons/' . strtolower( substr( $locale_value, ( strpos( $locale_value, '_' ) * - 1 ) ) ) . '.png' );
		}
	}

	function backend_localization_filter_plugin_actions( $links, $file ) {
		static $this_plugin;

		if ( ! $this_plugin ) {
			$this_plugin = plugin_basename( __FILE__ );
		}

		if ( $file == $this_plugin ) {
			$settings_link = '<a href="options-general.php?page=backend_localization">' . __( 'Settings' ) . '</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}

	function backend_localization_admin_settings() {
		global $wp_locale_all, $wp_version;

		$settings_saved = false;

		if ( isset( $_POST[ 'save' ] ) ) {
			update_option( 'kau-boys_backend_localization_loginselect', $_POST[ 'kau-boys_backend_localization_loginselect' ] );
			$settings_saved = true;
		}

		$loginselect = get_option( 'kau-boys_backend_localization_loginselect' );
		$backend_locale = backend_localization_get_locale();

		// set default if values haven't been recieved from the database
		if ( empty( $backend_locale ) ) {
			$backend_locale = 'en_US';
		}

		// do redirection for dashboard from the qTranslate Plugin (www.qianqin.de/qtranslate)
		if ( isset( $_GET[ 'godashboard' ] ) ) {
			echo '<h2>' . __( 'Switching Language', 'backend-localization' ) . '</h2>'
			     . sprintf( __( 'Switching language to %1$s... If the Dashboard isn\'t loading, use this <a href="%2$s" title="Dashboard">link</a>.', 'backend-localization' ), $wp_locale_all[ $backend_locale ], admin_url() )
			     . '<script type="text/javascript">document.location="' . admin_url() . '";</script>';
			exit();
		}
		?>

		<div class="wrap">
			<h2>Kau-Boy's Backend Localization</h2>
			<?php if ( $settings_saved ) : ?>
				<div id="message" class="updated fade">
					<p><strong><?php _e( 'Options saved.' ) ?></strong></p>
				</div>
			<?php endif ?>
			<p>
				<?php _e( 'Here you can customize the plugin for your needs.', 'backend-localization' ) ?>
			</p>
			<form method="post" action="">
				<p>
					<input type="checkbox" name="kau-boys_backend_localization_loginselect" id="kau-boys_backend_localization_loginselect"<?php echo ( $loginselect == 'on' ) ? ' checked="checked"' : '' ?>/>
					<label for="kau-boys_backend_localization_loginselect"><?php _e( 'Hide language selection on login form', 'backend-localization' ) ?></label>
				</p>
				<div>
					<h2><?php _e( 'Available languages', 'backend-localization' ) ?></h2>
					<?php $backend_locale_array = backend_localization_get_languages() ?>
					<?php foreach ( $backend_locale_array as $locale_value ) : ?>
						<input type="radio" value="<?php echo esc_attr( $locale_value ) ?>" id="kau-boys_backend_localization_language_<?php echo esc_attr( $locale_value ) ?>" name="kau-boys_backend_localization_language"<?php echo ( $backend_locale == $locale_value ) ? ' checked="checked"' : '' ?> />
						<label for="kau-boys_backend_localization_language_<?php echo esc_attr( $locale_value ) ?>" style="width: 200px; display: inline-block;">
							<img src="<?php echo BACKEND_LOCALIZATION_URL . 'flag_icons/' . strtolower( substr( $locale_value, ( strpos( $locale_value, '_' ) * - 1 ) ) ) . '.png' ?>" alt="<?php echo esc_attr( $locale_value ) ?>" />
							<?php echo esc_html( $wp_locale_all[ $locale_value ] . ' (' . $locale_value . ')' ) ?>
						</label>
						<br />
					<?php endforeach ?>
					<div class="description">
						<?php echo sprintf( __( 'If your language isn\'t listed, you have to download the right version from the WordPress repository: <a href="http://svn.automattic.com/wordpress-i18n">http://svn.automattic.com/wordpress-i18n</a>. Browser to the language folder of your choice and get the <b>all</b> .mo files for your WordPress Version from <i><b>tags/%1s/messages/</b></i> or from the <i><b>trunk/messages/</b></i> folder. Upload them to the langauge folder <i>%2s</i>. You should than be able to choose the new language (or after a refresh of this page).', 'kau-boys-backend-localization' ), $wp_version, WP_LANG_DIR ) ?>
					</div>
				</div>
				<p class="submit">
					<input class="button-primary" name="save" type="submit" value="<?php _e( 'Save Changes' ) ?>" />
				</p>
			</form>
		</div>

	<?php
	}

	function backend_localization_get_languages() {
		$backend_locale_array = array();

		if ( is_dir( WP_LANG_DIR ) ) {
			$files = glob( WP_LANG_DIR . '/*.mo' );

			/* read the array */
			foreach ( $files as $file ) {
				$fileParts = pathinfo( $file );

				if ( strlen( $fileParts[ 'filename' ] ) <= 5 ) {
					$fileParts[ 'filename' ] = substr( $fileParts[ 'basename' ], 0, strpos( $fileParts[ 'basename' ], '.' ) );
					$backend_locale_array[ ] = $fileParts[ 'filename' ];
				}
			}
		}

		if ( ! in_array( 'en_US', $backend_locale_array ) ) {
			$backend_locale_array[ ] = 'en_US';
		}

		sort( $backend_locale_array );

		return $backend_locale_array;
	}

	function backend_localization_save_setting() {

		if ( isset( $_REQUEST[ 'kau-boys_backend_localization_language' ] ) ) {
			setcookie( 'kau-boys_backend_localization_language', htmlspecialchars( $_REQUEST[ 'kau-boys_backend_localization_language' ] ), strtotime( '+30 day' ), '/' );
		}

		return true;
	}

	function backend_localization_login_form() {
		global $wp_locale_all;

		// return if language selection on login screen should be hidden
		if ( get_option( 'kau-boys_backend_localization_loginselect' ) ) {
			return;
		}

		$backend_locale_array = backend_localization_get_languages();
		$backend_locale       = backend_localization_get_locale();
		?>
		<p>
			<label>
				<?php _e( 'Language', 'kau-boys-backend-localization' ) ?><br />
				<select name="kau-boys_backend_localization_language" id="user_email" class="input" style="width: 100%; color: #555;">
					<?php foreach ( $backend_locale_array as $locale_value ) : ?>
						<option value="<?php echo $locale_value ?>"<?php echo ( $backend_locale == $locale_value ) ? ' selected="selected"' : '' ?>>
							<?php echo $wp_locale_all[ $locale_value ] . ' (' . $locale_value . ')' ?>
						</option>
					<?php endforeach ?>
				</select>
			</label>
		</p>
	<?php
	}

	function backend_localization_get_locale() {
		return isset( $_REQUEST[ 'kau-boys_backend_localization_language' ] )
			? htmlspecialchars( $_REQUEST[ 'kau-boys_backend_localization_language' ] )
			: ( isset( $_COOKIE[ 'kau-boys_backend_localization_language' ] )
				? $_COOKIE[ 'kau-boys_backend_localization_language' ]
				: get_option( 'kau-boys_backend_localization_language' ) );
	}

	function localize_backend( $locale ) {
		// set language if user is in admin area
		if ( defined( 'WP_ADMIN' ) || ( isset( $_REQUEST[ 'pwd' ] ) && isset( $_REQUEST[ 'kau-boys_backend_localization_language' ] ) ) ) {
			// ajax call from frontend
			if ( 'admin-ajax.php' == basename( $_SERVER[ 'SCRIPT_FILENAME' ] ) && ( isset( $_SERVER[ 'HTTP_REFERER' ] ) && strpos( $_SERVER[ 'HTTP_REFERER' ], admin_url() ) === false ) ) {
				// if lang request param was set, change locale for AJAX response, else, don't overwrite locale (use frontend locale)
				if ( ! empty( $_REQUEST[ 'lang' ] ) ) {
					$locale = $_REQUEST[ 'lang' ];
				}
			} else {
				$backend_locale = backend_localization_get_locale();
				// make sure a backend locale could be found
				if ( ! empty( $backend_locale ) ) {
					$locale = $backend_locale;
				}
			}
		}

		return $locale;
	}

	function backend_localization_set_login_language() {
		setcookie( 'kau-boys_backend_localization_language', "", strtotime( '-1 hour' ), '/' );
		setcookie( 'kau-boys_backend_localization_language', htmlspecialchars( $_REQUEST[ 'kau-boys_backend_localization_language' ] ), strtotime( '+30 day' ), '/' );
	}

	/**
	 * Add deprecation notice in WP Admin.
	 */
	function backend_localization_deprecation_notice() {
		// Only show notice for users who can actually uninstall or update plugins.
		if ( ! current_user_can( 'delete_plugins' ) && ! current_user_can( 'update_plugins' ) ) {
			return;
		}

		global $wp_version;
		?>
		<div class="notice notice-warning">
			<p>
				<?php echo wp_kses(
					__( 'Backend Localization <b>is deprecated and will be removed</b> from the plugin directory on <b>September 2, 2023</b>, 14 years after its first release. With WordPress version 4.7, released in December 2016, <a href="https://make.wordpress.org/core/2016/11/07/user-admin-languages-and-locale-switching-in-4-7/#content">the main purpose of this plugin</a> was integrated into core. With WordPress version 5.9, released in February 2022, <a href="https://make.wordpress.org/core/2021/12/20/introducing-new-language-switcher-on-the-login-screen-in-wp-5-9/#content">the only useful missing feature</a> was also integrated into core.', 'backend-localization' ),
					array( 'a' => array( 'href' => array() ), 'b' => array() )
				); ?>
			</p>
			<p>
				<?php echo wp_kses(
					__( 'Thanks to everyone who used the plugin, gave constructive feedback, rated it and send me messages on how it helped them with their sites. This was my second WordPress plugin, and it\'s surprising still has 2000+ active installations. If you see this message, you are one of them. But now feel free to remove it from your site. You can find my other plugins <a href="https://profiles.wordpress.org/kau-boy/#content-plugins">on my WordPress profile page</a>.', 'backend-localization' ),
					array( 'a' => array( 'href' => array() ) )
				); ?>
			</p>
		</div>
		<?php
	}

	add_action( 'init', 'init_backend_localization' );
	add_action( 'admin_menu', 'backend_localization_admin_menu' );
	add_action( 'admin_menu', 'backend_localization_save_setting' );
	add_action( 'wp_login', 'backend_localization_set_login_language' );
	add_action( 'login_form_locale', 'localize_backend' );
	add_action( 'login_head', 'localize_backend' );
	add_action( 'login_form', 'backend_localization_login_form' );
	add_filter( 'plugin_action_links', 'backend_localization_filter_plugin_actions', 10, 2 );
	add_filter( 'locale', 'localize_backend' );
	add_action( is_network_admin() ? 'network_admin_notices' : 'admin_notices', 'backend_localization_deprecation_notice' );

