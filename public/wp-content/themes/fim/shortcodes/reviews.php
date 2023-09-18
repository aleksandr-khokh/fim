<?php
/*
[consult]
 */
add_shortcode( 'reviews', 'reviews' );

function reviews( $atts, $content ){
  $atts = shortcode_atts(
    [
      'title' => 'Отзывы наших клиентов',
    ], $atts );

  add_action( 'wp_print_footer_scripts', function() {
    echo '
    <script>const reviews = new Vue({
          el: \'#review\', 
          data: {
              activeReviewNumber: 1,
              reviews: [
                  {
                      avatar: "/img/reviews/red-hat.png",
                      source: "Руководитель клуба путешественников «Красная шапка Кусто»",
                      name: "Дмитрий Браун",
                      text: "<p>Клуб путешественников «Красная шапка Кусто», сотрудничает с компанией «Е-Принт», уже пятый год, за это время, объём совместно созданных изделий вырос в десятки раз. Это результат профессиональной работы руководителей проекта - Станислава и Галины Ефимовых, а так же многочисленного персонала компании.</p><p>Особенно хочу отметить работу менеджеров отдела продаж, девочки работают оперативно, не отвлекают по мелочам, предлагают вариант решения возникающих проблем и инициируют новые заказы, исследуя рынок и рекомендую новые продукты.</p><p>Отдельное хочу подчеркнуть и поблагодарить, за то что при больших загрузках производства, берётесь за небольшие тиражи, это позволяет нам экспериментировать с продукцией, выводя качество на новый уровень.</p>",
                  },
                  {
                      avatar: "/img/reviews/avatar.png",
                      source: "ИП Канунникова М.",
                      name: "Марина Канунникова",
                      text: "<p>Очень крутые ребята! Сотрудничаем уже много лет, можно сказать вышли на длинную дистанцию. Качество всегда лучшее, скорость работы и профессионализм. Самые непростые и интересные задачи-только сюда! Ну и самое главное это то, что любой проект реализуется на все 100% с душой и ответственностью. Удачи вам и только вперед!</p>",
                  },
                  {
                      avatar: "/img/reviews/avatar.png",
                      source: "ИП Тарасова Ю.А.",
                      name: "Юлия Тарасова",
                      text: "<p>С ИП Ефимова Г.Х. Сотрудничаем не первый год. Мы, интернет магазин сумок Ytkamoscow. Отшиваем чехлы для сумок и аксессуаров. Качеством продукции очень довольны, все заказы выполняются в срок и учитываются все наши пожелания. Галина Хамзаевна всегда идёт на встречу нашим пожеланиям, даёт рекомендации по качеству тканей, всегда доступно объясняет технологию, содействует в процессе доставки, всегда на связи. Планируем и дальше продолжать сотрудничество и увеличить объём заказов.</p>",
                  },
                  {
                      avatar: "/img/reviews/avatar.png",
                      source: "Генеральный директор ООО «Инсайт»",
                      name: "К.А. Толочко",
                      text: "<p>Выражаем благодарность нашим партнерам Ефимовой Галине и Станиславу за многолетнее плодотворное взаимодействие, потрясающие результаты и профессиональный подход к решению задач. Каждый совместный проект уникален и требует внимательного отношения к деталям. Наши коллеги всегда тщательно подходят к реализации каждой задачи. Желаем им развития, инсайтов, невероятных результатов и, конечно, новых Заказчиков.</p><p>С огромным уважением к Вашему делу - команда Инсайт.</p>",
                  }
              ]
          },
          methods: {
              prevReview: function(){
                  if(this.activeReviewNumber <= 1){
                      this.activeReviewNumber = this.reviews.length;
                  } else {
                      this.activeReviewNumber--;
                  }
              },
      
              nextReview: function () {
                  if(this.activeReviewNumber >= this.reviews.length){
                      this.activeReviewNumber = 1;
                  } else {
                      this.activeReviewNumber++;
                  }
              }
          }
      });</script>
    ';
  } );

  ob_start(); ?>

  <section id="review">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-4">
          <hr class="my-0">
          <div class="left-side">
            <div class="review__heading">
              <div class="first">Отзывы</div>
              <div class="second">наших клиентов</div>
            </div>
            <div class="review__controls">
              <button class="review__controls__prev" @click="prevReview">
                <img src="/img/icons/icon-review-button-left.svg" alt="Предыдущий">
              </button>
              <hr>
              <button class="review__controls__next" @click="nextReview">
                <img src="/img/icons/icon-review-button-right.svg" alt="Следующий">
              </button>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-8">
          <div class="review__item__wrapper">
            <transition name="fade-to" v-for="(item, index) in reviews" :key="item.id">
              <div class="review__item" v-show="++index == activeReviewNumber">
                <div class="row">
                  <div class="col-12">
                    <div class="review__profile">
                      <div class="review__img_wrapper">
                        <img class="review__img" :src="item['avatar']" alt="">
                      </div>
                      <div class="review__profile__desc">
                        <div class="review__profile__name">{{ item['name'] }}</div>
                        <div class="review__profile__rank">{{ item['source'] }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-xl-10">
                    <div class="review__text" v-html="item['text']"></div>
                  </div>
                </div>
              </div>
            </transition>
          </div>
        </div>

      </div>
    </div>
  </section>

  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
