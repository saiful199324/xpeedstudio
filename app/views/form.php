<!DOCTYPE html>
<html>
<head>
  <title>Submission Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <h1>Add Submissions</h1>
          </div>
          <div class="col-md-6">
            <!-- Convert the link to a button -->
            <a href="index.php?action=report" class="btn btn-primary float-md-right mt-3">View Report</a>
          </div>
        </div>
      </div>
    </div>
    <form id="submissionForm">

      <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" required>
        <span class="error-msg" id="amount-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="buyer">Buyer:</label>
        <input type="text" class="form-control" name="buyer" id="buyer" required>
        <span class="error-msg" id="buyer-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="receipt_id">Receipt ID:</label>
        <input type="text" class="form-control" name="receipt_id" id="receipt_id" required>
        <span class="error-msg" id="receipt_id-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="items">Items:</label>
        <textarea class="form-control" name="items" id="items" required></textarea>
        <span class="error-msg" id="items-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="buyer_email">Buyer Email:</label>
        <input type="email" class="form-control" name="buyer_email" id="buyer_email" required>
        <span class="error-msg" id="buyer_email-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="note">Note:</label>
        <textarea class="form-control" name="note" id="note" required></textarea>
        <span class="error-msg" id="note-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <input type="text" class="form-control" name="city" id="city" required>
        <span class="error-msg" id="city-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" id="phone" required>
        <span class="error-msg" id="phone-error"></span> <!-- Error message placeholder -->
      </div>

      <div class="form-group">
        <label for="entry_by">Entry By:</label>
        <input type="number" class="form-control" name="entry_by" id="entry_by" required>
        <span class="error-msg" id="entry_by-error"></span> <!-- Error message placeholder -->
      </div>

      <!-- Add hidden input field for formattedPhone -->
      <input type="hidden" name="formattedPhone" id="formattedPhone">

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
  </div>

   <script>
  $(document).ready(function () {
    $("#submissionForm").submit(function (event) {
      event.preventDefault();

      // Clear previous error messages
      $(".error-msg").text("");

      // Frontend validation
      var amount = $("#amount").val();
      var buyer = $("#buyer").val();
      var receipt_id = $("#receipt_id").val();
      var items = $("#items").val();
      var buyer_email = $("#buyer_email").val();
      var note = $("#note").val();
      var city = $("#city").val();
      var phone = $("#phone").val();
      var formattedPhone = "88" + phone;
      var entry_by = $("#entry_by").val();

      // Validation rules
      var amountRegex = /^\d+$/;
      var buyerRegex = /^[A-Za-z0-9\s]{1,20}$/;
      var receiptIdRegex = /^[A-Za-z0-9]+$/;
      var emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
      var noteWordCount = note.trim().split(/\s+/).length;
      var cityRegex = /^[A-Za-z\s]{1,20}$/;
      var phoneRegex = /^\d{13}$/;
      var entryByRegex = /^\d{1,10}$/;

      // Perform validation
      if (!amount.match(amountRegex)) {
        alert("Please enter a valid amount (numbers only).");
        return false;
      }

      if (!buyer.match(buyerRegex)) {
        alert("Please enter a valid buyer name (up to 20 alphanumeric characters and spaces).");
        return false;
      }

      if (!receipt_id.match(receiptIdRegex)) {
        alert("Please enter a valid receipt ID (alphanumeric characters only).");
        return false;
      }

      if (items.trim().length === 0) {
        alert("Please enter at least one item.");
        return false;
      }

      if (!buyer_email.match(emailRegex)) {
        alert("Please enter a valid buyer email.");
        return false;
      }

      if (noteWordCount > 30) {
        alert("The note can have a maximum of 30 words.");
        return false;
      }

      if (!city.match(cityRegex)) {
        alert("Please enter a valid city name.");
        return false;
      }

      if (!formattedPhone.match(phoneRegex)) {
        alert("Please enter a valid phone number (11 digits).");
        return false;
      }

      if (!entry_by.match(entryByRegex)) {
        alert("Please enter a valid entry by (numbers only).");
        return false;
      }

      var phone = $("#phone").val();
      var formattedPhone = "88" + phone;
      $("#formattedPhone").val(formattedPhone);

      // AJAX submission
      $.ajax({
        url: "index.php?action=submit", // Replace with your backend URL
        method: "POST",
        data: $(this).serialize(),
        success: function (response) {
          // Handle success response
          console.log(response);
          alert("Form submitted successfully!");
          // Reset the form
          $("#submissionForm")[0].reset();
        },
        error: function (xhr, status, error) {
           // Handle error response
          console.log(xhr.responseText);
          alert("Error occurred while submitting the form. Please try again.");
          
          // Display backend validation errors
          var errors = xhr.responseJSON;
          if (errors) {
            $.each(errors, function (field, message) {
              $("#" + field).next(".error-msg").text(message);
            });
          }
        }
      });
    });
  });
</script>
</body>
</html>
