<?php

	defined('_JEXEC') or die;

	use Joomla\CMS\Factory;
	use Joomla\CMS\HTML\HTMLHelper;
	use Joomla\CMS\Language\Text;
	use Joomla\CMS\Uri\Uri;

	/** @var Joomla\CMS\Document\HtmlDocument $this */

	$app   = Factory::getApplication();
	$input = $app->getInput();
	$wa    = $this->getWebAssetManager();

	// Detecting Active Variables
	$option   = $input->getCmd('option', '');
	$view     = $input->getCmd('view', '');
	$layout   = $input->getCmd('layout', '');
	$task     = $input->getCmd('task', '');
	$itemid   = $input->getCmd('Itemid', '');
	$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
	$menuD     = $app->getMenu()->getActive();
	$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

	/* Personal Variables */
	$menu = $app->getMenu(); 
	$menuID = $app->getMenu()->getActive()->id;

	$item_name = $menu->getItem($menuID);

	/* Mobile detect function */
	function isMobile(){
		$arrMobileAgents = array('android', 'blackberry',
		'googlebot-mobile', 'ipad', 'iphone', 'ipod', 'mobi',
		'mobile', 'opera mini', 'safari mobile', 'windows mobile');
		$strCurrentUserAgent = $_SERVER['HTTP_USER_AGENT'];
			foreach ($arrMobileAgents as $strMobileAgent) {
			if (stripos ($strCurrentUserAgent, $strMobileAgent) !== FALSE) {
				return true;
			}
		}
		return false;
	};

	/* Default Scripts
	Add JavaScript Frameworks
	JHtml::_('bootstrap.framework');

	Load optional rtl Bootstrap css and Bootstrap bugfixes
	JHtmlBootstrap::loadCss($includeMaincss = true);
	*/

?>

