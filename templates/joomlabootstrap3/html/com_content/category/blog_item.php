<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath( JPATH_COMPONENT . '/helpers/html' );
$canEdit = $this->item->params->get( 'access-edit' );
$info = $params->get( 'info_block_position', 0 );
$this->number ++;
?>
<?php if ( $this->item->state == 0 || strtotime( $this->item->publish_up ) > strtotime( JFactory::getDate() )
           || ( ( strtotime( $this->item->publish_down ) < strtotime( JFactory::getDate() ) ) && $this->item->publish_down != JFactory::getDbo()->getNullDate() ) ) : ?>
<div class="system-unpublished">
  <?php endif; ?>

  <div class="row featurette">
    <div class="col-md-7 <?= ( $this->number % 2 ) ? '' : 'col-md-push-5' ?> ">

    <?php echo JLayoutHelper::render( 'joomla.content.blog_style_default_item_title', $this->item ); ?>

    <div class="lead">
      <?php if ( ! $params->get( 'show_intro' ) ) : ?>
       <?php echo $this->item->event->afterDisplayTitle; ?>
      <?php endif; ?>
      <?php echo $this->item->event->beforeDisplayContent; ?>

      <?php echo $this->item->introtext; ?>
    </div>

    <?php // Todo Not that elegant would be nice to group the params ?>
    <?php $useDefList = ( $params->get( 'show_modify_date' ) || $params->get( 'show_publish_date' ) || $params->get( 'show_create_date' )
                          || $params->get( 'show_hits' ) || $params->get( 'show_category' ) || $params->get( 'show_parent_category' ) || $params->get( 'show_author' ) ); ?>

    <?php if ( $useDefList && ( $info == 0 || $info == 2 ) ) : ?>
      <?php echo JLayoutHelper::render( 'joomla.content.info_block.block', array(
        'item'     => $this->item,
        'params'   => $params,
        'position' => 'above'
      ) ); ?>
    <?php endif; ?>
    </div>

    <div class="col-md-5 <?= ( $this->number % 2 ) ? '' : 'col-md-pull-7' ?>">
      <?php echo JLayoutHelper::render( 'joomla.content.intro_image', $this->item ); ?>
    </div>

    <?php if ( $canEdit || $params->get( 'show_print_icon' ) || $params->get( 'show_email_icon' ) ) : ?>
      <?php echo JLayoutHelper::render( 'joomla.content.icons', array(
        'params' => $params,
        'item'   => $this->item,
        'print'  => false
      ) ); ?>
    <?php endif; ?>

    <?php if ( $params->get( 'show_tags' ) && ! empty( $this->item->tags->itemTags ) ) : ?>
      <?php echo JLayoutHelper::render( 'joomla.content.tags', $this->item->tags->itemTags ); ?>
    <?php endif; ?>

    <?php if ( $useDefList && ( $info == 1 || $info == 2 ) ) : ?>
      <?php echo JLayoutHelper::render( 'joomla.content.info_block.block', array(
        'item'     => $this->item,
        'params'   => $params,
        'position' => 'below'
      ) ); ?>
    <?php endif; ?>

    <?php if ( $params->get( 'show_readmore' ) && $this->item->readmore ) :
      if ( $params->get( 'access-view' ) ) :
        $link = JRoute::_( ContentHelperRoute::getArticleRoute( $this->item->slug, $this->item->catid, $this->item->language ) );
      else :
        $menu = JFactory::getApplication()->getMenu();
        $active = $menu->getActive();
        $itemId = $active->id;
        $link = new JUri( JRoute::_( 'index.php?option=com_users&view=login&Itemid=' . $itemId, false ) );
        $link->setVar( 'return', base64_encode( JRoute::_( ContentHelperRoute::getArticleRoute( $this->item->slug, $this->item->catid, $this->item->language ), false ) ) );
      endif; ?>

      <?php echo JLayoutHelper::render( 'joomla.content.readmore', array(
      'item'   => $this->item,
      'params' => $params,
      'link'   => $link
    ) ); ?>

    <?php endif; ?>

  </div>

  <hr class="featurette-divider">
<?php if ( $this->item->state == 0 || strtotime( $this->item->publish_up ) > strtotime( JFactory::getDate() )
           || ( ( strtotime( $this->item->publish_down ) < strtotime( JFactory::getDate() ) ) && $this->item->publish_down != JFactory::getDbo()->getNullDate() ) ) : ?>
</div>

<?php endif; ?>

<?php echo $this->item->event->afterDisplayContent; ?>