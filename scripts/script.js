AOS.init();


if (window.innerWidth < 1190) {
  AOS.init({
    once: true,
    duration: 500,
  });
}



import { langArr } from "./lang.js";

// LANGUAGE

const switchContainers = document.querySelectorAll('.nav__checkbox');
const tel = document.querySelector(".tel")
const btn = document.querySelectorAll(".btn__text");
const circle = document.querySelector(".offer__circle");


switchContainers.forEach(switchButton => {
  switchButton.addEventListener('change', () => setLang(switchButton));
});

let bodyNode = document.body;

const additUk = (a) => {
  a.classList.contains('uk') ? a.classList.remove("uk") : a.classList.add("uk");
}

function setLang(switchButton) {

  const lang = switchButton.checked ? 'en' : 'ua';
  additUk(bodyNode);
  additUk(circle);
  additUk(tel);
  btn.forEach(button => {
    additUk(button);
  });
  for (const key in langArr) {
    const elements = document.querySelectorAll('.lng-' + key);
    if (elements.length > 0) {
      elements.forEach(element => {
        if (element.tagName.toLowerCase() === 'input' || element.tagName.toLowerCase() === 'textarea') {
          element.placeholder = langArr[key][lang];
        } else {
          element.textContent = langArr[key][lang];
        }
      });
    }
  }
}

// MENU

let menus = document.querySelectorAll(".menu__list");

menus.forEach(menu => {
  let btns = menu.querySelectorAll(".menu__item");
  let links = menu.querySelectorAll('.menu__link');

  for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', getActive);
  }

  function getActive(event) {
    for (let i = 0; i < btns.length; i++) {
      btns[i].classList.remove('active');
    }

    let menuItem = event.target.closest('.menu__item');
    menuItem.classList.add('active');
  }

  window.addEventListener('scroll', event => {
    let navigationLinks = menu.querySelectorAll('.menu__item');
    let fromTop = window.scrollY;
    navigationLinks.forEach(linkItem => {
      let link = linkItem.querySelector('.menu__link');
      let section = document.querySelector(link.hash);
      if (
        section &&
        section.offsetTop <= fromTop &&
        section.offsetTop + section.offsetHeight > fromTop
      ) {
        navigationLinks.forEach((item) => {
          item.classList.remove('active');
        });
        linkItem.classList.add('active');
      }
    });
  });
});




//WAPPER

const close = document.getElementById("close");
const telBtn = document.querySelectorAll(".send-opener");
const wrapper = document.querySelector(".wrapper");


close.addEventListener('click', activeRemover);
telBtn.forEach((item) => {
  item.addEventListener("click", activeAddition);
});

function activeAddition() {
  wrapper.classList.add('active');
}

function activeRemover() {
  wrapper.style.animation = 'fadeOut 0.5s ease-in-out forwards';
  setTimeout(() => {
    wrapper.classList.remove('active');
    wrapper.style.animation = '';
  }, 502);

}

// FAQ

const faqItems = document.querySelectorAll('.faq__item');

faqItems.forEach((item) => {
  item.addEventListener('click', () => {
    if (item.classList.contains('open')) {
      item.classList.remove("open");
    } else {
      remover();
      setTimeout(() => {
        item.classList.add("open")
      }, 204);
    }
  });
});

const remover = () => {
  faqItems.forEach((item) => {
    item.classList.remove('open');
  });
}

// SCROLL MENU

window.addEventListener('scroll', function () {
  var scroll = window.pageYOffset || document.documentElement.scrollTop;
  var nav = document.querySelector(".nav");

  if (window.innerWidth < 1000) {
    if (scroll < 600) {
      nav.classList.remove("sticky-bar");
    } else {
      nav.classList.add("sticky-bar");
    }
  } else {
    if (scroll < 1850) {
      nav.classList.remove("sticky-bar");
    } else {
      nav.classList.add("sticky-bar");
    }
  }

});





// SWIPER

const entryButtons = document.querySelectorAll('.stages .map-scrollbar__item');
const entryWrapper = document.querySelector('.entry-map__main');
const advantageWrapper = document.querySelector('.block-advantage__wrapper');
const advantagesButtons = document.querySelectorAll('.advantages .map-scrollbar__item');
const reqWrapper = document.querySelector('.req-list__wrapper');
const reqButtons = document.querySelectorAll('.requirements .map-scrollbar__item');
const documentsWrapper = document.querySelector('.documents-box__wrapper');
const documentsButtons = document.querySelectorAll('.documents .map-scrollbar__item');

function cssWorker(side, element) {
  let theCSSstyle = parseFloat(window.getComputedStyle(element, null).getPropertyValue(side));
  return theCSSstyle;
}

