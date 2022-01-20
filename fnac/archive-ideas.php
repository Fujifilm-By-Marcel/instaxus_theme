<?php get_header('attachment');

function get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 110);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	return $excerpt;
}


function my_sort_function($a, $b) {
    if ($a->order == $b->order) {
        return 0;
    } elseif ($a->order < $b->order) {
        return -1;
    } else {
        return 1;
    }
}

global $wp_query;

//echo "<pre>";
//print_r($wp_query);
//echo $wp_query->query['idea_tags'];
//echo $wp_query->query['post_type'];
//echo "</pre>";
?>
<style>	
.container-fluid {
	padding-right: 15px;
	padding-left: 15px;
	margin-right: auto;
	margin-left: auto;
}

ul.tag-list {
	margin:0;
	padding:0;
	list-style:none;
}
ul.tag-list li{
    min-width: 180px;
    height: 48px;
    font-size: 18px;
	margin:0 10px 10px 0;
	float: left;
    background: #ccc;
	position: relative;
}
ul.tag-list li a{
    display: flex;
    align-items: center;
	justify-content: center;
    height: 100%;
}


ul.posts_list {
    margin: 0;
    padding: 0;
    list-style-type: none;
	
	display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 0;
}
.posts_list li {
    width: 23.92%;
    margin-right: 1.43%;
    display: block;
    float: left;
    display: block;
    overflow: hidden;
    border-radius: 3px;
    border: 1px solid #d8dbe1;
}

.posts_list li {
    float: none;
    line-height: 1.5;
}



.posts_list a {
    color: #000;
    font-size: 15px;
    letter-spacing: 0.05em;
    padding: 12px 12px 25px;
    display: block;
}
.posts_list a {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    height: 100%;
}


.posts_list__img {
    margin: 0 auto 12px;
    overflow: hidden;
    position: relative;
	width: 100%;
}

.posts_list__img span {
    display: block;
    position: relative;
    width: 100%;
    transition: 0.45s cubic-bezier(0.75, 0.1, 0.16, 1);
}

.posts_list__img img {
    position: relative;
    display: block;
    width: auto;
}




.posts_list a:hover span {
    -webkit-transform: scale(1.08);
    -ms-transform: scale(1.08);
    transform: scale(1.08);
}

.posts_list h5 {    
    font-size: 16px !important;
	line-height: 28px;
    height: auto;
    min-height: auto;
	padding-top: 0;
    padding-bottom: 10px;
}


.posts_list__discription{
	
}
.posts_list__discription p{
    font-size: 12px !important;
    color: #a8adbc !important;
    word-break: break-all;
    margin-bottom: 12px;
    font-weight: 900 !important;
	line-height: 20px;
}

.posts_list__level {
    margin-top: auto;
    font-size: 14px !important;
    font-weight: 900 !important;
}
.posts_list__level span.red {
    color: #ee0026;
}

.helvetica-font{
	font-family:"Helvetica Neue", Helvetica, Arial, sans-serif !important;
}

.posts_list__tag{
	display: inline-block;
    padding: 2px 6px;
    font-size: 14px !important;
	margin-right: 5px;
}

.posts_list__level span {
    display: inline-block;
    margin: 0 1px;
    color: #a8adbc;
    font-size: 14px;
}

.re-category_btns{
    margin-bottom: 20px;
    overflow: hidden;
}
.re-category_btns a.is-active::before {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    border-style: solid;
    border-color: transparent;
    border-width: 10px 10px 0 10px;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}

/*
.posts_list.five_column li .posts_list__img img {
    height: 236px;
}
*/

/*
@media (min-width:1200px){
	.posts_list.five_column li {
		width: 18.8%;
		margin-right: 1.5%;
		margin-bottom: 15px;
	}
	.posts_list.five_column li:nth-child(5n) {
		margin-right: 0;
	}

	.posts_list.five_column li a {
		padding-bottom: 20px;
	}
}
*/
@media (min-width:1200px){
	.posts_list.five_column li {
		width: 23.8%;
		margin-right: 1.5%;
		margin-bottom: 15px;
	}
	.posts_list.five_column li:nth-child(4n) {
		margin-right: 0;
	}

	.posts_list.five_column li a {
		padding-bottom: 20px;
	}
}
@media (min-width:601px) and (max-width:1199px){
	.posts_list.five_column li {
		width: 31.8%;
		margin-right: 1.5%;
		margin-bottom: 15px;
	}
	.posts_list.five_column li:nth-child(3n) {
		margin-right: 0;
	}

	.posts_list.five_column li a {
		padding-bottom: 20px;
	}
}
/*
@media (min-width:600px) and (max-width:767px){
	.posts_list.five_column li {
		width: 48.8%;
		margin-right: 1.5%;
		margin-bottom: 15px;
	}
	.posts_list.five_column li:nth-child(2n) {
		margin-right: 0;
	}

	.posts_list.five_column li a {
		padding-bottom: 20px;
	}
}*/
@media (max-width:600px){
	.posts_list.five_column li {
		width: 100%;
		margin-right: 0%;
		margin-bottom: 15px;
	}
	.posts_list.five_column li a {
		padding-bottom: 20px;
	}
}

</style>



