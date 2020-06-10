<?php /* Template Name: Image Bank Template */ ?>

<?php get_header(); ?>
<?php
    $logancee_options = logancee_get_options();

    $post_layout = $logancee_options['layout-type-single-post'];
    $blog_layout = $logancee_options['layout-type-blog'];

    $post_layout = (isset($_GET['layout-type-single-post'])) ? $_GET['layout-type-single-post'] : $post_layout;
    $blog_layout = (isset($_GET['layout-type-blog'])) ? $_GET['layout-type-blog'] : $blog_layout;

    $wrap_class = '';
    $post_class = 'post';

    if($logancee_options['blog-article_list_template'] == 'grid_3_columns'){
        $post_class .= ' post-with-3-columns ';
    }

    ?>

	<div id="primary">
		<div class="container">
			<?php include 'press-hub-sidebar.php'; ?> <!-- get press hub sidebar -->
			<div class="col-md-9 image-bank-wrap">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>
			</div> <!-- col-md-9 -->
		</div><!-- container -->
	</div><!-- #primary -->

<script type="text/javascript" src="http://www.instax.co.uk//wp-content/themes/Instax/js/jszip.min.js"></script>
<script type="text/javascript" src="http://www.instax.co.uk//wp-content/themes/Instax/js/jszip-utils.min.js"></script>
<script type="text/javascript" src="http://www.instax.co.uk//wp-content/themes/Instax/js/FileSaver.min.js"></script>
<script>
	jQuery("#checkAll").click(function () {
		jQuery('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
<script>
	// Show the first tab and hide the rest
	jQuery('#tabs-nav li:first-child').addClass('active');
	jQuery('.tab-content').hide();
	jQuery('.tab-content:first').show();

	// Click function
	jQuery('#tabs-nav li').click(function(){
	jQuery('#tabs-nav li').removeClass('active');
	jQuery(this).addClass('active');
	jQuery('.tab-content').hide();
	
	var activeTab = jQuery(this).find('a').attr('href');
	jQuery(activeTab).fadeIn();
	return false;
	});
</script>
<script>
jQuery(function () {
	jQuery('.download-button').click(function () {
		var urls = [];
		jQuery("input:checked").each(function () {
			var $this = jQuery(this);
			var url = $this.val();
			urls.push(url);
		});

		if (urls.length < 1) {
			alert('Please select some images first');
			return false;
		}
		
		var zip = new JSZip();
		var count = 0;
		var zipFilename = "zipFilename.zip";
		
		urls.forEach(function(url){
		var filename = "filename";
		// loading a file and add it in a zip file
		JSZipUtils.getBinaryContent(url, function (err, data) {
			if(err) {
				throw err; // or handle the error
			}
			zip.file(count + '.png', data, {binary:true});
			count++;
			console.log(count);
			if (count == urls.length) {
			//var zipFile = zip.generate({type: "blob"});
			//saveAs(zipFile, zipFilename);
			// when everything has been downloaded, we can trigger the dl
			zip.generateAsync({type:"blob"}, function updateCallback(metadata) {
			var msg = "progression : " + metadata.percent.toFixed(2) + " %";
			if(metadata.currentFile) {
				msg += ", current file = " + metadata.currentFile;
			}
			//showMessage(msg);
			//updatePercent(metadata.percent|0);
		})
		.then(function callback(blob) {

			// see FileSaver.js
			saveAs(blob, "instax-images.zip");

			//showMessage("done !");
		}, function (e) {
			showError(e);
		});
			}
		});
		});
	});
});
</script>

<?php get_footer(); ?>
