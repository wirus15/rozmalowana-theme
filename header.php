<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Girlie
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>
<div class="header">
    <div class="header-inner">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/rozmalowana_logo.png"
                     alt="Rozmalowana - LOGO"/>
            </a>
        </div><!-- logo -->
        <div class="toggle">
            <a class="toggleMenu" href="#"><?php _e('Menu', 'skt-girlie'); ?></a>
        </div><!-- toggle -->
        <div class="nav">
            <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
        </div><!-- nav -->
    </div><!-- header-inner -->
</div><!-- header -->

<?php
    if (!empty($header_image = get_header_image())) {
        echo '<div class="innerbanner"><img src="' . esc_url($header_image) . '" width="' . get_custom_header()->width . '" height="' . get_custom_header()->height . '" alt="" /></div>';
    }
?>

<?php if (is_front_page() && !is_home()) { ?>
<section id="wrapsecond" class="pagewrap2">
    <div class="container">
        <div class="services-wrap">

            <?php for ($p = 1; $p < 5; $p++) { ?>
                <?php if (get_theme_mod('page-column' . $p, false)) { ?>
                    <?php $queryxxx = new WP_query('page_id=' . get_theme_mod('page-column' . $p, true)); ?>
                    <?php while ($queryxxx->have_posts()) : $queryxxx->the_post(); ?>
                        <div class="listpages <?php if ($p % 4 == 0) {
                            echo "last_column";
                        } ?>">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
                                <h4><?php the_title(); ?></h4></a>

                            <p><?php the_excerpt(); ?></p>
                            <a class="morelink"
                               href="<?php the_permalink(); ?>"><?php _e('Read More', 'skt-girlie'); ?></a>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                <?php } else { ?>
                    <div class="listpages <?php if ($p % 4 == 0) {
                        echo "last_column";
                    } ?>">
                        <a href=""><img
                                src="<?php echo get_template_directory_uri(); ?>/images/about<?php echo $p; ?>.jpg"
                                alt=""/>
                            <h4><?php _e('Page Title', 'skt-girlie'); ?><?php echo $p; ?></h4></a>

                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque augue eros, posuere a condimentum sit amet, rhoncus eu libero. Maecenas in tincidunt turpis, ut rhoncus neque.', 'skt-girlie'); ?></p>
                        <a class="morelink" href="#"><?php _e('Read More', 'skt-girlie'); ?></a>
                    </div>
                <?php }
            } ?>


        </div><!-- services-wrap-->
        <div class="clear"></div>
    </div><!-- container -->
</section>
<div class="clear"></div>
<?php } ?>