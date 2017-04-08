<?php
/**
 * Exam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Exam
 */

if ( ! function_exists( 'exam_volovyk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exam_volovyk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Exam, use a find and replace
	 * to change 'exam-volovyk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'exam-volovyk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'exam-volovyk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exam_volovyk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'exam_volovyk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function exam_volovyk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exam_volovyk_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_volovyk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function exam_volovyk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exam-volovyk' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exam-volovyk' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header Section Left', 'exam-volovyk' ),
        'id'            => 'header-main-left',
        'description'   => esc_html__( 'Add widgests here.', 'exam-volovyk' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header Section Right', 'exam-volovyk' ),
        'id'            => 'header-main-right',
        'description'   => esc_html__( 'Add widgets here.', 'exam-volovyk' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Welcome Section Left', 'exam-volovyk' ),
        'id'            => 'welcome-main-left',
        'description'   => esc_html__( 'Add widgests here.', 'exam-volovyk' ),
        'before_widget' => '<section id="%1$s" class="welcome-img %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Welcome Section Right', 'exam-volovyk' ),
        'id'            => 'welcome-main-right',
        'description'   => esc_html__( 'Add widgets here.', 'exam-volovyk' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Offering Section Content', 'exam-volovyk' ),
        'id'            => 'offering-main-content',
        'description'   => esc_html__( 'Add widgets here.', 'exam-volovyk' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="widget-title">',
        'after_title'   => '</span>',
    ) );
}
add_action( 'widgets_init', 'exam_volovyk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exam_volovyk_scripts() {
	wp_enqueue_style( 'exam-volovyk-style', get_stylesheet_uri() );
	wp_enqueue_style( 'exam-volovyk-style-libs', get_template_directory_uri().'/css/libs.min.css' );
	wp_enqueue_style( 'exam-volovyk-style-main', get_template_directory_uri().'/css/main.css' );
	wp_enqueue_style( 'exam-volovyk-style-fontf', 'https://fonts.googleapis.com/css?family=Roboto' );
	wp_enqueue_script( 'exam-volovyk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'exam-volovyk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exam_volovyk_scripts' );

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/jetpack.php';

add_action('init', 'register_post_types');
function register_post_types(){
	register_post_type('portfolio', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Portfolio', // основное название для типа записи
			'singular_name'      => 'Portfolio', // название для одной записи этого типа
			'add_new'            => 'Add Work', // для добавления новой записи
			'add_new_item'       => 'Add New Work', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Work', // для редактирования типа записи
			'new_item'           => 'New Work', // текст новой записи
			'view_item'          => 'View Work', // для просмотра записи этого типа.
			'search_items'       => 'Search Work', // для поиска по этим типам записи
			'not_found'          => 'No found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'No found in Trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Portfolio', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => true,
		'show_ui'             => true,
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-images-alt',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('p_categories'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

add_action('init', 'create_taxonomy');
function create_taxonomy(){
	// заголовки
	// весь список: http://wp-kama.ru/function/get_taxonomy_labels
	$labels = array(
		'name'              => 'Categories',
		'singular_name'     => 'Category',
		'search_items'      => 'Search Category',
		'all_items'         => 'All Categries',
		'parent_item'       => 'Parent Category',
		'parent_item_colon' => 'Parent Category:',
		'edit_item'         => 'Edit Category',
		'update_item'       => 'Update Category',
		'add_new_item'      => 'Add New Category',
		'new_item_name'     => 'New Genre Category',
		'menu_name'         => 'Categries',
	);
	// параметры
	$args = array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => $labels,
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	);
	register_taxonomy('p_categories', array('portfolio'), $args );
}

#Meta Box from Kama
/* Добавляем блоки в основную колонку на страницах постов и пост. страниц */
function myplugin_add_custom_box() {
	$screens = array( 'post', 'page' );
	foreach ( $screens as $screen )
		add_meta_box( 'myplugin_sectionid', 'Название мета блока', 'myplugin_meta_box_callback', $screen );
}
add_action('add_meta_boxes', 'myplugin_add_custom_box');
/* HTML код блока */
function myplugin_meta_box_callback() {
	// Используем nonce для верификации
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	// Поля формы для введения данных
	echo '<label for="myplugin_new_field">' . __("Description for this field", 'myplugin_textdomain' ) . '</label> ';
	echo '<input type="text" id= "myplugin_new_field" name="myplugin_new_field" value="whatever" size="25" />';
}
/* Сохраняем данные, когда пост сохраняется */
function myplugin_save_postdata( $post_id ) {
	// проверяем nonce нашей страницы, потому что save_post может быть вызван с другого места.
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
		return $post_id;

	// проверяем, если это автосохранение ничего не делаем с данными нашей формы.
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		return $post_id;

	// проверяем разрешено ли пользователю указывать эти данные
	if ( 'page' == $_POST['post_type'] && ! current_user_can( 'edit_page', $post_id ) ) {
		return $post_id;
	} elseif( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Убедимся что поле установлено.
	if ( ! isset( $_POST['myplugin_new_field'] ) )
		return;

	// Все ОК. Теперь, нужно найти и сохранить данные
	// Очищаем значение поля input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Обновляем данные в базе данных.
	update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}
add_action( 'save_post', 'myplugin_save_postdata' );
/**
 * Вызываем класс на странице редактирования поста.
 */
function call_someClass() {
	new someClass();
}
if ( is_admin() ) {
	add_action( 'load-post.php', 'call_someClass' );
	add_action( 'load-post-new.php', 'call_someClass' );
}
/**
 * Код класса.
 */
class someClass {

	/**
	 * Устанавливаем хуки в момент инициализации класса.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Добавляем дополнительный блок.
	 */
	public function add_meta_box( $post_type ) {
		// Устанавливаем типы постов к которым будет добавлен блок
		$post_types = array('post', 'page');
		if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'some_meta_box_name'
				,__( 'Some Meta Box Headline', 'myplugin_textdomain' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'advanced'
				,'high'
			);
		}
	}

	/**
	 * Сохраняем данные при сохранении поста.
	 *
	 * @param int $post_id ID поста, который сохраняется.
	 */
	public function save( $post_id ) {

		/*
		 * Нам нужно сделать проверку, чтобы убедится что запрос пришел с нашей страницы,
				 * потому что save_post может быть вызван еще где угодно.
		 */

		// Проверяем установлен ли nonce.
		if ( ! isset( $_POST['myplugin_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['myplugin_inner_custom_box_nonce'];

		// Проверяем корректен ли nonce.
		if ( ! wp_verify_nonce( $nonce, 'myplugin_inner_custom_box' ) )
			return $post_id;

		// Если это автосохранение ничего не делаем.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		// Проверяем права пользователя.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, все чисто, можно сохранять данные. */

		// Очищаем поле input.
		$mydata = sanitize_text_field( $_POST['myplugin_new_field'] );

		// Обновляем данные.
		update_post_meta( $post_id, '_my_meta_value_key', $mydata );
	}

	/**
	 * Код дополнительного блока.
	 *
	 * @param WP_Post $post Объект поста.
	 */
	public function render_meta_box_content( $post ) {

		// Добавляем nonce поле, которое будем проверять при сохранении.
		wp_nonce_field( 'myplugin_inner_custom_box', 'myplugin_inner_custom_box_nonce' );

		// Получаем существующие данные из базы данных.
		$value = get_post_meta( $post->ID, '_my_meta_value_key', true );

		// Выводим поля формы, используя полученные данные.
		echo '<label for="myplugin_new_field">';
		_e( 'Description for this field', 'myplugin_textdomain' );
		echo '</label> ';
		echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field"';
		echo ' value="' . esc_attr( $value ) . '" size="25" />';
	}
}
// Эта функция добавляет Блок который передает доп. параметры callback функции my_metabox_callback()
function add_my_meta_box() {
	$var1 = "this";
	$var2 = "that";
	add_meta_box('metabox_id', 'Metabox Title', 'my_metabox_callback',
				 'page', 'normal', 'low', array('foo'=>$var1,'bar'=>$var2));
}
// $post - это объект содержащий данные глобального массива $_POST
// $metabox - это массив с агрументами: metabox_id, title, callback
// и новыми переданными аргументами в параметре $callback_args
function my_metabox_callback ($post, $metabox) {
	echo 'Last Modified: ' . $post->post_modified;        // время последнего изменения поста
	echo $metabox['args']['foo'];                         // раз
	echo $metabox['args']['bar'];                         // два
	echo get_post_meta($post->ID,'my_custom_field',true); // значение произвольно поля
}
#End Meta Box from Kama

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function ajy_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'ajy_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ajy_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'ajy' ),
        'section'  => 'title_tagline',
        'settings' => 'ajy_logo',
    ) ) );
}
add_action( 'customize_register', 'ajy_customize_register' );
function ajy_register_theme_customizer($wp_customize) {
    $wp_customize->add_panel( 'text_blocks', array(
        'priority' => 500,
        'theme_supports' => '',
        'title' => __( 'Sections', 'ajy' ),
        'description' => __( 'Set editable text for certain content.', 'ajy' ),
    ) );
    // Add Footer Text
    // Add section.
    $wp_customize->add_section( 'custom_header_text' , array(
        'title' => __('Change Header Section','ajy'),
        'panel' => 'text_blocks',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'header_main_heading', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'header_main_heading',
            array(
                'label' => __( 'Header Main Heading', 'ajy' ),
                'section' => 'custom_header_text',
                'settings' => 'header_main_heading',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'header_main_desc', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'header_main_desc',
            array(
                'label' => __( 'Header Main Description', 'ajy' ),
                'section' => 'custom_header_text',
                'settings' => 'header_main_desc',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'header_main_vissible', array( 'default' => true, 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
    $wp_customize->add_control( 'header_main_vissible', array(
        'label' => 'Header Main Vissible',
        'section' => 'custom_header_text',
        'type' => 'checkbox',
        'priority' => 2
    ) );
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
    $wp_customize->add_section( 'custom_welcome_text' , array(
        'title' => __('Change Welcome Section','ajy'),
        'panel' => 'text_blocks',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'welcome_main_heading', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'welcome_main_heading',
            array(
                'label' => __( 'Welcome Main Heading', 'ajy' ),
                'section' => 'custom_welcome_text',
                'settings' => 'welcome_main_heading',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'welcome_main_desc', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'welcome_main_desc',
            array(
                'label' => __( 'Welcome Main Description', 'ajy' ),
                'section' => 'custom_welcome_text',
                'settings' => 'welcome_main_desc',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'welcome_main_vissible', array( 'default' => true, 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
    $wp_customize->add_control( 'welcome_main_vissible', array(
        'label' => 'Welcome Main Vissible',
        'section' => 'custom_welcome_text',
        'type' => 'checkbox',
        'priority' => 2
    ) );
    $wp_customize->add_section( 'custom_offering_text' , array(
        'title' => __('Change Offering Section','ajy'),
        'panel' => 'text_blocks',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'offering_main_heading', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'offering_main_heading',
            array(
                'label' => __( 'Welcome Main Heading', 'ajy' ),
                'section' => 'custom_offering_text',
                'settings' => 'offering_main_heading',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'offering_main_desc', array(
        'default' => __( 'Default text', 'ajy' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'offering_main_desc',
            array(
                'label' => __( 'Welcome Main Description', 'ajy' ),
                'section' => 'custom_offering_text',
                'settings' => 'offering_main_desc',
                'type' => 'text'
            )
        )
    );
    $wp_customize->add_setting( 'offering_main_vissible', array( 'default' => true, 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
    $wp_customize->add_control( 'offering_main_vissible', array(
        'label' => 'Welcome Main Vissible',
        'section' => 'custom_offering_text',
        'type' => 'checkbox',
        'priority' => 2
    ) );
}
add_action( 'customize_register', 'ajy_register_theme_customizer' );