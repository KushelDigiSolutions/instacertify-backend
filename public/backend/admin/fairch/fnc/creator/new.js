
web.SectionsGroup["MAIN SLIDER"] = ["bootstrap4/video-header", "bootstrap4/slider-header"];

web.Sections.add("bootstrap4/slider-header", {
  name: "Image Slider Header",
dragHtml: '<img src="' + web.baseUrl + 'master/libs/builder/icons/product.png">',        
  image: "https://assets.startbootstrap.com/img/screenshots/snippets/full-slider.jpg",
  html:`
  <header class="slider" data-name="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">First Slide</h2>
          <p class="lead">This is a description for the first slide.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Second Slide</h2>
          <p class="lead">This is a description for the second slide.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Third Slide</h2>
          <p class="lead">This is a description for the third slide.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
    
<style>
.carousel-item {
  height: 100vh;
  min-height: 350px;
  background: no-repeat center center zoom-out;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>  
</header>`,
  
}); 	
























web.Sections.add("bootstrap4/video-header", {
  name: "Video Header",
dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',        
  image: "https://assets.startbootstrap.com/img/screenshots/snippets/video-header.jpg",
  html:`
<header class="video" data-name="header-video">
<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
  <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
</video>
<div class="container h-100">
  <div class="d-flex h-100 text-center align-items-center">
    <div class="w-100 text-white">
      <h1 class="display-3">Video Header</h1>
      <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>
    </div>
  </div>
</div>


<div class="my-5">
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <p>The HTML5 video element uses an mp4 video as a source. Change the source video to add in your own background! The header text is vertically centered using flex utilities that are build into Bootstrap 4.</p>
    </div>
  </div>
</div>
</div>
<style>
header.video {
position: relative;
background-color: black;
height: 75vh;
min-height: 25rem;
width: 100%;
overflow: hidden;
}

header.video video {
position: absolute;
top: 50%;
left: 50%;
min-width: 100%;
min-height: 100%;
width: auto;
height: auto;
z-index: 0;
-ms-transform: translateX(-50%) translateY(-50%);
-moz-transform: translateX(-50%) translateY(-50%);
-webkit-transform: translateX(-50%) translateY(-50%);
transform: translateX(-50%) translateY(-50%);
}

header.video .container {
position: relative;
z-index: 2;
}

header.video .overlay {
/*position: absolute;*/
top: 0;
left: 0;
height: 100%;
width: 100%;
background-color: black;
opacity: 0.5;
z-index: 1;
}

@media (pointer: coarse) and (hover: none) {
header {
  background: url('https://source.unsplash.com/XT5OInaElMw/1600x900') black no-repeat center center scroll;
}
header video {
  display: none;
}
}
</style>
</header>
`,
});
































web.SectionsGroup["PREMADE SLIDER"] = ["Slider/Slider-1","Slider/Slider-2","Slider/Slider-3","Slider/hero-4"];



