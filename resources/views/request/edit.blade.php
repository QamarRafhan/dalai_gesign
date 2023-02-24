<form id="update-request-form" method="POST" action="{{route('requests.update', ['request'=>$request])}}">
    @csrf
    @method('put')
    <div class="modal-body">
        <div class="form-group row">
            <div class="col-12 mb-3">
                <span style="color:red;">*</span>Amount</label>
                <input type="number" step="0.1" class="form-control form-control-user @error('amount') is-invalid @enderror" placeholder="Amount" name="amount" value="{{ old('amount', $request->amount) }}" required>
            </div>
            <div class="col-12 mb-3">
                <span style="color:red;">*</span>Amount Eur</label>
                <input type="number" step="0.1" class="form-control form-control-user @error('amount_eur') is-invalid @enderror" placeholder="Amount Eur" name="amount_eur" value="{{ old('amount_eur', $request->amount_eur) }}" required>
            </div>

            <div class="col-12 mb-3">
                <span style="color:red;">*</span>Fund
                <select class="form-control form-control-user " name="ID_fund" required>
                    @foreach ($funds as $fund)
                    <option value="{{$fund->id}}" {{$request->ID_fund==$fund->id? 'selected' : ''}}>{{$fund->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 mb-3">
                <span style="color:red;">*</span>Status
                <select class="form-control form-control-user " name="status" required>
                    <option value=0 {{$request->status==0? 'selected' : ''}}>Requested</option>
                    <option value=1 {{$request->status==1? 'selected' : ''}}>Accepted</option>
                    <option value=2 {{$request->status==2? 'selected' : ''}}>Completed</option>

                </select>
            </div>

        </div>
    </div>
    <div class="modal-footer">

        <button data-dismiss="modal" aria-label="Close" class="btn btn-primary float-right mr-3 mb-3">Cancel</button>
        <button type="submit" class="btn btn-success btn-user float-right mb-3"> Update</button>

    </div>
</form>