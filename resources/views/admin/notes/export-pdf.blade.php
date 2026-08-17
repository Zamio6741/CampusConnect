<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>CampusConnect Notes Report</title>

    <style>

        /*
        |--------------------------------------------------------------------------
        | BASE
        |--------------------------------------------------------------------------
        */

        @page {
            size: A4 landscape;
            margin: 15px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 9px;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }


        /*
        |--------------------------------------------------------------------------
        | HEADER
        |--------------------------------------------------------------------------
        */

        .header {
            text-align: center;
            margin-bottom: 18px;
        }

        h1 {
            margin: 0;
            font-size: 20px;
            color: #0f172a;
        }

        .subtitle {
            margin-top: 5px;
            color: #64748b;
            font-size: 10px;
        }


        /*
        |--------------------------------------------------------------------------
        | SUMMARY
        |--------------------------------------------------------------------------
        */

        .summary {
            margin-bottom: 15px;
            width: 100%;
        }

        .summary-box {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
            display: inline-block;
            margin-right: 6px;
        }

        .summary-label {
            color: #64748b;
            font-size: 8px;
        }

        .summary-value {
            font-size: 11px;
            font-weight: bold;
            color: #0f172a;
        }


        /*
        |--------------------------------------------------------------------------
        | TABLE
        |--------------------------------------------------------------------------
        */

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            background: #0f172a;
            color: white;
            padding: 6px 5px;
            border: 1px solid #cbd5e1;
            text-align: left;
            font-size: 8px;
            font-weight: bold;
            vertical-align: middle;
        }

        td {
            padding: 6px 5px;
            border: 1px solid #cbd5e1;
            vertical-align: top;
            word-wrap: break-word;
            overflow-wrap: break-word;
            font-size: 8px;
            line-height: 1.35;
        }

        tr:nth-child(even) {
            background: #f8fafc;
        }


        /*
        |--------------------------------------------------------------------------
        | COLUMN WIDTHS
        |--------------------------------------------------------------------------
        */

        .col-id {
            width: 4%;
            text-align: center;
        }

        .col-title {
            width: 20%;
        }

        .col-uploader {
            width: 13%;
        }

        .col-university {
            width: 13%;
        }

        .col-unit {
            width: 15%;
        }

        .col-type {
            width: 8%;
            text-align: center;
        }

        .col-downloads {
            width: 8%;
            text-align: center;
        }

        .col-status {
            width: 9%;
            text-align: center;
        }

        .col-date {
            width: 10%;
            text-align: center;
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

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

        .free {
            color: #0369a1;
            font-weight: bold;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        .footer {
            margin-top: 15px;
            padding-top: 8px;
            border-top: 1px solid #cbd5e1;
            text-align: right;
            color: #64748b;
            font-size: 9px;
        }

        .footer strong {
            color: #0f172a;
        }


        /*
        |--------------------------------------------------------------------------
        | PRINT
        |--------------------------------------------------------------------------
        */

        @media print {

            body {
                padding: 0;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }

        }

    </style>

</head>


<body>


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="header">

        <h1>
            CampusConnect Notes Report
        </h1>

        <div class="subtitle">
            Academic Notes Management Report
        </div>

    </div>



    {{-- =========================================================
         SUMMARY
    ========================================================== --}}

    <div class="summary">

        <div class="summary-box">

            <div class="summary-label">
                TOTAL NOTES
            </div>

            <div class="summary-value">
                {{ $notes->count() }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                APPROVED
            </div>

            <div class="summary-value">
                {{ $notes->where('status', 'approved')->count() }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                PENDING
            </div>

            <div class="summary-value">
                {{ $notes->where('status', 'pending')->count() }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                PREMIUM
            </div>

            <div class="summary-value">
                {{ $notes->where('is_premium', 1)->count() }}
            </div>

        </div>


        <div class="summary-box">

            <div class="summary-label">
                DOWNLOADS
            </div>

            <div class="summary-value">
                {{ number_format($notes->sum('downloads')) }}
            </div>

        </div>

    </div>



    {{-- =========================================================
         NOTES TABLE
    ========================================================== --}}

    <table>

        <thead>

            <tr>

                <th class="col-id">
                    ID
                </th>

                <th class="col-title">
                    Title
                </th>

                <th class="col-uploader">
                    Uploader
                </th>

                <th class="col-university">
                    University
                </th>

                <th class="col-unit">
                    Unit
                </th>

                <th class="col-type">
                    Type
                </th>

                <th class="col-downloads">
                    Downloads
                </th>

                <th class="col-status">
                    Status
                </th>

                <th class="col-date">
                    Uploaded
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($notes as $note)

                <tr>


                    {{-- ID --}}

                    <td class="col-id">

                        {{ $note->id }}

                    </td>



                    {{-- TITLE --}}

                    <td class="col-title">

                        <strong>
                            {{ $note->title }}
                        </strong>

                        @if($note->description)

                            <div style="color:#64748b; margin-top:3px;">

                                {{ \Illuminate\Support\Str::limit($note->description, 100) }}

                            </div>

                        @endif

                    </td>



                    {{-- UPLOADER --}}

                    <td class="col-uploader">

                        {{ $note->user?->name ?? '-' }}

                        @if($note->user?->email)

                            <div style="color:#64748b; margin-top:2px;">

                                {{ $note->user->email }}

                            </div>

                        @endif

                    </td>



                    {{-- UNIVERSITY --}}

                    <td class="col-university">

                        {{ $note->university?->name ?? '-' }}

                    </td>



                    {{-- UNIT --}}

                    <td class="col-unit">

                        {{ $note->unit?->name ?? '-' }}

                    </td>



                    {{-- TYPE --}}

                    <td class="col-type">

                        @if($note->is_premium)

                            <span class="premium">
                                Premium
                            </span>

                        @else

                            <span class="free">
                                Free
                            </span>

                        @endif

                    </td>



                    {{-- DOWNLOADS --}}

                    <td class="col-downloads">

                        {{ number_format($note->downloads ?? 0) }}

                    </td>



                    {{-- STATUS --}}

                    <td class="col-status">

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



                    {{-- DATE --}}

                    <td class="col-date">

                        {{ optional($note->created_at)->format('d M Y') }}

                    </td>


                </tr>

            @empty

                <tr>

                    <td
                        colspan="9"
                        style="
                            text-align:center;
                            padding:30px;
                            color:#64748b;
                        "
                    >

                        No notes found.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <div class="footer">

        Total Notes:
        <strong>
            {{ $notes->count() }}
        </strong>

        &nbsp; | &nbsp;

        Generated:
        <strong>
            {{ now()->format('d M Y H:i') }}
        </strong>

    </div>


</body>
</html>