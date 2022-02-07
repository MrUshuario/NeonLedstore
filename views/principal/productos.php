

<body class="grid-container">

  <nav class="navbar">

  <div class="productos bg-black">

  <main class="main mb-3 mb-sm-5">

  <div class="contenedorMain container pt-1 pt-sm-5">

  <div class="row text-white d-flex justify-content-around">

  <div class="d-flex flex-column col-6 col-sm-4">

  <h1 class="title-product py-1 py-sm-3 text-start fw-bold">PRODUCTO</h1>

  <picture class="h-100 w-100 d-flex items-center">

  <source media="(min-width: 576px)" srcset="/build/img/productos/brideToBe.webp">

  <img class="img-product w-100" src="/build/img/productos/brideToBe.webp" alt="brideToBe">

  </picture>

  </div>

<div class="contenedorTexto col-6 col-sm-4 pt-5 pt-sm-3 ">

                        <h2 class="subtitulo text-center fw-bold">NEÓN DESIGN</h2>

                        <div class="h-100 d-flex align-items-center">

                        <div class="contenedorTexto col-6 col-sm-4 pt-5 pt-sm-3 ">

                        <p class="parrafo">Actualmente los diseños de neon led se han vuelto una tendencia interesante y

                        diferente para cualquier evento, negocio o para la decoración de tu habitación.

                        En NEON LED STORE realizamos paneles 100% personalizados al estilo de tu marca

                        o para lo que tu evento nececit. Recuerda que puedes cotizar cualquier diseño con

                        <span><a class="enlaceNosotros" href="/nosotros">nosotros.</a></span>

                        

  </nav>

  <aside class="sidebar">

  <article class="article1 pb-5">

  <div class="container">

  <div class="row">

  <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 text-white">

  <div class="filtros border border-light border-4 border-bottom-0 border-start-0  d-flex align-items-center fw-bold">

  Filtros

  </div>

  <div class="accordion" id="accordionPanelsStayOpenExample">

  <div class="cajaFiltroCategoria accordion-item border-bottom-0 border-start-0 border-4 border-light rounded-0 bg-black">

  <h2 class="accordion-header w-100 text-white d-flex justify-content-center items-center" id="panelsStayOpen-headingOne">

 <p>Categorías </p> 

  <button class="accordion-button collapsed filtroCategoria float-left text-start bg-black text-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">

    <select name="cbx_categoria ">

    <?php    

    $conexion=conectar();

    echo "<option value=''> -------------- </option>";

    $consulta="select * from tab_categoría ";    

    $filas=listar($conexion,$consulta);

    foreach($filas as $fila) {

    

    echo "<option value='".$fila["cat_nombre"]."'></option>";

    }

    ?>

    <script>
    if(isset($_POST["buscar"])){

    $filtros = [];

    if(isset($_POST["Categoria "]) && $_POST["Categoria"] != ''){

    }

    if (!empty($filtros)) {

    $filtros = " WHERE cat_activo ='1' " . implode(' AND ', $filtros);

    } else {

    $filtros = '';

    }

    

    $busqueda="SELECT * FROM tab_categoría " . $filtros;

    $filas=listar($conexion,$busqueda);

    foreach($filas as $fila) {

    echo "<td class='lis'>" . $fila["cat_nombre"] . "</td>";

    echo "</tr>";

    }

    echo "</table>";

    }
    <script>
    </select>
  </button>

 

  </h2>

  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">

  <div class="accordion-body">

  <ul class="categoriaList w-100 bg-black p-0 text-center">

  </ul>

  </div>

  </div>

  </div>

  <div class="cajaFiltroPrecio accordion-item border border-4 border-bottom-0 border-light border-start-0 bg-black">

  <h2 class="accordion-header w-100 text-white d-flex justify-content-center items-center" id="panelsStayOpen-headingTwo">

  Precio

  </h2>

  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">

  <div class="accordion-body">

  <div class="range bg-dark p-2">

  <div class="container mt-4">

  <input type="range" id="inputrange" class="js-range-slider" name="my_range" value="" tabindex="-1" readonly="">

  </div>

  <p class="text-center">Precio S/.140 - S/.860</p>

  <div class="row d-flex justify-content-center">

  <button id="optrange" name="btn_range" class="precio btn btn-secondary col-6">Filtrar</button>

  </div>

  </div>

  </div>

  </div>

  </div>

  

  </aside>

 

 

  <article class="main">

  

  <div class="galeria">

  <div class="contenedor-imagenes">

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div>

  <div class="imagen">

  <img src="Download/flamenco.jpeg" alt="">

  <div class="overlay">

  <h2>ver detalle </h2>

  </div>

  </div> 

  </div>

  </div>

  

  

  </article>

 

  <footer class="footer">

  <article class="article2 p-1 p-sm-5">

  

  <div class="container">

  

  <div class="row d-flex justify-content-between mx-1 mx-sm-5 pb-3">

  

  <h2 class="tituloFotos text-white mb-4">FOTOS DE PRODUCTO</h2>

  

  <div class="col-5 py-1 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/s/isThisFustFantasy.webp">

  

  <img class="w-100" src="/build/img/productos/isThisFustFantasyMovil.webp" alt="isThisFustFantasy" loading="lazy">

  

  </picture>

  

  </div>

  

  <div class="col-5 py-2 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/productos/thania.webp">

  

  <img class="w-100" src="/build/img/productos/thaniaMovil.webp" alt="thania" loading="lazy">

  

  </picture>

  

  </div>

  

  <div class="col-5 py-2 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/productos/flamenco2.webp">

  

  <img class="w-100" src="/build/img/productos/flamenco2Movil.webp" alt="flamenco2" loading="lazy">

  

  </picture>

  

  </div>

  

  <div class="col-5 py-2 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/productos/slicesOpenLate.webp">

  

  <img class="w-100" src="/build/img/productos/slicesOpenLateMovil.webp" alt="slicesOpenLate" loading="lazy">

  

  </picture>

  

  </div>

  

  <div class="col-5 py-2 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/productos/tarro.webp">

  

  <img class="w-100" src="/build/img/productos/tarroMovil.webp" alt="tarro" loading="lazy">

  

  </picture>

  

  </div>

  

  <div class="col-5 py-2 py-sm-5">

  

  <picture>

  

  <source media="(min-width: 576px)" srcset="/build/img/productos/amongus.webp">

  

  <img class="w-100" src="/build/img/productos/amongusMovil.webp" alt="amongus" loading="lazy">

  

  </picture>

  

  </div>

  

  </div>

  

  <div class="col-12 col-sm-8 px-5">

  

  <h2 class="tituloFormulario text-center text-white">Contáctanos</h2>                       

  

  <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="nombre" id="nombre" placeholder="Nombre" required>

  

  <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" name="correo" id="correo" placeholder="Correo" required>

  

  <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" name="telefono" id="telefono" pattern="[0-9]{9,12}" placeholder="N° de celular" required>

  

  <input class="p-2 input-contact border-0 border-bottom bg-black rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" name="pregunta" id="pregunta" placeholder="Mensaje" required>

  

  <button class="button-contact btn m-2 mx-auto d-block text-white border-white" name="enviar" id="enviar">Enviar</button>

  

  </div>

  

  <div class="col-12 col-sm-4 py-2 p-1 p-sm-3 border">

  

  <img class="imagenFormulario mx-auto d-block my-3" src="/build/img/productos/neonLedStore.webp" alt="introNLS" loading="lazy">

  

  </div>

  

  </footer>

</body>

</html>
