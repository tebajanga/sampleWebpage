<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editProductModal"><strong>Editing Product</strong></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form>
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="ep_name" placeholder="Product Name" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Quantity in Stock</label>
            <input type="number" class="form-control" id="ep_quantity" placeholder="Quantity in Stock" min="0" required>
          </div>
          <div class="mb-3">
            <label for="code" class="form-label">Price per Item</label>
            <input type="number" class="form-control" id="ep_price" placeholder="Price per Item" min="0" required>
          </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" class="form-control" id="ep_index">
            <button type="submit" id="updateproduct" class="btn btn-primary">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>