const currentPage = document.body.getAttribute('data-page');

// href clicked active link start 
const currentHTMLPage = window.location.href;
const navLinks = document.querySelectorAll('.nav-link');
navLinks.forEach(link => {
  if (currentHTMLPage.includes(link.getAttribute('href'))) {
    link.classList.add('active');
  }
});
// href clicked active link end

if (currentPage === 'page1') {
//product link start
let product = document.getElementsByClassName('product');
const rowLayout = document.getElementById('row-layout');
const bestRowLayout = document.getElementById('best-row-layout');
const newRowLayout = document.getElementById('new-row-layout');

const swiperLayout = document.getElementById('swiper-layout');
const bestSwiperLayout = document.getElementById('best-swiper-layout');
const newSwiperLayout = document.getElementById('new-swiper-layout');

const featPagination = document.getElementsByClassName('feat-pagination');
const bestPagination = document.getElementsByClassName('best-pagination');
const newPagination = document.getElementsByClassName('new-pagination');

let currentProduct = 0;

function activeProduct(event,pElementId,swiElementId){
  event.preventDefault();
  const clickProduct = event.target;

  if(clickProduct.classList.contains('product-active')){
    return;
  }

  for(let p of product){
    p.classList.remove('product-active');
  }

  clickProduct.classList.add('product-active');
  currentProduct = Array.from(product).indexOf(clickProduct);

  rowLayout.style.display = pElementId === 'rowLayout' ? 'flex' : 'none';
  bestRowLayout.style.display = pElementId === 'bestRowLayout' ? 'flex' : 'none';
  newRowLayout.style.display = pElementId === 'newRowLayout' ? 'flex' : 'none';

  swiperLayout.style.display = swiElementId === 'swiperLayout' ? 'block' : 'none';
  bestSwiperLayout.style.display = swiElementId === 'bestSwiperLayout' ? 'block' : 'none';
  newSwiperLayout.style.display = swiElementId === 'newSwiperLayout' ? 'block' : 'none';

  for (let pagination of featPagination){
    pagination.style.display = swiElementId === 'swiperLayout' ? 'block' : 'none';
  }
  for (let pagination of bestPagination){
      pagination.style.display = swiElementId === 'bestSwiperLayout' ? 'block' : 'none';
  }
  for (let pagination of newPagination){
      pagination.style.display = swiElementId === 'newSwiperLayout' ? 'block' : 'none';
  }
}
//product link end

//swiper function start
function initSwiper() {
  const swiper = new Swiper('#swiper-layout', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.feat-pagination',
      clickable: true,
    },

    breakpoints: {
      0: {
          slidesPerView: 1,
      },
      528: {
          slidesPerView: 2,
      },
      728: {
        slidesPerView: 3,
      }
    }
  });

  const bestswiper = new Swiper('#best-swiper-layout', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.best-pagination',
      clickable: true,
    },

    breakpoints: {
      0: {
          slidesPerView: 1,
      },
      528: {
          slidesPerView: 2,
      },
      728: {
        slidesPerView: 3,
      }
    }
  });

  const newswiper = new Swiper('#new-swiper-layout', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: '.new-pagination',
      clickable: true,
    },

    breakpoints: {
      0: {
          slidesPerView: 1,
      },
      528: {
          slidesPerView: 2,
      },
      728: {
        slidesPerView: 3,
      }
    }
  });
}
//swiper function end

// Function to show/hide the pagination and initialize the slider based on screen width start
function handleSliderAndPagination() {
  const productPagination = document.querySelector('.product-pagination')
  const productRowLayout = document.querySelector('.product-row-layout');
  const productSwiperLayout = document.querySelector('.product-swiper-layout');
  const isMobile = window.innerWidth < 1000;

  productPagination.style.display = isMobile ? 'block' : 'none';
  productRowLayout.style.display = isMobile ? 'none' : 'flex';
  productSwiperLayout.style.display = isMobile ? 'block' : 'none';

  if (isMobile) {
    initSwiper();
  }
}
handleSliderAndPagination();
window.addEventListener('resize', handleSliderAndPagination);
// Function to show/hide the pagination and initialize the slider based on screen width end

//helmets container pre & next btn start
let flag = 0;

function controller(x){
  flag = flag + x;
  slideShow(flag);
}

function slideShow(num){
  const card1 = document.getElementsByClassName('card1');
  const card2 = document.getElementsByClassName('card2');
  const card3 = document.getElementsByClassName('card3');

  if(num == card1.length || num == card2.length || num == card3.length){
    flag = 0;
    num = 0;
  }

  if (num < 0) {
    const cardLength = card1.length + card2.length + card3.length;
    flag = cardLength - 7;
    num = cardLength - 7;
  }

  function hideElements(collections) {
    for(let collection of collections){
      for(let element of collection){
        element.style.display = 'none';
      }
    }
  }
  hideElements([card1, card2, card3]);

  if (card1[num]) {
    card1[num].style.display = 'flex';
  }
  if (card2[num]) {
    card2[num].style.display = 'flex';
  }
  if (card3[num]) {
    card3[num].style.display = 'flex';
  }
}

slideShow(flag);
//helmets container pre & next btn end

//jackets container pre & next btn start
let flag2 = 0;

