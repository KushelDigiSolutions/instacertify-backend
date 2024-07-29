web.SectionsGroup["WEB SECTIONS"] = ["bootstrap4/video-header","Slider/Slider-1","Slider/Slider-3","hero/centered-section","hero/center-aligned-with-image","hero/left-aligned-with-image","hero/right-aligned-with-image","hero/sign-up-form","hero/border-with-cropped-image","hero/dark-hero","bootstrap4/photo-gallery","bootstrap4/one-column", "bootstrap4/two-column-section", "bootstrap4/three-column-section", "bootstrap4/four-column-section",];



web.Sections.add("bootstrap4/video-header", {
  name: "Video Header",
dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',        
  image: "../../../backend/admin/media/sys/slider/video.jpg",
  html:`
<section class="video" data-name="header-video">
<div class="overlay">

<div class="container h-100">
  <div class="d-flex h-100 text-center align-items-center">
    <div class="w-100 text-white">
      <h1 class="display-3">Video Header</h1>
      <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>
    </div>
  </div>
</div>
</div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
  <source src="../../../backend/admin/media/sys/slider/sample.mp4" type="video/mp4">
</video>




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
</section>
`,
});



web.Sections.add("Slider/Slider-1", {
  name: "Slider 1",
  image: window.mediaPath + "/sys/slider/slider-1.jpg",
  html: `
  <section class="slider1" data-name="slider1"><div class="main">
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
</div>


  <style>
  .main{
    position:relative;
    height:70vh;
    width:100%;
    color:#fff;
    }
  .slider-one,
  .slider-two,
  .slider-three,
  .slider-four {
    width: 100%;
    height: 70vh;
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
    background-image: url("../../../backend/admin/media/sys/slider/1s.jpg");
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
    background-image: url("../../../backend/admin/media/sys/slider/2s.jpg");
  }
  .slider-two .slider-two-image .slider-text {
    animation-delay: 3s;
  }
  
  .slider-three {
    animation: slider-three 12s linear infinite;
  }
  .slider-three .slider-three-image {
    background-image: url("../../../backend/admin/media/sys/slider/3s.jpg");
  }
  .slider-three .slider-three-image .slider-text {
    animation-delay: 6s;
  }
  
  .slider-four {
    animation: slider-four 12s linear infinite;
  }
  .slider-four .slider-four-image {
    background-image: url("../../../backend/admin/media/sys/slider/4s.jpg");
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
  
  
  
</section>
`
});




web.Sections.add("Slider/Slider-3", {
  name: "Slider 3",
  image: window.mediaPath + "/sys/slider/slider-3.jpg",
  html: `<section class="slider3" data-name="slider3"><div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <style>
  .slider3 .carousel-item{
		position:relative;
   }
  .slider3 .carousel-item .carousel-caption {
		position: absolute;
		right: 15%;
		bottom: 1.25rem;
		left: 15%;
		padding-top: 1.25rem;
		padding-bottom: 1.25rem;
		color: #fff;
		text-align: center;
	}

.carousel-control-next, .carousel-control-prev {
    top: 50% !important;
    width: 80px !important;;
    height: 80px!important;;
 
}
  </style>
  <div class="carousel-inner slider-3">
    <div class="carousel-item active" data-id="1">
      <img src="../../../sliders/slide1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-id="2">
      <img src="../../../sliders/slide2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item" data-id="3">
      <img src="../../../sliders/slide3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
	 <div class="carousel-item" data-id="4">
      <img src="../../../sliders/slide4.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <h5>Fourth slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
	 <div class="carousel-item" data-id="5">
      <img src="../../../sliders/slide5.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
        <h5>Fifth slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div></section>
`,  properties: [{
	id: "slider3-"+ Math.floor((Math.random() * 100) + 1),
  name: "slides",
  key: "class",
  inline:false,
  htmlAttr: "header",
  inputtype: TextareaInput,
  data:{
    rows:20,
  }
}]
});





web.Sections.add("hero/centered-section", {
  name: "Centered Section",
  image: "../../../backend/admin/media/sys/centered-section.png",
  html: `<section>
  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="../../../backend/admin/media/logo.png" alt="Logo" width="160" height="57">
    <h1 class="display-5 fw-bold">Centered Section</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">About Us</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
      </div>
    </div>
  </div></section>
`
});

web.Sections.add("hero/center-aligned-with-image", {
  name: "Centered aligned with image",
  image: "../../../backend/admin/media/sys/center-aligned-with-image.png",
  html: `<section><div style="magin-bottom:20%;" class="px-4 pt-5 my-5 text-center border-bottom __web-inspector-hide-shortcut__">
  <h1 class="display-4 fw-bold">Centered aligned with image</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">About Us</button>
      <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 30vh;">
    <div class="container px-5">
      <img src="../../../backend/admin/media/sys/snippets-sample-1.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
    </div>
  </div>
</div></section>`
});

