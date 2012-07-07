<!DOCTYPE html>
<!-- initial head tags -->
<html xmlns:og="http://opengraphprotocol.org/schema/" itemscope itemtype="http://schema.org/Book" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<title><?php pagetitle(); ?></title>
<!--opengraph-->
<meta property="og:title" content="<?php pagetitle(); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" />
<meta property="og:image" content="<?php 
//if (function_exists('catch_that_image')) {echo catch_that_image(); } 
//uncomment the next line and comment the last if the site uses the taxonomy images plugin
print $image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '' ); 
?>" />
<meta property="og:site_name" content="<?php wp_title(''); ?>" />
<meta property="fb:admins" content="517354557" />

<!-- Google+ graph -->
<meta itemprop="name" content="<?php wp_title(''); ?>">
<meta itemprop="description" content="<?php story_description(); ?>">
<meta itemprop="image" content="<?php 
//if (function_exists('catch_that_image')) {echo catch_that_image(); }
//uncomment the next line and comment the last if the site uses the taxonomy images plugin
print $image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '' ); 
?>"/>

<!--mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/icon.png"/> 
<meta name="apple-mobile-web-app-capable" content="yes">

<!--styles-->
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/comics-mobile.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 0px) and (max-width: 480px)" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/comics.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 481px)" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" rel="stylesheet" type="text/css" media="print" />
<!--[if IE]>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/modernizr.js"></script>
<![endif]-->

<!--scripts-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/iscroll.js" id="iscroll"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/comics.js"></script>
	
</head>

<body <?php body_class(); ?>>

<header>

<span id="home">
<a href="<?php bloginfo('url'); ?>/comics"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" width="30" height="30" alt="Return to Main"></a>
</span>
<h1><?php wp_title(''); ?></h1>

<span id="social">
  <!--like button-->
    <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2F<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" style="border:none; overflow:hidden; width:80px; height:20px;"></iframe>
  <!--tweet button-->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
     <a href="http://twitter.com/share" class="twitter-share-button">Tweet</a>
  <!--Google+ button-->
<g:plusone size="medium" annotation="inline" width="120"></g:plusone>
  </span>

</header>

<div id="container">
<span class="button" id="prev">&lsaquo;</span>
<div id="slideshow">
	<div id="scroller">
	  <ul id="slides">
 <!-- wp content begins here   -->   
  <!-- next line reverses the orders of the pages and sets the page limit to unlimited -->   
  
<?php global $query_string; query_posts($query_string . "&order=ASC&posts_per_page=-1"); ?>


 <!-- next lines publish the posts   -->  
 <?php remove_filter ('the_content', 'wpautop'); ?>
  
		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

							<li class="page"><?php the_content(); ?></li>
	
			<?php endwhile; ?>
	
	<?php else : ?>

		<h2>Huh? Where is the comic book?</h2>

	<?php endif; ?>
 
 <!-- wp content ends here   -->     
 
    
      </ul>
	</div><!--scroller-->
</div><!--slideshow-->
<span class="button" id="next">&rsaquo;</span>
</div><!--container-->

<ul id="indicator">
</ul>

<footer>
<!--comments-->
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=144864672250472&amp;xfbml=1"></script><fb:comments href="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" num_posts="100" width="320"></fb:comments>
</footer>
<!-- Google+ button function -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<!--google analytics-->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9259708-1");
pageTracker._trackPageview();
} catch(err) {}</script><!--google analytics-->

<?php wp_footer(); ?>

</body>
</html>