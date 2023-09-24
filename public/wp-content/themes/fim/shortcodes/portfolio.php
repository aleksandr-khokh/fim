<?php
/*
[portfolio]
 */
add_shortcode( 'portfolio', 'portfolio' );

function portfolio ( $atts, $content ){
  $atts = shortcode_atts(
    [
      'title' => 'Наши работы',
    ], $atts );

  add_action( 'wp_print_footer_scripts', function(){
    echo '<script>
const dishes = new Vue({
    el: \'#menu-slider\',
    data: {
      activeCat: 1,
        activeItem: 1,
        main: [
            {
              header: "Худи с капюшоном",
                desc: "<p>Мы используем футер 320-340 гр.<br>Много вариантов оттенков и фактуры</p>",
                energy: "Тираж от 300 штук",
                bigimg: "/img/portfolio/hudi.jpg",
                smallimg: "/img/restaurant/menu/hot/IMG_1536_kartoshka-min.png",
            },
            {
              header: "Сумки",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/hot/IMG_1562_ryba.jpg",
                smallimg: "/img/restaurant/menu/hot/IMG_1562_ryba-min.png",
            },
            {
              header: "Худи",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/hot/IMG_1563_ryba.jpg",
                smallimg: "/img/restaurant/menu/hot/IMG_1563_ryba-min.png",
            },
        ],
        soups: [
            {
              header: "Суп и хлеб",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1503_sup-hleb.jpg",
                smallimg: "/img/restaurant/menu/soups/IMG_1503_sup-hleb-min.png",
            },
            {
              header: "Суп с морепродуктами",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1517_moreproducty.jpg",
                smallimg: "/img/restaurant/menu/soups/IMG_1517_moreproducty-min.png",
            },
            {
              header: "Суп с морковью",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1518_morkov.jpg",
                smallimg: "/img/restaurant/menu/soups/IMG_1518_morkov-min.png",
            },
        ],
        deserts: [
            {
              header: "Сырники",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1416-syrniki.jpg",
                smallimg: "/img/restaurant/menu/deserts/IMG_1416-syrniki-min.png",
            },
            {
              header: "Вафли",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1429-vafli-syrniki.jpg",
                smallimg: "/img/restaurant/menu/deserts/IMG_1429-vafli-syrniki-min.png",
            },
            {
              header: "Штрудель",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1458-shtrudel.jpg",
                smallimg: "/img/restaurant/menu/deserts/IMG_1458-shtrudel-min.png",
            },
            {
              header: "Щербет",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1479-sherbet.jpg",
                smallimg: "/img/restaurant/menu/deserts/IMG_1479-sherbet-min.png",
            },
            {
              header: "Ананас",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1496_ananas.jpg",
                smallimg: "/img/restaurant/menu/deserts/IMG_1496_ananas-min.png",
            },
        ],
        salads: [
            {
              header: "Хамон",
                desc: "Хамон",
                energy: "368",
                bigimg: "/img/restaurant/menu/salads/IMG_1523_hamon.jpg",
                smallimg: "/img/restaurant/menu/salads/IMG_1523_hamon-min.png",
            },
        ],
   },
    computed: {
      itemsLength: function(){
        if( this.activeCat === 1 ){
          return this.main.length;
        } else if (this.activeCat === 2 ) {
          return this.soups.length;
        } else if (this.activeCat === 3 ) {
          return this.deserts.length;
        } else if (this.activeCat === 4 ) {
          return this.salads.length;
        }
      },
    },
    methods: {
      prevCat: function(){
        if( this.activeCat === 1 ){
          this.activeCat = 4;
        }else {
          this.activeCat--;
        }
        this.activeItem = 1;
      },
      nextCat: function(){
        if(this.activeCat === 4){
          this.activeCat = 1;
        }else{
          this.activeCat++;
        }
        this.activeItem = 1;
      },
      prevItem: function(){
        if( this.activeItem <= 1 ){
          this.activeItem = this.itemsLength;
        } else {
          this.activeItem--;
        }
      },
      nextItem: function () {
        if( this.activeItem >= this.itemsLength ){
          this.activeItem = 1;
        } else {
          this.activeItem++;
        }
      }
    }
});</script>';
  } );

  ob_start(); ?>

  <section class="portfolio">
    <div class="row my-md-100 mt-5">
      <div class="col-12 col-xl-5">
        <h2 class="portfolio__title"><?= $atts[ 'title' ]; ?></h2>
      </div>
      <div class="col-12 col-xl-7">
        <div class="row">
          <div class="col-2">
            <img src="/img/brandbook/star-red.svg" alt="">
          </div>
          <div class="col-10">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation </p>
          </div>
        </div>
      </div>
    </div>
    <div id="menu-slider">
      <div class="menu-categories">
        <div class="menu-item-nav prev">
          <button @click="prevCat"><img src="/img/icons/icon-arrow-up-black.svg" alt=""></button>
        </div>

        <div class="menu-cat" :class="{active : activeCat == 1}" @click="activeCat = 1">Пошив</div>
        <div class="menu-cat" :class="{active : activeCat == 2}" @click="activeCat = 2">Печать</div>
        <div class="menu-cat" :class="{active : activeCat == 3}" @click="activeCat = 3">Вышивка</div>
        <div class="menu-cat" :class="{active : activeCat == 4}" @click="activeCat = 4">Разработка</div>

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
                  <span class="value">{{ item['energy'] }}</span></p>
              </div>
            </div>
            <hr class="d-none d-xl-block">
            <p class="dishes-desc" v-for="(item, index) in main" :class="{ active: activeItem === ++index }" v-html="item['desc']"></p>
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
  </section>

  <?php
  $output_string = ob_get_contents();
  ob_end_clean();
  return $output_string;
  wp_reset_postdata();
}
