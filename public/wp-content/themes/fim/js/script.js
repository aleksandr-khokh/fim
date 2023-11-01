(function ( $ ){
  $(function (  ){
    // ОТПРАВКА ФОРМЫ ЗАКАЗА

    $('#order_form').submit(function(e){

      e.preventDefault();
      let m_method = $(this).attr('method');
      let m_action = $(this).attr('action');
      let m_data  = $(this).serialize();

      $.ajax({
        type: m_method,
        url: m_action,
        data: m_data,
        success: function( result ){
          $('.send-order__heading').css("visibility", "hidden");
          $('.send-order__input_name, .send-order__input_phone, .send-order__button_send').css("display", "none");
          $('.send-order__result').css("display", "block");
        }
      });
    });
  });
})(jQuery);

const menu = new Vue({
  el: '#header',
  data: {
    showMenu: false,
    showMobileMenu: false,
    burgerLottieIcon: '',
  },
  mounted: function(){
    // Анимация иконки для открытия меню на мобильных
    let animData = {
      container: document.getElementById("lottie-menu"), // the dom element that will contain the animation
      renderer: 'svg',
      loop: false,
      autoplay: false,
      path: '/img/icons/burger-menu.json' // the path to the animation json
    }
    this.burgerLottieIcon = lottie.loadAnimation(animData);
    this.burgerLottieIcon.setSpeed(3);
  },
  methods: {
    openMenu: function (event) {
      this.showMenu = true;
      document.body.style.overflow = 'hidden';
      anime({
        targets: '.desktop-menu__content__wrapper',
        width: ['0', '70vw'],
        easing: 'cubicBezier(.35, 0, 0, 1.01)',
        duration: 400
      });

      // Сначала выезжает меню, потом появится скролл
      setTimeout( function(){
        document.getElementsByClassName('desktop-menu__content__wrapper')[0].style.overflowY = 'scroll';
      }, 400);

    },
    closeMenu: function (event) {
      // Сначала исчезнет скролл, потом уедет меню
      document.getElementsByClassName('desktop-menu__content__wrapper')[0].style.overflowY = 'hidden';
      anime({
        targets: '.desktop-menu__content__wrapper',
        width: 0,
        easing: 'cubicBezier(.35, 0, 0, 1.01)',
        duration: 400
      });
      this.showMenu = false;
      document.body.style.overflow = 'auto';
    },

    toggleMobileMenu: function (event) {
      let animationDirection;
      this.showMobileMenu = !this.showMobileMenu;

      if ( this.showMobileMenu === true) {
        // Открыть меню
        this.burgerLottieIcon.playSegments([0, 38], true);
        animationDirection = ['0', '100%'];
      } else {
        // Закрыть меню
        this.burgerLottieIcon.playSegments([38, 75], true);
        animationDirection = ['100%', '0'];
      }
      anime({
        targets: '.mobile-menu__content__wrapper',
        height: animationDirection,
        easing: 'cubicBezier(.35, 0, 0, 1.01)',
        duration: 400
      });
    },

    closeMobileMenu: function ( event ) {
      if( this.showMobileMenu === true ){
        this.burgerLottieIcon.playSegments([38, 75], true);
        animationDirection = ['100%', '0'];
        anime({
          targets: '.mobile-menu__content__wrapper',
          height: ['100%', '0'],
          easing: 'cubicBezier(.35, 0, 0, 1.01)',
          duration: 400
        });
        this.showMobileMenu === true;
      }
    }
  }
});
