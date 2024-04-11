<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title">Hotel Registration Form</h3>
        </div>
        <div class="card-body">
          <form>
            <div class="mb-3">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label for="checkInDate" class="form-label">Email</label>
                <input type="email" class="form-control" id="checkintDate" name="email" required>
              </div>
              <div class="col">
                <label for="checkOutDate" class="form-label">Phone</label>
                <input type="phone" class="form-control" id="checkOutDate" name="phone" required>
              </div>
            </div>
            <!-- <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" required>
            </div> -->
            <div class="row mb-3">
              <div class="col">
                <label for="checkInDate" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="checkInDate" required>
              </div>
              <div class="col">
                <label for="checkOutDate" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="checkOutDate" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="roomType" class="form-label">Room Type</label>
              <select class="form-select" id="roomType" required>
                <option value="">Select Room Type</option>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="specialRequests" class="form-label">Special Requests</label>
              <textarea class="form-control" id="specialRequests" rows="3" placeholder="Enter any special requests"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


    
<?php
    $a=10;
    $a%2==0?print "even number":print "odd nu";
?>