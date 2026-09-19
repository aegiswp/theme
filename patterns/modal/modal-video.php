<?php
/**
 * Title: Video Modal
 * Slug: video
 * Categories: modal
 * Keywords: modal, video, lightbox, youtube, vimeo
 * Description: A video lightbox modal with button trigger.
 *
 * @package Aegis
 * @since   1.0.0
 */

declare(strict_types=1);

?>

<!-- wp:aegis/modal {"modalId":"video-modal","triggerText":"<?php echo esc_attr__('Watch Video', 'aegis'); ?>","animation":"zoom","width":"800px","padding":"0","metadata":{"categories":["modal"],"patternName":"modal-video","name":"Video Modal"}} -->
<!-- wp:embed {"url":"https://www.youtube.com/watch?v=dQw4w9WgXcQ","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio">
    <div class="wp-block-embed__wrapper">
        https://www.youtube.com/watch?v=dQw4w9WgXcQ
    </div>
</figure>
<!-- /wp:embed -->
<!-- /wp:aegis/modal -->