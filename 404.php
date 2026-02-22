<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ZenPaper
 */

get_header();
?>

<div class="error-404">
    <div class="error-code">404</div>
    <p class="error-text"><?php esc_html_e('页面不存在。', 'zenpaper'); ?></p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="back-link" style="justify-content: center;">
        <?php esc_html_e('返回首页', 'zenpaper'); ?> →
    </a>
</div>

<?php
get_footer();