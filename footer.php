<section id="footer" class="py-5 bg-black">
 <div class="container-xl">
  <div class="row footer_1">

   <div class="col-md-4">
    <div class="footer_1_left">
	  <b class="text-white d-block mb-4 fs-4 line_x"> Our Store</b>
	  <p class="text-white-50">Maria and Jenny is a destination where beauty meets elegance. We specialize in high-quality
                        cosmetics and timeless jewellery designed to enhance your confidence and personal style. Our
                        passion lies in carefully selecting premium products that combine luxury, durability, and modern
                        trends. At Maria and Jenny, we believe beauty is more than appearance—it’s an expression of
                        individuality, and we are proud to be part of your everyday glow and special moments.</p>
	  <ul class="mb-0 social_icon fs-3 mt-4">
			   <li class="d-inline-block"><a class="text-white link" href="https://www.facebook.com/share/18cwBbCLbo/?mibextid=wwXIfr"><i class="bi bi-facebook"></i></a></li>
			   <li class="d-inline-block ms-2"><a class="text-white link" href="https://mail.google.com/mail/u/0/#inbox?compose=new"><i class="bi bi-envelope"></i></a></li>
			   <!-- <li class="d-inline-block ms-2"><a class="text-white link" href="#"><i class="bi bi-linkedin"></i></a></li> -->
			  <li class="d-inline-block ms-2"><a class="text-white link" href="https://www.instagram.com/luxe_decors25/"><i class="bi  bi-instagram"></i></a></li>
			</ul>
	</div>
   </div>
   
     <div class="col-md-2">
    <div class="footer_1_left">
	  <b class="text-white d-block mb-4 fs-4 line_x"> Product</b>
	 <div class="row footer_1ism font_14 ps-1">
		 <span class="col-md-12 col-6  d-inline-block"><i class="bi-chevron-right align-middle col_secondry me-1"></i> <a class="text-white-50 link align-middle" href="all_products.php">  ALL PRODUCTS</a></span>
	    </div>
	</div>
   </div>
   
     <div class="col-md-2">
    <div class="footer_1_left">
	  <b class="text-white d-block mb-4 fs-4 line_x"> Links</b>
	 <div class="row footer_1ism font_14 ps-1">
		 <span class="col-md-12 col-6  d-inline-block"><i class="bi-chevron-right align-middle col_secondry me-1"></i> <a class="text-white-50 link align-middle" href="about.php">  About Us</a></span>
	 <span class="mt-2 col-md-12 col-6  d-inline-block"><i class="bi-chevron-right align-middle col_secondry me-1"></i> <a class="text-white-50 link align-middle" href="contact.php"> Contact Us</a></span>
	 
	    </div>
	</div>
   </div>
   
       
  
<div class="row footer_2 mt-5 pt-4 border-top">
     <div class="col-md-4">
	  <div class="footer_2_left2">
	     <b><a class="fs-1 family_zaland text-white" href="index.php"><i class="bi-gem me-1 col_secondry"></i> MARIA & JENNY</a></b>
	  </div>
	 </div>
	 <div class="col-md-8">
	  <div class="footer_2_right text-end pt-3">
	      <p class="mb-0 text-white-50 font_14">© 2025 MARIA & JENNY. All Rights Reserved | Design by
	<a class="col_secondry" href="index.php">Team M&J</a></p>
	  </div>
	 </div>
   </div>
 </div>
</section>

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <div class="modal-header border-0">
        <h1 class="modal-title w-100 wave wave_center">Search</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="searchFormModal" class="d-flex flex-column align-items-center">
          <input class="form-control mb-4" type="search" placeholder="Type to search..." style="max-width: 400px;">
          <button class="btn btn-primary button button_2 border-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Offcanvas Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
  <div class="offcanvas-header caption-right p-4">
    <h5 class="col_red m-0">Your Cart</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group cart-items"></ul>
    <div class="mt-3"><strong class="fs-4">Total: $<span class="cart-total col_primary">0.00</span></strong></div>
    <a href="#" class="btn btn-primary button border-0 w-100 mt-3 rounded-0">Checkout</a>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  // Sticky navbar
  document.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 80) {
      navbar.classList.add("sticky");
      document.body.classList.add("has-sticky");
    } else {
      navbar.classList.remove("sticky");
      document.body.classList.remove("has-sticky");
    }
  });

  // Mobile submenu toggle
  document.querySelectorAll('.dropdown-submenu > a').forEach(function (submenuLink) {
    submenuLink.addEventListener('click', function (e) {
      if (window.innerWidth < 992) {
        e.preventDefault();
        e.stopPropagation();
        let submenu = this.nextElementSibling;
        this.closest('.dropdown-menu').querySelectorAll('.dropdown-menu.show').forEach(function (openMenu) {
          if (openMenu !== submenu) openMenu.classList.remove('show');
        });
        submenu.classList.toggle('show');
      }
    });
  });

  // Search modal form
  document.getElementById("searchFormModal").addEventListener("submit", function(e) {
    e.preventDefault();
    const query = this.querySelector("input").value.trim();
    if (query) {
      alert("Searching for: " + query);
    }
  });

  
});


