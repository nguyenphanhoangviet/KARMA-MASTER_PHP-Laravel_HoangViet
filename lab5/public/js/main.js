// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};



//Star
document.addEventListener('DOMContentLoaded', function() {
  let stars = document.querySelectorAll('.star-rating .fa-star');
  let starInput = document.getElementById('star');

  stars.forEach(star => {
      star.addEventListener('click', function() {
          let rating = this.getAttribute('data-rating');
          starInput.value = rating;

          stars.forEach(s => {
              if (s.getAttribute('data-rating') <= rating) {
                  s.classList.add('selected');
              } else {
                  s.classList.remove('selected');
              }
          });
      });

      star.addEventListener('mouseover', function() {
          let rating = this.getAttribute('data-rating');
          stars.forEach(s => {
              if (s.getAttribute('data-rating') <= rating) {
                  s.style.color = '#f39c12';
              } else {
                  s.style.color = '#ddd';
              }
          });
      });

      star.addEventListener('mouseout', function() {
          stars.forEach(s => {
              if (s.classList.contains('selected')) {
                  s.style.color = '#f39c12';
              } else {
                  s.style.color = '#ddd';
              }
          });
      });
  });
});

