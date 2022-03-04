
<div class="pt-5 page-container bg-black">
        <div class="container">
            <h1 class="text-white display-1 weight-medium m-3">ADMINISTRAR PHP</h1>
        
                    <!--CONTENIDO-->
        
            <div class="recipient">
                    <div class="contenedor-menuAdmin">
                        <!-- <a href="#">Menu  <i class="fa-solid fa-bars"></i> </a> -->
                        <ul class="menuAdmin">
                            <li><a href="#"> <i class="icon_izq_admin fa-solid fa-user-gear"></i> Sobre el Cliente </a></li>
                            <li><a href="#"> <i class="icon_izq_admin fa-solid fa-boxes-stacked"></i> Historial de Factura</a></li>
                            <!-- <li><a href="#"> <i class="fa-solid fa-user"></i> Usuario</a></li> -->
                        </ul>
                    </div>
                
                <div class="mostrar-res">
                    <div class="conten-adminis">
                    <div class="content-principal container mt-20">
                        <div class="table-responsive">

                            <div id="CompraDetalle_wrapper" class=""><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="CompraDetalle_length"><label>Show <select name="CompraDetalle_length" aria-controls="CompraDetalle" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="CompraDetalle_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="CompraDetalle"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-purple table-striped table-hover w-100 table-light table-fixed dataTable no-footer" id="CompraDetalle" role="grid" aria-describedby="CompraDetalle_info" style="width: 1159px;">

                                <!--PARA PONER CON BLANCO: table table-striped table-hover table-light table-fixed w-100-->    

                                <thead class="table-dark sticky">

                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Codigo detalle: activate to sort column descending" style="width: 217px;" aria-sort="ascending">Codigo detalle</th><th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Codigo Compra: activate to sort column ascending" style="width: 231px;">Codigo Compra</th><th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Producto ID: activate to sort column ascending" style="width: 184px;">Producto ID</th><th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Cantidad: activate to sort column ascending" style="width: 144px;">Cantidad</th><th class="sorting" tabindex="0" aria-controls="CompraDetalle" rowspan="1" colspan="1" aria-label="Detalle color : activate to sort column ascending" style="width: 193px;">Detalle color </th></tr>
                                    </thead>

                                    <tbody>

                                
                            </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="CompraDetalle_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="CompraDetalle_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="CompraDetalle_previous"><a href="#" aria-controls="CompraDetalle" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="CompraDetalle" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button next disabled" id="CompraDetalle_next"><a href="#" aria-controls="CompraDetalle" data-dt-idx="2" tabindex="0">Next</a></li></ul></div></div></div></div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>


<br>

      

  <!---->     
    <div class="container">
        <section class="row pb-5">
           
                <div class="container">
                    <div class="col mx-1 mx-sm-5 pt-3 mb-1 border neontabla">
                       
                            <h2 class= "neones"><i class="fa-solid fa-user-pen"></i> Datos Personales </h2>
                                <div class="container">
                                <div class="row">
                                    <div class="col-5 my-auto mx-auto">
                                        <!--variable invisible-->
                                        <input class="p-2 neontextlanding  border-0 border bg-transparent rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="hidden" id="id">           
                                        <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" id="cli_nombre"> <br>
                                        <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="text" id="cli_apellidos" value="apellido"> <br>
                                        <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="email" id="cli_email" value="correo"> <br>
                                        <input class="p-2 neontextlanding bg-transparent border-0 border  rounded w-100 me-1 me-sm-4 my-3 d-block text-white" type="number" id="cli_telefono" value="Telefono"> <br>
      
                                    </div>   
                                </div>
                        
                    </div>
                </div>
         
        </section>
    </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</div>