<div class="breadcrumb full-width">
	<div class="background-breadcrumb"></div> 
   
	<div class="background featured-image instazine-banner mb-3" style="background-image: url('/wp-content/themes/Instax/images/instazine-feature.jpg'); background-size: cover; background-repeat:no-repeat;background-position:center;">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">
				<div class="clearfix">
					<div class="s-transparent-box">
						<h1 id="title-page">
							Inspiration
						</h1>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="re-category_btns">
				<ul class="tag-list">
				<?php 
				$terms = get_terms( array( 
					'taxonomy' => 'inspiration_tags',
					//'orderby' => 'term_id',
					//'order' => 'ASC',
				) );
				
				if ($terms) {
					foreach ($terms as $index => $term) {
						$terms[$index]->order = get_field('order', 'post_tag_'.$term->term_id);
					}
					usort($terms, 'my_sort_function');
				}

				//echo "<pre>";
				//print_r($terms);
				//echo "</pre>";
				
				$al = get_post_type_archive_link( 'inspiration' );
				$i = 1;	
				$index = $i*2;				
				
				$tn = "All";
				$bc = "#00677f";
				$tc = "#c0f2ea";

				if( $wp_query->query['post_type'] == 'inspiration' ){
					$ac = "is-active";
				}else{
					$ac = "";
				}
				
				
				echo "<style>.re-category_btns li:nth-child(5n+$index) a.is-active::before {border-top-color: $bc;}</style>";
				echo "<li style='background-color:$bc;'><a style='color:$tc' href='$al' class='$ac'>$tn</a></li>";
				
				foreach($terms as $val){
					
					$i++;
					$index = $i*2;
					
					//echo "<pre>";	
					//print_r($val);
					//echo "</pre>";
					
					$term_id = $val->term_id;
					$tn = $val->name;
					$ts = $val->slug;
			
					$identifier = "post_tag_".$term_id;
					
					$bc = get_field('background_color', $identifier);
					$tc = get_field('text_color', $identifier);
					$tl = get_tag_link( $term_id );					
					
					if( $wp_query->query['inspiration_tags'] == $ts ){
						$ac = "is-active";
					}else{
						$ac = "";
					}
					
					echo "<style>.re-category_btns li:nth-child(5n+$index) a.is-active::before {border-top-color: $bc;}</style>";
					echo "<li style='background-color:$bc;'><a style='color:$tc;' href='$tl' class='$ac'>$tn</a></li>";
					
					
					
				}

				?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php
						


			
			$args = array(
				'post_type' => 'inspiration',
				'posts_per_page' => -1,
			);
			
			$tag = $wp_query->query['inspiration_tags'];
			
			if ( $tag ) {
				$args = array(
					'post_type' => 'inspiration',
					'posts_per_page' => -1, 
					'inspiration_tags' => $tag,
				); 
			}
			
			// The Query
			$the_query = new WP_Query( $args );
			
			
			 
			// The Loop
			if ( $the_query->have_posts() ) {
				echo '<ul class="posts_list five_column">';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					//echo "<pre>";
					//print_r($the_query);
					//echo "</pre>";
					
					$PID = $the_query->post->ID;
					
					//echo "<pre>";
					//print_r(get_the_terms( $PID, 'idea_tags'));
					//echo "</pre>";					
					
					$t = get_the_terms( $PID, 'inspiration_tags');	
						//print_r($t);
					if ($t) {
						foreach ($t as $index => $term) {
							$t[$index]->order = get_field('order', 'post_tag_'.$term->term_id);
						}
						usort($t, 'my_sort_function');
					}					
					
					
					?>
					<li>
						<a href="<?php echo get_permalink($PID) ?>">
							<p class="posts_list__img">
								<span><img src="<?php the_field("main_visual", $PID ) ?>" class="attachment-medium size-medium wp-post-image" ></span>
							</p>
							<div>
							<?php
							foreach($t as $v){
								$tn = $v->name;				
								$tid = $v->term_id;
								$identifier = "post_tag_".$tid;
								$bc = get_field('background_color', $identifier);
								$tc = get_field('text_color', $identifier);
								$tl = get_tag_link( $tid );
								echo "<p class='posts_list__tag' style='color:$tc !important;background-color:$bc;'>$tn</p>";
							}
							?>
							</div>
							<?php //echo "<div><p class='posts_list__tag' style='color:$tc !important;background-color:$bc;'>$tn</p></div>"; ?>				
							<?php the_title("<h5 class='helvetica-font'>", "</h5>") ?>
							<div class="posts_list__discription" > 
								<p><?php echo get_excerpt() ?></p>
							</div>
							<?php if( get_field("level_of_difficulty", $PID ) != "disabled" ){ ?>
							<p class="posts_list__level">Level of difficulty:
								<?php 								
								for ($i=0; $i<3; $i++){
									if(get_field("level_of_difficulty", $PID )>$i){
										$dlc = "red";
									}
									else{
										$dlc = "";
									}
									echo "<span class='$dlc'>★</span>";
								}								
								?>
							</p>
							<?php } ?>							
						</a>						
					</li>
					<?php
				}
				echo '</ul>';
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>

<?php
/*
echo "<pre>";
print_r(get_the_terms( get_the_ID(), 'idea_tags'));
echo "</pre>";
*/
?>




<?php get_footer() ?>