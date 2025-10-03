<?php
/**
 * yeastar.php
 * Página de Yeastar Cloud PBX - Sistema de Telefonía IP en la Nube
 *
 * Esta página presenta los servicios y soluciones de Yeastar Cloud PBX,
 * incluyendo planes, características y casos de uso empresarial.
 */

// --------------- SEO PRINCIPAL ---------------
$seo = [
    'title'       => 'Yeastar Cloud PBX - Sistema de Telefonía IP en la Nube | Norttek Solutions',
    'description' => 'Descubre Yeastar Cloud PBX, el sistema de telefonía IP empresarial en la nube más completo. Comunicación unificada, extensiones virtuales, grabación de llamadas y más. Prueba gratuita 30 días.',
    'keywords'    => 'Yeastar, Cloud PBX, Telefonía IP, VoIP empresarial, Sistema telefónico nube, PBX virtual, Comunicaciones unificadas, Yeastar P-Series, Norttek',
    'robots'      => 'index, follow',
    'og_url'      => 'https://www.norttek.com.mx/yeastar',
    'og_image'    => 'https://www.norttek.com.mx/assets/img/yeastar-hero.webp'
];

// ----------- HERENCIA AUTOMÁTICA PARA OG Y TWITTER -----------
$seo['og_title']        = $seo['og_title']        ?? $seo['title'];
$seo['og_description']  = $seo['og_description']  ?? $seo['description'];
$seo['twitter_title']   = $seo['twitter_title']   ?? $seo['title'];
$seo['twitter_description'] = $seo['twitter_description'] ?? $seo['description'];
$seo['twitter_image']   = $seo['twitter_image']   ?? $seo['og_image'];

// --------------- NOMBRE DE LA PÁGINA (para assets y contenido) ---------------
$pageName = basename(__FILE__, ".php"); // Usado para cargar contenido y assets automáticamente

// --------------- ASSETS ESPECÍFICOS POR PÁGINA (opcional) ---------------
$cssFiles = ['yeastar-ai']; // Estilos específicos de Yeastar
$jsFiles  = ['yeastar-ai']; // Scripts específicos de Yeastar

// --------------- INCLUYE LA PLANTILLA BASE DEL SITIO ---------------
include __DIR__ . '/includes/pageTemplate.php';
?>
