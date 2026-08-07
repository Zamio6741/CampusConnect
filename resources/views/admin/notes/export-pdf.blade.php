<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>CampusConnect Notes Report</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            color: #1f2937;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #0f172a;
            color: white;
            padding: 7px;
            border: 1px solid #cbd5e1;
            text-align: left;
        }

        td {
            padding: 6px;
            border: 1px solid #cbd5e1;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }

        .approved {
            color: #15803d;
            font-weight: bold;
        }

        .pending {
            color: #ca8a04;
            font-weight: bold;
        }

        .rejected {
            color: #dc2626;
            font-weight: bold;
        }

        .premium {
            color: #7e22ce;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            color: #6b7280;
        }

    </style>

</head>

<body>

    <h1>CampusConnect Notes Report</h1>

    <div class="subtitle">
        Academic Notes Management Report
    </div>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Uploader</th>
                <th>University</th>
                <th>Unit</th>
                <th>Type</th>
                <th>Downloads</th>
                <th>Status</th>
                <th>Uploaded</th>
            </tr>

        </thead>

        <tbody>

            @foreach($notes as $note)

                <tr>

                    <td>
                        {{ $note->id }}
                    </td>

                    <td>
                        {{ $note->title }}
                    </td>

                    <td>
                        {{ $note->user?->name ?? '-' }}
                    </td>

                    <td>
                        {{ $note->university?->name ?? '-' }}
                    </td>

                    <td>
                        {{ $note->unit?->name ?? '-' }}
                    </td>

                    <td>

                        @if($note->is_premium)

                            <span class="premium">
                                Premium
                            </span>

                        @else

                            Free

                        @endif

                    </td>

                    <td>
                        {{ number_format($note->downloads ?? 0) }}
                    </td>

                    <td>

                        @if($note->status === 'approved')

                            <span class="approved">
                                Approved
                            </span>

                        @elseif($note->status === 'pending')

                            <span class="pending">
                                Pending
                            </span>

                        @else

                            <span class="rejected">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ optional($note->created_at)->format('d M Y') }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <div class="footer">

        Total Notes:
        <strong>{{ $notes->count() }}</strong>

    </div>

</body>
</html>