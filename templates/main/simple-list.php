<?php
/**
 * Project: x-related-posts
 * File: simple-list.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 6:23 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */

if (!defined('WPINC')) {
    exit('Do NOT access this file directly: '.basename(__FILE__));
}

/* @var \x_related_posts\themes\theme $this */
/* @var array $related */

if (!empty($related)) {
    $style = '';
    if (isset($this->options['borderWeight']) && $this->options['borderWeight'] > 0) {
        $style .= ' border: '.$this->options['borderWeight'].'px solid; ';
    }
    if (isset($this->options['borderRadius']) && $this->options['borderRadius'] > 0) {
        $style .= ' border-radius:  '.$this->options['borderRadius'].'px; ';
    }
    if (isset($this->options['borderColor']) && $this->options['borderColor'] != '#ffffff') {
        $style .= ' border-color: '.$this->options['borderColor'].'; ';
    }
    ?>
    <div class="x-related-wrapper" style="<?php echo $style; ?>">
        <h2><?php echo $this->©option->get('main_title'); ?></h2>
        <?php
        if ($this->options['orderedList']){
        ?>
        <ol>
            <?php
            } else {
                echo '<ul>';
            }
            foreach ($related as $rel) {
                /* @var \x_related_posts\posts $post */
                $rel  = (object)$rel;
                $post = $this->©post($rel->pid2);
                ?>
                <li>
                    <a href="<?php echo $post->getThePermalink(); ?>" target="_self">
                        <?php echo $this->getPostTitleFormatted($post); ?>
                    </a>
                </li>
            <?php
            }
            if ($this->options['orderedList']){
            ?>
        </ol>
    <?php
    } else {
        echo '</ul>';
    }
    ?>
    </div>
<?php
}
