<?php
/**
 * Search Form Template
 * 
 * @package Entegrasyonum
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-form-wrapper">
        <input type="search" 
               class="search-field" 
               placeholder="<?php esc_attr_e('Arama...', 'entegrasyonum'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" 
               aria-label="<?php esc_attr_e('Arama', 'entegrasyonum'); ?>"
               required />
        <button type="submit" class="search-submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>

