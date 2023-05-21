<!DOCTYPE html>
<html>
<head>
  <title>Form Submissions Report</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom styles */

    /* Set table width to 100% and remove border-spacing */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    /* Add some padding and align left for table cells */
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <div class="container">
    
      <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <h1>Form Submissions Report</h1>
        </div>
        <div class="col-md-6">
          <a href="index.php?action=submit" class="btn btn-primary float-md-right mt-3">Add Submission</a>
        </div>
      </div>
    </div>
  </div>
    <form id="filterForm">
      <div class="form-row">
        <div class="col-md-3">
          <label for="startDate">Start Date:</label>
          <input type="date" id="startDate" name="startDate" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="endDate">End Date:</label>
          <input type="date" id="endDate" name="endDate" class="form-control">
        </div>
        <div class="col-md-3">
          <label for="userId">User ID:</label>
          <input type="text" id="userId" name="userId" class="form-control">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary" style="margin-top: 30.5px;">Filter</button>
        </div>
      </div>
    </form>

    <table id="submissionsTable" class="table">
      <thead>
        <tr>
          <th>Submission ID</th>
          <th>Buyer</th>
          <th>Phone</th>
          <th>Submission Date</th>
          <!-- Add more columns for other submission data -->
        </tr>
      </thead>
      <tbody>
        <!-- Submissions data will be dynamically added here -->
      </tbody>
    </table>
  </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Handle form submission for filtering
      $('#filterForm').submit(function(event) {
        event.preventDefault();

        // Get filter values
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var userId = $('#userId').val();

        // Perform AJAX request to retrieve filtered submissions
        $.ajax({
          url: 'get_submissions.php',
          type: 'GET',
          data: {
            startDate: startDate,
            endDate: endDate,
            userId: userId
          },
          dataType: 'json',
          success: function(response) {
            // Update table with filtered submissions
            var tableBody = $('#submissionsTable tbody');
            tableBody.empty();

            $.each(response, function(index, submission) {
              var row = $('<tr>');
              row.append($('<td>').text(submission.id));
              row.append($('<td>').text(submission.userId));
              row.append($('<td>').text(submission.phone));
              row.append($('<td>').text(submission.entry_at));
              // row.append($('<td>').text(submission.submissionDate));
              // Add more columns for other submission data

              tableBody.append(row);
            });
          },
          error: function(xhr, status, error) {
            console.log('Error occurred while fetching submissions. Please try again.');
          }
        });
      });
    });
  </script>


</body>
</html>
