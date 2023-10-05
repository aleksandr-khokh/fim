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
        light: [
            
            {
              header: "Худи с коротким рукавом",
                desc: "<p>Шелкотрафаретная печать в один цвет. Выдерживает до 20 стирок.</p>",
                energy: "Тираж от 100 штк",
                bigimg: "/img/portfolio/hoodie-02.webp",
            },
        ],
        pechat: [
           {
              header: "Футболка с принтом",
                desc: "<p>Мы используем футер 320-340 гр.<br>Много вариантов оттенков и фактуры</p>",
                energy: "Тираж от 300 штук",
                bigimg: "/img/portfolio/tshirt-01.webp",
            },
            {
              header: "Футболка с принтом",
                desc: "<p>Шелкотрафаретная печать в один цвет. Выдерживает до 20 стирок.</p>",
                energy: "Тираж от 100 штк",
                bigimg: "/img/portfolio/tshirt-05.webp",
            },
            {
              header: "Футболка с принтом",
                desc: "<p>Шелкотрафаретная печать в один цвет. Выдерживает до 20 стирок.</p>",
                energy: "Тираж от 100 штк",
                bigimg: "/img/portfolio/tshirt-04.webp",
            },
        ],
        raznoe: [
            {
              header: "Носки",
                desc: "",
                energy: "368",
                bigimg: "/img/portfolio/socks.webp",
            },
            {
              header: "Шоппер",
                desc: "",
                energy: "368",
                bigimg: "/img/portfolio/shopper-black.webp",
            },
            {
              header: "Шоппер с принтом",
                desc: "",
                energy: "368",
                bigimg: "/img/portfolio/shopper.webp",
            },
        ],
        seasons: [
            {
              header: "Хамон",
                desc: "Хамон",
                energy: "368",
                bigimg: "/img/portfolio/IMG_1523_hamon.webp",
            },
        ],
   },
    computed: {
      itemsLength: function(){
        if( this.activeCat === 1 ){
          return this.light.length;
        } else if (this.activeCat === 2 ) {
          return this.pechat.length;
        } else if (this.activeCat === 3 ) {
          return this.raznoe.length;
        } else if (this.activeCat === 4 ) {
          return this.seasons.length;
        }
      },
      productsData: function (  ){
        if( this.activeCat === 1 ){
          return this.light;
        } else if (this.activeCat === 2 ) {
          return this.pechat;
        } else if (this.activeCat === 3 ) {
          return this.raznoe;
        } else if (this.activeCat === 4 ) {
          return this.seasons;
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
          <div class="menu-cat__link" :class="{active : activeCat == 1}" @click="activeCat = 1">Легкая одежда</div>
          <div class="menu-cat__link" :class="{active : activeCat == 2}" @click="activeCat = 2">Печать</div>
          <div class="menu-cat__link" :class="{active : activeCat == 3}" @click="activeCat = 3">Разное</div>
          <div class="menu-cat__link" :class="{active : activeCat == 4}" @click="activeCat = 4">Сезонная одежда</div>
        </div>

        <button class="menu-item-nav" @click="nextCat"><img src="/img/icons/rhombus-arrow-down-bronze.svg" alt=""></button>

      </div><!-- menu-categories -->

      <div class="menu-content">
        <div class="menu-photo__wrapper">
          <button class="menu-desc-nav prev" @click="prevItem"><img src="/img/icons/icon-review-button-left.svg" alt=""></button>

          <div class="menu-photo" v-for="(item, index) in productsData" :class="{ active: activeItem === ++index }">
              <img :src="item['bigimg']" alt="" v-show="activeItem === index">
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
