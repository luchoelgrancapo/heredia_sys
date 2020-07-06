
 <input type="hidden" name="escarrito" id="escarrito" value="1" />
<!-- Modal: modalCart -->
<div class="modal fade" id="modalCart" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header" style="color: white; background: #081066;padding:3px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  aria-hidden="true" class="fa fa-times"></span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cart-arrow-down"></i> Lista de Compra</h4>
      </div>
      <!--Body-->
      <div class="modal-body" style="overflow-x: auto;">
        
        <div class="col-md-12"></div>
        <table class="table table-hover" style="font-size: 12px;">
          <thead>
            <tr style="color: white; background: #333333; padding: 0;">
              <!--<th>#</th>-->
              
              <th style="padding:0; text-align: center;">Producto</th>
              <th style="padding:0; text-align: center;">Precio</th>
              <th style="padding:0; text-align: center;">Cantidad</th>
              <!--<th style="padding:0;">Desc.</th>-->
              <th style="padding:0; text-align: center;">Bs.</th>
              <th style="padding:0;"></th>
            </tr>
          </thead>
          <tbody id="carritos">
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
          
          <center>
            <button class="btn btn-success" data-dismiss="modal" onclick="realizarcompra()" ><i class="fa fa-money"></i> Finalizar Compra</button>     
            <button class="btn btn-primary" data-dismiss="modal" ><i class="fa fa-cart-arrow-down"></i> Continuar</button>
                     
          </center>
          
      </div>
    </div>
  </div>
</div>
<!-- Modal: modalCart -->