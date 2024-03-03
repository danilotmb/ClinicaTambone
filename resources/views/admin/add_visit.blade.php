<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    @include('admin.css')

    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
            font-size: 16px;
        }

        h1 {
            color: #007AFF;
            border-bottom: 2px solid #007AFF;
            padding-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        select, input, textarea {
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="date"] {
            color: #333;
        }

        .btn-success {
            color: #fff;
            background-color: #4CD964;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            background-color: #45CC58;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="container mx-auto text-center my-5 max-width-500">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert"> × </button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <form action="{{ url('upload_visit') }}" method="POST" enctype="multipart/form-data"
                    class="shadow p-4 rounded">
                    @csrf
                    <label for="user_id">Select Patient</label>
                    <select id="user_id" name="user_id" required>
                        <option value="" disabled selected>--Select--</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" data-dob="{{ $patient->date_of_birth }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>

                    <label for="patient_dob">Date of Birth</label>
                    <input type="date" id="patient_dob" name="patient_dob" readonly>
                
                    <label for="doctor_id">Select the Doctor</label>
                    <select id="doctor_id" name="doctor_id" required>
                        <option value="" disabled selected>--Select--</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>

                    <label for="date">Exame Date</label>
                    <input type="date" id="date" name="date" required>

                    <label for="report">Report</label>
                    <textarea id="report" name="report" required></textarea>

                    <button type="submit" class="btn btn-success"
                        style="background-color: #45CC58;">Save Exam</button>
                </form>
            </div>
        </div>

        @include('admin.script')
    </div>
</body>
<script>
    document.getElementById('user_id').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var patientDob = selectedOption.getAttribute('data-dob');
        document.getElementById('patient_dob').value = patientDob;
    });
</script>
</html>
