const images = [
    // 'img/bgwarna1.png',
  ]; // Ganti dengan path gambar yang sesuai
  
  let currentIndex = 0;
  const slideshowElement = document.querySelector('.slideshow-background');
  
  // Tambahkan elemen untuk gambar saat ini dan gambar berikutnya
  slideshowElement.innerHTML = '<div class="current"></div><div class="next"></div>';
  const currentImageElement = slideshowElement.querySelector('.current');
  const nextImageElement = slideshowElement.querySelector('.next');
  
  currentImageElement.style.backgroundSize = 'cover';
  currentImageElement.style.backgroundPosition = 'center';
  currentImageElement.style.position = 'absolute';
  currentImageElement.style.width = '100%';
  currentImageElement.style.height = '100%';
  currentImageElement.style.top = '0';
  currentImageElement.style.left = '0';
  currentImageElement.style.overflow = 'hidden';
  
  nextImageElement.style.backgroundSize = 'cover';
  nextImageElement.style.backgroundPosition = 'center';
  nextImageElement.style.position = 'absolute';
  nextImageElement.style.width = '100%';
  nextImageElement.style.height = '100%';
  nextImageElement.style.top = '0';
  nextImageElement.style.left = '100%'; // Awalnya di luar layar
  nextImageElement.style.overflow = 'hidden';
  
  slideshowElement.style.overflow = 'hidden'; // Hindari scroll horizontal
  
  // Fungsi untuk mengubah background image dengan efek geser
  // function changeBackgroundImage() {
  //   const nextIndex = (currentIndex + 1) % images.length;
  
  //   nextImageElement.style.backgroundImage = `url(${images[nextIndex]})`;
  //   nextImageElement.style.transition = 'none';
  //   nextImageElement.style.left = '100%';
  
  //   setTimeout(() => {
  //     nextImageElement.style.transition = 'left 0.5s ease-in-out';
  //     currentImageElement.style.transition = 'left 0.5s ease-in-out';
  
  //     nextImageElement.style.left = '0';
  //     currentImageElement.style.left = '-100%';
  //   }, 0);
  
  //   setTimeout(() => {
  //     currentImageElement.style.transition = 'none';
  //     currentImageElement.style.left = '0';
  //     currentImageElement.style.backgroundImage = `url(${images[nextIndex]})`;
  
  //     // Tukar elemen
  //     [currentImageElement, nextImageElement].forEach(el => el.style.transition = 'none');
  //     currentIndex = nextIndex;
  //   }, 500);
  // }
  
  // Interval untuk slide otomatis setiap 5 detik
  // setInterval(changeBackgroundImage, 10000);
  
  // Set gambar awal
  // currentImageElement.style.backgroundImage = `url(${images[currentIndex]})`;
  
  
  // Ambil elemen header
  const header = document.querySelector(".atas");
  
  // Tambahkan event listener untuk mendeteksi scroll
  window.addEventListener("scroll", function () {
    if (window.scrollY > 5) {
      // Tambahkan class 'scrolled' jika scroll lebih dari 5px
      header.classList.add("scrolled");
    } else {
      // Hapus class 'scrolled' jika scroll kembali ke atas
      header.classList.remove("scrolled");
    }
  });
  
  
  
  
  
  
  