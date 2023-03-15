<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class Flight extends Model
{
    protected $fillable = ['type', 'price', 'name'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $type): void
    {
        $this->attributes['name'] = $type;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    // Validator
    public static function validate(Request $request): void
    {
        $request->validate([
            'price' => ['required', 'integer', 'gte:1'],
            'name' => ['required', 'min:3', 'max:200'],
            'type' => ['required', Rule::in(['local', 'international'])],
        ]);
    }
}
