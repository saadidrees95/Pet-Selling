$('.main-slider').slick({
    slidesToShow: 1,
    dots: true,	  
    autoplay: false,
    arrows:false,
    autoplaySpeed: 4000,
    pauseOnDotsHover: true,
    // vertical: true,
    // verticalSwiping: true,
  });

  $('.testimonial-slider').slick({
    slidesToShow: 1,
    dots: true,	     
    autoplay: false,
    arrows:false,
    autoplaySpeed: 2000,
    pauseOnHover: false,
    // pauseOnDotsHover: true,
    // vertical: true,
    // verticalSwiping: true,
  });



/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  let panels = document.querySelectorAll(".panel");
  let sections = document.querySelectorAll("div");
  
  panels.forEach((panel) => {
    addEventListener("click", expand);
  });
  
  function expand(e) {
    removeClasses();
    e.target.classList.add("active");
  }
  
  function removeClasses() {
    sections.forEach((div) => div.classList.remove("active"));
  }

  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  
  
  // --------------------------------------------------Humberg Push Navigation------------------------------------------------------------------------//
(function($){
  jQuery(document).ready(function(){
  jQuery('.menu-main-menu-container').navAccordion({
    expandButtonText: 'â€º',  //Text inside of buttons can be HTML
    collapseButtonText: 'â€¹'}, 
  function(){	console.log('Callback')});
  });
    $('a#hamburg').on('click',function(e){
      $('html').toggleClass('open-menu');
      return false;
    });
    $('div#hamburg').on('click',function(){
      $('html').removeClass('open-menu');
    })
    $(document).ready(function(){
    $('.nav-cross').click(function(){
      $(this).toggleClass('open');
    });
  });
  })(jQuery)

  document.addEventListener('DOMContentLoaded', function() {
    const filterButton = document.querySelector('.filter-button');
    const dropdownContent = document.querySelector('.dropdown-content-1');
    const cancelButton = document.querySelector('.filter-cancel-button');
    const submitButton = document.querySelector('.filter-submit-button');
  
    filterButton.addEventListener('click', function() {
      dropdownContent.style.display = 'block';
    });
  
    cancelButton.addEventListener('click', function() {
      dropdownContent.style.display = 'none';
    });
  
    submitButton.addEventListener('click', function() {
      // Here, you can collect the values from filter inputs
      // and perform the filtering logic as needed.
      // You can access the filter inputs using their classes.
      dropdownContent.style.display = 'none';
    });
  });
  
// Read More//
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}


// Verification//
const inputElements = [...document.querySelectorAll('input.code-input')]

inputElements.forEach((ele,index)=>{
  ele.addEventListener('keydown',(e)=>{
    // if the keycode is backspace & the current field is empty
    // focus the input before the current. Then the event happens
    // which will clear the "before" input box.
    if(e.keyCode === 8 && e.target.value==='') inputElements[Math.max(0,index-1)].focus()
  })
  ele.addEventListener('input',(e)=>{
    // take the first character of the input
    // this actually breaks if you input an emoji like 👨‍👩‍👧‍👦....
    // but I'm willing to overlook insane security code practices.
    const [first,...rest] = e.target.value
    e.target.value = first ?? '' // first will be undefined when backspace was entered, so set the input to ""
    const lastInputBox = index===inputElements.length-1
    const didInsertContent = first!==undefined
    if(didInsertContent && !lastInputBox) {
      // continue to input the rest of the string
      inputElements[index+1].focus()
      inputElements[index+1].value = rest.join('')
      inputElements[index+1].dispatchEvent(new Event('input'))
    }
  })
})


// mini example on how to pull the data on submit of the form
function onSubmit(e){
  e.preventDefault()
  const code = inputElements.map(({value})=>value).join('')
  console.log(code)
}