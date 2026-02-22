<?php
/**
 * The template for displaying all single posts
 *
 * @package ZenPaper
 */

get_header();

while (have_posts()) :
    the_post();
?>

<article class="single-article">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="back-link">
        ← <?php esc_html_e('返回列表', 'zenpaper'); ?>
    </a>

    <header class="article-header">
        <div class="article-meta">
            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo esc_html(get_the_date('Y年m月d日')); ?>
            </time>
        </div>
        
        <h1 class="article-single-title"><?php the_title(); ?></h1>
        
        <div class="divider"></div>
    </header>

    <div class="article-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="pagination">',
            'after'  => '</div>',
            'separator' => '',
        ));
        ?>
    </div>

    <footer class="article-footer">
        <p>— <?php esc_html_e('全文完', 'zenpaper'); ?> —</p>
    </footer>

</article>

<?php
endwhile;

get_footer();