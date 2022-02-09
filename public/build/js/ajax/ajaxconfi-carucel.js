    
    //Evento Click carrucel Evento

    var imgCar="img1";

    function cambiarEvento(){
        var imagen=document.getElementById("imgCarrusEvento1");
        var imagen2=document.getElementById("imgCarrusEvento2");
        var imagen3=document.getElementById("imgCarrusEvento3");

        if (imgCar=="img1") {
            imagen.src="/build/img/landingPage/lp-evento/e1.jpg";
            
            imagen2.src="/build/img/landingPage/lp-evento/e2.jpg";

            imagen3.src="/build/img/landingPage/lp-evento/e3.jpg";
            
            imgCar="img2";
            
        } else if(imgCar=="img2"){
            imagen.src="/build/img/landingPage/lp-evento/e4.jpg";

            imagen2.src="/build/img/landingPage/lp-evento/e5.jpg";

            imagen3.src="/build/img/landingPage/lp-evento/e6.jpg";

            imgCar="img3";

        } else {
            imagen.src="/build/img/landingPage/lp-evento/e4.jpg";

            imagen2.src="/build/img/landingPage/lp-evento/e3.jpg";

            imagen3.src="/build/img/landingPage/lp-evento/e5.jpg";

            imgCar="img1";
        } 
    }
    //Evento Click carrucel Hogar

    var clickHogar="img1";

    function cambiarHogar(){
        var imagen=document.getElementById("imgCarrusHogar1");
        var imagen2=document.getElementById("imgCarrusHogar2");
        var imagen3=document.getElementById("imgCarrusHogar3");

        if (clickHogar=="img1") {
            imagen.src="/build/img/landingPage/lp-hogar/h1.jpg";
            
            imagen2.src="/build/img/landingPage/lp-hogar/h2.jpg";

            imagen3.src="/build/img/landingPage/lp-hogar/h3.jpg";
            
            clickHogar="img2";
            console.log(clickHogar);
            
        } else if(clickHogar=="img2"){
            imagen.src="/build/img/landingPage/lp-hogar/h4.jpg";

            imagen2.src="/build/img/landingPage/lp-hogar/h5.jpg";

            imagen3.src="/build/img/landingPage/lp-hogar/h6.jpg";

            clickHogar="img3";

        } else {
            imagen.src="/build/img/landingPage/lp-hogar/h2.jpg";

            imagen2.src="/build/img/landingPage/lp-hogar/h4.jpg";

            imagen3.src="/build/img/landingPage/lp-hogar/h1.jpg";

            clickHogar="img1";
        } 
    }
  
   

    //Evento Click carrucel Negocio

    var clickNegocio="img1";

    function cambiarNegocio(){
        
        var imagen=document.getElementById("imgCarrusNegocio1");
        var imagen2=document.getElementById("imgCarrusNegocio2");
        var imagen3=document.getElementById("imgCarrusNegocio3");

        if (clickNegocio=="img1") {
            imagen.src="/build/img/landingPage/lp-negocio/n1.jpg";
            
            imagen2.src="/build/img/landingPage/lp-negocio/n2.jpg";

            imagen3.src="/build/img/landingPage/lp-negocio/n3.jpg";
            
            clickNegocio="img2";
        } else if(clickNegocio=="img2"){
            imagen.src="/build/img/landingPage/lp-negocio/n4.jpg";

            imagen2.src="/build/img/landingPage/lp-negocio/n5.jpg";

            imagen3.src="/build/img/landingPage/lp-negocio/n6.jpg";

            clickNegocio="img3";

        } else {
            imagen.src="/build/img/landingPage/lp-negocio/n4.jpg";

            imagen2.src="/build/img/landingPage/lp-negocio/n3.jpg";

            imagen3.src="/build/img/landingPage/lp-negocio/n2.jpg";

            clickNegocio="img1";
        } 
    }
    
