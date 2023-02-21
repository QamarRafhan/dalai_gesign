<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Add New Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="user-delete-form" method="POST" action="{{route('funds.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Amounts" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount Eur</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Amount Eur" name="amount_eur" value="{{ old('name') }}">
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount</label>
                            <input type="date" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Date" name="date" value="{{ old('date') }}">
                        </div>


                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Fund
                            <select class="form-control form-control-user " name="status" required>
                                <option value="0">Requested</option>
                                <option value="1">Accepted</option>
                                <option value="2">Completed</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>User
                            <select class="form-control form-control-user " name="status" required>
                                <option value="0">Requested</option>
                                <option value="1">Accepted</option>
                                <option value="2">Completed</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Status
                            <select class="form-control form-control-user " name="status" required>
                                <option value="0">Requested</option>
                                <option value="1">Accepted</option>
                                <option value="2">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-primary float-right mr-3 mb-3">Cancel</button>
                    <button type="submit" class="btn btn-success btn-user float-right mb-3"> Save</button>

                </div>
            </form>
        </div>
    </div>
</div>