<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Exam
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php if( get_theme_mod( 'header_main_vissible') == 1 ){ ?>
            <section class="header-main section-site">
                <div class="row">
                    <div class="medium-6">
                        <?php dynamic_sidebar( 'header-main-left' ); ?>
                    </div>
                    <div class="medium-6">
                        <?php if( get_theme_mod( 'header_main_heading') != "" ){ ?>
                            <h2><?php echo get_theme_mod( 'header_main_heading'); ?></h2>
                        <?php }  ?>
                        <?php if( get_theme_mod( 'header_main_desc') != "" ){ ?>
                            <span><?php echo get_theme_mod( 'header_main_desc'); ?></span>
                        <?php }  ?>
                        <?php dynamic_sidebar( 'header-main-right' ); ?>
                    </div>
                    <a href="#welcome" class="link-down"></a>
                </div>
            </section>
        <?php } ?>
        <?php if( get_theme_mod( 'welcome_main_vissible') == 1 ){ ?>
                <section id="welcome" class="welcome-section section-site">
                    <div class="row align-middle">
                        <div class="medium-6">
                            <?php dynamic_sidebar( 'welcome-main-left' ); ?>
                        </div>
                        <div class="medium-6">
                            <?php if( get_theme_mod( 'welcome_main_heading') != "" ){ ?>
                                <h2><?php echo get_theme_mod( 'welcome_main_heading'); ?></h2>
                            <?php }  ?>
                            <?php if( get_theme_mod( 'welcome_main_desc') != "" ){ ?>
                                <span><?php echo get_theme_mod( 'welcome_main_desc'); ?></span>
                            <?php }  ?>
                            <?php dynamic_sidebar( 'welcome-main-right' ); ?>
                        </div>
                    </div>
                </section>
        <?php } ?>
        <?php if( get_theme_mod( 'offering_main_vissible') == 1 ){ ?>
                <section class="offering-section section-site">
                    <div class="row">
                        <div class="medium-12">
                            <?php if( get_theme_mod( 'offering_main_heading') != "" ){ ?>
                                <h2><?php echo get_theme_mod( 'offering_main_heading'); ?></h2>
                            <?php }  ?>
                            <?php if( get_theme_mod( 'offering_main_desc') != "" ){ ?>
                                <span><?php echo get_theme_mod( 'offering_main_desc'); ?></span>
                            <?php }  ?>
                        </div>
                        <div class="medium-12">
                            <?php dynamic_sidebar( 'offering-main-content' ); ?>
                        </div>
                    </div>
                </section>
        <?php } ?>
        <?php if( get_theme_mod( 'header_main_vissible') == 1 ){ ?>
                <section class="header-main section-site">
                    <div class="row">
                        <div class="medium-6">
                            <?php dynamic_sidebar( 'header-main-left' ); ?>
                        </div>
                        <div class="medium-6">
                            <?php if( get_theme_mod( 'header_main_heading') != "" ){ ?>
                                <h2><?php echo get_theme_mod( 'header_main_heading'); ?></h2>
                            <?php }  ?>
                            <?php if( get_theme_mod( 'header_main_desc') != "" ){ ?>
                                <span><?php echo get_theme_mod( 'header_main_desc'); ?></span>
                            <?php }  ?>
                            <?php dynamic_sidebar( 'header-main-right' ); ?>
                        </div>
                    </div>
                </section>
        <?php } ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();