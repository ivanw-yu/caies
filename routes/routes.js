function mapUrl(){
  var path = window.location.hash;

  console.log("DSAD",path);

  console.log(path.indexOf("#"));

  if(path.indexOf("#") >= 0){
    path = path.replace(/#/g, "");
    // window.location.hash =  path;
    console.log("repl", path);
  }
  // return home page
  if(path == "" || path =="/"){
    return "home.html";
  }

  // remove leading and trailing /
  if(path.charAt(0) == "/"){
    path = path.slice(1);
  }

  if(path.charAt(path.length-1) == "/"){
    // substring(inclusiveIndex, exclusiveIndex)
    path = path.substring(0, path.length-1);
  }

  if(path == "caies"){
    return "home.html";
  }

  console.log(path);

  // length is 1 if there's no "/"
  var splitPath = path.split("/");

  if(splitPath && splitPath.length >= 1){
    if(splitPath[0] == "register"){
      return "registration.html";
    }else if(splitPath[0] == "login"){
      return "login.html";
    }else if(splitPath[0] == "news"){
      if(splitPath.length == 1){
        return "news-dashboard.html";
      }
      if(splitPath.length == 2){
        //CONTINUE HERE!
        // $.ajax({
        //     url: 'server/member_registration_db.php',
        //     type: 'post',
        //     data: $('#registration-form').serialize(),
        //     success: function(serverResponse) {
        //                 $("#single-page").html(serverResponse);
        //             }
        // });
        return "news.html";
      }
    }else if(splitPath[0] == "dashboard"){
      if(splitPath.length>1){
        return "404.html";
      }else{

        return "dashboard.html";
      }
    }else if(splitPath[0] == "photos"){
      return "photo.html";
    }else if(splitPath[0] == "reports"){
      if(splitPath.length == 1){
        return "reports-dashboard.html";
      }else{
        //CONTINUE HERE TOO. NEED AJAX TO CHECK IF "/reports/1" Exists!
      }
    }
  }else{
    return "home.html";
  }
}
