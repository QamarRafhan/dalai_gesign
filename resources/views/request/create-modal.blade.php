<div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Add New Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="user-delete-form" method="POST" action="{{route('requests.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 mb-3">

                            <input class="request_type" type="hidden" name='operation_type' value="{{ old('operation_type') }}" required>

                            <span style="color:red;">*</span>Amount</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Amount" name="amount" value="{{ old('amount') }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount Eur</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Amount Eur" name="amount_eur" value="{{ old('amount_eur') }}" required>
                        </div>

                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Fund
                            <select class="form-control form-control-user " name="ID_fund" required>
                                @foreach ($funds as $fund)
                                <option value="{{$fund->id}}">{{$fund->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button data-dismiss="modal" aria-label="Close" class="btn btn-primary float-right mr-3 mb-3">Cancel</button>
                    <button type="submit" class="btn btn-success btn-user float-right mb-3"> Save</button>

                </div>
            </form>
        </div>
    </div>
</div>