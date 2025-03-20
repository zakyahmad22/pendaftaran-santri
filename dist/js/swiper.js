var swiper = new Swiper('.swiper-container', {
    loop: true, // Mengaktifkan infinite loop
    pagination: {
      el: '.swiper-pagination', // Menambahkan pagination (titik-titik di bawah)
      clickable: true, // Pagination bisa diklik
    },
    navigation: {
      nextEl: '.swiper-button-next', // Tombol next
      prevEl: '.swiper-button-prev', // Tombol previous
    },
});
