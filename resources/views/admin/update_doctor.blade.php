<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <base href="/public">
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
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        select,
        input,
        textarea {
            padding: 12px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
            color: #333;
        }

        input[type="date"] {
            color: #333;
        }

        .btn-primary {
            color: #fff;
            background-color: #007AFF;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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

                <form action="{{ url('edit_doctor', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="shadow p-4 rounded">
                  @csrf
                    <div class="mb-3">
                        <label for="name">Doctor Name</label>
                        <input type="text" id="name" name="name" value="{{$data->name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="number">Phone</label>
                        <input type="number" id="number" name="phone" value="{{$data->phone}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="speciality">Speciality</label>
                        <select id="speciality" name="speciality" required>
                            <option value="" disabled>--Select--</option>
                            <option value="skin" {{ $data->speciality == 'skin' ? 'selected' : '' }}>Skin</option>
                            <option value="heart" {{ $data->speciality == 'heart' ? 'selected' : '' }}>Heart</option>
                            <option value="eye" {{ $data->speciality == 'eye' ? 'selected' : '' }}>Eye</option>
                            <option value="body" {{ $data->speciality == 'body' ? 'selected' : '' }}>Body</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="room">Room No</label>
                        <input type="text" id="room" name="room" value="{{$data->room}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="file">Doctor Image</label>
                        <img height="100" width="100" src="doctor_image/{{$data->image}}" alt="Old Image">
                        <input type="file" id="file" name="file">
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" style="background-color: #0056b3">
                    </div>
                </form>
                

            </div>
        </div>

        @include('admin.script')
    </div>
</body>

</html>
