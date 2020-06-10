<div class="press-hub sidebar col-md-3">
	
	<!-- <button class="goback-btn" onclick="goBack()"><</button> -->

	<form method="get" class="searchform" id="search form" action="/">	
		<div>
			<input type="text" value="" placeholder="SEARCH ARTICLES" name="s" id="s" />
			<input type="hidden" value="297" name="cat" id="scat" />
			
			<div class="press-search-wrap">
				<input type="submit" id="search_submit" name="Search" value=""/>
				<div class="press-submit fa fa-search"></div>
			</div>
			
		</div>
	</form>

	<div class="clearboth">
		<div class="filter-trigger-wrapper">
			<div class="filter-trigger by-category">FILTER BY CATEGORY</div>
		</div>
	</div>             
	<div class="filter-options by-category">
		<ul>
			<li class="product-links"><a href="/tag/press-cameras/">Cameras</a></li>
			<li class="product-links"><a href="/tag/press-film/">Film</a></li>
			<li class="product-links"><a href="/tag/press-printers/">Printers</a></li>
		</ul>
	</div>
	<div class="clearboth">
		<div class="filter-trigger-wrapper by-date">
			<div class="filter-trigger by-date">FILTER BY DATE</div>
		</div>
	</div>             
	<div class="filter-options by-date">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Press Hub Archive") ) : ?>
<?php endif;?>
	</div>
	<div class="ph-menu">
		<h4 class="menu-title">PRESS HUB</h4>
		<ul>
			<li><a href="/press-hub"><h4>NEWS</h4></a></li>
			<li><a href="/press-hub/press-image-bank"><h4>IMAGE BANK</h4></a></li> 
		</ul>
		<h4 class="title-smaller">CONTACT US</h4>
		<p style="margin-bottom: 0;"><a href="mailto:instax_uk@fujifilm.com" class="email-link">instax_uk@fujifilm.com</a></p>
		
	</div>
	<?php get_sidebar(); ?>
</div>  