web.Sections.add("hero/left-aligned-with-image", {
  name: "Left aligned with image",
  image: "../../../backend/admin/media/sys/left-aligned-with-image.png",
  html: `<section><div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="../../../backend/admin/media/sys/snippets-sample.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" />
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold  lh-1 mb-3">Left aligned with image</h1>
      <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">About Us</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
      </div>
    </div>
  </div>
</div></section>`
});

web.Sections.add("hero/right-aligned-with-image", {
  name: "Right aligned with image",
  image: "../../../backend/admin/media/sys/right-aligned-with-image.png",
  html: `<section><div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold  lh-1 mb-3">Right aligned with image</h1>
      <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">About Us</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
      </div>
    </div>
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="../../../backend/admin/media/sys/snippets-sample-2.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy" />
    </div>
  </div>
</div></section>`
});

web.Sections.add("hero/sign-up-form", {
  name: "Sign Up Form",
  image: "../../../backend/admin/media/sys/sign-up-form.png",
  html: `<section><div class="container col-xl-10 col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-lg-5 py-5">
    <div class="col-lg-7 text-center text-lg-start">
      <h1 class="display-4 fw-bold lh-1  mb-3">Sign Up Form</h1>
      <p class="col-lg-10 fs-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
      </form>
    </div>
  </div>
</div></section>`
});

web.Sections.add("hero/border-with-cropped-image", {
  name: "Border With Cropped Image",
  image: "../../../backend/admin/media/sys/border-with-cropped-image.png",
  html: `<section><div style="position:relative;bottom:50px;"><div class="container my-5 __web-inspector-hide-shortcut__">
  <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
    <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
      <h1 class="display-4 fw-bold lh-1">Border With Cropped Image</h1>
      <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">About Us</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Contact Us</button>
      </div>
    </div>
    <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
        <img class="rounded-lg-3" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample" width="800">
    </div>
  </div>
</div>
</div>
</section>`
});


web.Sections.add("hero/dark-hero", {
  name: "Dark Hero",
  image: "../../../backend/admin/media/sys/hero6.jpg",
  html: `<header><div class="container my-5 __web-inspector-hide-shortcut__">
  <div class="bg-dark text-secondary px-4 py-5 text-center">
    <div class="py-5">
      <h1 class="display-5 fw-bold text-white">Dark Hero</h1>
      <div class="col-lg-6 mx-auto">
        <p class="fs-5 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">About Us</button>
          <button type="button" class="btn btn-outline-light btn-lg px-4">Contact Us</button>
        </div>
      </div>
    </div>
  </div></header>`
});





web.Sections.add("bootstrap4/photo-gallery", {
    name: "Photo Gallery",
    image: window.mediaPath + "/sys/photo-gallery.png",  
	dragHtml: '<img src="' + web.baseUrl + 'icons/product.png">',    
    html: `
<section data-name="photo-gallery">    
<div class="container">

  <h1 class="font-weight-light text-center text-lg-left mb-4">Photo Gallery</h1>

  <div class="row text-center text-lg-left">

    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample" />
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample" />
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample" />
      </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample" />
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
      <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample" />
          </a>
    </div>
    <div class="col-lg-3 col-md-4 col-6">
      <a href="#" class="d-block mb-4 h-100">
        <img class="img-fluid img-thumbnail" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample" />
      </a>
    </div>
  </div>

</div>
</section>
`,
});   




web.Sections.add("bootstrap4/about-team", {
  name: "About and Team Section",
dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',        
  image: "https://assets.startbootstrap.com/img/screenshots/snippets/about-team.jpg",
  html:`
<section data-name="about-team">    
<header class="bg-primary text-center py-5 mb-4">
<div class="container">
  <h1 class="font-weight-light text-white">Meet the Team</h1>
</div>
</header>

<div class="container">
<div class="row">
  <!-- Team Member 1 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 2 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 3 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
  <!-- Team Member 4 -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-0 shadow">
      <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title mb-0">Team Member</h5>
        <div class="card-text text-black-50">Web Developer</div>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->

</div>
</section>
`,
});



web.Sections.add("bootstrap4/one-column", {
  name: "One Column Layout",
  dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',  
  image: window.mediaPath + "/sys/one-column-section.png",      
  html:`
<section data-name="one-column">    
  <div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">One Column Layout</h1>

    <!-- /.row start -->
    <div class="row">
      <div class="col-md-7">
        <a href="#"><img class="img-fluid rounded mb-3 mb-md-0" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      </div>
      <div class="col-md-5">
        <h3>Why do we use it</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <a class="btn btn-primary" href="#">Read More</a>
      </div>
    </div>
    <!-- /.row end -->

    <hr>

    <!-- /.row start -->
    <div class="row">
      <div class="col-md-7">
        <a href="#"><img class="img-fluid rounded mb-3 mb-md-0" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      </div>
      <div class="col-md-5">
        <h3>Why do we use it</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <a class="btn btn-primary" href="#">Read More</a>
      </div>
    </div>
    <!-- /.row end -->

    <hr>

    <!-- /.row start -->
    <div class="row">
      <div class="col-md-7">
        <a href="#"><img class="img-fluid rounded mb-3 mb-md-0" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      </div>
      <div class="col-md-5">
        <h3>Why do we use it</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <a class="btn btn-primary" href="#">Read More</a>
      </div>
    </div>
    <!-- /.row end -->

  </div>
</section>    
`,
});



