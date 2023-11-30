<?php
/**
 * MIT License
 *
 * Copyright (c) 2021-2022 FoxxoSnoot
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace App\Models;

use App\Models\SpaceRanks;
use App\Models\SpaceMembers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Space extends Model
{
    use HasFactory;

    protected $table = 'spaces';

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'alert_message',
        'thumbnail'
    ];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }

    public function thumbnail()
    {
        if ($this->thumbnail_pending)
            return asset('img/pending.png');
        else if ($this->thumbnail == 'denied')
            return asset('img/denied.png');

        $url = config('Values.storage.url');

        return "{$url}/{$this->thumbnail}.png";
    }

    public function slug()
    {
        $name = str_replace('-', ' ', $this->name);

        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }

    public function members()
    {
        return SpaceMembers::where('group_id', '=', $this->id)->get();
    }

    public function ranks()
    {
        return SpaceRanks::where('group_id', '=', $this->id)->orderBy('rank', 'ASC')->get();
    }
}