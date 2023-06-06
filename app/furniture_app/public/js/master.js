const swiper = new Swiper(".swiper", {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  loop: true, //繰り返しをする
  centeredSlides: true, //アクティブなスライドを中央に表示
  slidesPerView: 3, //スライダーのコンテナ上に2枚同時に表示
  spaceBetween: 16, //スライド間の距離を16pxに
  speed: 600 //スライドの推移時間を600msに
});