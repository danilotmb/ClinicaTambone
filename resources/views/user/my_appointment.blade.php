<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Rossi</title>
    <link rel="icon" href="{{ asset('assets/img/logo/logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/maicons.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
    <link rel="stylesheet" href="../assets/css/theme.css">

    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            color: #333;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #122131;
            color: #fff;
        }

        tr:hover {
            background-color: #4a80b7;
        }

        div.center-table {
            text-align: center;
            margin-top: 30px;
        }

        .btn-danger {
            color: #fff;
            background-color: #FF5349;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-danger:hover {
            background-color: #CC2C23;
        }
    </style>
</head>

<body>

<!-- Back to top button -->
<div class="back-to-top"></div>

@include('user.navbar')

<div class="center-table">
    <table>
        <tr>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Message</th>
            <th>Status</th>
            <th>Cancel Appointment</th>
        </tr>

        @foreach ($appoint as $appoints)
        <tr>
            <td>{{$appoints->doctor}}</td>
            <td>{{$appoints->date}}</td>
            <td>{{$appoints->message}}</td>
            <td>{{$appoints->status}}</td>
            <td><a href="{{url('cancel_appoint', $appoints->id)}}" class="btn btn-danger" 
                onclick="return confirm('Do you confirm the cancellation of the appointment? (Press Ok to proceed)')">Cancel</a></td>
        </tr>
        @endforeach
       
    </table>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>

</body>

</html>
