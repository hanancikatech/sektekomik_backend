<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Manga extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Manga::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'author'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make(__('Title'), 'title')
                ->rules('required', 'max:255'),

            Slug::make("Slug", 'slug')
                ->rules('required', 'max:255')
                ->separator('-')
                ->hideFromIndex()
                ->creationRules('unique:mangas,slug')
                ->updateRules('unique:mangas,slug,{{resourceId}}'),

            Text::make(__('Author'), 'author')
                ->rules('required', 'max:255'),


            Text::make(__('Release'), 'release', function ($value) {
                return $value->diffForHumans();
            })
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Boolean::make('Hot', 'is_hot')
                ->trueValue(1)
                ->falseValue(false),

            Select::make('Type', 'type')->options([
                'Manga' => 'Manga',
                'Manhwa' => 'Manhwa',
                'Manhua' => 'Manhua',
                'Doujinshi' => 'Doujinshi',
                'OEL' => 'OEL',
                'Other' => 'Other',
            ]),

            DateTime::make('Release', 'release')
                ->hideFromIndex()
                ->rules('required'),

            HasMany::make('Post' , 'posts' , Post::class),

            BelongsToMany::make("Category", 'categories', Category::class),

            Images::make('Featured Image', 'manga') // second parameter is the media collection name
                ->conversionOnIndexView('thumb') // conversion used to display the image
                ->rules('required'), // validation rules

            Textarea::make(__('Descriptions'), 'description')
                ->rows(15)
                ->hideFromIndex()
                ->rules('required', 'max:255'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
