<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blank Theme
 *
 *  1. print_func.php - Функции для форматирования вывода данных
 *  4. Вывод меню get_menu()
 *  5. Вывод мета тегов
 *      5.1 get_title_meta_tag
 *      5.2 get_meta_description
 *      5.3 get_meta_keywords
 *  6. Редирект для постоянных ссылок на файлы
 *  7. Функция is_tree() для определения является ли страница дочерней у заданной
 */
defined( 'ABSPATH' ) || exit;

$includes = array(
  '/includes/print_func.php',          // Функции для форматирования вывода данных
  '/includes/theme_class.php',

  // SHORTCODES
  '/shortcodes/consult.php',
  '/shortcodes/contacts.php',
  '/shortcodes/icons.php',
  '/shortcodes/portfolio.php',
  '/shortcodes/reviews.php',
  '/shortcodes/rhombus-contacts.php',
);
foreach ($includes as $file){
  require_once get_template_directory() . $file;
}

/**
 * @var $args - Начальные параметры для темы
 */
$args = array(
  'styles' => array(
    array( 'handle' => 'styles', 'src' => 'css/styles.css?1', 'deps' => array() ),
  ),
  'scripts' => array(
    array( 'handle' => 'lottie',  'src' => 'js/assets/bodymovin.min.js', 'deps' => array( 'jquery' ) ),
    array( 'handle' => 'vue', 	  'src' => 'js/assets/vue.js', 'deps' => array( 'jquery' ) ),
    array( 'handle' => 'anime',   'src' => 'js/assets/anime.min.js', 'deps' => array( 'jquery' ) ),
    array( 'handle' => 'script',  'src' => 'js/script.js', 'deps' => array( 'jquery' ) ),
  ),
  'nav_menus' => array(
    'header_menu' => __( 'Верхнее меню' ),
    'mobile_menu' => __( 'Мобильное меню' ),
    'footer_left_menu' => __( 'Меню в подвале левое' ),
    'foote_right_menu' => __( 'Меню в подвале правое' ),
  ),
  'widgets' => array(
    array(
      'id'            => 'search_widget',
      'name'          => 'Поиск',
      'description'   => 'Перетащите сюда виджет поиска, чтобы добавить его в шапку.',
    ),
  ),
);
$theme = new Theme_Class( $args );

/* Подключение скриптов в хуки */
add_action( 'init', function(){
  wp_register_script( 'slick', get_template_directory_uri() . '/js/assets/slick.min.js', array('jquery'), '', true );
} );

// Используется для телефона, чтобы оставить только цифры в номере
function return_phone_from_string( $string ) {
  return preg_replace( "/[^+0-9]/", '', $string );
}

// Вывод мета тегов
add_filter( 'pre_get_document_title', 'get_title_meta_tag' );
function get_title_meta_tag(){
  if ( is_404() ) {
    return "Страница не найдена, ошибка 404";
  } elseif ( get_field( 'title' ) ) {
    return get_field( 'title' );
  } else {
    return wp_title( '', false );
  }
}

function get_meta_description( ){
  if( get_field( 'description') ) {
    return get_field( 'description' );
  }
  return '';
}

function get_meta_keywords(  ){
  if( get_field( 'keywords' ) ) {
    return get_field( 'keywords');
  }
}

// Удаляет слово Архив из заголовка Рубрики
add_filter( 'get_the_archive_title', function( $title ){
  return preg_replace('~^[^:]+: ~', '', $title );
});


// Для того, чтобы вывести script.js как ES модуль - type="module"
add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);
function add_type_attribute($tag, $handle, $src) {
  if ( 'script' !== $handle ) {
    return $tag;
  }

  $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
  return $tag;
}
// Логин в шапку
add_action('login_head', 'custom_login_logo');
function custom_login_logo() {
  echo '<style>
      .login h1 a, .interim-login.login h1 a  { 
        background: url("/img/brandbook/logo-desc-bottom-right.svg") no-repeat !important; 
        background-size: contain !important;
        width: 160px;
      }
      </style>';
}
