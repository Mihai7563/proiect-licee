function addToWishlist(highschool, button) {
  const existingWishlist = JSON.parse(localStorage.getItem("WishProduct")) || [];

  const isAlreadyInWishlist = existingWishlist.some(
    (item) => item.name === highschool.name
  );

  if (!isAlreadyInWishlist) {
    existingWishlist.push(highschool);
    console.log(button);
    
    updateButtonAppearance(button, true);

    Swal.fire({
      position: "center",
      icon: "success",
      title: "Liceul a fost adăugat în lista de favorite!",
      showConfirmButton: false,
      timer: 1500,
    });

    // Add a class to make the heart red
  } else {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Liceul este deja adăugat în lista de favorite!",
      showConfirmButton: false,
      timer: 1500,
    });
  }

  // Save the updated wishlist in local storage
  localStorage.setItem("WishProduct", JSON.stringify(existingWishlist));
}

function updateButtonAppearance(button, isInWishlist) {
  const icon = button.querySelector("i");
  console.log(icon);
  
  if (isInWishlist) {
    button.classList.add("added-to-wishlist");
    if (icon) {
      icon.classList.remove("bi-heart");
      icon.classList.add("bi-heart-fill");
      icon.classList.add("text-like-red");
    }
  } else {
    button.classList.remove("added-to-wishlist");
    if (icon) {
      icon.classList.remove("bi-heart-fill");
      icon.classList.add("bi-heart");
      icon.classList.remove("text-like-red");
    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const addToWishlistButtons = document.querySelectorAll(".add-to-wishlist");

  // Check the wishlist and update button appearance on page load
  const existingWishlist = JSON.parse(localStorage.getItem("WishProduct")) || [];
  addToWishlistButtons.forEach((button) => {
    const highschoolId = button.getAttribute("data-highschool-id");
    const isInWishlist = existingWishlist.some(
      (item) => item.id === highschoolId
    );
    updateButtonAppearance(button, isInWishlist);

    button.addEventListener("click", () => {
      const highschool = {
        id: button.getAttribute("data-highschool-id"),
        name: button.getAttribute("data-highschool-name"),
        sector: button.getAttribute("data-highschool-sector"),
        promovabilitate: button.getAttribute("data-highschool-promovabilitate"),
        lastYear: button.getAttribute("data-highschool-last-year"),
        medie: button.getAttribute("data-highschool-medie"),
        image: button.getAttribute("data-highschool-img"),
      };
      addToWishlist(highschool, button);
    });
  });
});