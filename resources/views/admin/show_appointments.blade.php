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
            text-align: left;
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

        .btn-success, .btn-danger {
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

        .btn-success {
            background-color: #4CAF50;
        }

        .btn-danger {
            background-color: #FF5349;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-danger:hover {
            background-color: #CC2C23;
        }

        .modal-content {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
    
        .modal-header {
            background-color: #007AFF;
            color: #fff;
            border-bottom: 1px solid #ddd;
        }
    
        .modal-title {
            color: #fff;
        }
    
        .modal-body {
            color: #333;
        }
    
        .modal-footer {
            border-top: 1px solid #ddd;
        }
    
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="container mx-auto text-center my-5 max-width-500">
                <table>
                    <tr>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Approve</th>
                        <th>Cancel</th>
                    </tr>

                    @foreach ($data as $appoint)
                        <tr>
                            <td>{{$appoint->name}}</td>
                            <td>{{$appoint->email}}</td>
                            <td>{{$appoint->phone}}</td>
                            <td>{{$appoint->doctor}}</td>
                            <td>{{$appoint->date}}</td>
                            
                            <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#messageModal{{ $appoint->id }}" style="background-color: #007AFF">
                                        View Message
                                    </button>
                                
                                    <div class="modal fade" id="messageModal{{ $appoint->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel{{ $appoint->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="messageModalLabel{{ $appoint->id }}">Message - {{ optional($appoint->user)->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $appoint->message }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <td>{{$appoint->status}}</td>
                            <td><a href="{{url('approved', $appoint->id)}}" class="btn btn-success">Approve</a></td>
                            <td><a href="{{url('canceled', $appoint->id)}}" class="btn btn-danger">Cancel</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @include('admin.script')
    </div>
</body>

</html>
