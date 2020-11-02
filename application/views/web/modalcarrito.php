
 <input type="hidden" name="escarrito" id="escarrito" value="1" />
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="color: white; background: #1E1F29;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  style="color: white;"  aria-hidden="true" class="fa fa-times"></span>
        </button>
        <h4 style="color: white;" class="modal-title" id="myModalLabel"><i class="fa fa-cart-arrow-down"></i> Lista de Compra</h4>
      </div>
      <!--Body-->
      <div class="modal-body" style="overflow-x: auto;">
        
        <div class="col-md-12"></div>
        <table class="table table-hover">
          <thead>
            <tr style="color: white; background: #1E1F29;">
              <!--<th>#</th>-->
              
              <th style="padding-left: 0;padding-right: 0"></th>
              <th style="padding-left: 0;padding-right: 0">Producto</th>
              <th style="padding-left: 0;padding-right: 0">Precio</th>
              <th style="padding-left: 0;padding-right: 0">Cantidad</th>
              <!--<th style="padding:0;">Desc.</th>-->
              <th style="padding-left: 0;padding-right: 0">Bs.</th>
              <th style="padding-left: 0;padding-right: 0"></th>
            </tr>
          </thead>
          <tbody id="carritos">
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
          
          <div class="row">
          <div class="col-md-6">
            <?php if ($parametro[0]["parametro_modulorestaurante"]==1) { ?>
            <button class="btn btn-success btn-block"   onclick="comprobar()"> <i class="fa fa-money"></i> Finalizar Compra</button> <br>
             <?php } else { ?> 
              <button class="btn btn-success btn-block" data-dismiss="modal"  onclick="realizarcompra()"> <i class="fa fa-money"></i> Finalizar Compra</button> <br>
            <?php } ?> 
            </div>    
            <div class="col-md-6">
            <button class="btn btn-danger btn-block" data-dismiss="modal" ><i class="fa fa-cart-arrow-down"></i> Continuar Comprando</button>
            </div>         
          </div>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->