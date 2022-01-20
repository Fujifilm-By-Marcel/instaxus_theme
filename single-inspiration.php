<?php 

get_header('attachment');

function my_sort_function($a, $b) {
    if ($a->order == $b->order) {
        return 0;
    } elseif ($a->order < $b->order) {
        return -1;
    } else {
        return 1;
    }
}

$level_of_difficulty = get_field('level_of_difficulty');
$main_visual = get_field('main_visual');


$PID = get_the_ID();	
$t = get_the_terms( $PID, 'inspiration_tags');
if ($t) {
	foreach ($t as $index => $term) {
		$t[$index]->order = get_field('order', 'post_tag_'.$term->term_id);
	}
	usort($t, 'my_sort_function');
}

?>

<style>
.container-fluid {
	padding-right: 15px;
	padding-left: 15px;
	margin-right: auto;
	margin-left: auto;
}
.row-steps{
	display: table;
    margin-bottom: 16px;
    width: 100%;
}
.col-image{
	display: table-cell;
    vertical-align: top;
    width: 225px;
    padding-right: 25px;
}
.col-instructions{
	display: table-cell;
    vertical-align: middle;
}
.ideas_work__img {
    text-align: right;
    float: right;
    width: 350px;
}

.ideas_work__texts {
    float: left;
    width: 450px;
    padding-right: 25px;
}
.ideas_work__texts .level {
    font-size: 15px;
    font-weight: bold;
    letter-spacing: 1px;
    margin-bottom: 50px;
}

.ideas_work__texts .level span {
    display: inline-block;
    margin: 0 3px;
    color: #a8adbc;
    font-size: 17px;
}

.ideas_work__texts .level span.red {
    color: #ee0026;
}

.ideas_work__texts .discription {
    font-size: 15px;
    margin-bottom: 15px;
}

.ideas_work__texts .tag {
	font-size: 15px !important;
    color: #fff !important;
    background: #000;
    padding: 2px 8px 0px 8px;
    display: inline-block;
    letter-spacing: 1px;
	margin-right: 10px;
}

.ideas_work__texts .level span.red {
    color: #ee0026;
}

/*@media (max-width: 768px){
	.ideas_work__img img {
		width: 100%;
	}
	.ideas_work__img {
		width: 100%;
		margin-bottom: 23px;
	}
}*/

@media (max-width:1261px) { /*and (min-width:769px){*/
	.ideas_work__img{
		float:none;
		text-align: left;
	}
	.ideas_work__img{
		width:100%;
	}
	.ideas_work__texts{
		width:100%;
		padding-right:0;
	}
	
	
}

@media (max-width:600px) {
	.col-image{
		display:block;
		width:100%;
		padding-right:0;
	}
	
	.col-instructions{
		display:block;
		width:100%;
		vertical-align: top;
	}
	.row-steps {
		display: block;
	}
}

</style>



<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="crumb">
			  <div class="inner"><a href="/instax-at-home/inspiration/">Back to inspiration</a></div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="ideas_work__img">
						<img src="<?php echo $main_visual ?>">            
					</div>
					<div class="ideas_work__texts">
						<?php
						foreach($t as $v){
							$tn = $v->name;				
							$tid = $v->term_id;
							$identifier = "post_tag_".$tid;
							$bc = get_field('background_color', $identifier);
							$tc = get_field('text_color', $identifier);
							$tl = get_tag_link( $tid );
							echo "<a href='$tl'><p class='tag' style='color:$tc !important;background-color:$bc;'>$tn</p></a>";
						}
						?>
						<h2 class="headline"><?php the_title() ?></h2>						
						<?php if( $level_of_difficulty != "disabled" ){ ?>
						<p class="level">Level of difficulty:
							<?php 							
							for ($i=0; $i<3; $i++){
								if($level_of_difficulty>$i){
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
						<?php the_content(); ?>
					</div>
					
					
				</div>
			</div>
			<?php			
			if( have_rows('steps') ):
				while ( have_rows('steps') ) : the_row();					
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					$image_url = get_sub_field('image');
			?>
			<div class="row-steps">
				<div class="col-image">
					<img src='<?php echo $image_url ?>'>
				</div>
				<div class="col-instructions">
					<h3><?php echo $title ?></h3>
					<?php echo $text ?>
				</div>
			</div>
			<?php
				endwhile;
			endif;
			?>	
			<hr>
			<div class="crumb">
			  <div class="inner"><a href="/instax-at-home/inspiration/">Back to inspiration</a></div>
			</div>			
		</div>
	</div>
</div>

<?php get_footer() ?>