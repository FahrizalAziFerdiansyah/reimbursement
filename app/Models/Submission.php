<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function labelStatus(): Attribute
    {
        $comp = '';
        switch ($this->status) {
            case '0':
                $comp = ['danger', 'Ditolak'];
                break;
            case '1':
                $comp = ['warning', 'Pending'];
                break;
            case '3':
                $comp = ['success', 'Dibayar'];
                break;
            default:
                $comp = ['info', 'Disetujui'];
                break;
        }
        $comp = '<span class="badge bg-' . $comp[0] . '">' . $comp[1] . '</span>';
        return Attribute::make(
            get: fn() => $comp,
        );
    }
    public function scopeAccess($query)
    {
        $user = auth()->user();
        $role = $user->roles[0]->name;
        switch ($role) {
            case 'employee':
                return $query->where('user_id', $user->id);
                break;
            default:
                # code...
                break;
        }
    }
}
