<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalExample" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalExample">Add New Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="request-form" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('amount') is-invalid @enderror" placeholder="Amounts" name="amount" value="{{ old('amount') }}">
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Amount Eur</label>
                            <input type="number" step="0.1" class="form-control form-control-user @error('amount_eur') is-invalid @enderror" placeholder="Amount Eur" name="amount_eur" value="{{ old('amount_eur') }}">
                        </div>
                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Date</label>
                            <input type="date" class="form-control form-control-user @error('date') is-invalid @enderror" placeholder="Date" name="date" value="{{ old('date') }}">
                        </div>


                        <div class="col-12 mb-3">
                            <span style="color:red;">*</span>Operacion Type
                            <select class="form-control form-control-user " name="operacion_type" required>
                                <option value="0">Out</option>
                                <option value="1">In </option>
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
                    <button type="submit" class="btn btn-success btn-user float-right mb-3" id="form_submit"> Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
   $('#form_submit').submit(function(event){
      event.preventDefault();
      alert('test');
//    $.ajax({
    //   type:"post",
    
//       dataType="json",
//       data:$('#request-form').serialize(),
//       success: function(data){
//          alert("Data Save: " + data);
//       }
//       error: function(data){
//          alert("Error")
//       }
//    });
   });
</script>