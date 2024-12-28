const hamburger = document.querySelector('.hamburger');
const closeMenu = document.querySelector('.closeMobileMenu');
const mobileMenu = document.querySelector('.mobil-menu-container');
hamburger?.addEventListener("click",()=>{
    mobileMenu.style.right="0"
})
closeMenu?.addEventListener("click",()=>{
    mobileMenu.style.right="-100%"
})


var home_blog_slide = new Swiper(".home-blog-slide", {
    autoplay:{
        delay:2300
    },
    loop:true,
    speed:1800,
    slidesPerView:"auto",
    spaceBetween:24
});
var other_blog_slide = new Swiper(".other-blog-slide", {
    autoplay:{
        delay:2300
    },
    loop:true,
    speed:1800,
    slidesPerView:"auto",
    spaceBetween:24
});
var service_slide = new Swiper(".service-slide", {
    autoplay:{
        delay:2300
    },
    loop:true,
    speed:1800,
    slidesPerView:"auto",
    spaceBetween:24
});

var experience_slide = new Swiper(".experience-slide", {
    speed:500,
    slidesPerView:"auto",
    loop:true,
    direction: "vertical",
    mousewheel: true,
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});

var blogs_tabs_slide = new Swiper(".blogs-tabs-slide", {
    loop:false,
    speed:1500,
    slidesPerView:"auto",
    breakpoints:{
        768:{
            spaceBetween:24
        },
        0:{
            spaceBetween:20
        }
    }
});
var lastBlogs_slide = new Swiper(".lastBlogs-slide", {
    autoplay:{
        delay:2300
    },
    loop:true,
    speed:2200,
    slidesPerView:1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
});

const accItems = document.querySelectorAll('.service-item');
const body = document.querySelector('body');
accItems.forEach(item => {
    const button = item.querySelector('.service-title');
    button?.addEventListener('click', function (e) {
        if (item.classList.contains('active')) {
            item.classList.remove('active');
        } else {
            accItems.forEach(i => {
                i.classList.remove('active');
            });
            item.classList.add('active');
        }
    });
});
body?.addEventListener('click', function (e) {
    if (!e.target.closest('.service-item')) {
        accItems.forEach(item => {
            item.classList.remove('active');
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const reviewBoxes = document.querySelectorAll('.customerReview-box');
    
    if (reviewBoxes.length > 0) {
        reviewBoxes[0].classList.add('firstBox');
    }
    if (reviewBoxes.length > 1) {
        reviewBoxes[1].classList.add('secondBox');
    }
    if (reviewBoxes.length > 2) {
        reviewBoxes[2].classList.add('thirdBox');
    }

    function changeClass() {
        const firstBox = document.querySelector('.firstBox');
        const secondBox = document.querySelector('.secondBox');
        const thirdBox = document.querySelector('.thirdBox');
        if(firstBox && secondBox || thirdBox){
            setTimeout(() => {
                firstBox.classList.add('top1');
            }, 1000);
            setTimeout(() => {
                secondBox.classList.add('top0');
            }, 1500);

            setTimeout(() => {
                firstBox.classList.replace('top1', 'bottom1');
                thirdBox.classList.add('bottom2');
            }, 2000);
            setTimeout(() => {
                secondBox.classList.replace('top0', 'top1');
            }, 2500);

            setTimeout(() => {
                firstBox.classList.replace('bottom1', 'bottom2')
                thirdBox.classList.replace('bottom2', 'top0')
            }, 4000);
            setTimeout(() => {
                secondBox.classList.replace('top1', 'bottom1');
            }, 4500);
            setTimeout(() => {
                firstBox.classList.remove('bottom2');
                thirdBox.classList.replace('top0', 'top1')

            }, 6000);
            setTimeout(() => {
                secondBox.classList.remove('bottom1')
            }, 6500);
            setTimeout(() => {
                thirdBox.classList.remove('top1')
            }, 7000);
        }

    }
    changeClass();
    setInterval(changeClass, 7000);
});

document.addEventListener("DOMContentLoaded", function () {
    const blog_tab_items = document.querySelectorAll(".blog-tab-item");
    const blogCarts = document.querySelectorAll(".allBlogs .blog-cart");

    // blog_tab_items dizisi boşsa, hata almamak için kontrol ekliyoruz
    if (blog_tab_items.length > 0) {
        blog_tab_items[0].classList.add("active");  // İlk tab'ı aktif yapıyoruz
    }

    blog_tab_items.forEach(blog_tab_item => {
        blog_tab_item?.addEventListener("click", () => {
            blog_tab_items.forEach(btn => btn.classList.remove("active"));  // Diğer tab'ların aktifliğini kaldırıyoruz
            blog_tab_item.classList.add("active");  // Tıklanan tab'ı aktif yapıyoruz
            blogCarts.forEach(cart => cart.style.display = "none");  // Tüm blog kartlarını gizliyoruz

            let id = blog_tab_item.id;  // Tıklanan tab'ın id'sini alıyoruz

            if (id !== "allBlogs") {
                // "allBlogs" olmayan tab seçildiyse, ilgili blog kartlarını gösteriyoruz
                document.querySelectorAll(`.blog-cart[data-id=${id}]`).forEach(cart => {
                    cart.style.display = "block";  // İlgili blog kartını gösteriyoruz
                });
            } else {
                // "allBlogs" tab'ı seçildiyse, tüm blog kartlarını gösteriyoruz
                blogCarts.forEach(blogCart => blogCart.style.display = "block");
            }
        });
    });
});





  
  