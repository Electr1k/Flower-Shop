<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class FlowerFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const CATEGORY_ID = 'category_id';

    public const TAG_ID = 'tag_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::DESCRIPTION => [$this, 'description'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::TAG_ID => [$this, 'tagId'],
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
}
