<div class="send-order__heading">Оставить заявку</div>
<form action="/wp-content/themes/fim/mail/send.php" method="post" name="order_form" id="order_form">
  <input class="send-order__input_name" type="text" name="name" placeholder="Имя*" required>
  <input class="send-order__input_phone" type="phone" name="phone" placeholder="Телефон*" required>
  <button class="send-order__button_send" type="submit">Отправить
    <img class="arrow_for_next_button" src="/img/icons/icon-arrow-right-white.svg" alt=""></button>
  <div class="send-order__result">Заявка отправлена, мереджер свяжется с Вами в ближайшее время!</div>
  <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
</form>

