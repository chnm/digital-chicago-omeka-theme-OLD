<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600" rel="stylesheet">


    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts', 'skeleton','style'));

    echo head_css();
    ?>
    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('berlin'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>
</head>
 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
        <header role="banner" class="row">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

             <div id="primary-nav" role="navigation">
                 <?php 
                    $navArray = array();
                    $navArray[] = array('label' => 'Exhibits', 'uri' => url('exhibits'), 'class' => 'exhibits');
                    $navArray[] = array('label' => '', 'uri' => url('index'), 'class' => 'home');
                    $navArray[] = array('label' => 'About', 'uri' => url('about'), 'class' => 'about');
                    ?>
                   <?php
                        echo nav($navArray)->addPageClassToLi();
                   ?>
             </div>

             <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
                 <?php 
                    $navArray = array();
                    $navArray[] = array('label' => 'Exhibits', 'uri' => url('exhibits'), 'class' => 'exhibits');
                    $navArray[] = array('label' => 'Home', 'uri' => url('index'), 'class' => 'home');
                    $navArray[] = array('label' => 'About', 'uri' => url('about'), 'class' => 'about');
                    ?>
                   <?php
                        echo nav($navArray)->addPageClassToLi();
                   ?>
             </div>

            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?php echo search_form(); ?>
                <?php endif; ?>
            </div>

        </header>

    <div id="content" role="main" tabindex="-1">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
