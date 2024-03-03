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

        .btn-primary, .btn-danger {
            color: #fff;
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

        .btn-primary {
            background-color: #007AFF;
        }

        .btn-danger {
            background-color: #FF3B30;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger:hover {
            background-color: #CC2C23;
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
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Speciality</th>
                        <th>Room</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($data as $doctor)
                        <tr>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->speciality}}</td>
                            <td>{{$doctor->room}}</td>
                            <td>
                                <a href="{{url('updated', $doctor->id)}}" class="btn btn-primary">Update</a>
                            </td>
                            <td>
                                <a href="{{url('deleted', $doctor->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Do you confirm the cancellation of the doctor? (Press Ok to proceed)')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @include('admin.script')
    </div>
</body>

</html>