document.addEventListener("DOMContentLoaded", function () {
  const cart = {};
  const cartItemsEl = document.querySelector(".cart-items");
  const cartTotalEl = document.querySelector(".cart-total");
  const cartCountEl = document.querySelector(".cart-count");

  function updateCartDisplay() {
    cartItemsEl.innerHTML = "";
    let total = 0;
    let count = 0;

    for (let name in cart) {
      const item = cart[name];
      total += item.price * item.qty;
      count += item.qty;

      const li = document.createElement("li");
      li.className = "list-group-item d-flex justify-content-between align-items-center p-2 px-3";
      li.innerHTML = `
	        <div class="position-relative">
			   <span class="badge rounded-pill position-absolute product_badge">${item.qty}</span>
	           <img src="${item.image}" class="rounded" alt="..." width="100">	
		    </div>
			<div class="p-3 px-0">
			  <b class="fs-5 d-block mb-2">${name}</b>
			  <b class="d-block col_red fs-4"> $ ${item.price.toFixed(2)} <span class="fw-bold col_primary">each</span></b>
			</div>	
		<i class="bi bi-trash delete-item" data-name="${name}"></i>
        
      `;
      cartItemsEl.appendChild(li);
    }

    cartTotalEl.textContent = total.toFixed(2);
    cartCountEl.textContent = count;

    // Attach delete event
    document.querySelectorAll(".delete-item").forEach(btn => {
      btn.addEventListener("click", function () {
        const name = this.dataset.name;
        delete cart[name];
        updateCartDisplay();
      });
    });
  }

  document.querySelectorAll(".add-to-cart").forEach(btn => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const name = this.dataset.name;
      const price = parseFloat(this.dataset.price);
	  const image = this.dataset.image;
      if (!cart[name]) {
        cart[name] = { price: price, qty: 1, image: image };
      } else {
        cart[name].qty++;
      }
      updateCartDisplay();
    });
  });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 50,
	  loop: true,
      speed: 3000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
	  breakpoints: {
			// when window width is >= 300px
			300: {
			  slidesPerView: 1
			},
			// when window width is >= 480px
			480: {
			  slidesPerView: 1
			},
			// when window width is >= 576px
			576: {
			  slidesPerView: 1
			},
			// when window width is >= 768px
			768: {
			  slidesPerView: 1
			},
			// when window width is >= 992px
			992: {
			  slidesPerView: 1
			}
      }
      
    });
  </script>
  
  <script>
    var swiper = new Swiper(".mySwiper1", {
      slidesPerView: 1,
      spaceBetween: 50,
	  loop: true,
      speed: 2000,
      autoplay: {
        delay: 2000,
        disableOnInteraction: false,
      },
	  breakpoints: {
			// when window width is >= 300px
			300: {
			  slidesPerView: 1
			},
			// when window width is >= 480px
			480: {
			  slidesPerView: 1
			},
			// when window width is >= 576px
			576: {
			  slidesPerView: 1
			},
			// when window width is >= 768px
			768: {
			  slidesPerView: 1
			},
			// when window width is >= 992px
			992: {
			  slidesPerView: 1
			}
      }
      
    });
  </script>
  

<script>
    // Set the date we're counting down to (1 month from now)
const countDownDate = new Date().getTime() + (30 * 24 * 60 * 60 * 1000)

// Update the countdown every 1 second
const x = setInterval(function() {
  // Get today's date and time
  const now = new Date().getTime()

  // Find the distance between now and the countdown date
  const distance = countDownDate - now

  // Time calculations for days, hours, minutes and seconds
  const days = Math.floor(distance / (1000 * 60 * 60 * 24))
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))
  const seconds = Math.floor((distance % (1000 * 60)) / 1000)

  // Display the result
  document.getElementById("days").innerHTML = days.toString().padStart(2, '0')
  document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0')
  document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0')
  document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0')

  // If the countdown is finished, write some text
  if (distance < 0) {
    clearInterval(x)
    document.getElementById("days").innerHTML = "00"
    document.getElementById("hours").innerHTML = "00"
    document.getElementById("minutes").innerHTML = "00"
    document.getElementById("seconds").innerHTML = "00"
  }
}, 1000)
</script>

<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>