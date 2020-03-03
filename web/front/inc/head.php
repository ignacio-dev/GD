<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Open Graph -->
    <meta property="og:title" content="Gerardo Dominguez"/>
    <meta property="og:url" content="http://www.gerardodominguez.es/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="Graphic designer and illustrator."/>
    <meta property="og:image" content="http://gerardodominguez.es/og.jpg"/>
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@Gerardo_Amorin"/>
    <meta name="twitter:title" content="Gerado Dominguez"/>
    <meta name="twitter:description" content="Graphic designer and illustrator."/>
    <meta name="twitter:image" content="http://gerardodominguez.es/twitter.jpg"/>
    <!-- SEO -->
    <link rel="canonical" href="http://www.gerardodominguez.es/"/>
    <meta name="description" content="Gerardo Dominguez. Graphic designer and illustrator.">
    <!-- FAV ICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a10d59">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- TITLE AND STYLSHEETS -->
    <?php new Head\PageTitle(); ?>
    <?php
        new Head\StyleSheet("reset");
        new Head\StyleSheet("style");
        new Head\StyleSheet("keyframes");
        new Head\StyleSheet("header");
        new Head\StyleSheet($menu);
    ?>
    <link rel="stylesheet" href="front/fonts/fontawesome/css/all.css">
</head>
