<!DOCTYPE html>
<html>
<head>
    <style>
        .email-body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
            padding: 50px;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="email-body">
    <h1>New Rental Booking Notification</h1>
    <p>Hello Admin,</p>
    <p>A new rental booking has been made. Here are the details of the booking:</p>
    <table class="table">
        <thead>
        <tr>
            <th>Item</th>
            <th>Details</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Booking ID</td>
            <td>{{ $rental->rental_uid }}</td>
        </tr>
        <tr>
            <td>User Name</td>
            <td>{{ $rental->user->name }}</td>
        </tr>
        <tr>
            <td>Car Model</td>
            <td>{{ $rental->car->model }}</td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td>{{$rental->start_date }}</td>
        </tr>
        <tr>
            <td>End Date</td>
            <td>{{ $rental->end_date }}</td>
        </tr>
        <tr>
            <td>Total Cost</td>
            <td>${{ number_format($rental->total_cost, 2) }}</td>
        </tr>
        </tbody>
    </table>
    <p>If you have any questions or need to make changes to your booking, please contact us at <a href="mailto:support@example.com">support@example.com</a>.</p>
    <a href="https://www.example.com/user/bookings" class="button">View Booking</a>

    <p>Thank you for your trust in us.</p>
    <p>Best Regards,<br>{{ config('app.name') }}</p>
</div>
</body>
</html>
