

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });


  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Auto generate the carousel indicators
   */
  document.querySelectorAll('.carousel-indicators').forEach((carouselIndicator) => {
    carouselIndicator.closest('.carousel').querySelectorAll('.carousel-item').forEach((carouselItem, index) => {
      if (index === 0) {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}" class="active"></li>`;
      } else {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}"></li>`;
      }
    });
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
 * Activities Toggle
 */
  document.querySelectorAll('.activities-item h3, .activities-item .activities-toggle').forEach((activitiesItem) => {
    activitiesItem.addEventListener('click', () => {
        const parentItem = activitiesItem.closest('.activities-item');

        // Tutup semua item sebelum membuka yang baru (opsional)
        document.querySelectorAll('.activities-item').forEach((item) => {
            if (item !== parentItem) {
                item.classList.remove('activities-active');
            }
        });

        // Toggle class "activities-active" pada item yang diklik
        parentItem.classList.toggle('activities-active');
    });
  });


  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

})();


/**
 * Pagination Article
 */

// Data artikel
const articles = [
  { title: "Perkembangan Teknologi AI di 2025", category: "Teknologi", date: "03 Maret 2025", image: "assets/img/article/article-1.jpg", link: "article-detail.html?id=1" },
  { title: "Keamanan Siber: Tantangan dan Solusi", category: "Cyber Security", date: "28 Februari 2025", image: "assets/img/article/article-2.jpg", link: "article-detail.html?id=2" },
  { title: "Inovasi Energi Terbarukan di Indonesia", category: "Energi", date: "20 Februari 2025", image: "assets/img/article/article-3.jpg", link: "article-detail.html?id=3" },
  { title: "SEO Tips: Agar Lebih Efisien dan Produktif", category: "Digital Marketing", date: "20 Februari 2025", image: "assets/img/article/article-4.jpg", link: "article-detail.html?id=4" },
  { title: "Tren Mobile App Development", category: "Teknologi", date: "10 Februari 2025", image: "assets/img/article/article-5.jpg", link: "article-detail.html?id=5" },
];

let currentPage = 1;
const articlesPerPage = 2;
const totalPages = Math.ceil(articles.length / articlesPerPage);

const container = document.getElementById("article-container");
const paginationContainer = document.querySelector(".pagination-numbers");
const prevBtn = document.getElementById("prevPage");
const nextBtn = document.getElementById("nextPage");

/**
 * Fungsi untuk menampilkan artikel berdasarkan halaman saat ini
 */
function displayArticles() {
  container.innerHTML = "";
  const start = (currentPage - 1) * articlesPerPage;
  const end = start + articlesPerPage;
  const currentArticles = articles.slice(start, end);

  currentArticles.forEach(article => {
    container.innerHTML += `
      <div class="article-item">
        <div class="article-image">
          <img src="${article.image}" alt="${article.title}" />
        </div>
        <div class="article-content">
          <h4 class="article-title"><a href="${article.link}">${article.title}</a></h4>
          <p class="article-category">${article.category}</p>
          <p class="article-date">🗓 ${article.date}</p>
        </div>
      </div>`;
  });

  updatePagination();
}

/**
 * Fungsi untuk mengupdate tampilan pagination
 */
function updatePagination() {
  paginationContainer.innerHTML = "";

  for (let i = 1; i <= totalPages; i++) {
    const pageBtn = document.createElement("button");
    pageBtn.classList.add("btn", "page-number");
    if (i === currentPage) {
      pageBtn.classList.add("active");
    }
    pageBtn.textContent = i;
    pageBtn.setAttribute("data-page", i);
    paginationContainer.appendChild(pageBtn);
  }

  prevBtn.disabled = currentPage === 1;
  nextBtn.disabled = currentPage === totalPages;
}

/**
 * Event Listener untuk tombol navigasi
 */
prevBtn.addEventListener("click", () => {
  if (currentPage > 1) {
    currentPage--;
    displayArticles();
  }
});

nextBtn.addEventListener("click", () => {
  if (currentPage < totalPages) {
    currentPage++;
    displayArticles();
  }
});

/**
 * Event Listener untuk nomor halaman (menggunakan event delegation)
 */
paginationContainer.addEventListener("click", (event) => {
  if (event.target.classList.contains("page-number")) {
    currentPage = parseInt(event.target.getAttribute("data-page"));
    displayArticles();
  }
});

// Menampilkan artikel pertama kali saat halaman dimuat
displayArticles();
