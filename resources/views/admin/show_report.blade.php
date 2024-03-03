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
    
        table {
            width: 100%;
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
    
        .qr-code-cell {
            background-color: #f0f0f0;
            width: 120px;
            padding: 25px;
        }
    
        div.center-table {
            text-align: center;
            margin-top: 30px;
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
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    
        .btn-secondary {
            color: #fff;
            background-color: #8e8e93;
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
    
        .styled-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
    
        .styled-button:hover {
            background-color: #45a049;
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
    
        .btn-secondary {
            color: #fff;
            background-color: #8e8e93;
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
    
        .btn-secondary:hover {
            background-color: #7b7b80;
        }
    </style>
    
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')

        <div class="container-fluid page-body-wrapper">
            <div class="container mx-auto text-center my-5 max-width-800">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Visit Date</th>
                        <th>Report</th>
                        <th>QRCode</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $client)
                        <tr>
                            <td>{{ $client->user->name }}</td>
                            <td>{{ $client->date ? \Carbon\Carbon::parse($client->date)->format('Y-m-d') : 'N/A' }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#reportModal{{ $client->id }}" style="background-color: #007AFF">
                                    View Report
                                </button>

                                <div class="modal fade" id="reportModal{{ $client->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="reportModalLabel{{ $client->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reportModalLabel{{ $client->id }}">Report
                                                    - {{ $client->user->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $client->report }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="qr-code-cell">
                                {!! DNS2D::getBarcodeHTML(URL::to("/visit/{$client->id}"), 'QRCODE', 3, 3, 'black', true) !!}
                            </td>
                            <td>
                                <a href="{{ route('visit.show', ['visitId' => $client->id]) }}" target="_blank">
                                    <button class="styled-button">Open Visit</button>
                                </a>
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
