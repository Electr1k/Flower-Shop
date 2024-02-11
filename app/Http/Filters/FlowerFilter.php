<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FlowerFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const CATEGORY_ID = 'category_id';

    public const TAG_ID = 'tag_id';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::TAG_ID => [$this, 'tagId'],
            self::PRICE_FROM => [$this, 'priceFrom'],
            self::PRICE_TO => [$this, 'priceTo'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function categoryId(Builder $builder, $value)

    {
        $builder->where('category_id', $value);
    }

    public function tagId(Builder $builder, $value)
    {
        $builder->whereHas('tags', function($q) use ($value) {
            $q->where('tag_id', $value);
        });
    }

    public function priceFrom(Builder $builder, $value)
    {
        $builder->where('price', '>=', $value);
    }
    public function priceTo(Builder $builder, $value)
    {
        $builder->where('price', '<=', $value);
    }
}
