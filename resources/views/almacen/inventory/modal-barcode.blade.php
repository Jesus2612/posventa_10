<!-- Modal -->
<div class="modal fade" id="barcodeModal" tabindex="-1" aria-labelledby="barcodeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Imprimir etiquetas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="get" action="/pdfbarcodeproduc">
            <div class="modal-body">
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ingresar cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0.00">
                <input type="hidden" class="form-control" id="productoId" name="productoId" placeholder="0.00">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Obtener</button>
            </div>
        </form>
    </div>
  </div>
</div>
/pdfbarcodeproduc