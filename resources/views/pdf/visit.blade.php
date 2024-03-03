<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Report</title>
    <link rel="icon" href="{{ asset('assets/img/logo/logo.ico') }}" type="image/x-icon">


    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
            font-size: 18px;
        }

        h1 {
            color: #0066cc;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 10px;
        }

        .report-section {
            margin-bottom: 20px;
            width: 900px;
        }

        .report-section strong {
            color: #0066cc;
            margin-right: 10px;
            display: inline-block;
            width: 150px;
        }

        #printPdfButton {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            margin-left: 10px;
        }

        #printPdfButton:hover {
            background-color: #45a049;
        }

        @media print {
            #printPdfButton {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h1>Exam Report</h1>

    <div class="report-section">
        <strong>Patient Info:</strong> {{ $patientInfo }}
    </div>

    <div class="report-section">
        <strong>Age:</strong> 
        @if(isset($dateOfBirth))
            {{ \Carbon\Carbon::parse($dateOfBirth)->age }} years
        @else
            N/A
        @endif
    </div>
    

    <div class="report-section">
        <strong>Visit Date:</strong> {{ \Carbon\Carbon::parse($visitDate)->format('Y-m-d') }}
    </div>

    @if(isset($doctor))
        <div class="report-section">
            <strong>Doctor:</strong> {{ $doctor->name }}
        </div>
        <div class="report-section">
            <strong>Visit Type:</strong> {{ $doctor->speciality }}
        </div>
    @endif
    
    <div class="report-section" style="display: flex;">
        <strong style="margin-right: 100px;">Report:</strong> {{ $report }}
    </div>

    <button id="printPdfButton">Print PDF</button>

    <script>
        document.getElementById('printPdfButton').addEventListener('click', function() {
            printPdf();
        });

        function printPdf() {
            window.print();
        }
    </script>
</body>
</html>
