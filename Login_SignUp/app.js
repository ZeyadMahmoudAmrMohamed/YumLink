const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");
inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
    if(inp.type=='email'){
      inp.setAttribute('placeholder', 'example@gmail.com');
    }else if(inp.type=='password'){
      inp.setAttribute('placeholder', 'Abcd-1234');
    }else if(inp.name=='first_name'&&inp.type=='text'){
      inp.setAttribute('placeholder', 'Ali');
    }else if(inp.name=='last_name'&&inp.type=='text'){
      inp.setAttribute('placeholder', 'Mohamed');
    }

  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
    
      inp.removeAttribute('placeholder');
    
    
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.6}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

// bullets.forEach((bullet) => {
//   bullet.addEventListener("click", moveSlider);
// });


//const bullets = document.querySelectorAll(".bullet");
const bulletArray = Array.from(bullets); // Convert NodeList to Array

// Add event listener to bullets
bulletArray.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});

// Function to simulate click on the next bullet
function autoSlide() {
  const currentActive = document.querySelector(".bullets span.active");
  const currentIndex = bulletArray.indexOf(currentActive);
  const nextIndex = (currentIndex + 1) % bulletArray.length; 
  bulletArray[nextIndex].click();
}

const intervalId = setInterval(autoSlide, 10000);

var needsValidation = document.querySelectorAll('.needs-validation')

Array.prototype.slice.call(needsValidation)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

   