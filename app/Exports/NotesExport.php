<?php

namespace App\Exports;

use App\Models\Note;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class NotesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Note::with([
            'user',
            'university',
            'faculty',
            'department',
            'programme',
            'semester',
            'unit',
        ])
        ->latest()
        ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Description',
            'Uploader',
            'Email',
            'University',
            'Faculty',
            'Department',
            'Programme',
            'Semester',
            'Unit',
            'Type',
            'Premium',
            'Downloads',
            'Status',
            'Uploaded At',
        ];
    }

    public function map($note): array
    {
        return [
            $note->id,
            $note->title,
            $note->description,
            $note->user?->name ?? '-',
            $note->user?->email ?? '-',
            $note->university?->name ?? '-',
            $note->faculty?->name ?? '-',
            $note->department?->name ?? '-',
            $note->programme?->name ?? '-',
            $note->semester?->name ?? '-',
            $note->unit?->name ?? '-',
            $note->type ?? 'Free',
            $note->is_premium ? 'Premium' : 'Free',
            $note->downloads ?? 0,
            ucfirst($note->status ?? 'pending'),
            optional($note->created_at)->format('d M Y H:i'),
        ];
    }
}