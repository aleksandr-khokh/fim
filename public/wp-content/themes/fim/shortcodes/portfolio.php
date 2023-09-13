<?php
/*
[consult]
 */
add_shortcode( 'portfolio', 'portfolio' );

function portfolio( $atts, $content ){
  $atts = shortcode_atts(
    [
      'title' => 'Наши работы',
    ], $atts );

  ob_start(); ?>

  <div id="menu-slider">
    <div class="menu-categories">
      <div class="menu-item-nav prev">
        <button @click="prevCat"><img src="/img/icons/icon-arrow-up-black.svg" alt=""></button>
      </div>

      <div class="menu-cat" :class="{active : activeCat == 1}" @click="activeCat = 1">Горячее</div>
      <div class="menu-cat" :class="{active : activeCat == 2}" @click="activeCat = 2">Супы</div>
      <div class="menu-cat" :class="{active : activeCat == 3}" @click="activeCat = 3">Десерты</div>
      <div class="menu-cat" :class="{active : activeCat == 4}" @click="activeCat = 4">Салаты</div>

      <div class="menu-item-nav next">
        <button @click="nextCat"><img src="/img/icons/icon-arrow-down-black.svg" alt=""></button>
      </div>
    </div><!-- menu-categories -->
    <hr class="hr-menu-mobile-after">

    <div class="menu-content main" v-if="activeCat == 1">
      <div class="menu-photos">
        <div class="menu-desc-nav">
          <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt=""></button>
        </div>

        <div class="menu-photo" v-for="(item, index) in main" :class="{ active: activeItem === ++index }">
          <img class="menu-photo-big" :src="item['bigimg']" alt="">
          <img class="menu-photo-small" :src="item['smallimg']" alt="">
        </div>

        <div class="menu-desc-nav">
          <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt=""></button>
        </div>
      </div><!-- menu-photos -->

      <div class="menu-desc-wrapper">
        <div class="menu-desc">
          <div class="menu-desc-header">
            <div class="menu-desc-nav">
              <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt="">
              </button>
              <div class="slide-number">
                <span class="current-slide">{{ activeItem }}</span> <span class="divider">/</span>
                <span class="total-slides">{{ main.length }}</span>
              </div>
              <button class="next" @click="nextItem">
                <img src="/img/icons/icon-arrow-right-black.svg" alt="">
              </button>
            </div>
            <div class="header-energy-wrapper">
              <div class="header" v-for="(item, index) in main" :class="{ active: activeItem === ++index }">{{ item['header'] }}
              </div>

              <p class="energy" v-for="(item, index) in main" :class="{ active: activeItem === ++index }">
                <span class="value">{{ item['energy'] }}</span> EUR</p>
            </div>
          </div>
          <hr class="d-none d-xl-block">
          <p class="dishes-desc" v-for="(item, index) in main" :class="{ active: activeItem === ++index }">{{item['desc']}}</p>
        </div>
      </div><!-- menu-desc-wrapper -->
    </div>

    <div class="menu-content main" v-if="activeCat == 2">
      <div class="menu-photos">
        <div class="menu-desc-nav">
          <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt=""></button>
        </div>

        <div class="menu-photo" v-for="(item, index) in soups" :class="{ active: activeItem === ++index }">
          <img class="menu-photo-big" :src="item['bigimg']" alt="">
          <img class="menu-photo-small" :src="item['smallimg']" alt="">
        </div>

        <div class="menu-desc-nav">
          <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt=""></button>
        </div>
      </div><!-- menu-photos -->

      <div class="menu-desc-wrapper">
        <div class="menu-desc">
          <div class="menu-desc-header">
            <div class="menu-desc-nav">
              <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt="">
              </button>
              <div class="slide-number">
                <span class="current-slide">{{ activeItem }}</span> <span class="divider">/</span>
                <span class="total-slides">{{ soups.length }}</span>
              </div>
              <button class="next" @click="nextItem">
                <img src="/img/icons/icon-arrow-right-black.svg" alt="">
              </button>
            </div>
            <div class="header-energy-wrapper">
              <div class="header" v-for="(item, index) in soups" :class="{ active: activeItem === ++index }">{{ item['header'] }}
              </div>

              <p class="energy" v-for="(item, index) in soups" :class="{ active: activeItem === ++index }">
                <span class="value">{{ item['energy'] }}</span> EUR</p>
            </div>
          </div>
          <hr class="d-none d-xl-block">
          <p class="dishes-desc" v-for="(item, index) in soups" :class="{ active: activeItem === ++index }">{{item['desc']}}</p>
        </div>
      </div><!-- menu-desc-wrapper -->
    </div>

    <div class="menu-content main" v-if="activeCat == 3">
      <div class="menu-photos">
        <div class="menu-desc-nav">
          <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt=""></button>
        </div>

        <div class="menu-photo" v-for="(item, index) in deserts" :class="{ active: activeItem === ++index }">
          <img class="menu-photo-big" :src="item['bigimg']" alt="">
          <img class="menu-photo-small" :src="item['smallimg']" alt="">
        </div>

        <div class="menu-desc-nav">
          <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt=""></button>
        </div>
      </div><!-- menu-photos -->

      <div class="menu-desc-wrapper">
        <div class="menu-desc">
          <div class="menu-desc-header">
            <div class="menu-desc-nav">
              <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt="">
              </button>
              <div class="slide-number">
                <span class="current-slide">{{ activeItem }}</span> <span class="divider">/</span>
                <span class="total-slides">{{ deserts.length }}</span>
              </div>
              <button class="next" @click="nextItem">
                <img src="/img/icons/icon-arrow-right-black.svg" alt="">
              </button>
            </div>
            <div class="header-energy-wrapper">
              <div class="header" v-for="(item, index) in deserts" :class="{ active: activeItem === ++index }">{{ item['header'] }}
              </div>

              <p class="energy" v-for="(item, index) in deserts" :class="{ active: activeItem === ++index }">
                <span class="value">{{ item['energy'] }}</span> EUR</p>
            </div>
          </div>
          <hr class="d-none d-xl-block">
          <p class="dishes-desc" v-for="(item, index) in deserts" :class="{ active: activeItem === ++index }">{{item['desc']}}</p>
        </div>
      </div><!-- menu-desc-wrapper -->
    </div>

    <div class="menu-content salads" v-if="activeCat == 4">
      <div class="menu-photos">
        <div class="menu-desc-nav">
          <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt=""></button>
        </div>

        <div class="menu-photo" v-for="(item, index) in salads" :class="{ active: activeItem === ++index }">
          <img class="menu-photo-big" :src="item['bigimg']" alt="">
          <img class="menu-photo-small" :src="item['smallimg']" alt="">
        </div>

        <div class="menu-desc-nav">
          <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt=""></button>
        </div>
      </div><!-- menu-photos -->

      <div class="menu-desc-wrapper">
        <div class="menu-desc">
          <div class="menu-desc-header">
            <div class="menu-desc-nav">
              <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt="">
              </button>
              <div class="slide-number">

                <span class="current-slide">{{ activeItem }}</span> <span class="divider">/</span>
                <span class="total-slides">{{ salads.length }}</span>

              </div>
              <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt="">
              </button>
            </div>
            <div class="header-energy-wrapper">
              <div class="header" v-for="(item, index) in salads" :class="{ active: activeItem === ++index }">{{ item['header'] }}
              </div>

              <p class="energy" v-for="(item, index) in salads" :class="{ active: activeItem === ++index }">
                <span class=" value">{{ item['energy'] }}</span> EUR</p>

            </div>
          </div>
          <hr class="d-none d-xl-block">
          <p class="dishes-desc" v-for="(item, index) in salads" :class="{ active: activeItem === ++index }">{{item['desc']}}</p>
        </div>
      </div><!-- menu-desc-wrapper -->
    </div>

  </div>

  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