web.Sections.add("Slider/Slider-1", {
  name: "Slider 1",
  image: window.mediaPath + "/sys/slider/slider-1.jpg",
  html: `<section>
  <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  body {
    width: 100%;
    height: 100%;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    overflow: hidden;
  }
  
  .slider-one,
  .slider-two,
  .slider-three,
  .slider-four {
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    animation: slider-one 12s linear infinite;
  }
  .slider-one .slider-one-image,
  .slider-one .slider-two-image,
  .slider-one .slider-three-image,
  .slider-one .slider-four-image,
  .slider-two .slider-one-image,
  .slider-two .slider-two-image,
  .slider-two .slider-three-image,
  .slider-two .slider-four-image,
  .slider-three .slider-one-image,
  .slider-three .slider-two-image,
  .slider-three .slider-three-image,
  .slider-three .slider-four-image,
  .slider-four .slider-one-image,
  .slider-four .slider-two-image,
  .slider-four .slider-three-image,
  .slider-four .slider-four-image {
    width: 110%;
    height: 100%;
    background-image: url("https://images.pexels.com/photos/1413412/pexels-photo-1413412.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    animation: zoom-out 3s linear infinite;
  }
  .slider-one .slider-one-image .slider-text,
  .slider-one .slider-two-image .slider-text,
  .slider-one .slider-three-image .slider-text,
  .slider-one .slider-four-image .slider-text,
  .slider-two .slider-one-image .slider-text,
  .slider-two .slider-two-image .slider-text,
  .slider-two .slider-three-image .slider-text,
  .slider-two .slider-four-image .slider-text,
  .slider-three .slider-one-image .slider-text,
  .slider-three .slider-two-image .slider-text,
  .slider-three .slider-three-image .slider-text,
  .slider-three .slider-four-image .slider-text,
  .slider-four .slider-one-image .slider-text,
  .slider-four .slider-two-image .slider-text,
  .slider-four .slider-three-image .slider-text,
  .slider-four .slider-four-image .slider-text {
    position: absolute;
    top: 40%;
    left: 5%;
    color: #ffffff;
    width: 600px;
    text-transform: capitalize;
    animation: text-up 12s linear infinite;
    transform: translateY(100px);
    animation-delay: 0s;
  }
  .slider-one .slider-one-image .slider-text h1,
  .slider-one .slider-two-image .slider-text h1,
  .slider-one .slider-three-image .slider-text h1,
  .slider-one .slider-four-image .slider-text h1,
  .slider-two .slider-one-image .slider-text h1,
  .slider-two .slider-two-image .slider-text h1,
  .slider-two .slider-three-image .slider-text h1,
  .slider-two .slider-four-image .slider-text h1,
  .slider-three .slider-one-image .slider-text h1,
  .slider-three .slider-two-image .slider-text h1,
  .slider-three .slider-three-image .slider-text h1,
  .slider-three .slider-four-image .slider-text h1,
  .slider-four .slider-one-image .slider-text h1,
  .slider-four .slider-two-image .slider-text h1,
  .slider-four .slider-three-image .slider-text h1,
  .slider-four .slider-four-image .slider-text h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
  }
  .slider-one .slider-one-image .slider-text p,
  .slider-one .slider-two-image .slider-text p,
  .slider-one .slider-three-image .slider-text p,
  .slider-one .slider-four-image .slider-text p,
  .slider-two .slider-one-image .slider-text p,
  .slider-two .slider-two-image .slider-text p,
  .slider-two .slider-three-image .slider-text p,
  .slider-two .slider-four-image .slider-text p,
  .slider-three .slider-one-image .slider-text p,
  .slider-three .slider-two-image .slider-text p,
  .slider-three .slider-three-image .slider-text p,
  .slider-three .slider-four-image .slider-text p,
  .slider-four .slider-one-image .slider-text p,
  .slider-four .slider-two-image .slider-text p,
  .slider-four .slider-three-image .slider-text p,
  .slider-four .slider-four-image .slider-text p {
    font-size: 18px;
    line-height: 28px;
  }
  
  .slider-two {
    animation: slider-two 12s linear infinite;
  }
  .slider-two .slider-two-image {
    background-image: url("https://images.pexels.com/photos/1516202/pexels-photo-1516202.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
  }
  .slider-two .slider-two-image .slider-text {
    animation-delay: 3s;
  }
  
  .slider-three {
    animation: slider-three 12s linear infinite;
  }
  .slider-three .slider-three-image {
    background-image: url("https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1447&q=80");
  }
  .slider-three .slider-three-image .slider-text {
    animation-delay: 6s;
  }
  
  .slider-four {
    animation: slider-four 12s linear infinite;
  }
  .slider-four .slider-four-image {
    background-image: url("https://images.pexels.com/photos/212410/pexels-photo-212410.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
  }
  .slider-four .slider-four-image .slider-text {
    animation-delay: 9s;
  }
  
  @keyframes text-up {
    10% {
      transform: translateY(0px);
    }
    100% {
      transform: translateY(0px);
    }
  }
  @keyframes zoom-out {
    100% {
      width: 100%;
    }
  }
  @keyframes slider-one {
    0% {
      visibility: visible;
    }
    25% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    75% {
      visibility: hidden;
    }
    100% {
      visibility: visible;
    }
  }
  @keyframes slider-two {
    0% {
      visibility: hidden;
    }
    25% {
      visibility: hidden;
    }
    50% {
      visibility: visible;
    }
    75% {
      visibility: hidden;
    }
    100% {
      visibility: hidden;
    }
  }
  @keyframes slider-three {
    0% {
      visibility: hidden;
    }
    25% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    75% {
      visibility: visible;
    }
    100% {
      visibility: hidden;
    }
  }
  @keyframes slider-four {
    0% {
      visibility: hidden;
    }
    25% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    75% {
      visibility: hidden;
    }
    100% {
      visibility: visible;
    }
  }
  </style>
  
  
  
      <div class="slider-one">
          <div class="slider-one-image type">
            <div class="slider-text">
              <h1>Ride Fast or Stay Home</h1>
              <p>I try to get away and take my motorcycle on a ride whenever I can. I'll take my bike out before the
                show and just cruise.
              </p>
            </div>
          </div>
        </div>
        <div class="slider-two">
          <div class="slider-two-image type">
            <div class="slider-text">
              <h1>Shine Like a diamond in the Dark</h1>
              <p>People are like stained glass windows, they sparkle and shine when the sun is out, but when darkness sets in their true beauty is revealed only if there is a light from within.
              </p>
            </div>
          </div>
        </div>
        <div class="slider-three">
          <div class="slider-three-image type">
            <div class="slider-text">
              <h1>leave sooner, drive slower, live longer</h1>
              <p>driving is not my hobby it's my feeling. I only love FAST CARS because I don't believe slow and
                steady wins the race.</p>
            </div>
          </div>
        </div>
        <div class="slider-four">
          <div class="slider-four-image type">
            <div class="slider-text">
              <h1>Girl in Dark</h1>
              <p>If you can make a woman laugh, you can make her do anything.” “All little girls should be told they
                are pretty, even if they aren't.” “A girl should be two things: classy and fabulous</p>
            </div>
          </div>
        </div>
        
 
      </section>
`
});