<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<jdoc:include type="head" />

		<!--[if lt IE 9]>
			<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
		<![endif]-->

		<?php 
			$css = 'templates/'.$this->template.'/build/style.css';
			$js = 'templates/'.$this->template.'/js/script.js';
			if (file_exists($css)) {
				$css_modify = date ("dmYhis", filemtime($css));
			}
			if (file_exists($js)) {
				$js_modify = date ("dmYhis", filemtime($js));
			}
		?>
		<?php /* ?>
		<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/owl.carousel.min.css">
		<link rel="stylesheet" href="templates/<?php echo $this->template; ?>/css/owl.theme.default.min.css">
		<link href="templates/<?php echo $this->template; ?>/css/style.min.css?<?php echo $css_modify;?>" rel="stylesheet">
		
		<?php */ ?>
		<link rel="icon" type="image/png" href="templates/<?php echo $this->template; ?>/favicon.png" />

		<link href="templates/<?php echo $this->template; ?>/build/style.css?<?php echo $css_modify;?>" rel="stylesheet">

	</head>

	<body class="<?php echo 'item-' . $menuID.' container-'.$item_name->alias;?> <?php echo JFactory::getApplication()->input->get('view') == 'article' ? 'body-article' : '' ?>">

		<?php include 'templates/header/sidemenu.php'; ?>

		<header>
			<div class="header">
				<?php 
					$var = 1; /* sposób przekazywania zmiennej */
					include 'templates/header/logo.php'; 
				?>
				
				<jdoc:include type="modules" name="menu" style="none" />

				<div class="contact">
					<p class="phone">
						<?php if(!isMobile()): ?>
							<img src="images/ikony/telefon-stopka.png" alt=""><?php echo jText::_('TEL') ?>
						<?php else: ?>
							<a href="tel:+48<?php echo jText::_('TEL') ?>" class="zadzwon"><img src="images/ikony/telefon-stopka.png" alt=""></a>
						<?php endif; ?>
					</p>
					<p class="mail">
						<a href="mailto:<?php echo jText::_('MAIL') ?>" title="Napisz do nas na adres: <?php echo jText::_('MAIL') ?>"><?php echo jText::_('MAIL') ?></a>
					</p>
				</div>
				
				<?php if(isMobile()): ?>
					<div class="sidenavmenu">
						<span class="sidenavmenuOpenClose">
							<img src="images/ikony/menu.png" alt="">menu
						</span>
					</div>
				<?php endif; ?>
				
				<div class="social">
					<jdoc:include type="modules" name="social" style="none" />
				</div>

			</div>
		</header>
		<?php // if(JFactory::getApplication()->input->get('view') != 'article'): /* Jeśli nie chce bannera na artykule */ ?>
			<?php if ($this->countModules('banner')): ?>
			<div class="banner">
			
				<?php if ($menu->getActive() == $menu->getDefault()):?>
					<div id="frontPageSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
						<div class="carousel-inner">
							<jdoc:include type="modules" name="banner" style="none" />
						</div>
						<?php /* ?>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
						<?php */ ?>
					</div>
				<?php else: ?>
					<jdoc:include type="modules" name="banner" style="none" />
				<?php endif; ?>

			</div>
			<?php endif; ?>
		<?php // endif; ?>

		<div class="message container">
			<jdoc:include type="message" />
		</div>

		<div class="page-content">
			<div class="container">
				<jdoc:include type="component" />
			</div>
		</div>

		<?php if ($this->countModules('title-module')): ?>
		<div class="space-tb title">
			<div class="container">
				<div class="text-center">
					<div class="headers">
						<h3>
							<?php echo jText::_('TITLE_1') ?>
						</h3>
						<h4>
							<?php echo jText::_('TITLE_2') ?>
						</h4>
					</div>
				</div>
				<jdoc:include type="modules" name="title-module" style="none" />
			</div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('image-module')): ?>
		<div class="space-tb image-module">
			<div class="container">
				<jdoc:include type="modules" name="image-module" style="none" />
			</div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('cover-module')): ?>
		<div class="cover-module">
			<jdoc:include type="modules" name="cover-module" style="none" />
		</div>
		<?php endif; ?>
		
		<?php if ($this->countModules('paralax-module')): ?>
		<div class="cover-module" data-parallax="scroll" data-image-src="images/slider/slajd1_demo.png">
			<jdoc:include type="modules" name="paralax-module" style="none" />
		</div>
		<?php endif; ?>

		<?php //if ($this->countModules('producenci')): ?>
		<div class="partners">
			<div class="text-center bg-black text-white space-tb">
				<?php echo jText::_('PARTNERZY') ?>
			</div>
			<?php
				$producers_images = glob('images/partnerzy/*.{jpeg,jpg,gif,png}', GLOB_BRACE);
			?>
			<div class="owl-carousel producers-carousel" data-items="5" data-autoplay="1" data-space="<?php echo !isMobile() ? 150 : 20 ?>">
				<?php foreach($producers_images as $producer_image): ?>
					<img src="<?php echo $producer_image ?>" alt="<?php echo current(explode('.', explode('/', $producer_image)[2])) ?>">
				<?php endforeach; ?>
			</div>
		</div>
		<?php //endif; ?>

		<?php if ($this->countModules('default')): ?>
		<div class="default">
			<jdoc:include type="modules" name="default" style="html5" />
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('map')): ?>
		<div id="map" class="map clearfix">
			<jdoc:include type="modules" name="map" style="none" />
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('form')): ?>
		<div id="form" class="bg-black">
			<div class="form container clearfix">
				<jdoc:include type="modules" name="form" style="none" />
			</div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('privacy')): ?>
		<div id="privacy" class="privacy space-tb container clearfix">
			<jdoc:include type="modules" name="privacy" style="html5" />
		</div>
		<?php endif; ?>

		<div class="bottom">
			<div class="bottom-details">
				<div class="title-bottom">
					<jdoc:include type="modules" name="title-bottom" style="none" />
				</div>
				<div class="contact-bottom">
					<jdoc:include type="modules" name="contact" style="none" />
				</div>
				<div class="tags">
					<jdoc:include type="modules" name="tags" style="none" />
				</div>
				<div class="privacy-link">
					<?php $item_privacy = $menu->getItem(136); ?>
					<a href="<?php echo $item_privacy->alias; ?>"><?php echo $item_privacy->title;?></a>
				</div>
			</div>
			<footer>
				<div class="footer">
					<div class="copyright">
						<p>Copyright © <?php echo date('Y').' '.jText::_('LOGO_TITLE') ?></p>
					</div>
					<div class="privacy-link">
						<?php $item_privacy = $menu->getItem(136); ?>
						<a href="<?php echo $item_privacy->alias; ?>"><?php echo $item_privacy->title;?></a>
					</div>
					<div class="author">
						<jdoc:include type="modules" name="author" style="html5" />
					</div>
				</div>
			</footer>
		</div>

		<jdoc:include type="modules" name="cookies" style="none" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="templates/<?php echo $this->template; ?>/js/parallax.js"></script>
		<?php /* ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="templates/<?php echo $this->template; ?>/js/owl.carousel.min.js"></script>
		<script src="templates/<?php echo $this->template; ?>/js/parallax.js"></script>
		<script src="templates/<?php echo $this->template; ?>/js/script.js?<?php echo $js_modify;?>"></script>
		<script src="templates/<?php echo $this->template; ?>/js/smoothscroll.js"></script>
		<?php */ ?>
		<script src="templates/<?php echo $this->template; ?>/build/script.bundle.js?<?php echo $js_modify;?>"></script>


	</body>

</html>