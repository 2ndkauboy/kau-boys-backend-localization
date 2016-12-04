<?php
/**
 * Class Backend_Localization
 *
 * package kau-boys-backend-localization
 *
 * @wp-plugin
 * Plugin Name: Backend Localization
 * Plugin URI: http://kau-boys.com/230/wordpress/kau-boys-backend-localization-plugin
 * Description: This plugin enables you to run your blog in a different language than the backend of your blog. So you can serve your blog using e.g. German as the default language for the users, but keep English as the language for the administration.
 * Version: 2.1.7
 * Requires at least: 3.2
 * Tested up to: 4.1
 * Author: Bernhard Kau
 * Author URI: http://kau-boys.com
 */

add_action(
	'plugins_loaded',
	array( Backend_Localization::get_instance(), 'plugin_setup' ),
	1 // Sets the top priority of 1 to make sure that the load_textdomain call of all other plugins load the correct locale
);

/**
 * Class Backend_Localization
 *
 * package kau-boys-backend-localization
 */
class Backend_Localization {

	/**
	 * Plugin instance.
	 *
	 * @see   get_instance()
	 * @type  object
	 */
	protected static $instance = null;

	/**
	 * Constructor.
	 * Intentionally left empty and public.
	 *
	 * @see    plugin_setup()
	 */
	public function __construct() {
	}

	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @return  self object of this class
	 */
	public static function get_instance() {

		null === self::$instance and self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Used for regular plugin work.
	 *
	 * @wp-hook  plugins_loaded
	 * @return   void
	 */
	public function plugin_setup() {

		$this->plugin_url  = plugins_url( '/', __FILE__ );
		$this->plugin_path = plugin_dir_path( __FILE__ );

		// register autoloader
		spl_autoload_register( array( $this, 'autoload' ) );

		add_filter( 'plugin_action_links', array( $this, 'add_settings_link' ), 10, 2 );

		add_action( 'login_form', array( $this, 'login_form' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_login', array( $this, 'set_login_language' ) );

		add_action( 'login_form_locale', array( $this, 'localize_backend' ) );
		add_action( 'login_head', array( $this, 'localize_backend' ) );
		add_filter( 'locale', array( $this, 'localize_backend' ) );

		/* load the own textdomain after the locale hook setup */
		$this->load_language( 'kau-boys-backend-localization' );

		/* unset the overwrite on init so that the locale on the "General" settings page is correct */
		add_action( 'after_setup_theme', array( $this, 'remove_locale_filters' ) );
	}

	/**
	 * Loads translation file.
	 *
	 * Accessible to other classes to load different language files (admin and front-end for example).
	 *
	 * @wp-hook init
	 *
	 * @param   string $domain The text domain for this plugin
	 *
	 * @return  void
	 */
	public function load_language( $domain ) {

		load_plugin_textdomain(
			$domain,
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);
	}

	/**
	 * The autoloader for this plugin
	 *
	 * @param string $class The class name to autoload
	 *
	 * @return void
	 */
	public function autoload( $class ) {
		// check if class has the plugin name as a prefix
		if ( strpos( $class, __CLASS__ ) !== 0 ) {
			return;
		}
		$class = str_replace( __CLASS__ . '_', '', $class );
		// make the class name lowercase and replace underscores with dashes
		$class = strtolower( str_replace( '_', '-', $class ) );
		// build path to class file
		$path = __DIR__ . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'class-' . $class . '.php';
		// include file if it exists
		if ( file_exists( $path ) ) {
			include( $path );
		}
	}

	public function remove_locale_filters() {
		remove_action( 'login_form_locale', array( $this, 'localize_backend' ) );
		remove_action( 'login_head', array( $this, 'localize_backend' ) );
		remove_filter( 'locale', array( $this, 'localize_backend' ) );
	}

	public function get_installed_languages() {
		$installed_languages = get_available_languages();

		if ( ! in_array( 'en_US', $installed_languages ) ) {
			$installed_languages[] = 'en_US';
		}

		return $installed_languages;
	}

	public function get_available_translations() {
		// get available translations for the translation api
		require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );
		$available_translations = wp_get_available_translations();
		// add en_US to the array
		$available_translations['en_US'] = array( 'english_name' => 'English', 'native_name' => 'English' );

		return $available_translations;
	}

	public function add_settings_link( $links, $file ) {
		// @TODO: CLeanup! Is $this_plugin really needed or is there even a better way to add a settings link?
		static $this_plugin;

		if ( ! $this_plugin ) {
			$this_plugin = plugin_basename( __FILE__ );
		}

		if ( $file == $this_plugin ) {
			$settings_link = '<a href="options-general.php?page=backend_localization">' . __( 'Settings', 'kau-boys-backend-localization' ) . '</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}

	public function login_form() {

		// @TODO: Cleanup! Is this still the current HTML markup or how could it be done else?

		// return if language selection on login screen should be hidden
		if ( get_option( 'kau-boys_backend_localization_loginselect' ) ) {
			return;
		}

		// @TODO: Maybe use wp_get_available_translations(), remove the class with the static functions as well as the autoloader (or comment it out until needed)
		$available_locales   = Backend_Localization_Locales::get_locales();
		$installed_languages = $this->get_installed_languages();
		$backend_locale      = $this->get_locale();

		?>
		<p>
			<label>
				<?php esc_html_e( 'Language', 'kau-boys-backend-localization' ) ?><br />
				<select name="kau-boys_backend_localization_language" id="user_email" class="input" style="width: 100%; color: #555;">
					<?php foreach ( $installed_languages as $locale_value ) : ?>
						<option value="<?php echo $locale_value ?>"<?php echo ( $backend_locale == $locale_value ) ? ' selected="selected"' : '' ?>>
							<?php echo $available_locales[ $locale_value ] . ' (' . $locale_value . ')' ?>
						</option>
					<?php endforeach ?>
				</select>
			</label>
		</p>
		<?php
	}

	/**
	 * Register the settings for the language fallback on the general settings page
	 */
	public function general_settings() {
		add_settings_section( 'backend_localization',  __( 'Backend Localization Settings', 'kau-boys-backend-localization' ), array( $this, 'backend_localization_section' ), 'settings' );
		add_settings_field( 'fallback_locale', __( 'Backend Localization Settings', 'language-fallback' ), array( $this, 'backend_localization_field' ), 'settings', 'language_fallback' );
		register_setting( 'settings', 'backend_localization' );
	}

	public function admin_menu() {

		if ( isset( $_REQUEST['kau-boys_backend_localization_language'] ) ) {
			setcookie( 'kau-boys_backend_localization_language', htmlspecialchars( $_REQUEST['kau-boys_backend_localization_language'] ), strtotime( '+30 day' ), '/' );
		}

		add_options_page( "Kau-Boy's Backend Localization settings", __( 'Backend Language', 'kau-boys-backend-localization' ), 'manage_options', 'backend_localization', array( $this, 'admin_settings' ) );

		$installed_languages = $this->get_installed_languages();
		$available_locales   = Backend_Localization_Locales::get_locales();

		foreach ( $installed_languages as $locale_value ) {
			$link = add_query_arg( 'kau-boys_backend_localization_language', $locale_value );
			$link = ( strpos( $link, 'wp-admin/' ) === false ) ? preg_replace( '#[^?&]*/#i', '', $link ) : preg_replace( '#[^?&]*wp-admin/#i', '', $link );

			if ( strpos( $link, '?' ) === 0 || strpos( $link, 'index.php?' ) === 0 ) {
				if ( current_user_can( 'manage_options' ) ) {
					$link = 'options-general.php?page=backend_localization&godashboard=1&kau-boys_backend_localization_language=' . $locale_value;
				} else {
					$link = 'edit.php?lang=' . $locale_value;
				}
			}

			add_menu_page( $available_locales[ $locale_value ], $available_locales[ $locale_value ], 'read', $link, null, plugin_dir_url( __FILE__ ) . 'flag_icons/' . strtolower( substr( $locale_value, ( strpos( $locale_value, '_' ) * - 1 ) ) ) . '.png' );
		}
	}

	function admin_settings() {

		$settings_saved = false;

		if ( isset( $_POST['save'] ) ) {
			update_option( 'kau-boys_backend_localization_loginselect', $_POST['kau-boys_backend_localization_loginselect'] );
			$settings_saved = true;
		}

		$loginselect = get_option( 'kau-boys_backend_localization_loginselect' );
		$backend_locale = $this->get_locale();
		$available_translations = Backend_Localization::get_instance()->get_available_translations();

		// set default if values haven't been recieved from the database
		if ( empty( $backend_locale ) ) {
			$backend_locale = 'en_US';
		}

		// do redirection for dashboard from the qTranslate Plugin (www.qianqin.de/qtranslate)
		if ( isset( $_GET['godashboard'] ) ) {
			echo '<h2>' . __( 'Switching Language', 'kau-boys-backend-localization' ) . '</h2>'
			     . sprintf( __( 'Switching language to %1$s... If the Dashboard isn\'t loading, use this <a href="%2$s" title="Dashboard">link</a>.', 'kau-boys-backend-localization' ), $available_translations[ $backend_locale ], admin_url() )
			     . '<script type="text/javascript">document.location="' . admin_url() . '";</script>';
			exit();
		}
		?>

		<div class="wrap">
			<h2>Kau-Boy's Backend Localization</h2>
			<?php if ( $settings_saved ) : ?>
				<div id="message" class="updated fade">
					<p><strong><?php esc_html_e( 'Options saved.', 'kau-boys-backend-localization' ) ?></strong></p>
				</div>
			<?php endif ?>
			<p>
				<?php esc_html_e( 'Here you can customize the plugin for your needs.', 'kau-boys-backend-localization' ) ?>
			</p>

			<form method="post" action="">
				<p>
					<input type="checkbox" name="kau-boys_backend_localization_loginselect" id="kau-boys_backend_localization_loginselect"<?php checked( $loginselect, 'on' ); ?>/>
					<label for="kau-boys_backend_localization_loginselect"><?php esc_html_e( 'Hide language selection on login form', 'kau-boys-backend-localization' ) ?></label>
				</p>

				<div>
					<h2><?php esc_html_e( 'Available languages', 'kau-boys-backend-localization' ) ?></h2>
					<?php $installed_languages = $this->get_installed_languages() ?>
					<?php foreach ( $installed_languages as $language ) : ?>
						<input type="radio" value="<?php echo esc_attr( $language ) ?>" id="kau-boys_backend_localization_language_<?php echo esc_attr( $language ) ?>" name="kau-boys_backend_localization_language"<?php checked( $backend_locale, $language ) ?> />
						<label for="kau-boys_backend_localization_language_<?php echo esc_attr( $language ) ?>">
							<?php echo esc_html( $available_translations[ $language ]['native_name'] . ' / ' . $available_translations[ $language ]['english_name'] . ' (' . $language . ')' ) ?>
						</label>
						<br />
					<?php endforeach ?>
				</div>
				<p class="submit">
					<input class="button-primary" name="save" type="submit" value="<?php esc_attr_e( 'Save Changes' ) ?>" />
				</p>
			</form>
		</div>

		<?php
	}

	public function set_login_language() {
		setcookie( 'kau-boys_backend_localization_language', '', strtotime( '-1 hour' ), '/' );
		setcookie( 'kau-boys_backend_localization_language', htmlspecialchars( $_REQUEST['kau-boys_backend_localization_language'] ), strtotime( '+30 day' ), '/' );
	}


	public function get_locale() {
		return isset( $_REQUEST['kau-boys_backend_localization_language'] )
			? htmlspecialchars( $_REQUEST['kau-boys_backend_localization_language'] )
			: ( isset( $_COOKIE['kau-boys_backend_localization_language'] )
				? $_COOKIE['kau-boys_backend_localization_language']
				: get_option( 'kau-boys_backend_localization_language' ) );
	}

	public function localize_backend( $locale ) {
		// set language if user is in admin area
		if ( defined( 'WP_ADMIN' ) || ( isset( $_REQUEST['pwd'] ) && isset( $_REQUEST['kau-boys_backend_localization_language'] ) ) ) {
			// ajax call from frontend
			if ( 'admin-ajax.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) && ( isset( $_SERVER['HTTP_REFERER'] ) && strpos( $_SERVER['HTTP_REFERER'], admin_url() ) === false ) ) {
				// if lang request param was set, change locale for AJAX response, else, don't overwrite locale (use frontend locale)
				if ( ! empty( $_REQUEST['lang'] ) ) {
					$locale = $_REQUEST['lang'];
				}
			} else {
				$backend_locale = $this->get_locale();
				// make sure a backend locale could be found
				if ( ! empty( $backend_locale ) ) {
					$locale = $backend_locale;
				}
			}
		}

		return $locale;
	}
}
