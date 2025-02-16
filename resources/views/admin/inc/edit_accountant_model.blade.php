<!-- Edit Modal -->
<div class="modal fade" id="editAccountant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" style="width: 75%">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="padding: 0 29%;">Edit Accountant</h4>
      </div>
	  <form id="updateAccountent" >
      <div class="modal-body">
      <div class="row">
	  @csrf
	  <!-- <input type="" id="id_acc" name="id_acc" value="{{$accountant->id}}"> -->

		<div class=" col-lg-6 col-sm-12  form-group">
			<label for="name" class="col-form-label">Name:</label>
			<input type="text" class="form-control allC" data-id="{{$accountant->id}}" id="name" name="name" value="{{$accountant->name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="nameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="address" class="col-form-label">Address:</label>
			<input type="text" class="form-control allC" id="address" name="address" value="{{$accountant->address}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="addressError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="username" class="col-form-label">User Name:</label>
			<input type="text" class="form-control allC" id="username" name="username" value="{{$accountant->username}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="usernameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="email" class="col-form-label">Enail:</label>
			<input type="email" class="form-control allC" id="email" name="email" value="{{$accountant->email}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="emailError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="phone" class="col-form-label">Phone:</label>
			<input type="number" class="form-control allC" id="phone" name="phone" value="{{$accountant->phone}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="phoneError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="bank_name" class="col-form-label ">Bank Name:</label>
			<input type="text" class="form-control allC" id="bank_name" name="bank_name" value="{{$accountant->bank_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="bank_nameError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="iban_name" class="col-form-label">Iban Name:</label>
			<input type="text" class="form-control allC" id="iban_name" name="iban_name" value="{{$accountant->iban_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="iban_nameError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="iban" class="col-form-label">Iban:</label>
			<input type="number" class="form-control allC" id="iban" name="iban" value="{{$accountant->iban}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="ibanError" class="allE"></strong>
			</div>
		</div>


      </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
          <button class="btn " type="reset">Reset</button>
           <button class="btn btn-primary" type="submit">Save changes</button>
    </div>
	</div>
  </div>
  </form>
</div>
</div>
</div>
