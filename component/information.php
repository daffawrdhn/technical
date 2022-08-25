
<div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Order Information</h1>
        <p class="col-md-8 fs-4">Please complete your order information below</p>
        <div class="row">

        <form class="row g-3 needs-validation" method="GET" action="" novalidate>

            <input type="hidden" name="aksi" value="order" class="form-control">
            <input type="hidden" name="halaman"  value="cart" class="form-control">

            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">First name</label>
                <input type="text" class="form-control" name="namadepan" id="validationCustom01" value="<?php echo $_SESSION['namadepan']; ?>" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Middle name</label>
                <input type="text" class="form-control" name="namatengah" id="validationCustom02" value="<?php echo $_SESSION['namatengah']; ?>" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Last name</label>
                <input type="text" class="form-control" name="namabelakang" id="validationCustom03" value="<?php echo $_SESSION['namabelakang']; ?>" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Address Line 1</label>
                <input type="text" class="form-control" name="address1" id="validationCustom04" value="" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" name="address2" id="validationCustom04" value="" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>

            
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="validationCustom06" required>
                <div class="invalid-feedback">
                Please provide a valid city.
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom07" class="form-label">Province</label>
                <input type="text" class="form-control" name="state" id="validationCustom07" required>
                <div class="invalid-feedback">
                Please provide a valid state.
                </div>
            </div>

            <div class="col-md-3">
                <label for="validationCustom08" class="form-label">Zip</label>
                <input type="text" class="form-control" name="zip" id="validationCustom08" required>
                <div class="invalid-feedback">
                Please provide a valid zip.
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
                </div>
            </div>
            <div class="col-12">

            <?php
            if(empty($_SESSION['keranjang_belanja'])) {  ?>

            <button class="btn btn-lg btn-outline-dark" type="submit" disabled>Order</button>

                <?php } else { ?>
            
            <button class="btn btn-lg btn-outline-dark" type="submit">Order</button>
            
                <?php } ?>
            </div>
        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
        </script>

        </div>
      </div>
    </div>
    