web.Sections.add("bootstrap4/two-column-section", {
  name: "Two Column Layout",
  dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">', 
  image: window.mediaPath + "/sys/two-column-section.png",       
  html:`
<section data-name="two-column-section">    
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Two Column Layout</h1>

<div class="row">
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->

</div>
</section>
`,
});

web.Sections.add("bootstrap4/three-column-section", {
  name: "Three Column Layout",
dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',  
image: window.mediaPath + "/sys/three-column-section.png",      
  html:`
<section data-name="three-column-section">    
<div class="container">
<!-- Page Heading -->
<h1 class="my-4">Three Column Layout</h1>
<div class="row">
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys//snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#" class="text-decoration-none">Why do we use it</a>
        </h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
</div>
</section>`,
});


web.Sections.add("bootstrap4/four-column-section", {
  name: "Four Column Layout",
dragHtml: '<img src="' + web.baseUrl + 'icons/image.svg">',
image: window.mediaPath + "/sys/four-column-section.png",        
  html:`
<section data-name="four-column-section">
<div class="container">

<!-- Page Heading -->
<h1 class="my-4">Four Column Layout</h1>
<div class="row">
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-2.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="../../../backend/admin/media/sys/snippets-sample-1.jpg" alt="Sample"></a>
      <div class="card-body">
        <h4 class="card-title"><a href="#" class="text-decoration-none">Why do we use it</a></h4>
        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <a href="#" class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->

</div>
<section>
`,
});

web.SectionsGroup['AFB SECTIONS'] =[ "bootstrap4/embed-events","bootstrap4/header-banner"];


//Events Code start - 28-08-2023
async function getCategory() {
  const customPath = window.location.origin;
  var requestOptions = {
      method: 'GET',
      redirect: 'follow'
  };
  const category = await fetch(customPath+"/api/get-event-by-category/test", requestOptions);
  console.clear();
  return await category.json();
}

async function getEvents(slug,filter,limit) {
  const customPath = window.location.origin;
  var requestOptions = {
      method: 'GET',
      redirect: 'follow'
  };
  const events = await fetch(customPath+"/api/get-event-by-category/"+slug+"?filter="+filter+"&limit="+limit, requestOptions);
  return await events.json();
}

function convertDateFormat(date){
  var today = new Date(date);
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();
  today = dd + '/' + mm + '/' + yyyy;
  return today;
}

