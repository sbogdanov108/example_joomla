<?php defined( '_JEXEC' ) or die; ?>

<? if ( isset( $this->error ) ) : ?>
  <div class="contact-error">
    <?= $this->error ?>
  </div>
<? endif ?>

<form class="form-horizontal form-feedback my-form" id="contact-form" action="<?= JRoute::_( 'index.php' ) ?>" method="post">

  <!-- Поле ввода "Имя" -->
  <div class="form-group">
    <label class="col-xs-2 col-sm-2 col-md-2 control-label" for="jform_contact_name"> Имя
      <span class="asterisk">*</span>
    </label>

    <div class="col-xs-10 col-sm-10 col-md-10">
      <? $this->form->setFieldAttribute( 'contact_name', 'class', 'form-control' ) ?>
      <?= $this->form->getInput( 'contact_name' ) ?>
    </div>
  </div>

  <!-- Поле ввода "E-mail" -->
  <div class="form-group">
    <label class="col-xs-2 col-sm-2 col-md-2 control-label" for="jform_contact_email"> E-mail
      <span class="asterisk">*</span>
    </label>

    <div class="col-xs-10 col-sm-10 col-md-10">
      <? $this->form->setFieldAttribute( 'contact_email', 'class', 'form-control' ) ?>
      <?= $this->form->getInput( 'contact_email' ) ?>
    </div>
  </div>

  <!-- Поле ввода "Тема" -->
  <div class="form-group">
    <label class="col-xs-2 col-sm-2 col-md-2 control-label" for="jform_contact_emailmsg"> Тема
      <span class="asterisk">*</span>
    </label>

    <div class="col-xs-10 col-sm-10 col-md-10">
      <? $this->form->setFieldAttribute( 'contact_subject', 'class', 'form-control' ) ?>
      <?= $this->form->getInput( 'contact_subject' ) ?>
    </div>
  </div>

  <!-- Поле ввода "Сообщение" -->
  <div class="form-group">
    <div class="col-sm-12">
      <label class="col-xs-2 col-sm-2 col-md-2 control-label" for="jform_contact_message"> Сообщение
        <span class="asterisk">*</span>
      </label>

      <? $this->form->setFieldAttribute( 'contact_message', 'class', 'form-control' ) ?>
      <?= $this->form->getInput( 'contact_message' ) ?>

      <!-- Чекбокс -->
      <div class="help-block help-required help-feedback">
        <span class="asterisk">*</span> Обязательно к заполнению
      </div>
    </div>
  </div>

  <div class="form-group">
    <!-- Кнопка отправки -->
    <div class="col-sm-6">
      <button class="btn btn-red" type="submit">Отправить</button>
    </div>

    <!-- Чекбокс -->
    <? if ( $this->params->get( 'show_email_copy' ) ) : ?>
      <div class="col-sm-6">
        <div class="checkbox email-copy-checkbox">
          <label>
            <?= $this->form->getInput( 'contact_email_copy' ) ?>
            Отправить копию этого сообщения на ваш адрес
          </label>
        </div>
      </div>
    <? endif ?>

    <!-- Генерация служебной информации, необходимой для работы движка Joomla -->
    <input type="hidden" name="option" value="com_contact"/>
    <input type="hidden" name="task" value="contact.submit"/>
    <input type="hidden" name="return" value="<?= $this->return_page ?>"/>
    <input type="hidden" name="id" value="<?= $this->contact->slug ?>"/>
    <?= JHtml::_( 'form.token' ) ?>
  </div>
</form>
