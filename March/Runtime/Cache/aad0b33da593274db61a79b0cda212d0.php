<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Responsive Image Gallery with jQuery" />
        <meta name="keywords" content="jquery, carousel, image gallery, slider, responsive, flexible, fluid, resize, css3" />
		<meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="__ROOT__/Common/photo/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="__ROOT__/Common/photo/css/style.css" />
		<link rel="stylesheet" type="text/css" href="__ROOT__/Common/photo/css/elastislide.css" />
		<script type="text/javascript" src="__ROOT__/March/Common/js/jquery.min.js"></script>
		<script type="text/javascript" src="__ROOT__/Common/photo/js/jquery.tmpl.min.js"></script>
		<script type="text/javascript" src="__ROOT__/Common/photo/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="__ROOT__/Common/photo/js/jquery.elastislide.js"></script>
		<script type="text/javascript" src="__ROOT__/Common/photo/js/gallery.js"></script>
		<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
				
			</style>
		</noscript>
		<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
			<div class="rg-image-wrapper">
				{{if itemsCount > 1}}
					<div class="rg-image-nav">
						<a href="#" class="rg-image-nav-prev">Previous Image</a>
						<a href="#" class="rg-image-nav-next">Next Image</a>
					</div>
				{{/if}}
				<div class="rg-image" style="height:500px;"></div>
				<div class="rg-loading"></div>
				<div class="rg-caption-wrapper">
					<div class="rg-caption" style="display:none;">
						<p></p>
					</div>
				</div>
			</div>
		</script>
    </head>
    <body>
		<div class="container">
			<div class="header">
				<div class="clr"></div>
			</div><!-- header -->
			<div class="content">
				<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
					
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-carousel">
								<ul>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="__ROOT__/Common/img/photo/s_<?php echo ($vo['photo_name']); ?>" data-large="__ROOT__/Common/img/photo/m_<?php echo ($vo['photo_name']); ?>" data-description="<?php echo ($vo['photo_name']); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
								</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
			</div><!-- content -->
		</div><!-- container -->
    </body>
</html>