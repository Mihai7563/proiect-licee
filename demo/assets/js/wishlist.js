function removeFromWishlist(productName) {
    const wishlist = JSON.parse(localStorage.getItem("WishProduct")) || [];
    const newWishlist = wishlist.filter(item => item.name !== productName);
    localStorage.setItem("WishProduct", JSON.stringify(newWishlist));
    displayWishlist(); 
  }


  function displayWishlist() {
    const container = document.getElementById("wishlistContainer");
    const wishlist = JSON.parse(localStorage.getItem("WishProduct")) || [];

    container.innerHTML = ""; 

    if (wishlist.length === 0) {
      container.innerHTML = 
      `<div class='d-flex flex-column justify-content-center align-items-center'>
        <p class='heading-font text-muted text-center fs-5'>Nu ai niciun liceu în lista de favorite.</p>
        <div class='text-center mt-2'>
          <a href='http://localhost/proiect-licee/demo/lista-licee.php' class='text-decoration-underline text-accent-3 heading-font'>Vezi liceele</a>
        </div>
      </div>`;
      return;
    }

    wishlist.forEach(item => {
      const card = document.createElement("div");
      
      card.className = "col-12 col-lg-6 mb-4"; 
      card.innerHTML = 
      ` <div class="school-card">
              <div class="card border-0 rounded-4 overflow-hidden bg-white">
                <div class="row ps-3">
              <!-- Content -->
              <div class="col-md-7 p-3 d-flex flex-column justify-content-between">
                  <div>
                <div class="d-flex align-items-center mb-2">
                  <span>⭐⭐⭐⭐⭐</span>
                </div>
                <h5 class="heading-font text-color-heading-1">${item.name}</h5>
                <p class="text-color-heading-1 mb-1 border-bottom border-2"> Sector ${item.sector}, București</p>
                <p class="mb-1 fs-5"><strong>Rata de Promovabilitate:</strong> ${item.promovabilitate}% (${item.lastYear})</p>
                <p class="text-grey-2 mb-1"><strong>Medie Admitere:</strong> ${item.medie} (${item.lastYear})</p>
                  </div>
                  <div>
                <a class="btn bg-accent-3 text-white rounded-pill px-4 py-2 heading-font text-center text-lg-start mt-3" href="http://localhost/proiect-licee/demo/prezentare-liceu.php?liceu=${item.id}">Vezi detalii</a>
                <button class="remove-btn btn btn-outline-accent-3 rounded-pill px-4 py-2 heading-font text-center text-lg-start mt-3" id="favoriteBtn" data-product-name="${item.name}">
                  <i class="bi bi-heart-fill text-like-red"></i>
                </button>
                  </div>
              </div>
              <!-- Image -->
              <div class="col-md-5">
                  <img src="${item.image}" class="img-fluid h-100 object-fit-cover" alt="Liceu">
              </div>
                </div>
              </div>
              </div>
      `;

      container.appendChild(card);
    });

    
    document.querySelectorAll(".remove-btn").forEach(button => {
      button.addEventListener("click", () => {
        const name = button.getAttribute("data-product-name");
        console.log(name);
        removeFromWishlist(name);
      });
    });
  }

  
  document.addEventListener("DOMContentLoaded", () => {
    displayWishlist();
  });