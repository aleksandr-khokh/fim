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

  ob_start(); ?>

  <section id="review">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-4">
          <hr class="my-0">
          <div class="left-side">
            <div class="review__heading">
              <div class="first">Отзывы</div>
              <div class="second">Наших гостей</div>
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
            <transition name="fade-to" v-for="(item, index) in reviews">
              <div class="review__item" v-show="++index == activeReviewNumber">
                <div class="row">
                  <div class="col-12">
                    <div class="review__profile">
                      <div class="review__img_wrapper">
                        <img class="review__img" :src="item['img']" alt="">
                      </div>
                      <div class="review__profile__desc">
                        <div class="review__profile__name">qwe{{ item['name'] }}</div>
                        <div class="review__profile__rank">qwe{{ item['rank'] }}</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-xl-10">
                    <div class="review__text">
                      <p>qwe{{ item['text'] }}</p>
                    </div>
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
