<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$modId = 'mod-custom' . $module->id;

$app = JFactory::getApplication();
$menu = $app->getMenu(); 
$menuID = $app->getMenu()->getActive()->id;

// if ($params->get('backgroundimage'))
// {
// 	/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
// 	$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
// 	$wa->addInlineStyle('
// #' . $modId . '{background-image: url("' . Uri::root(true) . '/' . HTMLHelper::_('cleanImageURL', $params->get('backgroundimage'))->url . '");}
// ', ['name' => $modId]);
// }

?>

<div id="<?php echo $modId; ?>" class="mod-custom custom <?php echo $menu->getActive() == $menu->getDefault() ? 'carousel-item' : 'active' ?>" data-bs-interval="4000">
	<div class="cover bg" style="background-image: url(<?php echo $params->get('backgroundimage'); ?>)"></div>
	<div class="slider-caption">
		<?php echo $module->content; ?>
	</div>
</div>
