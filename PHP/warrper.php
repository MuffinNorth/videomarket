<?php
function genHead($title){
    echo "<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css\" integrity=\"sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.0.8/css/all.css\">
    <script src=\"https://code.jquery.com/jquery-3.6.0.js\" integrity=\"sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=\" crossorigin=\"anonymou\"></script>
    <title>$title</title>
    </head>";  
}
function genHTMLFirst(){
    echo '<!DOCTYPE html>
    <html lang="ru">
    
    <body>';
}

function genHTMLEnd(){
    echo '   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> 
    <script src="/JS/functions.js"></script>
    <script src="/JS/getUserData.js"></script>
    </body>
    </html>';
}

function getNavItems($nowpage){
    global $guestNAVOPTIONS;
    global $userNAVOPTIONS;
    global $adminNAVOPTIONS;
    $i = 1;
    if ($_SESSION['logindata']['role'] == "1"){
      $NAVOPTIONS = $adminNAVOPTIONS;
    }else if($_SESSION['logindata']['isLogin']){
      $NAVOPTIONS = $userNAVOPTIONS;
    }
    else{
      $NAVOPTIONS = $guestNAVOPTIONS;
    }

    $keys = array_keys($NAVOPTIONS);
    echo '<ul class="navbar-nav mr-auto mb-2 mb-lg-0">';
    foreach($keys as $key){
        if ($i == $nowpage){
            echo " <li class=\"nav-item\">
            <a class=\"nav-link active\" aria-current=\"page\" href=\"$NAVOPTIONS[$key]\">$key</a>
            </li>";
        }else{
            echo " <li class=\"nav-item\">
                    <a class=\"nav-link\" aria-current=\"page\" href=\"$NAVOPTIONS[$key]\">$key</a>
            </li>";
        }
        $i = $i + 1;
    }
    echo ' </ul>';
}


function genNavBar($nowpage){
    global $SITE_NAME;
    echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <div class=\"container-fluid\">
      <a class=\"navbar-brand\" href=\"/\">$SITE_NAME</a>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">";
        getNavItems($nowpage);
       echo "<form class=\"d-flex\">
          <input class=\"form-control mr-2\" type=\"search\" placeholder=\"Найти фильм\" aria-label=\"Search\">
          <button class=\"btn btn-outline-success\" type=\"submit\">Поиск</button>
        </form>
      </div>
    </div>
  </nav>";
}