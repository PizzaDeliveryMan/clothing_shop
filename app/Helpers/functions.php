<?php

/**
 * Alias for auth() helper
 * @codeCoverageIgnore
 */
function user()
{
    return auth()->user();
}

/**
 * Helper for giving an active button class "avtive"
 */
function active_if_route_is($route, $request = null, $get = null)
{
    if ($request) {
        return request($request) == $get ? 'active' : '';
    }
    return request()->is($route) ? 'active' : '';
}

/**
 * This function is needed for getting name
 * for images than I'm saving in storage
 *
 * @codeCoverageIgnore
 * @param string $title
 * @param string $ext - extention
 * @return string
 */
function get_file_name(string $title, string $ext): string
{
    return str_slug($title) . '-' . str_random(7) . '.' . $ext;
}

/**
 * This helper helps clean Item controller by separeting
 * this logic to helper
 *
 * @param string $path
 * @return string
 */
function what_is_current(string $param): string
{
    if ($param === 'category') {
        if (str_contains(request()->fullUrl(), 'women')) {
            return 'women';
        }
        if (str_contains(request()->fullUrl(), 'men')) {
            return 'men';
        }
        return '';
    }

    if ($param === 'title') {
        if (str_contains(request()->fullUrl(), 'women')) {
            return trans('items.women_items');
        }
        if (str_contains(request()->fullUrl(), 'men')) {
            return trans('items.men_items');
        }
        return trans('items.all_items');
    }
}

/**
 * Function for debuging queries
 *
 * @codeCoverageIgnore
 * @param bool|null $show_data
 * @return void
 */
function dump_sql(?bool $show_data = false): void
{
    if (app()->env == 'local') {
        \DB::listen(function ($query) use ($show_data) {
            dump($query->sql);
            if ($show_data) {
                dump($query->bindings);
            }
        });
    }
}

/**
 * Removes all cache
 *
 * @return void
 */
function forget_all_cache(): void
{
    array_map(function ($name) {
        cache()->forget($name);
    }, config('cache.cache_names'));
}
