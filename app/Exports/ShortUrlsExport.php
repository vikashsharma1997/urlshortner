<?php

namespace App\Exports;

use App\Models\ShortUrl;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShortUrlsExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate   = $endDate;
    }

    public function collection()
    {
        $user = Auth::user();
        $query = ShortUrl::withCount([
            'analytics as hits' => function ($q) {
                $q->whereBetween('hit_at', [
                    Carbon::parse($this->startDate)->startOfDay(),
                    Carbon::parse($this->endDate)->endOfDay()
                ]);
            }
        ])->whereHas('analytics', function ($q) {
            $q->whereBetween('hit_at', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        });

        if ($user->roleid == 3) {
            $query->where('userid', $user->id);
        } elseif ($user->roleid == 2) {
            $query->where('companyid', $user->company->id);
        }

        return $query->get()->map(function ($url) {
            return [
                'ID'         => $url->id,
                'Original'   => $url->original_url,
                'Short URL'  => $url->shorten_url,
                'Hits'       => $url->hits,
                'Created At' => Carbon::parse($url->created_at)->format('d M y'),
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Original URL', 'Short URL', 'Hits', 'Created At'];
    }
}
