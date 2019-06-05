<?php
namespace App\Http\Middleware;
use Closure;
class InputTrim
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // credit to @t202wes - https://gist.github.com/drakakisgeo/3bba2a2600b4c554f836#gistcomment-1970006
        $input = $request->all();
        if ($input) {
            array_walk_recursive($input, function (&$item) {
                $item = trim($item);
                $item = ($item == "") ? null : $item;
            });
            $request->merge($input);
        }
        return $next($request);
    }
}
