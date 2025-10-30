<?php
/**
 * Comments Template
 * 
 * @package Entegrasyonum
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    
    <?php if (have_comments()) : ?>
        
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(
                esc_html(_n('%s Yorum', '%s Yorum', $comments_number, 'entegrasyonum')),
                number_format_i18n($comments_number)
            );
            ?>
        </h2>
        
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
                'callback'    => 'entegrasyonum_comment_callback',
            ));
            ?>
        </ol>
        
        <?php
        // Comment pagination
        the_comments_navigation(array(
            'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __('Önceki Yorumlar', 'entegrasyonum'),
            'next_text' => __('Sonraki Yorumlar', 'entegrasyonum') . ' <i class="fas fa-chevron-right"></i>',
        ));
        ?>
        
    <?php endif; ?>
    
    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments">
            <?php esc_html_e('Yorumlar kapalı.', 'entegrasyonum'); ?>
        </p>
    <?php endif; ?>
    
    <?php
    // Comment form
    comment_form(array(
        'title_reply'          => __('Yorum Yapın', 'entegrasyonum'),
        'title_reply_to'       => __('%s için yanıt yazın', 'entegrasyonum'),
        'cancel_reply_link'    => __('Yanıtı İptal Et', 'entegrasyonum'),
        'label_submit'         => __('Yorum Gönder', 'entegrasyonum'),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . __('Yorumunuz', 'entegrasyonum') . '</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
        'fields'               => array(
            'author' => '<p class="comment-form-author"><label for="author">' . __('İsim', 'entegrasyonum') . ' <span class="required">*</span></label><input id="author" name="author" type="text" required /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . __('E-posta', 'entegrasyonum') . ' <span class="required">*</span></label><input id="email" name="email" type="email" required /></p>',
            'url'    => '<p class="comment-form-url"><label for="url">' . __('Website', 'entegrasyonum') . '</label><input id="url" name="url" type="url" /></p>',
        ),
        'class_submit'         => 'btn btn-primary',
        'submit_button'        => '<button type="submit" name="submit" id="submit" class="%3$s"><i class="fas fa-paper-plane"></i> %4$s</button>',
    ));
    ?>
    
</div>

