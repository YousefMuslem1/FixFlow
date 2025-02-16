<div class="modal fade" id="paymentModal" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="makePay">
                    @csrf
                    <div class="form-group">
                        <label for="moneyAmount" class="col-form-label">Money Amount : <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="moneyAmount" name="amount" placeholder="4000">
                        <p class="text-danger" id="errorAmount"></p>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Notes:</label>
                        <textarea class="form-control" id="message-text" name="notes" placeholder="Please in a hurry!"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password : <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password">
                        <p class="text-danger" id="errorPassword"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send a Payment</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
