<?php
namespace NHREPO;

use WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class NHREPO_Post {

    public function __construct() {
        add_filter( 'the_content', array( $this, 'the_content' ) );
    }

    public function the_content( $content ) {
        if ( is_single() ) {
            global $post;
            $categories = wp_get_post_categories( $post->ID );

            if ( $categories ) {
                // Fetch 4 posts to account for filtering out the current post.
                $args = array(
                    'category__in'   => $categories,
                    'posts_per_page' => 3, // Fetch one extra to ensure we get 3 after filtering.
                    'post__not_in'   => array( $post->ID ),
                );

                $related_post = new WP_Query( $args );

                if ( $related_post->have_posts() ) {
                    ob_start();
                    ?>
                    <div class="related_posts">
                        <h3><?php esc_html_e( 'Related Posts', 'nh-related-posts' ); ?></h3>
                        <ul>
                            <?php 
                            $count = 0;
                            while ( $related_post->have_posts() && $count < 3 ) : 
                                $related_post->the_post(); 
                            ?>
                                <li>
                                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                                        <?php if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'medium' );
                                        } ?>
                                        <br />
                                        <strong><?php echo esc_html( get_the_title() ); ?></strong>
                                        <p><?php echo esc_html( wp_trim_words( get_the_content(), 10, '...' ) ); ?></p>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php
                    wp_reset_postdata();
                    $content .= ob_get_clean();
                }
            }
        }
        return $content;
    }
}
