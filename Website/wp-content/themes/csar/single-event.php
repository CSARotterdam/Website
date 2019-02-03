<?php get_header(); ?>

	<main>
		<?php if (get_the_post_thumbnail_url($post -> ID)): ?>
			<img class="img-fluid" src="<?php echo get_the_post_thumbnail_url($post -> ID); ?>" title="<?php echo $post -> post_title; ?>" alt="<?php echo $post -> post_title; ?>">
		<?php endif; ?>

		<div class="bg-light">
			<div class="container content-container">
				<div class="row">
					<div class="col-12">
						<h3 class="subtitle centered-header"><?php echo get_the_author_meta('display_name', $post -> post_author); ?> | <?php echo get_the_date("j F Y", $post); ?></h3>
						<h1 class="centered-header page-title sub-header"><?php echo get_the_title($post -> ID); ?></h1>
					</div>

					<div class="col-12 col-md-6 col-lg-8">
						<p class="content-justify"><?php echo apply_filters('the_content', $post -> post_content); ?></p>
					</div>

					<div class="col-12 col-md-6 col-lg-4">
						<table class="table">
							<?php
								$data = get_post_meta( $post -> ID );
							?>

							<tr>
								<td><?php echo __("Organisatie", "csar-theme"); ?></td>
								<td><?php echo $data["event_orgnisator"][0]; ?></td>
							</tr>
							<tr>
								<td><?php echo __("Locatie", "csar-theme"); ?></td>
								<td><?php echo $data["event_locatie"][0]; ?></td>
							</tr>
							<tr>
								<td><?php echo __("Start", "csar-theme"); ?></td>
								<td><?php echo $data["event_begindatum_date"][0] . " " . $data["event_begindatum_time"][0]; ?></td>
							</tr>
							<tr>
								<td><?php echo __("Eind", "csar-theme"); ?></td>

								<td>
									<?php
										if ( $data["event_einddatum_date"][0] == $data["event_einddatum_date"][0] ) {
											echo $data["event_einddatum_time"][0];
										} else {
											echo $data["event_einddatum_date"][0] . " " . $data["event_einddatum_time"][0];
										}
									?>
								</td>
							</tr>
								<td><?php echo __("Prijs", "csar-theme"); ?></td>
								<td><?php echo $data["event_kosten"][0]; ?></td>
							</tr>
						</table>
					</div>
				</div> <!-- row-->
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>