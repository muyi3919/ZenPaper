<?php
/**
 * The template for displaying all pages
 *
 * @package ZenPaper
 */

get_header();

while (have_posts()) :
    the_post();
?>

<div class="page-content">

    <h1 class="page-title"><?php the_title(); ?></h1>
    
    <div class="article-content">
        <?php the_content(); ?>
    </div>

</div>

<?php
endwhile;

get_footer();