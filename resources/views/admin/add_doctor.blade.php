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
            background-color: #28a745;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .custom-alert {
            background-color: #28a745;
            color: #fff;
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
                <div class="alert alert-success custom-alert">
                    <button type="button" class="close" data-dismiss="alert"> x </button>
                    {{ session()->get('message') }}
                </div>
                @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Doctor Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="number">Phone</label>
                        <input type="number" id="number" name="number" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="speciality">Speciality</label>
                        <select id="speciality" name="speciality" required>
                            <option value="" disabled selected>--Select--</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="body">Body</option>
                        </select>
                    </div>
                
                    <div class="mb-3">
                        <label for="room">Room No</label>
                        <input type="text" id="room" name="room" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="file">Doctor Image</label>
                        <input type="file" id="file" name="file" required>
                    </div>
                
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success btn-block" style="background-color: #45CC58; width:250px;">
                    </div>
                </form>
                
            </div>
        </div>

        @include('admin.script')
    </div>
</body>

</html>
