<?php defined('_JEXEC') or die; ?>

<div class="contact<?= $this->pageclass_sfx ?>" itemscope itemtype="http://schema.org/Person">
	<div class="page-header">
		<h1>Обратная связь</h1>
	</div>

	<? /* Загрузка вложенного шаблона с формой */ ?>
	<?= $this->loadTemplate( 'form' ) ?>
</div>