web.Sections.add("Slider/Slider-2", {
  name: "Slider 2",
  image: window.mediaPath + "/sys/slider/slider-2.jpg",
  html: `<section>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <style>
  body {
    overflow: hidden;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
  }
  /* Slider wrapper*/
  .css-slider-wrapper {
    display: block;
    background: #FFF;
    overflow: hidden;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }
  /* Slider */
  .slider {
    width: 100%;
    height: 100%;
    background: red;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 1;
    z-index: 0;
    display: flex;
    display: -webkit-flex;
    display: -ms-flexbox;
    flex-direction: row;
    flex-wrap: wrap;
    -webkit-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    justify-content: center;
    align-content: center;
    -webkit-transition: -webkit-transform 1600ms;
    transition: -webkit-transform 1600ms, transform 1600ms;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  /* each slide backgound color */  
  .slide1 {
    background: #00bcd7;
    left: 0;
  }
  .slide2 {
    background: #009788;
    left: 100%
  }
  .slide3 {
    background: #ff5608;
    left: 200%
  }
  .slide4 {
    background: #607d8d;
    left: 300%;
  }
  .slider > div {
    text-align: center;
  }
  /* Slider inner slide effect */
  .slider h2 {
    color: #FFF;
    font-weight: 900;
    text-transform: uppercase;
    font-size: 45px;
    line-height: 120%;
    opacity: 0;
    -webkit-transform: translateX(500px);
    transform: translateX(500px);
  }
  .slider .button {
    color: #FFF;
    padding: 5px 30px;
    background: rgba(255,255,255,0.3);
    text-decoration: none;
    opacity: 0;
    font-size: 15px;
    line-height: 30px;
    display: inline-block;
    -webkit-transform: translateX(-500px);
    transform: translateX(-500px);
  }
  .slider h2, .slider .button {
    -webkit-transition: opacity 800ms, -webkit-transform 800ms;
    transition: transform 800ms, opacity 800ms;
    -webkit-transition-delay: 1s; /* Safari */
    transition-delay: 1s;
  }
  /* Next and Preive arrow */ 
  .control {
    position: absolute;
    top: 50%;
    width: 50px;
    height: 50px;
    margin-top: -25px;
    z-index: 55;
  }
  .control label {
    z-index: 0;
    display: none;
    text-align: center;
    line-height: 50px;
    font-size: 50px;
    color: #FFF;
    cursor: pointer;
    opacity: 0.2;
  }
  .control label:hover {
    opacity: 0.5;
  }
  .next {
    right: 1%;
  }
  .previous {
    left: 1%;
  }
  /* Slider Pagger */ 
  .slider-pagination {
    position: absolute;
    bottom: 20px;
    width: 100%;
    left: 0;
    text-align: center;
    z-index: 1000;
  }
  .slider-pagination label {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
    background: rgba(255,255,255,0.2);
    margin: 0 2px;
    border: solid 1px rgba(255,255,255,0.4);
    cursor: pointer;
  }
  /* Slider Pagger arrow event */
  .slide-radio1:checked ~ .next .numb2, 
  .slide-radio2:checked ~ .next .numb3, 
  .slide-radio3:checked ~ .next .numb4, 
  .slide-radio2:checked ~ .previous .numb1, 
  .slide-radio3:checked ~ .previous .numb2, 
  .slide-radio4:checked ~ .previous .numb3 {
    display: block;
    z-index: 1
  }
  /* Slider Pagger event */
  .slide-radio1:checked ~ .slider-pagination .page1, 
  .slide-radio2:checked ~ .slider-pagination .page2, 
  .slide-radio3:checked ~ .slider-pagination .page3, 
  .slide-radio4:checked ~ .slider-pagination .page4 {
    background: rgba(255,255,255,1)
  }
  /* Slider slide effect */
  .slide-radio1:checked ~ .slider {
    -webkit-transform: translateX(0%);
    transform: translateX(0%);
  }
  .slide-radio2:checked ~ .slider {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
  .slide-radio3:checked ~ .slider {
    -webkit-transform: translateX(-200%);
    transform: translateX(-200%);
  }
  .slide-radio4:checked ~ .slider {
    -webkit-transform: translateX(-300%);
    transform: translateX(-300%);
  }
  .slide-radio1:checked ~ .slide1 h2,  
  .slide-radio2:checked ~ .slide2 h2,  
  .slide-radio3:checked ~ .slide3 h2,  
  .slide-radio4:checked ~ .slide4 h2,  
  .slide-radio1:checked ~ .slide1 .button,  
  .slide-radio2:checked ~ .slide2 .button,  
  .slide-radio3:checked ~ .slide3 .button,  
  .slide-radio4:checked ~ .slide4 .button {
    -webkit-transform: translateX(0);
    transform: translateX(0);
    opacity: 1
  }
  
  @media only screen and (max-width: 767px) {
  .slider h2 {
    font-size: 20px;
  }
  .slider > div {
    padding: 0 2%
  }
  .control label {
    font-size: 35px;
  }
  .slider .button {
    padding: 0 15px;
  }
  }
  </style>
  <div class="css-slider-wrapper">
    <input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
    <input type="radio" name="slider" class="slide-radio2" id="slider_2">
    <input type="radio" name="slider" class="slide-radio3" id="slider_3">
    <input type="radio" name="slider" class="slide-radio4" id="slider_4">
    <div class="slider-pagination">
      <label for="slider_1" class="page1"></label>
      <label for="slider_2" class="page2"></label>
      <label for="slider_3" class="page3"></label>
      <label for="slider_4" class="page4"></label>
    </div>
    <div class="next control">
      <label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-right"></i></label>
      <label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-right"></i></label>
      <label for="slider_3" class="numb3"><i class="fa fa-arrow-circle-right"></i></label>
      <label for="slider_4" class="numb4"><i class="fa fa-arrow-circle-right"></i></label>
    </div>
    <div class="previous control">
      <label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-left"></i></label>
      <label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-left"></i></label>
      <label for="slider_3" class="numb3"><i class="fa fa-arrow-circle-left"></i></label>
      <label for="slider_4" class="numb4"><i class="fa fa-arrow-circle-left"></i></label>
    </div>
    <div class="slider slide1">
      <div>
        <h2>Css Based slider</h2>
        <a href="#" class="button">Back</a>  <a href="#" class="button">Download</a> </div>
    </div>
    <div class="slider slide2">
      <div>
        <h2>CSS Slider without use of any javascript or jQuery</h2>
        <a href="#" class="button">Back</a> <a href="#" class="button">Download</a> </div>
    </div>
    <div class="slider slide3">
      <div>
        <h2>Full screen animation slider</h2>
        <a href="#" class="button">Back</a> <a href="#" class="button">Download</a> </div>
    </div>
    <div class="slider slide4">
      <div>
        <h2>css3 slider</h2>
        <a href="#" class="button">Back</a> <a href="#" class="button">Download</a> </div>
    </div>
  </div>



  
      </section>
      
`
});



