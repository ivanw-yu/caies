function parseUrl(){
  var url = window.location.href;
  console.log(url);
  var uri = url.split("/");
  if(uri == undefined || uri.length == 0){
    return;
  }
  if(url.indexOf("index") >= 0 /* uri[1].indexOf("index") >=0 || url.length == 1*/){
    homePage();
  }else if(url.indexOf("questions") >=0){
    questionsPage();
  }



}

var carouselI = 0;

function homePage(){
  var home = document.getElementById("single-page");
  home.style.height = "300px";
  home.style.width = "100%";
  home.style.position = "relative";
  home.style.backgroundImage = "url('assets/img1.jpeg')";
  home.style.backgroundRepeat = "none";
  home.style.backgroundSize = "100% 100%";
  carouselI = 0; //default image

  var button1 = document.createElement("div");
  button1.style.borderRadius = "50%";
  button1.innerHTML = "<";
  button1.style.height = "25px";
  button1.style.position = "absolute";
  button1.style.top = "125px";
  button1.style.width = "25px";
  button1.style.left = "0";
  button1.style.backgroundColor = "rgba(0,0,0,.1)";
  button1.style.color = "purple";
  button1.style.textAlign = "center";
  button1.style.textAlign = "center";
  button1.style.boxSizing = "border-box";
  button1.style.paddingTop = "5px";


  var button2 = document.createElement("div");
  button2.style.borderRadius = "50%";
  button2.innerHTML = ">";
  button2.style.height = "25px";
  button2.style.position = "absolute";
  button2.style.top = "125px";
  button2.style.width = "25px";
  button2.style.right = "40px";
  button2.style.backgroundColor = "rgba(0,0,0,.1)";
  button2.style.color = "purple";
  button2.style.textAlign = "center";
  button2.style.boxSizing = "border-box";
  button2.style.paddingTop = "5px";

  home.appendChild(button1);
  home.appendChild(button2);

  button1.addEventListener("mouseenter", function(){
    button1.style.backgroundColor = "rgba(0,0,0,.5)";
    button1.style.cursor = "pointer";
    button1.addEventListener("mouseout", function(){
      button1.style.backgroundColor = "rgba(0,0,0,.1)";
      button1.removeEventListener("mouseenter", function(){});
      button1.removeEventListener("mouseout", function(){});
      button1.removeEventListener("click", function(){});
    })

    button1.addEventListener("click", function(){
      carouselI = (carouselI == 0) ? 2 : carouselI - 1;
      home.style.opacity = "0";

      home.style.backgroundImage = "url('assets/img" + carouselI + ".jpeg')";
      fade(home);
    })
  })

  button2.addEventListener("mouseenter", function(){
    button2.style.backgroundColor = "rgba(0,0,0,.5)";
    button2.style.cursor = "pointer";
    button2.addEventListener("mouseout", function(){
      button2.style.backgroundColor = "rgba(0,0,0,.1)";
      button2.removeEventListener("mouseenter", function(){});
      button2.removeEventListener("mouseout", function(){});
      button2.removeEventListener("click", function(){});
    })
    button2.addEventListener("click", function(){
      carouselI = (carouselI == 2) ? 0 : carouselI + 1;
      home.style.opacity = "0";
      home.style.backgroundImage = "url('assets/img" + carouselI + ".jpeg')";
      fade(home);
    })
  })

  //var caption = document.createElement("div");

}


// utils
function fade(elem){
  var op = parseFloat(elem.style.opacity);

  var timer = setInterval(function () {
      //console.log('here');
      if(op >= 1.0)
        clearInterval(timer);

      op += 0.1;
      elem.style.opacity = "" + op;
  }, 50);
}
