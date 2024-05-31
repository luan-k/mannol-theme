window.addEventListener("load", () => {
  const isThereSlider = document.querySelector("#wkode-slider-container");
  if (!isThereSlider) {
    return;
  }
  const ThereIsMobile = document.querySelector(".there-is-mobile");
  const sliderContainer = document.getElementById("wkode-slider-container");
  const sliderContainerMobile = document.getElementById(
    "wkode-slider-container-mobile"
  );
  let screenWidth = window.innerWidth;

  if (ThereIsMobile) {
    if (screenWidth <= 1080) {
      if (sliderContainer) {
        sliderContainer.remove();
      }
    } else {
      if (sliderContainerMobile) {
        sliderContainerMobile.remove();
      }
    }
  }

  const slider = document.querySelector(".wkode-slider");
  const slides = document.querySelectorAll(".wkode-slider-slide");
  const prevBtn = document.querySelector(".wkode-slider-prev");
  const nextBtn = document.querySelector(".wkode-slider-next");
  const dots = document.querySelector(".wkode-slider-dots");

  let currentSlide = 0;
  let interval = setInterval(nextSlide, 5000);

  function createDots() {
    for (let i = 0; i < slides.length; i++) {
      const dot = document.createElement("div");
      dot.classList.add("wkode-slider-dot");
      dots.appendChild(dot);
      if (i === 0) {
        dot.classList.add("active");
      }
      dot.addEventListener("click", () => {
        currentSlide = i;
        clearInterval(interval);
        setSlide();
        interval = setInterval(nextSlide, 5000);
      });
    }
  }

  let touchStartX = 0;
  let touchEndX = 0;

  slider.addEventListener("touchstart", (event) => {
    touchStartX = event.touches[0].clientX;
  });

  slider.addEventListener("touchmove", (event) => {
    touchEndX = event.touches[0].clientX;
  });

  slider.addEventListener("touchend", (event) => {
    handleTouchEnd();
  });

  function handleTouchEnd() {
    if (touchEndX < touchStartX) {
      currentSlide++;
      if (currentSlide >= slides.length) {
        currentSlide = 0;
      }
    } else if (touchEndX > touchStartX) {
      currentSlide--;
      if (currentSlide < 0) {
        currentSlide = slides.length - 1;
      }
    }
    setSlide();
    touchStartX = 0;
    touchEndX = 0;
  }

  function setSlide() {
    slider.style.transform = `translateX(${-currentSlide * 100}%)`;
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });
    slides[currentSlide].classList.add("active");
    dots.querySelectorAll(".wkode-slider-dot").forEach((dot) => {
      dot.classList.remove("active");
    });
    dots
      .querySelectorAll(".wkode-slider-dot")
      [currentSlide].classList.add("active");
  }

  function nextSlide() {
    currentSlide++;
    if (currentSlide >= slides.length) {
      currentSlide = 0;
    }
    setSlide();
  }

  function prevSlide() {
    currentSlide--;
    if (currentSlide < 0) {
      currentSlide = slides.length - 1;
    }
    setSlide();
  }

  createDots();
  setSlide();

  prevBtn.addEventListener("click", () => {
    clearInterval(interval);
    prevSlide();
    interval = setInterval(nextSlide, 5000);
  });

  nextBtn.addEventListener("click", () => {
    clearInterval(interval);
    nextSlide();
    interval = setInterval(nextSlide, 5000);
  });

  slider.addEventListener("mouseover", () => {
    clearInterval(interval);
  });

  slider.addEventListener("mouseleave", () => {
    interval = setInterval(nextSlide, 5000);
  });
});
