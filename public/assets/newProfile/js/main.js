var exchangeContact = document.getElementById("exchange-contact");
var backBtn = document.getElementById("backBtn");
var contactContainer = document.getElementById("contact-container");
var parentContainer = document.getElementById("parent-container");

exchangeContact.onclick = function () {
  contactContainer.style.display = "block";
  parentContainer.style.display = "none"
}

backBtn.onclick = function () {
  contactContainer.style.display = "none";
  parentContainer.style.display = "block"
}


$(".day-number").click(function( element ) {
  $(".day-number").removeClass("active");
  $(this).addClass("active")
  console.log(element.target.innerText);

});

$(".time-select").click(function( element ) {
    $(".time-select").removeClass("active");
    $(this).addClass("active")
    // console.log(element.target.innerText);

});
/***************************************/
var timeInput = document.getElementById("time");
var hour = "06:00";
var hour = document.querySelectorAll("#hour");

for (var i=0 ; i<hour.length ; i++){

  hour[i].addEventListener("click",function(e){

    for (var i=0 ; i<hour.length ; i++){
      hour[i].classList.remove("active");
    }

      var element = e.target;
      element.classList.add('active');

      hour.value = element.innerText;
      timeInput.value = hour.value;
  })
}


/*******       All swiper      *********/
var swiper = new Swiper(".myAllSwiper", {
    speed: 1500,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
  });
  var swiper2 = new Swiper(".allSwiper", {
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

/*******       rooms swiper      *********/
var swiper = new Swiper(".myRoomsSwiper", {
    speed: 1500,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 1000,

      },
  });
  var swiper2 = new Swiper(".roomsSwiper", {
    spaceBetween: 10,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

/*******       facilities swiper      *********/
var swiper = new Swiper(".myFacilitiesSwiper", {
    speed: 1500,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    autoplay: {
        delay: 1000,

      },
  });
  var swiper2 = new Swiper(".facilitiesSwiper", {
    spaceBetween: 10,
    autoplay: {
        delay: 1000,
        disableOnInteraction: false,
      },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
/******************      teams swiper       ****************** */
var swiper = new Swiper(".teamsSwiper", {
  spaceBetween: 8,
  slidesPerView: "auto",
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },

});
// end of:: wiper slides
var calendarInfoDate = document.querySelector('#vanilla-calendar-info-date');
var calendarInfoTime = document.querySelector('#vanilla-calendar-info-time');
var username = document.getElementById("username");
var phone = document.getElementById("phone");
var email = document.getElementById("email");
var submitBtn = document.getElementById("submitBtn");


// submitBtn.onClick = function () {
//   var appointment = {
//     date: calendarInfoDate.innerText,
//     time: timeInput.value,
//     username: username.value,
//     phone: phone.value,
//     email: email.value,
//   };
//   console.log(appointment);
//   clearForm();
// }


/************      Clear Data       ********************/
// var inputs = document.getElementsByClassName("form-control");
// function clearForm() {
//   for (var i = 0; i < inputs.length; i++) {
//     inputs[i].value = "";
//   }
// }

// // sweet calender
// document.addEventListener('DOMContentLoaded', () => {
//   const calendarInfoDate = document.querySelector('#vanilla-calendar-info-date');
//   const calendarInfoTime = document.querySelector('#vanilla-calendar-info-time');
//   const calendar = new VanillaCalendar('#vanilla-calendar', {
//     settings: {
//       lang: 'en',
//       iso8601: false,
//       selection: {
//         time: 12,
//       },
//       visibility: {
//         weekNumbers: true,
//       },
//     },
//     actions: {
//       clickDay(e, dates) {
//         calendarInfoDate.innerText = dates[0] ? dates : '«Day not selected»';
//       },
//       clickWeekNumber(e, number, days, year) {
//         console.log(`Week number: ${number}, year of the week: ${year},`, 'Days of this week:', days);
//       },
//       clickMonth(e, month) {
//         console.log(`Current month: ${month}`);
//       },
//       clickYear(e, year) {
//         console.log(`Current year: ${year}`);
//       },
//       clickArrow(e, year, month) {
//         console.log(`Current year: ${year}, current month: ${month}`);
//       },
//       changeTime(e, time) {
//         calendarInfoTime.innerText = time;
//       },
//     },
//     popups: {
//       '2022-12-28': {
//         modifier: 'bg-red',
//         html: 'Meeting at 9:00 PM',
//       },
//       '2022-09-13': {
//         modifier: 'bg-red',
//         html: 'Meeting at 6:00 PM',
//       },
//       '2022-11-17': {
//         modifier: 'bg-orange s',
//         html: `<div>
//           <u><b>12:00 PM</b></u>
//           <p style="margin: 5px 0 0; text-align: left; font-size: 12px;">Airplane in Las Vegas</p>
//         </div>`,
//       },
//     },
//     DOMTemplates: {
//       default: `
//         <div class="vanilla-calendar-header">
//           <div class="vanilla-calendar-header__content ">
//             <#Month /> | <#Year />
//           </div>
//           <#ArrowPrev />
//           <#ArrowNext />
//         </div>
//         <div class="vanilla-calendar-wrapper">
//           <#WeekNumbers />
//           <div class="vanilla-calendar-content">
//             <#Week />
//             <#Days />
//           </div>
//         </div>
//         <#ControlTime />
//       `,
//       month: `
//         <div class="vanilla-calendar-header">
//           <div class="vanilla-calendar-header__content">
//             <#Month /> | <#Year />
//           </div>
//         </div>
//         <div class="vanilla-calendar-wrapper">
//           <div class="vanilla-calendar-content">
//             <#Months />
//           </div>
//         </div>
//       `,
//       year: `
//         <div class="vanilla-calendar-header">
//           <div class="vanilla-calendar-header__content">
//             <#Month /> | <#Year />
//           </div>
//           <#ArrowPrev />
//           <#ArrowNext />
//         </div>
//         <div class="vanilla-calendar-wrapper">
//           <div class="vanilla-calendar-content">
//             <#Years />
//           </div>
//         </div>
//       `,
//     },
//   });
//   calendar.init();
//   calendarInfoTime.innerText = calendar.selectedTime;
// });


/************************************************ */
/************ new edit in videos section   **********/
// const player1 = new Plyr('#player1');

// const player2 = new Plyr('#player2');

// const player3 = new Plyr('#player3');


//////////////////////////////////////////////////////////





