<?php 

get_header();

$ids = get_the_ID();

$art = new WP_Query([
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array($ids),
]);

get_template_part('parts/breadcrumbs');

?>

	<section class="article-block">
		<div class="content-width">
			<h1><?php the_title();?></h1>
			<div class="content">
				<div class="main">
					<figure>
						<?php if(has_post_thumbnail()):?>
							<img src="<?php the_post_thumbnail_url();?>" alt="<?= strip_tags(get_the_title());?>">
						<?php endif;?>
					</figure>
					<div class="mini-menu">
						<div class="wrap-toc">
							<h2>Содержание</h2>
							<?= do_shortcode('[ez-toc]');?>
						</div>
					</div>
					<?php the_content();?>

					<div class="bottom-table">
						<h2>Поделиться</h2>
						<ul class="soc a2a_kit">
							<li><a class="a2a_button_vk"><i class="fab fa-vk"></i></a></li>
							<li><a class="a2a_button_telegram"><i class="fab fa-telegram-plane"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="sidebar">
					<div class="item">
						<h2>Поделиться</h2>
						<ul class="soc a2a_kit">
							<li><a class="a2a_button_vk"><i class="fab fa-vk"></i></a></li>
							<li><a class="a2a_button_telegram"><i class="fab fa-telegram-plane"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if($art->have_posts()):?>

		<section class="blog">
			<div class="content-width">
				<h2>Другие статьи <img src="<?= get_template_directory_uri();?>/img/icon-54.svg" alt=""></h2>
				<div class="content">

					<?php while($art->have_posts()): $art->the_post();

						get_template_part('parts/post');

					endwhile;

					wp_reset_postdata();?>

				</div>

			</div>
		</section>

	<?php endif;?>

	<script async src="https://static.addtoany.com/menu/page.js"></script>
<?php 

get_footer();

?>