web.Sections.add("Slider/Slider-3", {
  name: "Slider 3",
  image: window.mediaPath + "/sys/slider/slider-3.jpg",
  html: `<section>
  <script>


window.onload = function(){

const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

prevBtn.addEventListener("click",function(){
  prevSlide();
});
nextBtn.addEventListener("click",function(){
  nextSlide();
});

}
let slideNumber = 0;
const prevSlide = () =>{
const slides = document.getElementsByClassName('slides');
const slider = document.getElementById("slider");
const currentSlide = slider.getElementsByClassName('current');
currentSlide[0].classList.remove("current");
if(slideNumber == 0){
  slideNumber = slides.length-1;
}
else{
    slideNumber = slideNumber-1;
}
slides[slideNumber].classList.add("current");
}
const nextSlide = () =>{
const slides = document.getElementsByClassName('slides');
const slider = document.getElementById("slider");
const currentSlide = slider.getElementsByClassName('current');
currentSlide[0].classList.remove("current");
if(slideNumber == (slides.length-1)){
  slideNumber = 0;
}
else{
    slideNumber = slideNumber+1;
}
slides[slideNumber].classList.add("current");
}

  </script>
  <style>
*{
margin:0;
padding:0;
font-family:'Raleway',sans-serif;
}
body{
height:100%;
width:100%;
background:#444;
}
.main{
position:relative;
height:100vh;
width:100%;
color:#fff;
}
.main .slider{
position:relative;
height:100vh;
width:100%;
}
.main .slider .slides{
position:absolute;
height:100%;
width:100%;
display:flex;
flex-direction:column;
align-items:center;
justify-content:center;
overflow:hidden;
opacity:0;
transition:0.3s ease-in-out;
}
.main .slider .slides.current{
z-index:1;
opacity:1;
}
.main .slider .slides:nth-child(1){
background:linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url('https://images.pexels.com/photos/2339009/pexels-photo-2339009.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
background-size:cover;
background-attachment:fixed;
background-position:center;
background-repeat:no-repeat;
}
.main .slider .slides:nth-child(2){
background:linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url('https://images.pexels.com/photos/2303337/pexels-photo-2303337.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
background-size:cover;
background-attachment:fixed;
background-position:center;
background-repeat:no-repeat;
}
.main .slider .slides:nth-child(3){
background:linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url('https://images.pexels.com/photos/2346091/pexels-photo-2346091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');
background-size:cover;
background-attachment:fixed;
background-position:center;
background-repeat:no-repeat;
}
.main .slider .slides:nth-child(4){
background:linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url('https://images.pexels.com/photos/1168764/pexels-photo-1168764.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500');
background-size:cover;
background-attachment:fixed;
background-position:center;
background-repeat:no-repeat;
}
.main .slider .slides:nth-child(5){
background:linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35)),url('https://images.pexels.com/photos/2693529/pexels-photo-2693529.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
background-size:cover;
background-attachment:fixed;
background-position:center;
background-repeat:no-repeat;
}
.main .slider .slides h1{
font-size:3em;
font-weight:600;
text-shadow:0px 0.5px 12px rgba(0, 0, 0, 0.9);
margin-left:-500%;
transition:0.3s linear;
}
.main .slider .slides.current h1{
animation:animateHeading 0.3s linear forwards 1;
animation-delay:0.2s;
}
@keyframes animateHeading{
to{
  margin-left:0;
}
}
.main .slider .slides p{
text-shadow:0px 0.5px 5px rgba(0, 0, 0, 0.5);
margin-right:-500%;
transition:0.3s linear;
}
.main .slider .slides.current p{
animation:animateparagraph 0.3s linear forwards 1;
animation-delay:0.2s;
}
@keyframes animateparagraph{
to{
  margin-right:0;
}
}
.main .prev{
position:fixed;
color:#fff;
top:50%;
left:5%;
transform:translateY(-50%);
z-index:99;
font-size:1.5em;
font-weight:600;
border:2px solid #fff;
padding:17px 17px;
display:flex;
align-items:center;
justify-content:center;
border-radius:50%;
transition:0.2s ease-in-out;
cursor:pointer;
box-shadow:0px 2px 15px rgba(0, 0, 0, 0.9);
}
.main .next{
position:fixed;
color:#fff;
top:50%;
right:5%;
transform:translateY(-50%);
z-index:99;
font-size:1.5em;
font-weight:600;
border:2px solid #fff;
padding:17px 17px;
display:flex;
align-items:center;
justify-content:center;
border-radius:50%;
transition:0.2s ease-in-out;
cursor:pointer;
box-shadow:0px 2px 5px rgba(0, 0, 0, 0.5);
}
.main .prev:hover,
.main .next:hover{
background:#16a085;
border-color:#16a085;
}
.main a{
position:fixed;
color:#fff;
bottom:15%;
left:50%;
transform:translateX(-50%);
z-index:99;
font-size:1em;
font-weight:500;
border:1px solid #16a;
padding:10px 17px;
line-height:1.2em;
display:flex;
align-items:center;
justify-content:center;
border-radius:2px;
transition:0.2s ease-in-out;
cursor:pointer;
text-decoration:none;
background:#16a;
box-shadow:0px 2px 5px rgba(0, 0, 0, 0.5);
}
.main a:hover{
background:#017fb5;
}

      </style>
<div class="main">
  <div class="slider" id="slider">
    <div class="slides current">
      <h1>SLIDE ONE</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <div class="slides">
      <h1>SLIDE TWO</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <div class="slides">
      <h1>SLIDE THREE</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <div class="slides">
      <h1>SLIDE FOUR</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <div class="slides slidelast">
      <h1>SLIDE FIVE</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
  </div>
  <i class="fa fa-angle-left prev" id="prev"></i>
  <i class="fa fa-angle-right next" id="next"></i>
  <a href="#">START HERE</a>
</div>

  </section>

    
`
});



