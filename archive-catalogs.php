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

<div class="brator-blog-post-area catalogs-archive">
	<div class="container-xxxl container-xxl container">
		<div class="row">
			<div class="col-lg-12">
				<div class="brator-breadcrumb">
					<h1 class="text-center">Download Accessories Catalog</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="container-xxxl container-xxl container">
		
				<div class="brator-blog-post">
					<?php
					if ( have_posts() ) : ?>
                        <div class="row">
                        <?php 
                            while ( have_posts() ) :
                                the_post();
                                ?>
                                
                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                    <?php
                                    get_template_part( 'template-parts/blog-layout/blog-catalog-content' );
                                ?>
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
								the_posts_pagination(
									array(
										'mid_size'  => 2,
										'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
									  </svg>' . esc_html__( 'Prev', 'brator' ),
										'next_text' => esc_html__( 'Next', 'brator' ) . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path></svg>',
									)
								);
							?>
						</div>
					<?php endif; ?>
				</div>
			
	</div>
</div>
<?php
get_footer();
