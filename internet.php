<?php
$pageName = basename(__FILE__, '.php');
$cssFiles = ['pwa-install'];
$jsFiles = ['pwa-install'];

// Meta tags específicos para PWA
$metaTags = [
    'theme-color' => '#4f8cff',
    'apple-mobile-web-app-capable' => 'yes',
    'apple-mobile-web-app-status-bar-style' => 'black-translucent',
    'apple-mobile-web-app-title' => 'Internet Norttek',
    'mobile-web-app-capable' => 'yes',
    'application-name' => 'Internet Norttek'
];

include __DIR__ . '/includes/pageTemplate.php';