web.SectionsGroup['Bootstrap'] =
["bootstrap4/image-gallery",];



web.Sections.add("bootstrap4/image-gallery", {
    name: "Image gallery",
    image: "https://assets.startbootstrap.com/img/screenshots/snippets/thumbnail-gallery.jpg",
	dragHtml: '<img src="' + web.baseUrl + 'icons/product.png">',    
    html: `
<section data-name="image-gallery">    
<div class="container">

  <h1 class="font-weight-light text-center text-lg-left">Thumbnail Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">

    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/p2TQ-3Bh3Oo/400x300" alt="">
          </a>
    </div>
  </div>

</div>
</section>
`,
});   




web.SectionsGroup["Hero"] = ["hero/hero-1","hero/hero-2","hero/hero-3","hero/hero-4","hero/hero-5","hero/hero-6"];



web.Sections.add("hero/hero-1", {
  name: "Hero 1",
  image: window.mediaPath + "/sys/hero/hero1.jpg",
  html: `
  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
      </div>
    </div>
  </div>
`
});web.Sections.add("hero/hero-2", {
  name: "Hero 2",
  image: window.mediaPath + "/sys/hero/hero2.jpg",
  html: `<div class="px-4 pt-5 my-5 text-center border-bottom __web-inspector-hide-shortcut__">
  <h1 class="display-4 fw-bold text-body-emphasis">Centered screenshot</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
      <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 30vh;">
    <div class="container px-5">
      <img src="https://getbootstrap.com/docs/5.1/examples/heroes/bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
    </div>
  </div>
</div>`
});web.Sections.add("hero/hero-3", {
  name: "Hero 3",
  image: window.mediaPath + "/sys/hero/hero3.jpg",
  html: `<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="https://getbootstrap.com/docs/5.1/examples/heroes/bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
      <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
      </div>
    </div>
  </div>
</div>`
});web.Sections.add("hero/hero-4", {
  name: "Hero 4",
  image: window.mediaPath + "/sys/hero/hero4.jpg",
  html: `<div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Vertically centered hero sign-up form</h1>
      <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
    <div class="col-md-10 mx-auto col-lg-5">
      <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <hr class="my-4">
        <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
      </form>
    </div>
  </div>
</div>`
});web.Sections.add("hero/hero-5", {
  name: "Hero 5",
  image: window.mediaPath + "/sys/hero/hero5.jpg",
  html: `<div class="container my-5 __web-inspector-hide-shortcut__">
  <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
      <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Border hero with cropped image and shadows</h1>
      <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Primary</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
      </div>
    </div>
    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <img class="rounded-lg-3" src="https://getbootstrap.com/docs/5.1/examples/heroes/bootstrap-docs.png" alt="" width="720">
    </div>
  </div>
</div>`
});
web.Sections.add("hero/hero-6", {
  name: "Hero 6",
  image: window.mediaPath + "/sys/hero/hero6.jpg",
  html: `<header><div class="container my-5 __web-inspector-hide-shortcut__">
  <div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
      <h1 class="display-5 fw-bold text-white">Dark color hero</h1>
      <div class="col-lg-6 mx-auto">
        <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom button</button>
          <button type="button" class="btn btn-outline-light btn-lg px-4">Secondary</button>
        </div>
      </div>
    </div>
  </div></header>`
});