async function renderEventsHtml(resutData) {
  const customPath = window.location.origin;
  const event_id = Math.floor(Math.random() * 900000) + 1 +""+Math.floor(Date.now() / 1000);
  const {element, events, category_slug, filter, limit} = resutData;

  console.log('events.event')
  console.log(events)

  if(events.event){
      element.attr('data-id', event_id);
      let events_html = ``;
      
      events.event.map((ls,i)=>{
          events_html += `
          <div class="pb-event" data-id="${ls.id}">
              <div class="pb-event-img-container">
                  <span class="pb-event-badge">${convertDateFormat(ls.date)}</span>
                  <a href="/event/${ls.slug}"><img class="card-img-top" src="${ls.image.length > 0 ? ls.image[0]:"https://cdn.pixabay.com/photo/2017/07/21/23/57/concert-2527495_960_720.jpg" }" alt="Sample"></a>
              </div>
              <div class="pb-event-body">
                  <h4><a href="/event/${ls.slug}">${ls.title}</a></h4>
                  <div class="pb-event-icon-content">
                      <span class="pb-event-icon">
                          <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.75 2C12.2586 2.00145 10.8287 2.59454 9.77408 3.64912C8.7195 4.7037 8.12641 6.1336 8.12496 7.625C8.12553 7.87111 8.14197 8.11694 8.17418 8.36094L2.74371 15.7672C2.56596 16.0076 2.4807 16.3039 2.50351 16.602C2.52632 16.9001 2.65568 17.1801 2.86793 17.3906L3.98433 18.507C4.19489 18.7193 4.47482 18.8486 4.77292 18.8715C5.07102 18.8943 5.36737 18.809 5.60777 18.6312L13.0148 13.1992C13.2585 13.2319 13.5041 13.2489 13.75 13.25C15.2418 13.25 16.6725 12.6574 17.7274 11.6025C18.7823 10.5476 19.375 9.11684 19.375 7.625C19.375 6.13316 18.7823 4.70242 17.7274 3.64752C16.6725 2.59263 15.2418 2 13.75 2ZM18.125 7.625C18.1261 8.56938 17.8201 9.48852 17.2531 10.2437L11.132 4.12187C11.7822 3.63624 12.5547 3.34104 13.3631 3.26928C14.1715 3.19751 14.9839 3.35201 15.7095 3.71551C16.4351 4.079 17.0453 4.63715 17.4719 5.32757C17.8984 6.01798 18.1246 6.81344 18.125 7.625ZM4.86871 17.625L3.74996 16.5062L8.60465 9.89062C9.17351 11.1749 10.2001 12.2014 11.4843 12.7703L4.86871 17.625ZM9.37496 7.625C9.37372 6.68084 9.67975 5.76192 10.2468 5.00703L16.3671 11.1273C15.717 11.6127 14.9446 11.9077 14.1364 11.9794C13.3282 12.0511 12.516 11.8966 11.7906 11.5332C11.0652 11.1698 10.455 10.6119 10.0285 9.92173C9.60187 9.23156 9.37561 8.43636 9.37496 7.625ZM9.19137 12.1828C9.30849 12.3 9.37428 12.4589 9.37428 12.6246C9.37428 12.7903 9.30849 12.9492 9.19137 13.0664L8.56637 13.6914C8.50891 13.7519 8.43992 13.8003 8.36347 13.8336C8.28703 13.867 8.20467 13.8848 8.12126 13.8859C8.03784 13.8869 7.95505 13.8713 7.87778 13.8399C7.8005 13.8084 7.7303 13.7619 7.67131 13.7029C7.61232 13.6439 7.56574 13.5737 7.53431 13.4964C7.50288 13.4191 7.48724 13.3363 7.48831 13.2529C7.48937 13.1695 7.50713 13.0871 7.54053 13.0107C7.57393 12.9343 7.62229 12.8653 7.68277 12.8078L8.30777 12.1828C8.36578 12.1245 8.43472 12.0783 8.51064 12.0467C8.58655 12.0151 8.66796 11.9988 8.75019 11.9987C8.83242 11.9987 8.91385 12.0148 8.98982 12.0463C9.0658 12.0777 9.13482 12.1239 9.19293 12.182L9.19137 12.1828Z" fill="#3595F6"/></svg>
                      </span>
                      <span class="pb-event-info">${events.category.name}</span>
                  </div>
                  <div class="pb-event-icon-content">
                      <span class="pb-event-icon">
                          <svg width="21" height="20" viewBox="0 0 21 20" fill="none">
                              <path d="M10.5 5C9.88193 5 9.27775 5.18328 8.76384 5.52666C8.24994 5.87004 7.8494 6.3581 7.61288 6.92911C7.37635 7.50013 7.31447 8.12847 7.43505 8.73466C7.55562 9.34085 7.85325 9.89767 8.29029 10.3347C8.72733 10.7717 9.28415 11.0694 9.89034 11.19C10.4965 11.3105 11.1249 11.2486 11.6959 11.0121C12.2669 10.7756 12.755 10.3751 13.0983 9.86116C13.4417 9.34725 13.625 8.74307 13.625 8.125C13.625 7.2962 13.2958 6.50134 12.7097 5.91529C12.1237 5.32924 11.3288 5 10.5 5ZM10.5 10C10.1292 10 9.76665 9.89003 9.45831 9.68401C9.14996 9.47798 8.90964 9.18514 8.76773 8.84253C8.62581 8.49992 8.58868 8.12292 8.66103 7.75921C8.73337 7.39549 8.91195 7.0614 9.17417 6.79917C9.4364 6.53695 9.77049 6.35837 10.1342 6.28603C10.4979 6.21368 10.8749 6.25081 11.2175 6.39273C11.5601 6.53464 11.853 6.77496 12.059 7.08331C12.265 7.39165 12.375 7.75416 12.375 8.125C12.375 8.62228 12.1775 9.09919 11.8258 9.45083C11.4742 9.80246 10.9973 10 10.5 10ZM10.5 1.25C8.67727 1.25207 6.92979 1.97706 5.64092 3.26592C4.35206 4.55479 3.62707 6.30227 3.625 8.125C3.625 10.5781 4.75859 13.1781 6.90625 15.6445C7.87127 16.759 8.95739 17.7626 10.1445 18.6367C10.2496 18.7103 10.3748 18.7498 10.5031 18.7498C10.6314 18.7498 10.7566 18.7103 10.8617 18.6367C12.0467 17.7623 13.1307 16.7587 14.0938 15.6445C16.2383 13.1781 17.375 10.5781 17.375 8.125C17.3729 6.30227 16.6479 4.55479 15.3591 3.26592C14.0702 1.97706 12.3227 1.25207 10.5 1.25ZM10.5 17.3438C9.20859 16.3281 4.875 12.5977 4.875 8.125C4.875 6.63316 5.46763 5.20242 6.52252 4.14752C7.57742 3.09263 9.00816 2.5 10.5 2.5C11.9918 2.5 13.4226 3.09263 14.4775 4.14752C15.5324 5.20242 16.125 6.63316 16.125 8.125C16.125 12.5961 11.7914 16.3281 10.5 17.3438Z" fill="#3595F6"/>
                          </svg>                        
                      </span>
                      <span class="pb-event-info">${ls.location}</span>
                  </div>

                  <p class="pb-event-desc">${ls.short_description}</p>
              </div>
              <div class="pb-event-action">
                  <a href="/event/${ls.slug}">
                      View Details <svg width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M16.51 11H4.5V13H16.51V16L20.5 12L16.51 8V11Z" fill="#3595F6"/></svg>
                  </a>
              </div>
          </div>`;
      });

      let web_html_event = `<script>
	  if($("#main_body").length > 0){ $('.render-event-list').removeClass('active-cursor'); }
          $('document').ready(function(){
              function convertDateFormat(date){ var today = new Date(date); var dd = String(today.getDate()).padStart(2, '0'); var mm = String(today.getMonth() + 1).padStart(2, '0'); var yyyy = today.getFullYear(); today = dd + '/' + mm + '/' + yyyy; return today;
                }
              fetch("${customPath}/api/get-event-by-category/${category_slug}?filter=${filter}&limit=${limit}", { method: 'GET', redirect: 'follow'}).then(response => response.text()).then( (resultEvent) => {
                  if(resultEvent){
                      let obj = JSON.parse(resultEvent);
                      let web_event_html = '';
                      obj.event.forEach(ls => {
                          web_event_html += '<div class="pb-event" data-id="'+ls.id+'"><div class="pb-event-img-container"><span class="pb-event-badge">'+convertDateFormat(ls.date)+'</span><a href="/event/'+ls.slug+'"><img class="card-img-top" src="'+ls.image[0]+'" alt="'+ls.title+'"></a></div><div class="pb-event-body"><h4><a href="/event/'+ls.slug+'">'+ls.title+'</a></h4><div class="pb-event-icon-content"><span class="pb-event-icon"><svg width="21" height="20" viewBox="0 0 21 20" fill="none"><path d="M13.75 2C12.2586 2.00145 10.8287 2.59454 9.77408 3.64912C8.7195 4.7037 8.12641 6.1336 8.12496 7.625C8.12553 7.87111 8.14197 8.11694 8.17418 8.36094L2.74371 15.7672C2.56596 16.0076 2.4807 16.3039 2.50351 16.602C2.52632 16.9001 2.65568 17.1801 2.86793 17.3906L3.98433 18.507C4.19489 18.7193 4.47482 18.8486 4.77292 18.8715C5.07102 18.8943 5.36737 18.809 5.60777 18.6312L13.0148 13.1992C13.2585 13.2319 13.5041 13.2489 13.75 13.25C15.2418 13.25 16.6725 12.6574 17.7274 11.6025C18.7823 10.5476 19.375 9.11684 19.375 7.625C19.375 6.13316 18.7823 4.70242 17.7274 3.64752C16.6725 2.59263 15.2418 2 13.75 2ZM18.125 7.625C18.1261 8.56938 17.8201 9.48852 17.2531 10.2437L11.132 4.12187C11.7822 3.63624 12.5547 3.34104 13.3631 3.26928C14.1715 3.19751 14.9839 3.35201 15.7095 3.71551C16.4351 4.079 17.0453 4.63715 17.4719 5.32757C17.8984 6.01798 18.1246 6.81344 18.125 7.625ZM4.86871 17.625L3.74996 16.5062L8.60465 9.89062C9.17351 11.1749 10.2001 12.2014 11.4843 12.7703L4.86871 17.625ZM9.37496 7.625C9.37372 6.68084 9.67975 5.76192 10.2468 5.00703L16.3671 11.1273C15.717 11.6127 14.9446 11.9077 14.1364 11.9794C13.3282 12.0511 12.516 11.8966 11.7906 11.5332C11.0652 11.1698 10.455 10.6119 10.0285 9.92173C9.60187 9.23156 9.37561 8.43636 9.37496 7.625ZM9.19137 12.1828C9.30849 12.3 9.37428 12.4589 9.37428 12.6246C9.37428 12.7903 9.30849 12.9492 9.19137 13.0664L8.56637 13.6914C8.50891 13.7519 8.43992 13.8003 8.36347 13.8336C8.28703 13.867 8.20467 13.8848 8.12126 13.8859C8.03784 13.8869 7.95505 13.8713 7.87778 13.8399C7.8005 13.8084 7.7303 13.7619 7.67131 13.7029C7.61232 13.6439 7.56574 13.5737 7.53431 13.4964C7.50288 13.4191 7.48724 13.3363 7.48831 13.2529C7.48937 13.1695 7.50713 13.0871 7.54053 13.0107C7.57393 12.9343 7.62229 12.8653 7.68277 12.8078L8.30777 12.1828C8.36578 12.1245 8.43472 12.0783 8.51064 12.0467C8.58655 12.0151 8.66796 11.9988 8.75019 11.9987C8.83242 11.9987 8.91385 12.0148 8.98982 12.0463C9.0658 12.0777 9.13482 12.1239 9.19293 12.182L9.19137 12.1828Z" fill="#3595F6"/></svg></span><span class="pb-event-info">'+obj.category.name+'</span></div><div class="pb-event-icon-content"><span class="pb-event-icon"><svg width="21" height="20" viewBox="0 0 21 20" fill="none"><path d="M10.5 5C9.88193 5 9.27775 5.18328 8.76384 5.52666C8.24994 5.87004 7.8494 6.3581 7.61288 6.92911C7.37635 7.50013 7.31447 8.12847 7.43505 8.73466C7.55562 9.34085 7.85325 9.89767 8.29029 10.3347C8.72733 10.7717 9.28415 11.0694 9.89034 11.19C10.4965 11.3105 11.1249 11.2486 11.6959 11.0121C12.2669 10.7756 12.755 10.3751 13.0983 9.86116C13.4417 9.34725 13.625 8.74307 13.625 8.125C13.625 7.2962 13.2958 6.50134 12.7097 5.91529C12.1237 5.32924 11.3288 5 10.5 5ZM10.5 10C10.1292 10 9.76665 9.89003 9.45831 9.68401C9.14996 9.47798 8.90964 9.18514 8.76773 8.84253C8.62581 8.49992 8.58868 8.12292 8.66103 7.75921C8.73337 7.39549 8.91195 7.0614 9.17417 6.79917C9.4364 6.53695 9.77049 6.35837 10.1342 6.28603C10.4979 6.21368 10.8749 6.25081 11.2175 6.39273C11.5601 6.53464 11.853 6.77496 12.059 7.08331C12.265 7.39165 12.375 7.75416 12.375 8.125C12.375 8.62228 12.1775 9.09919 11.8258 9.45083C11.4742 9.80246 10.9973 10 10.5 10ZM10.5 1.25C8.67727 1.25207 6.92979 1.97706 5.64092 3.26592C4.35206 4.55479 3.62707 6.30227 3.625 8.125C3.625 10.5781 4.75859 13.1781 6.90625 15.6445C7.87127 16.759 8.95739 17.7626 10.1445 18.6367C10.2496 18.7103 10.3748 18.7498 10.5031 18.7498C10.6314 18.7498 10.7566 18.7103 10.8617 18.6367C12.0467 17.7623 13.1307 16.7587 14.0938 15.6445C16.2383 13.1781 17.375 10.5781 17.375 8.125C17.3729 6.30227 16.6479 4.55479 15.3591 3.26592C14.0702 1.97706 12.3227 1.25207 10.5 1.25ZM10.5 17.3438C9.20859 16.3281 4.875 12.5977 4.875 8.125C4.875 6.63316 5.46763 5.20242 6.52252 4.14752C7.57742 3.09263 9.00816 2.5 10.5 2.5C11.9918 2.5 13.4226 3.09263 14.4775 4.14752C15.5324 5.20242 16.125 6.63316 16.125 8.125C16.125 12.5961 11.7914 16.3281 10.5 17.3438Z" fill="#3595F6"/></svg></span><span class="pb-event-info">'+ls.location+'</span></div><p class="pb-event-desc">'+ls.short_description+'</p></div><div class="pb-event-action"><a href="/event/'+ls.slug+'">View Details <svg width="25" height="24" viewBox="0 0 25 24" fill="none"><path d="M16.51 11H4.5V13H16.51V16L20.5 12L16.51 8V11Z" fill="#3595F6"/></svg></a></div></div>';
                      });
					  
					  if(obj.event.length > 0){
					  	$('.render_events[data-id="${event_id}"] .render-event-list').html(web_event_html)
					  }else{
					  	$('.render_events[data-id="${event_id}"] .render-event-list').html('<h5 class="text-center py-5">There are no events in category.</h5>')
					  }
					  
                  }
              }).catch(error => console.log('error', error));
			  if($("#main_body").length > 0){ $('.render-event-list').removeClass('active-cursor'); }
          });
		  if($("#main_body").length > 0){ $('.render-event-list').removeClass('active-cursor'); }
      </script>`;

      if(events.event.length > 0){
          element.find(".render-event-list").html(events_html);
          element.find(".event-scripts").html(web_html_event);
          element.attr('data-category-slug', category_slug);
          element.attr('data-filter', filter);
          element.attr('data-limit', limit);
      }else{
          element.find(".render-event-list").html(`<h5 class="text-center py-5">There are no events in category.</h5>`);
          element.find(".event-scripts").html(web_html_event);
          element.attr('data-category-slug', null);
          element.attr('data-filter', null);
          element.attr('data-limit', null);
      }

  }
}
//Events Code End - 28-08-2023


