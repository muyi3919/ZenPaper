<?php
/**
 * The main template file
 *
 * @package ZenPaper
 */

get_header();
?>

<?php if (have_posts()) : ?>

    <div class="article-list">

        <?php while (have_posts()) : the_post(); ?>

            <article class="article-item">
                <a href="<?php the_permalink(); ?>" class="article-link">
                    
                    <time class="article-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php echo esc_html(get_the_date('Y年m月d日')); ?>
                    </time>
                    
                    <h2 class="article-title"><?php the_title(); ?></h2>
                    
                    <div class="article-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <span class="read-more">
                        <?php esc_html_e('阅读全文', 'zenpaper'); ?> →
                    </span>

                </a>
            </article>

        <?php endwhile; ?>

    </div><!-- .article-list -->

    <?php
    the_posts_pagination(array(
        'mid_size'  => 1,
        'prev_text' => '←',
        'next_text' => '→',
        'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'zenpaper') . ' </span>',
    ));
    ?>

<?php else : ?>

    <div class="error-404">
        <div class="error-code"><?php esc_html_e('Empty', 'zenpaper'); ?></div>
        <p class="error-text"><?php esc_html_e('还没有发布任何文章。', 'zenpaper'); ?></p>
    </div>

<?php endif; ?>

<?php
get_footer();