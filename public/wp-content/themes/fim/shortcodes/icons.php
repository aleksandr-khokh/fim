<?php
function return_default_class() {
  return 'block-icon_img';
}

/*
[whatsapp]
 */
add_shortcode( 'whatsapp', 'whatsapp' );
function whatsapp( $atts ) {

  $params = shortcode_atts(
    array(
      'class' => return_default_class(),
    ),
    $atts
  ); // $params[class]
  
  $str = "<svg class='$params[class]' width='26' height='26' viewBox='0 0 26 26' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M7.89648 22.8516C9.74154 23.8672 11.7135 24.375 13.8125 24.375C15.4714 24.375 17.0498 24.0534 18.5479 23.4102C20.0459 22.7669 21.3408 21.8994 22.4326 20.8076C23.5244 19.7158 24.3919 18.4209 25.0352 16.9229C25.6784 15.4248 26 13.8464 26 12.1875C26 10.5286 25.6784 8.9502 25.0352 7.45215C24.3919 5.9541 23.5244 4.65918 22.4326 3.56738C21.3408 2.47559 20.0459 1.60807 18.5479 0.964844C17.0498 0.321615 15.4714 0 13.8125 0C12.1536 0 10.5752 0.321615 9.07715 0.964844C7.5791 1.60807 6.28418 2.47559 5.19238 3.56738C4.10059 4.65918 3.23307 5.9541 2.58984 7.45215C1.94661 8.9502 1.625 10.5286 1.625 12.1875C1.625 14.2865 2.13281 16.2585 3.14844 18.1035L0 26L7.89648 22.8516ZM16.9788 13.4965C17.2352 13.592 18.6071 14.2614 18.8888 14.404L18.9007 14.3345C18.9278 14.3464 18.9539 14.3579 18.9792 14.3689C19.2165 14.4727 19.3717 14.5406 19.4346 14.6562C19.5041 14.7805 19.5041 15.3292 19.266 15.9916C19.0314 16.6498 17.9117 17.2391 17.3778 17.3269C16.8952 17.3965 16.2841 17.426 15.6146 17.2138C15.5626 17.196 15.5087 17.1777 15.4529 17.1587C15.073 17.0297 14.603 16.8701 14.0194 16.6245C11.4267 15.5089 9.66807 13.0257 9.30288 12.51C9.27278 12.4675 9.25215 12.4384 9.24129 12.4245C9.23419 12.4144 9.22483 12.4014 9.21347 12.3856C9.00241 12.0921 8.09981 10.8368 8.09981 9.54165C8.09981 8.27465 8.72712 7.60394 9.02077 7.28997C9.04264 7.26659 9.06266 7.24519 9.08043 7.22567C9.33683 6.95873 9.64099 6.88919 9.82714 6.88919C10.0133 6.88919 10.2001 6.88919 10.361 6.90394C10.378 6.90394 10.3955 6.90327 10.4136 6.90257C10.5791 6.8962 10.789 6.88813 10.9904 7.3795C11.0921 7.61827 11.2553 8.01377 11.4131 8.39607C11.6184 8.8933 11.8144 9.36819 11.8537 9.44682C11.9233 9.5859 11.9703 9.73974 11.879 9.93713C11.8557 9.98019 11.8354 10.0194 11.8163 10.0563C11.7543 10.1762 11.7044 10.2726 11.6008 10.4015C11.5648 10.4441 11.528 10.4883 11.4911 10.5327C11.3821 10.6639 11.2721 10.7962 11.1765 10.8918C11.0375 11.0308 10.8914 11.1882 11.0557 11.4664C11.2208 11.7481 11.7764 12.6626 12.611 13.4051C13.5006 14.2029 14.2733 14.5395 14.6697 14.7122C14.7493 14.7469 14.8138 14.7749 14.8609 14.7988C15.1384 14.9231 15.2999 14.9091 15.4643 14.7257C15.6287 14.5424 16.1668 13.9137 16.3494 13.6391C16.5363 13.3574 16.7224 13.4051 16.9788 13.4965Z' fill='#1F242E'/></svg>";

  return $str;
}


/*
[telegram]
 */
add_shortcode( 'telegram', 'telegram' );
function telegram( $atts ) {

  $params = shortcode_atts(
    array(
      'class' => return_default_class(),
    ),
    $atts
  ); // $params[class]

  $str = "<svg class='$params[class]' width='29' height='26' viewBox='0 0 29 26' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M29 0L0 11.2667L7.00716 14.8154L9.94287 25.1333L14.7153 19.7552L22.3714 26L29 0ZM10.9972 16.3705L10.1811 21.1273L8.36741 14.541L26.0507 2.83203L10.9972 16.3705Z' fill='#1F242E'/></svg>";

  return $str;
}
