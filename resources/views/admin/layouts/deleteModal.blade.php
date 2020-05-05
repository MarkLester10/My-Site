<form id="dynamicForm" action="" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center" id="exampleModalLabel "><ion-icon name="help-circle-outline" class="text-xl"></ion-icon> Confirmation to Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-dark">
                    <h6 class="alert-heading d-flex align-items-center text-warning"><ion-icon name="information-circle-outline" class="text-lg text-info"></ion-icon> You're about to delete an item</h6>
                    <p class="mb-0">Are you sure you want to permanently delete this?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes! Delete</button>
            </div>
        </div>
    </div>
</div>
</form>