web.Sections.add("bootstrap4/embed-events", {
    name: "Events",
    attributes: ["data-component-events"],
	dragHtml: '<img src="../backend/admin/media/snippets-events.png">',
  	image: "../backend/admin/media/snippets-events.png",
    html: `<section data-component-events>
    <div class="container">
    <div class="render_events" data-category-slug="null" data-filter="null" data-limit="null">
    <div class="render-event-list active-cursor---">
    <div class="spinner-border spinner-border-sm" style="color: #3595f6;height: 100px;margin: 50px auto;position: relative;width: 100px;">
    <span class="visually-hidden">Loading...</span>
    </div>
    </div>
    <div class="event-scripts"></div></div></div>
    <style>.pb-event-action a,.render-event-list 
    .pb-event-desc,.render-event-list 
    .pb-event-info{font-size:16px;font-style:normal;font-weight:400;line-height:normal}
    .render-event-list.active-cursor *{pointer-events:none!important}
    .render-event-list{width:100%;display:flex;flex-wrap:wrap;gap:20px;padding:20px 0;justify-content:flex-start}
    .render-event-list .pb-event{width:calc(33.33% - 14px);border-radius:12px;overflow:hidden;border:1px solid #eff8ff;background-color:#fff}
    .render-event-list .pb-event:hover{box-shadow:0 0 15px #d3d3d3;transition:.4s;border-color:#3595f6}
    .render-event-list .pb-event-img-container{width:100%;position:relative}
    .render-event-list .pb-event .pb-event-badge{position:absolute;top:20px;left:20px;padding:8px 20px;border-radius:4px;background:#3595f6;color:#fff;font-size:15px;font-style:normal;font-weight:500;line-height:normal}
    .render-event-list .pb-event-img-container a{display:block;height:277px}.render-event-list 
    .pb-event-img-container img{width:100%;height:100%;object-fit:cover}.render-event-list 
    .pb-event-body{padding:20px;display:flex;flex-direction:column;gap:15px}.render-event-list 
    .pb-event-body h4{color:#231f20;font-size:24px;font-style:normal;font-weight:600;line-height:normal;text-transform:uppercase;margin:0;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;}
    .render-event-list .pb-event-body h4 a{color:#231f20;text-decoration:none}
    .render-event-list .pb-event-icon-content{width:100%;display:flex;gap:10px;align-items:center}
    .render-event-list .pb-event-icon{display:inline-flex;width:32px;height:32px;padding:6px;justify-content:center;align-items:center;border-radius:4px;background:#eff8ff}
    .render-event-list .pb-event-info{color:#231f20}.render-event-list 
    .pb-event-desc{overflow: hidden;color:#231f20;margin:0;height:65px;word-break: break-word;}
    .pb-event-action{display:flex;padding:0;justify-content:center;align-items:flex-start;gap:10px;background:#eff8ff}
    .pb-event-action a{color:#3595f6;text-decoration:none;display:block;padding:20px;width:100%;text-align:center}
    .pb-event-action a:hover{color:#fff;background:#333}.pb-event-action a:hover svg path{fill:#fff}
    @media only screen and (max-width:991px){.render-event-list .pb-event{width:calc(50% - 10px)}
    .render-event-list .pb-event-body h4{font-size:18px}.render-event-list 
    .pb-event-img-container a{height:200px}}
    @media only screen and (max-width:479px){.render-event-list 
      .pb-event{width:100%}.render-event-list 
      .pb-event-desc{height:auto}.pb-event-action a{padding:15px}}
    </style></section>`,
    init: async function (node) {
        const event_lists = jQuery(".render_events", node);
      const init_status = event_lists.attr('init-data')
      let default_category = event_lists.attr('data-category-slug');
      let default_filter = event_lists.attr('data-filter');
      let default_limit = event_lists.attr('data-limit');

      //catgeory dropdown
      const category_reuslt = await getCategory();
      if(category_reuslt.category_all.length > 0){
          let category_option = ``;
          category_reuslt.category_all.map((ls,i)=>{
              let selected = "";
              if(default_category == 0){ default_category = ls.slug; selected = "selected"};
              category_option += `<option value="${ls.slug}" ${selected}>${ls.name}</option>`;
              selected = "";
          });
          $('[name="drp_category_lists"]').html(category_option)
      }

      let category_slug = $(".component-properties select[name=drp_category_lists]");
      let event_filter = $(".component-properties select[name=drp_event_filter]");
      let event_limit = $(".component-properties select[name=drp_event_limit]");

      if(typeof init_status != "undefined"){
          //catgeory dropdown
          const initCall = async () => {
              const event_reuslt = await getEvents(default_category, default_filter, default_limit);
              const params_node = {
                  element : event_lists,
                  events: event_reuslt,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEventsHtml(params_node);
              category_slug.val(default_category)
              event_filter.val(default_filter)
              event_limit.val(default_limit)
          }
          initCall();
          event_lists.attr('init-data',true)
      }else{

          //default
          if(category_slug.val() != null){
              default_category = category_slug.val();
          }
          if(event_filter.val() == null){
              default_filter = "desc";
              event_filter.val(default_filter)
          }
          if(event_limit.val() == null){
              default_limit = "6";
              event_limit.val(default_limit);
          }

          //catgeory dropdown
          const initCall = async () => {
              const event_reuslt = await getEvents(default_category, default_filter, default_limit);
              const params_node = {
                  element : event_lists,
                  events: event_reuslt,
                  category_slug :default_category,
                  filter : default_filter,
                  limit: default_limit
              };
              renderEventsHtml(params_node);
              category_slug.val(default_category)
              event_filter.val(default_filter)
              event_limit.val(default_limit)
          }
          initCall();
          event_lists.attr('init-data',true)
      }
    },
    onChange:  function (node, property, value) {},
    properties: [
      {
          name: "Filter Events",
          key: "drp_event_filter",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "Newest",
                      value: "desc",
                  },
                  {
                      text: "Oldest",
                      value: "asc",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const event_limit = $(".component-properties select[name=drp_event_limit]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(category_slug, value, event_limit);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :category_slug,
                      filter : value,
                      limit: event_limit
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node; 
          },
      },
      {
          name: "Category",
          key: "drp_category_lists",
          inputtype: SelectInput,
          data: { options: [] },
          onChange: async function (node, value, input, component) {
              const event_filter = $(".component-properties select[name=drp_event_filter]").val();
              const event_limit = $(".component-properties select[name=drp_event_limit]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(value, event_filter, event_limit);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :value,
                      filter : event_filter,
                      limit: event_limit
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node;   
          },
      },
      {
          name: "Show events",
          key: "drp_event_limit",
          inputtype: SelectInput,
          data: {
              options: [
                  {
                      text: "6",
                      value: "6",
                  },
                  {
                      text: "12",
                      value: "12",
                  },
                  {
                      text: "18",
                      value: "18",
                  },
                  {
                      text: "24",
                      value: "24",
                  }
              ],
          },
          onChange: function (node, value, input, component) {
              const category_slug = $(".component-properties select[name=drp_category_lists]").val();
              const event_filter = $(".component-properties select[name=drp_event_filter]").val();
              const event_lists = jQuery(".render_events", node);
              const initCall = async () => {
                  const event_reuslt = await getEvents(category_slug, event_filter, value);
                  const params_node = {
                      element : event_lists,
                      events: event_reuslt,
                      category_slug :category_slug,
                      filter : event_filter,
                      limit: value
                  };
                  renderEventsHtml(params_node);
              }
              initCall();
              return node;
          },
      },
  ]
});





web.Sections.add("bootstrap4/header-banner", {
  name: "Home Banner",
  image: window.mediaPath + "/sys/plane.jpg",
  html: `<section class="header-banner" data-name="slider3"><div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <style>
  .header-banner .carousel-item{
		position:relative;height:600px;
   }
  .header-banner .carousel-item .carousel-caption {
	text-align:left; top:100px;font-weight:600;
	
		color: #fff;
	
	}
.home-banner p{ font-family: "Poppins", sans-serif;font-size: 22px;font-weight: 400;text-align: left;color: #fabd5c;line-height: 30px;}
.home-banner button{padding: 18px 40px 18px 40px;  font-size: 15px;  color: white;  margin-top: 35px;  font-weight: 600;  border: none;  border-radius: 0px 24px;
  text-transform: uppercase;  border: 1px solid rgba(255, 255, 255, 0);  background: linear-gradient(90deg, #e02ca1 0%, #b73cf1 100%);}
  </style>
  <div class="carousel-inner slider-3 home-banner">
    <div class="carousel-item active" data-id="1">
      <img src="../../../sliders/plane.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-md-block">
      <p class="romoli-fs-text">WELCOME TO THE 92 FSS</p>
        <h1 class="in-house-text-para">REFUELING THE</br> FAIRCHILD COMMUNITY</br> WITH FUN, FAMILY & </br> FRIENDS</h1> 
        <button class="bord">Explore</button>       
      </div>
    </div>
</div></section>
`,  properties: [{
	id: "slider3-"+ Math.floor((Math.random() * 100) + 1),
  name: "slides",
  key: "class",
  inline:false,
  htmlAttr: "header",
  inputtype: TextareaInput,
  data:{
    rows:20,
  }
}]
});



