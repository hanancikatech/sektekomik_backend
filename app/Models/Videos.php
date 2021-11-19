<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videos extends Model
{
    use HasFactory;

    /**
     * vidoes createdBy some User
     * @return BelongsTo
     * @author Hanan Asyrawi Rivai
     */
    public function createdBy() : BelongsTo {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * vidoes createdBy some User
     * @return BelongsTo
     * @author Hanan Asyrawi Rivai
     */
    public function posts() : BelongsTo {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
}
