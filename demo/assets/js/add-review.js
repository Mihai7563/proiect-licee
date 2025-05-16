function getReviews() {
    return JSON.parse(localStorage.getItem("userReviews")) || [];
  }
  
  
  function saveReviews(reviews) {
    localStorage.setItem("userReviews", JSON.stringify(reviews));
  }
  
  
  function displayReview(review) {
    const container = document.getElementById("reviews");
  
    const col = document.createElement("div");
    col.className = "col-sm-12 col-md-6 col-lg-4 mb-3";
  
    col.innerHTML = `
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">${review.name}</h5>
          <p class="card-text">${"⭐".repeat(review.rating)}</p>
          <p class="card-text"><strong>Opinion:</strong> ${review.opinion}</p>
        </div>
      </div>
    `;
  
    container.appendChild(col);
  }
  
  
  function loadAllReviews() {
    const container = document.getElementById("reviews");
    container.innerHTML = ""; 
    const reviews = getReviews();
    reviews.forEach(displayReview);
  }
  
  
  document.addEventListener("DOMContentLoaded", () => {
    loadAllReviews();
  
    const form = document.getElementById("review-form");
  
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      const name = document.getElementById("reviewer-name").value.trim();
      const rating = parseInt(document.getElementById("review-rating").value);
      const opinion = document.getElementById("review-opinion").value;
  
      if (!name || !rating || !opinion) {
        alert("Please complete all fields.");
        return;
      }
  
      const newReview = { name, rating, opinion };
  
      const reviews = getReviews();
      reviews.push(newReview);
      saveReviews(reviews);
  
      displayReview(newReview); 
  
      form.reset(); 
    });
  });
  