<!------------------------- INICIO BUSCADOR-------------------------------------->
 
 <div class="w3agile-ftr-top"  style="background-color: #081066; color:white;">
		<div class="ftr-toprow" class="container">
                 <br>   
			<div class="ftr-toprow">

                                    <center>
                                        
                                <div class="container">


                                       


                                        <div class="col-md-4">

                                            <div class="input-group input-group-lg">

                                                <select onchange="buscar_por_categoria(this.value)" name="select_categoria" id="select_categoria" class="form-control" autocomplete="off" >
                                                    <option value="0" selected>BUSCAR POR CATEGORIAS</option>
                                                
                                                    <?php 
                                                        foreach($categorias as $cat){?>    
                                                             <option value="<?php echo $cat['categoria_id']; ?>"><img src=""><?php echo $cat['categoria_nombre']; ?></option>
                                                    
                                                    <?php } ?>  
                                                </select>
                                                
                                            <span class="input-group-btn">
                                            <button class="btn btn-danger" onclick="buscar_producto()" type="button"><span class="glyphicon glyphicon-th-large" aria-hidden="true">
                                            </span> </button>
                                            </span>
                                            </div>

                                        </div>


                                        <div class="col-md-4">

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
                                        <div class="col-md-4">

                                            <div class="input-group input-group-lg">
                                            <input type="text" onkeypress="buscarpro(event)" name="parabuscar" id="parabuscar" class="form-control" placeholder="BUSCAR PRODUCTO" required autocomplete="off" >
                                            <span class="input-group-btn">
                                            <button class="btn btn-danger" onclick="buscar_producto()" type="button" id="boton_buscar_prod">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                                            </button>
                                            </span>
                                            </div>

                                        </div>

                                        </div>      
                                        
                                        
                                    </center>
    
			</div>
		</div>
     <br>
    </div>
 <!--------------------------- FIN BUSCADOR------------------------------------> 
     <div class="top-brands" style="padding-top: 20px;padding-bottom: 20px;">
        <!------------------------ BUSCADOR --------------------------->         
                <h2 class="w3_agile_vimeo">PRODUCTOS</h2>

            
            <div class="row" id='loader'  style='display:none; text-align: center'>
                <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
            </div>
                       
        <div class="container">
        

<!------------------------ BUSCADOR --------------------------->                    
            
            <br><br>
            <div id="tablaresultados"></div>
            
    </div>
        
        
        
        <div class="container">
            
            
            <br>

        
        </div>
    </div>