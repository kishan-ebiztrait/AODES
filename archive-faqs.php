<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brator
 */

get_header();

if ( is_active_sidebar( 'sidebar-1' ) ) :
	$blog_post_list_class = 'col-xl-9';
else :
	$blog_post_list_class = 'col-xl-12';
endif;
?>
<div class="brator-blog-post-area faqs-archive">
	<div class="container-xxxl container-xxl container">
		
				<div class="brator-blog-post">
					<?php
					if ( have_posts() ) : ?>
                        <div class="row">
                        <?php 
                            while ( have_posts() ) :
                                the_post();
                                ?>
                                
                                <div class="col-12">
                                 <div class="row">
                                    <div class="col">
                                       <div class="tabs">
                                    <?php
                                    get_template_part( 'template-parts/blog-layout/faq-content' );
                                ?>
                                       </div>
                                    </div>
                                </div>
                                </div>
                    
                            
                            <?php
                            endwhile;
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif; ?>
				

                    </div>
                    <?php
					wp_reset_postdata();
					?>
					<?php if ( get_the_posts_pagination() ) : ?>
						<div class="brator-pagination-box ">
							<?php
								
							?>
						</div>
					<?php endif; ?>
				</div>
			
	</div>
</div>
<?php
get_footer();
