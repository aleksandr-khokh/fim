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
const portfolio = new Vue({
    el: \'#menu-slider\',
    data: {
      activeCat: 1,
        activeItem: 1,
        main: [
            {
              header: "Худи с капюшоном",
                desc: "<p>Мы используем футер 320-340 гр.<br>Много вариантов оттенков и фактуры</p>",
                energy: "Тираж от 300 штук",
                bigimg: "/img/portfolio/hudi.png",
            },
            {
              header: "Сумки",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/hot/IMG_1562_ryba.jpg",
            },
            {
              header: "Худи",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/hot/IMG_1563_ryba.jpg",
            },
        ],
        soups: [
            {
              header: "Суп и хлеб",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1503_sup-hleb.jpg",
            },
            {
              header: "Суп с морепродуктами",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1517_moreproducty.jpg",
            },
            {
              header: "Суп с морковью",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/soups/IMG_1518_morkov.jpg",
            },
        ],
        deserts: [
            {
              header: "Сырники",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1416-syrniki.jpg",
            },
            {
              header: "Вафли",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1429-vafli-syrniki.jpg",
            },
            {
              header: "Штрудель",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1458-shtrudel.jpg",
            },
            {
              header: "Щербет",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1479-sherbet.jpg",
            },
            {
              header: "Ананас",
                desc: "",
                energy: "368",
                bigimg: "/img/restaurant/menu/deserts/IMG_1496_ananas.jpg",
            },
        ],
        salads: [
            {
              header: "Хамон",
                desc: "Хамон",
                energy: "368",
                bigimg: "/img/restaurant/menu/salads/IMG_1523_hamon.jpg",
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
      productsData: function (  ){
        if( this.activeCat === 1 ){
          return this.main;
        } else if (this.activeCat === 2 ) {
          return this.soups;
        } else if (this.activeCat === 3 ) {
          return this.deserts;
        } else if (this.activeCat === 4 ) {
          return this.salads;
        }
      }
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

        <button class="menu-item-nav" @click="prevCat"><img src="/img/icons/rhombus-arrow-up-bronze.svg" alt=""></button>

        <div class="menu-cat__link__wrapper">
          <div class="menu-cat__link" :class="{active : activeCat == 1}" @click="activeCat = 1">Пошив</div>
          <div class="menu-cat__link" :class="{active : activeCat == 2}" @click="activeCat = 2">Печать</div>
          <div class="menu-cat__link" :class="{active : activeCat == 3}" @click="activeCat = 3">Вышивка</div>
          <div class="menu-cat__link" :class="{active : activeCat == 4}" @click="activeCat = 4">Разработка</div>
        </div>

        <button class="menu-item-nav" @click="nextCat"><img src="/img/icons/rhombus-arrow-down-bronze.svg" alt=""></button>

      </div><!-- menu-categories -->

      <div class="menu-content main">
        <div class="menu-photo__wrapper">
          <button class="menu-desc-nav prev" @click="prevItem"><img src="/img/icons/icon-review-button-left.svg" alt=""></button>

          <div class="menu-photo" v-for="(item, index) in productsData" :class="{ active: activeItem === ++index }">
            <transition name="fade">
              <img :src="item['bigimg']" alt="" v-show="activeItem === index">
            </transition>
          </div>

          <button class="menu-desc-nav next" @click="nextItem"><img src="/img/icons/icon-review-button-right.svg" alt=""></button>
        </div><!-- menu-photos -->

        <div class="menu-desc-wrapper">
          <div class="menu-desc">
            <div class="menu-desc-header">
              <div class="menu-desc-nav">
                <button class="prev" @click="prevItem"><img src="/img/icons/icon-arrow-left-black.svg" alt=""></button>
                <div class="slide-number">
                  <span class="current-slide">{{ activeItem }}</span> <span class="divider">/</span>
                  <span class="total-slides">{{ productsData.length }}</span>
                </div>
                <button class="next" @click="nextItem"><img src="/img/icons/icon-arrow-right-black.svg" alt=""></button>
              </div>
              <div class="heading-wrapper">
                <div class="heading" v-for="(item, index) in productsData" v-show=" activeItem === ++index ">{{ item['header'] }}
                </div>

                <p class="heading__desc" v-for="(item, index) in productsData" v-show=" activeItem === ++index ">
                  <span class="value">{{ item['energy'] }}</span></p>
              </div>
            </div>
            <hr class="d-none d-xl-block">
            <p class="menu-desc-body" v-for="(item, index) in productsData" v-show=" activeItem === ++index " v-html="item['desc']"></p>
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
