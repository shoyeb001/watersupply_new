AOS.init();



// my account setting

const selectSettingTabs = document.querySelectorAll("[data-tab-target]");
const tabSettingContents = document.querySelectorAll("[data-tab-scontent]");

selectSettingTabs.forEach((selectSettingTab) => {
  selectSettingTab.addEventListener("click", () => {
    const tabTarget = document.querySelector(
      selectSettingTab.dataset.tabTarget
    );
    tabSettingContents.forEach((content) => {
      content.classList.remove("actives");
    });
    tabTarget.classList.add("actives");
  });
});


// mobile nav
const clickHamButton = document.querySelector(".hamburger-btn");
const showMenu = document.querySelector(".drawer");
const shadow = document.querySelector(".bg-shadow");

clickHamButton.addEventListener("click", () => {
  const isAdd = showMenu.classList.contains("show");
  if (isAdd) {
    showMenu.classList.remove("show");
  } else {
    showMenu.classList.add("show");
  }
  shadow.classList.toggle("remove-shadow");
});

shadow.addEventListener("click", () => {
  showMenu.classList.remove("show");
  shadow.classList.toggle("remove-shadow");
});


// show and hide daily & frequently

const dailyBasis = document.querySelector('.show-daily');
const frequentlyBasis = document.querySelector('.show-frequently');

function showDiv(element)
{
  if(element == "daily"){
    dailyBasis.classList.add('hidebasis');
    frequentlyBasis.classList.remove('hidebasis');
  }else if(element == "frequently"){
    frequentlyBasis.classList.add('hidebasis');
    dailyBasis.classList.remove('hidebasis');
  }
}

const snowMenuMob = document.querySelector(".account-nav-bar");
const vabiableMob = document.querySelector(".mob-click-event");
const mobShadow = document.querySelector(".mob-shadow");

vabiableMob.addEventListener("click",() => {
  snowMenuMob.classList.add("show-mob-sidebar");
  mobShadow.style.display = "block";
});
mobShadow.addEventListener("click",() => {
  snowMenuMob.classList.remove("show-mob-sidebar");
  mobShadow.style.display = "none";
});

// product-details cart counter
// const price = document.querySelector("#cart-price");
// var initialPrice = Number(price.innerText);

// function incrementCounter() {
//   initialPrice += 1;
//   price.innerText = initialPrice;
// }

// function decrementCounter() {
//   if (initialPrice > 0) {
//     initialPrice -= 1;
//     price.innerText = initialPrice;
//   }
// }


