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
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            color: #333;
        }
    
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }
    
        th {
            background-color: #122131;
            color: #fff;
        }
    
        th:nth-child(5), td:nth-child(5) {
            min-width: 125px;
        }

        th:nth-child(8), td:nth-child(8) {
            min-width: 120px;
        }
    
        tr:hover {
            background-color: #4a80b7;
        }
    
        div.center-table {
            text-align: center;
            margin-top: 30px;
        }
    
        .btn-primary, .btn-secondary, .styled-button {
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
    
        .btn-primary:hover {
            background-color: #0056b3;
        }
    
        .btn-secondary {
            background-color: #8e8e93;
        }
    
        .btn-secondary:hover {
            background-color: #757579;
        }
    
        .styled-button {
            background-color: #4CAF50;
        }
    
        .styled-button:hover {
            background-color: #45a049;
        }
    
        .text-danger {
            color: #ff0000;
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Last Exam</th>
                        <th>Days Left</th>
                        <th>Send Email</th>
                        <th>Email Sent</th>
                    </tr>

                    @foreach ($data as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->address}}</td>
                            <td>{{($client->last_exam)}}</td>
                            <td>
                                @if ($client->last_exam)
                                    @php
                                        $daysLeft = \Carbon\Carbon::now()->diffInDays($client->last_exam);
                                        $countdown = max(0, 60 - $daysLeft);
                                    @endphp
                                    <span class="{{ $countdown <= 3 ? 'text-danger' : '' }}">{{ $countdown }}</span>
                                    @if ($countdown <= 3 && !$client->email_sent)
                                        <td>
                                            <form method="POST" action="{{ route('send-visit-reminder-email', ['userId' => $client->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="background-color: #007AFF">Send Email</button>
                                            </form>
                                        </td>
                                        <td>
                                            @if  ($client->email_sent_date) 
                                                Email Sent: {{ \Carbon\Carbon::parse($client->email_sent_date)->toDateString() }} 
                                            @else
                                            Email to be sent!
                                                
                                            @endif
                                        </td>
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
                                @else
                                    N/A
                                    <td></td>
                                    <td></td>
                                @endif
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