function controller2(y){
  flag2 = flag2 + y;
  slideShow2(flag2);
}

function slideShow2(num2){
  const card4 = document.getElementsByClassName('card4');
  const card5 = document.getElementsByClassName('card5');
  const card6 = document.getElementsByClassName('card6');

  if(num2 == card4.length || num2 == card5.length || num2 == card6.length){
    flag2 = 0;
    num2 = 0;
  }

  if (num2 < 0) {
    const cardLength2 = card4.length + card5.length + card6.length;
    flag2 = cardLength2 - 7;
    num2 = cardLength2 - 7;
  }

  function hideElements2(collections2) {
    for(let collection2 of collections2){
      for(let element2 of collection2){
        element2.style.display = 'none';
      }
    }
  }
  hideElements2([card4, card5, card6]);

  if (card4[num2]) {
    card4[num2].style.display = 'flex';
  }
  if (card5[num2]) {
    card5[num2].style.display = 'flex';
  }
  if (card6[num2]) {
    card6[num2].style.display = 'flex';
  }
}

slideShow2(flag2);
//jackets container pre & next btn end

//gloves container pre & next btn start
let flag3 = 0;

function controller3(z){
  flag3 = flag3 + z;
  slideShow3(flag3);
}

function slideShow3(num3){
  const card7 = document.getElementsByClassName('card7');
  const card8 = document.getElementsByClassName('card8');
  const card9 = document.getElementsByClassName('card9');

  if(num3 == card7.length || num3 == card8.length || num3 == card9.length){
    flag3 = 0;
    num3 = 0;
  }

  if (num3 < 0) {
    const cardLength3 = card7.length + card8.length + card9.length;
    flag3 = cardLength3 - 7;
    num3 = cardLength3 - 7;
  }

  function hideElements3(collections3) {
    for(let collection3 of collections3){
      for(let element3 of collection3){
        element3.style.display = 'none';
      }
    }
  }
  hideElements3([card7, card8, card9]);

  if (card7[num3]) {
    card7[num3].style.display = 'flex';
  }
  if (card8[num3]) {
    card8[num3].style.display = 'flex';
  }
  if (card9[num3]) {
    card9[num3].style.display = 'flex';
  }
}

slideShow3(flag3);
//gloves container pre & next btn end

//rider slider btn start
new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow: 3,
  draggable: 5000,
  duration: 1,
  dots: '.dots',
  arrows: {
    prev: '.glider-prev',
    next: '.glider-next',
    duration: 1,
  },
  
  responsive : [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 820,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 640,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 304,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        duration: 1,
      }
    },
    {
      breakpoint: 0,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        duration: 1,
      }
    }
  ]
});
//rider slider btn end

// footer dropdown start 
$(document).ready(function(){
  function toggleDropdown(btnId, contentId, downId, upId) {
    $(btnId).click(function(){
      $(contentId).toggle(1000);
      $(downId).toggle();
      $(upId).toggle();
    });
    $(contentId).hide();
  }

  toggleDropdown('#toggle-btn', '#drop-items', '#down', '#up');
  toggleDropdown('#toggle-btn2', '#drop-items2', '#down2', '#up2');
  toggleDropdown('#toggle-btn3', '#drop-items3', '#down3', '#up3');
});
// footer dropdown end
} 
else if (currentPage === 'page2') {
// product size check start 
let size = document.getElementsByClassName('size');
let currentSize = 0;
  
function activeSize(event,count){
  event.preventDefault();
  const clickSize = event.target;

  if(clickSize.classList.contains('size-active')){
    return;
  }

  for(let s of size){
    s.classList.remove('size-active');
  }

  clickSize.classList.add('size-active');
  currentSize = Array.from(size).indexOf(clickSize);

  const productLeft = document.querySelector('.product-left-count');
  productLeft.textContent = count;
}
// product size check end 

// product details click start 
let detailsText = document.getElementsByClassName('text-content');
const textParagraph = document.getElementById('text-paragraph');
const addInfo = document.getElementById('add-info');
const reviewsInfo = document.getElementById('reviews-info');
let currentDetails = 0;

function detailsClick(event,elementId){
  event.preventDefault();
  const clickText = event.target;

  if(clickText.classList.contains('text-active')){
    return;
  }
  for(let d of detailsText){
    d.classList.remove('text-active');
  }
  clickText.classList.add('text-active');
  currentDetails = Array.from(detailsText).indexOf(clickText);

  textParagraph.style.display = elementId === 'textParagraph' ? 'block' : 'none';
  addInfo.style.display = elementId === 'addInfo' ? 'block' : 'none';
  reviewsInfo.style.display = elementId === 'reviewsInfo' ? 'block' : 'none';
}
// product details click end 

//review form show and hide start 
$(document).ready(function(){
  $('#rev-toggle').click(function(){
    $('#rev-form').toggle();
    $('#rev-down').toggle();
    $('#rev-up').toggle();
  });
});
//review form show and hide end

}

// product view start 
var swiper2 = new Swiper("#mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  freeMode: true,
  grabCursor: true,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: "#swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    0: {
        slidesPerView: 1,
    },
    528: {
        slidesPerView: 2,
    },
    800: {
      slidesPerView: 3,
    }
  }
});
// product view end 