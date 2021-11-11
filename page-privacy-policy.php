<?php
get_header();
?>
<style>
	#main{
		overflow: visible !important;
	}
	.l-components > .container{
		margin: auto !important;
		width: 90% !important;
	}
</style>
<?php
include('fnac/simplehtmldom_1_9_1/simple_html_dom.php');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.fujifilm.com/us/en/privacy");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
$html = str_get_html($output);
$elem = $html->find('section[class=l-components]', 0);
echo $elem;
get_footer();