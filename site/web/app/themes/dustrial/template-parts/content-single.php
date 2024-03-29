<?php
/**
 * Template part for displaying single posts.
 *
 * @package dustrial
 */

?>
<?php if(function_exists('dustrial_PostViews')) {
  dustrial_PostViews(get_the_ID());
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <img class="img-fluid" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php esc_attr_e('blog img', 'dustrial'); ?>">
  <?php } ?>

  <!-- blog mata -->
  <div class="blog-mata">
    <ul>
      <li class="d-inline-block align-items-center">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        <?php the_time('M j,  Y'); ?>
      </li>
      <li class="d-inline-block  align-items-center">
        <i class="fa fa-user-o" aria-hidden="true"></i>
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
      </li>
      <li class="d-inline-block  align-items-center">
        <i class="fa fa-area-chart" aria-hidden="true"></i>
        <?php the_category(', '); ?>
      </li>
      <li class="d-inline-block align-items-center">
        <i class="fa fa-comment-o" aria-hidden="true"></i>
        <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
      </li>
    </ul>
  </div>

  <!-- Blog Content -->
  <div class="blog-content">
    <?php the_content(); ?>
    <?php
       wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'dustrial' ),
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        ) );
    ?>
  </div>

  <?php 

  if( function_exists( 'dustrial_framework_init' ) ) {
    $dustrial_social_share_enable = dustrial_get_option('dustrial_social_share_enable');
  } else {
    $dustrial_social_share_enable = '';
  }

  $tags_list = get_the_tag_list();

  if ( !empty( $tags_list ) || !empty( $dustrial_social_share_enable ) ) { ?>

    <div class="blog-inner-tag mt-4 mt-xl-5 pt-3 col-md-12 p-0 d-lg-flex justify-content-lg-between align-items-lg-center">
      <?php 
        if( function_exists( 'dustrial_framework_init' ) ) {
          $dustrial_social_share_enable = dustrial_get_option('dustrial_social_share_enable');
          if (!empty($dustrial_social_share_enable)) {
            $col_no = '6';
          } else {
            $col_no = '12';
          }
        } else {
          $col_no = '12';
        } 
      ?>
      <div class="col-md-<?php echo esc_attr( $col_no ); ?> p-0 mb-3 mb-xl-0">
        <div class="tags-list">
          <?php echo get_the_tag_list('<strong>Tags:</strong> ',', '); ?>
        </div>
      </div>
      <?php 
        if( function_exists( 'dustrial_framework_init' ) ) {
          $dustrial_social_share_enable = dustrial_get_option('dustrial_social_share_enable');
            if (!empty($dustrial_social_share_enable)) {  
            do_action( 'dustrial_social_share_media' );
          }
        }
      ?>
    </div>

  <?php } ?>
</article>