function buttonsWorker(block, buttons, value1) {
  let initialRightValue = cssWorker('left', block);
  const maxX = cssWorker('left', block);
  let minX = -(block.offsetWidth - window.innerWidth);

  block.addEventListener('mousedown', startDragging);
  block.addEventListener('touchstart', startDragging);

  let isDragging = false;
  let startX, currentX, initialLeft;

  function startDragging(event) {
    isDragging = true;
    startX = event.clientX || event.touches[0].clientX;
    initialLeft = parseFloat(getComputedStyle(block).left) || 0;

    block.style.transition = 'none';

    document.addEventListener('mousemove', handleDrag);
    document.addEventListener('touchmove', handleDrag);
    document.addEventListener('mouseup', stopDragging);
    document.addEventListener('touchend', stopDragging);
  }

  function handleDrag(event) {
    if (!isDragging) return;

    currentX = event.clientX || event.touches[0].clientX;
    let diffX = currentX - startX;
    let newLeft = initialLeft + diffX;

    if (newLeft > maxX) {
      newLeft = maxX;
    } else if (newLeft <minX) {
      newLeft = minX;
    }

    setLeft(block, newLeft);

    updateActiveButton(block, buttons, value1, maxX);
  }


  function stopDragging() {
    isDragging = false;
    block.style.transition = 'left 0.5s ease';
    document.removeEventListener('mousemove', handleDrag);
    document.removeEventListener('touchmove', handleDrag);
    document.removeEventListener('mouseup', stopDragging);
    document.removeEventListener('touchend', stopDragging);
  }



  buttons.forEach((button, index) => {
    button.addEventListener('click', (event) => {
      buttons.forEach((btn) => {
        btn.classList.remove('active');
        btn.classList.remove('sec');
      });

      event.target.classList.add('active');

      let newPosition = initialRightValue + (index * (value1+maxX));

      if (newPosition > maxX) {
        newPosition = maxX;
      } else if (newPosition < minX) {
        newPosition = minX;
      }

      setLeft(block, newPosition);
    });
  });

}

function setLeft(block, left) {
  block.style.left = left + 'px';
}

function updateActiveButton(block, buttons, value1, maxX) {
  const currentLeft = parseFloat(getComputedStyle(block).left);
  let activeIndex = 0;

  buttons.forEach((button, index) => {
    const buttonValue = index * (value1 + maxX);
    if (Math.abs(currentLeft - buttonValue) <= Math.abs(currentLeft - (activeIndex * (value1 + maxX)))) {
      activeIndex = index;
    }
  });

  buttons.forEach((button, index) => {
    button.classList.remove('active');
    button.classList.remove('sec');
    if (index === activeIndex) {
      button.classList.add('active');
      if (index > 0) {
        buttons[index - 1].classList.add('sec');
      }
      if (index < buttons.length - 1) {
        buttons[index + 1].classList.add('sec');
      }
    }
  });
}


if (window.innerWidth < 360) {
  buttonsWorker(documentsWrapper, documentsButtons, -360);
} else {
  buttonsWorker(documentsWrapper, documentsButtons, -340);
}

if (window.innerWidth < 600) {
  buttonsWorker(entryWrapper, entryButtons, -210);
} else if(window.innerWidth < 930){
  buttonsWorker(entryWrapper, entryButtons, -160);
}else if(window.innerWidth < 1111){
  buttonsWorker(entryWrapper, entryButtons, -120);
}else if(window.innerWidth < 1241){
  buttonsWorker(entryWrapper, entryButtons, -90);
}

if (window.innerWidth > 995) {
  buttonsWorker(reqWrapper, reqButtons, -500);
}

if (window.innerWidth < 500) {
  buttonsWorker(advantageWrapper, advantagesButtons, -300);
} else if(window.innerWidth < 916){
  buttonsWorker(advantageWrapper, advantagesButtons, -210);
}else if(window.innerWidth < 1110){
  buttonsWorker(advantageWrapper, advantagesButtons, -160);
}else{
  buttonsWorker(advantageWrapper, advantagesButtons, -120);
}




// BURGER-MENU
const burger = document.querySelector('.burger');
const burgerItems = document.querySelectorAll('.burger__item');
const burgerWrapper = document.querySelector('.burger__wrapper');
const burgerClose = document.querySelector('.burger__close');
burger.addEventListener('click', () => {
  burgerWrapper.classList.add('active');
});

burgerItems.forEach((burgerItem) => {
  burgerItem.addEventListener("click", () => {
    burgerRemover(burgerWrapper);
  });
});

burgerClose.addEventListener('click', () => {
  burgerRemover(burgerWrapper);
});

function burgerRemover(burgerWrapper) {
  burgerWrapper.style.animation = 'fadeUp 0.5s ease-in-out forwards';
  setTimeout(() => {
    burgerWrapper.classList.remove('active');
    burgerWrapper.style.animation = '';
  }, 502);
}


//Validation
let forms = document.querySelectorAll('.form-book');

forms.forEach(function (form) {
  form.addEventListener('submit', function (event) {
    event.preventDefault();

    let nameInput = form.querySelector('.form-name');
    let phoneInput = form.querySelector('.form-num');
    let messageInput = form.querySelector('.form-text');

    let nameValue = nameInput.value.trim();
    let phoneValue = phoneInput.value.trim();

    let ukrainianPattern = /^[a-zA-Zа-яА-ЯёЁіІїЇєЄ' ]+/;
    let phonePattern = /^(\+\d{1,3})?(\s|\(\d+\))?(\d+([\s\(\)\-]\d+)*)$/;

    if (!nameValue || !ukrainianPattern.test(nameValue)) {
      nameInput.style.borderColor = 'red';
      nameInput.classList.add('error');
    } else {
      nameInput.style.borderColor = '';
      nameInput.classList.remove('error');
    }

    if (!phoneValue || !phonePattern.test(phoneValue)) {
      phoneInput.style.borderColor = 'red';
      phoneInput.classList.add('error');
    } else {
      phoneInput.style.borderColor = '';
      phoneInput.classList.remove('error');
    }

    messageInput.style.borderColor = '';

    if (nameInput.style.borderColor === '' && phoneInput.style.borderColor === '' && messageInput.style.borderColor === '') {
      let formData = new FormData(form);

      fetch('process_form.php', {
        method: 'POST',
        body: formData
      })
        .then(response => {
          if (response.ok) {
            console.log('correct');
          } else {
            console.error('sending error');
          }
        })
        .catch(error => {
          console.error('network error', error);
        });

      nameInput.value = '';
      phoneInput.value = '';
      messageInput.value = '';
    }
  });
});




