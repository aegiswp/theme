<?php // phpcs:ignore WPThemeReview.Templates.ReservedFileNamePrefix.ReservedTemplatePrefixFound
/**
 * Page Header.
 *
 * @package Aeon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'aeon_get_title' ) ) {
	/**
	 * Get the title for the current page.
	 *
	 * @since 1.0.0
	 */
	function aeon_get_title() {
		$title = aeon_get_option( 'hide_title' );

		if ( is_singular() ) {
			$layout_meta = get_post_meta( get_the_ID(), 'aeon-disable-title', true );

			if ( $layout_meta ) {
				$title = $layout_meta;
			}
		}

		return apply_filters( 'aeon_hide_title', $title );
	}
}

if ( ! function_exists( 'aeon_post_id' ) ) {
	/**
	 * Store current post ID.
	 *
	 * @since 1.0.0
	 */
	function aeon_post_id() {

		// Default value.
		$id = '';

		// If singular get_the_ID.
		if ( is_singular() ) {
			$id = get_the_ID();
		} elseif ( class_exists( 'WooCommerce' ) && is_shop() ) {
			// Get ID of WooCommerce product archive.
			$shop_id = wc_get_page_id( 'shop' );
			if ( isset( $shop_id ) ) {
				$id = $shop_id;
			}
		} elseif ( is_home() && $page_for_posts = get_option( 'page_for_posts' ) ) { // phpcs:ignore Squiz.PHP.DisallowMultipleAssignments.FoundInControlStructure
			// Posts page.
			$id = $page_for_posts;
		}

		// Apply filters.
		$id = apply_filters( 'aeon_post_id', $id );

		// Sanitize.
		$id = $id ? $id : '';

		// Return ID.
		return $id;

	}
}

if ( ! function_exists( 'aeon_page_title' ) ) {
	/**
	 * Page title
	 *
	 * @since 1.0.0
	 */
	function aeon_page_title() {

		// Default title is null.
		$title = null;

		// Get post ID.
		$post_id = aeon_post_id();

		// Homepage - display blog description if not a static page.
		if ( is_front_page() && ! is_singular( 'page' ) ) {

			if ( get_bloginfo( 'description' ) ) {
				$title = get_bloginfo( 'description' );
			} else {
				$title = esc_html__( 'Recent Posts', 'aeonwp' );
			}

		} elseif ( is_home() && ! is_singular( 'page' ) ) {
			// Homepage posts page.
			$title = get_the_title( get_option( 'page_for_posts', true ) );
		} elseif ( is_search() ) {
			// Search needs to go before archives.
			global $wp_query;
			$title = '<span id="search-results-count">' . $wp_query->found_posts . '</span> ' . esc_html__( 'Search Results Found', 'aeonwp' );
		} elseif ( is_archive() ) {
			// Archives.
			if ( is_post_type_archive() ) {
				// Post Type archive title.
				$title = post_type_archive_title( '', false );
			} elseif ( is_day() ) {
				// Daily archive title.
				/* translators: used to get the date */
				$title = sprintf( esc_html__( 'Daily Archives: %s', 'aeonwp' ), get_the_date() );
			} elseif ( is_month() ) {
				// Monthly archive title.
				/* translators: used to get the monthly date */
				$title = sprintf( esc_html__( 'Monthly Archives: %s', 'aeonwp' ), get_the_date( esc_html_x( 'F Y', 'Page title monthly archives date format', 'aeonwp' ) ) );
			} elseif ( is_year() ) {
				// Yearly archive title.
				/* translators: used to get the yearly date */
				$title = sprintf( esc_html__( 'Yearly Archives: %s', 'aeonwp' ), get_the_date( esc_html_x( 'Y', 'Page title yearly archives date format', 'aeonwp' ) ) );
			} else {
				// Categories/Tags/Other.

				// Get term title.
				$title = single_term_title( '', false );

				// Fix for plugins that are archives but use pages.
				if ( ! $title ) {
					global $post;
					$title = get_the_title( $post_id );
				}
			}
		} elseif ( is_404() ) {
			// 404 Page.
			$title = esc_html__( '404: Page Not Found', 'aeonwp' );
		} elseif ( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url() ) {
			// Fix for WooCommerce - My Account pages.
			$endpoint       = WC()->query->get_current_endpoint();
			$endpoint_title = WC()->query->get_endpoint_title( $endpoint );
			$title          = $endpoint_title ? $endpoint_title : $title;
		} elseif ( $post_id ) {
			// Anything else with a post_id defined.

			if ( is_singular( 'page' ) || is_singular( 'attachment' ) ) {
				// Single Pages.
				$title = get_the_title( $post_id );
			} elseif ( is_singular( 'post' ) ) {
				// Single blog posts.
				$title = get_the_title();
			} else {
				// Other posts.
				$title = get_the_title( $post_id );
			}
		}

		// Last check if title is empty.
		$title = $title ? $title : get_the_title();

		// Apply filters and return title.
		return apply_filters( 'aeon_title', $title );

	}
}

