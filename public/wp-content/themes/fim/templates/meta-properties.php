<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="<?= get_meta_description( ) ?>"/>
<meta name="keywords" content="<?= get_meta_keywords( ) ?>"/>

<meta name="apple-mobile-web-app-title" content="<?= bloginfo('name') ?>">
<meta name="mobile-web-app-capable" content="yes">

<meta name="theme-color" content="#2a2033">
<meta name="msapplication-navbutton-color" content="#2a2033">
<meta name="apple-mobile-web-app-status-bar-style" content="#2a2033">

<meta property="og:site_name" content="<?= $_SERVER['HTTP_HOST']?>">
<meta property="og:title" content="<?= get_title_meta_tag() ?>">
<meta property="og:image" content="/img/snippets/og_image.jpg">
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="315" />
<meta property="og:description" content="<?= get_meta_description( ) ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?= get_permalink( $post->ID ); ?>" />
<meta name="twitter:title" content="<?= get_title_meta_tag() ?>">
<meta name="twitter:image" content="/img/snippets/og_image.jpg">
<meta property="twitter:image:src" content="/img/snippets/og_image.jpg">
<meta name="twitter:description" content="<?= get_meta_description( ) ?>">
<meta property="twitter:card" content="summary_large_image" />
<meta property="vk:image" content="/img/snippets/vk.jpg" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<!--Вставить ссылку на Google Fonts-->
