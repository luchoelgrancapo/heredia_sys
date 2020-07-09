        <!-- NAVIGATION -->
        <nav id="navigation">
            <!-- container -->
            <div class="container">
                <!-- responsive-nav -->
                
                    <div class="col-md-12">
                            <div class="header-search">
                                <form action="javascript:void(0);">
                                    <select onchange="buscar_por_categoria(this.value)" name="select_categoria" id="select_categoria" class="input-select" autocomplete="off" >
                                        <option value="0" selected>BUSCAR POR CATEGORIAS</option>
                                                
                                                    <?php 
                                                        foreach($categorias as $cat){?>    
                                                             <option value="<?php echo $cat['categoria_id']; ?>"><img src=""><?php echo $cat['categoria_nombre']; ?></option>
                                                    
                                                    <?php } ?>  
                                    </select>
                                    <input class="input" onkeypress="buscarpro(event)" name="parabuscar" id="parabuscar" placeholder="BUSCAR PRODUCTO" required autocomplete="off">
                                    <button class="search-btn" onclick="buscar_producto()"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                
                <!-- /responsive-nav -->
            </div>
            <!-- /container -->
        </nav>
        <!-- /NAVIGATION -->

<!------------------------- INICIO BUSCADOR-------------------------------------->
 
 



                                        <div class="col-md-4" hidden="">

                                            <div class="input-group input-group-lg">

                                                <select onchange="buscar_por_subcategoria(this.value)" name="select_subcategoria" id="select_subcategoria" class="form-control lg" autocomplete="off" >
                                                    <option value="0" selected> TODAS SUB CATEGORIAS</option>
                                                </select>
                                            <span class="input-group-btn">
                                            <button class="btn btn-danger" onclick="buscar_producto()" type="button"><span class="glyphicon glyphicon-th" aria-hidden="true">
                                            </span> </button>
                                            </span>
                                            </div>

                                        </div>
    <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                <div class="section-title">
                            <h3 class="title">PRODUCTOS</h3>
                            <div class="section-nav">
                                <div id="slick-nav-3" class="products-slick-nav"></div>
                            </div>
                        </div>                                    
   

            
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
            </div>
            <div class="row" id="tablaresultados"></div>
</div>
</div>
</div>