if ( ! function_exists( 'aeon_get_page_header' ) ) {
	/**
	 * Page header template
	 *
	 * @since 1.0.0
	 */
	function aeon_get_page_header() {
		
		// Return if page header is disabled.
		if ( aeon_get_title() ) {
			return;
		}

		// Breadcrumbs.
		$breadcrumb = aeon_get_option( 'add_breadcrumbs' );

		// Wrapper classes.
		$classes = array( 'aeon-page-header' );
		$breadcrumbs_classes = array( 'aeon-breadcrumbs' );
		if ( true === $breadcrumb && ! is_author() ) {
			$classes[] = 'has-breadcrumb';
		}

		// Class for customizer preview
		$title = aeon_get_option( 'hide_title' );
		if ( is_customize_preview() ) {
			if ( true === $breadcrumb && ! is_author() ) {
				$breadcrumbs_classes[] = 'show-breadcrumbs';
			} else {
				$breadcrumbs_classes[] = 'hide-breadcrumbs';
			}
		}
		?>

		<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
			<div class="container">
				<?php
				if ( is_author() ) {
					$author_id = get_the_author_meta( 'ID' );
					$description = get_the_author_meta( 'description' );
					$user_url = get_the_author_meta( 'user_url' );
					$user_data = get_userdata( $author_id );
					$joined_date = '';
					$posts_count = count_user_posts( $author_id );

					if ( $user_data && isset( $user_data->user_registered ) ) {
						$joined_date = date(
							get_option( 'date_format', '' ),
							strtotime( $user_data->user_registered )
						);
					}

					$comments_count = get_comments( [
						'type' => 'comment',
						'user_id' => $author_id,
						'approved' => 1,
						'count' => true,
					] );
					?>

					<header class="aeon-author-header">
						<div class="aeon-author-name">
							<?php echo get_avatar( $author_id, 60 ); ?>

							<h1 class="aeon-page-header-title" title="<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>" <?php aeon_do_microdata( 'headline' ); ?>><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h1>
						</div>

						<?php
						if ( $description ) {
							?>
							<div class="aeon-author-description"><?php echo esc_html( $description ); ?></div>
							<?php
						}
						
						if ( $user_url ) {
							?>
							<div class="aeon-author-url"><a href="<?php echo esc_url( $user_url ); ?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo esc_html( $user_url ); ?></a></div>
							<?php
						}
						
						if ( $joined_date || $posts_count || $comments_count ) {
							?>
							<ul class="aeon-author-meta">
								<?php
								if ( $joined_date ) {
									?>
									<li class="meta-date"><?php echo esc_html( __( 'Joined', 'aeonwp' ) ); ?>: <?php echo esc_html( $joined_date ); ?></li>
									<?php
								}
								if ( $posts_count ) {
									?>
									<li class="meta-articles"><?php echo esc_html( __( 'Articles', 'aeonwp' ) ); ?>: <?php echo esc_html( $posts_count ); ?></li>
									<?php
								}
								if ( $comments_count ) {
									?>
									<li class="meta-comments"><?php echo esc_html( __( 'Comments', 'aeonwp' ) ); ?>: <?php echo esc_html( $comments_count ); ?></li>
									<?php
								} ?>
							</ul>
							<?php
						} ?>
					</header>
					<?php
				} else {
					?>
					<h1 class="aeon-page-header-title"><?php echo wp_kses_post( aeon_page_title() ); ?></h1>
					<?php
					if ( ( true === $breadcrumb || is_customize_preview() ) ) {
						?>
						<div class="<?php echo esc_attr( implode( ' ', $breadcrumbs_classes ) ); ?>">
							<?php
							if ( function_exists( 'yoast_breadcrumb' ) ) {
								// Check if breadcrumb is turned on from WPSEO option.
								yoast_breadcrumb();
							} elseif ( function_exists( 'bcn_display' ) ) {
								// Check if breadcrumb is turned on from Breadcrumb NavXT plugin.
								'<div class="aeon-breadcrumb-navxt" typeof="BreadcrumbList" vocab="https://schema.org/">' . bcn_display() . '</div>';
							} elseif ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
								// Check if breadcrumb is turned on from Rank Math SEO plugin.
								rank_math_the_breadcrumbs();
							} else {
								// Load default breadcrumb.
								echo aeon_get_breadcrumb_trail(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div><!-- .aeon-page-header -->
		<?php
	}
	add_action( 'aeon_after_header', 'aeon_get_page_header', 10 );
}
