<?php

namespace Modules\Product\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;

class ProductRepository
{

    public function list(Request $request): LengthAwarePaginator
    {
        $query = Product::active();

        //filter according to category
        if (!is_null($request->category_id)) {
            $query->whereHas("categories", function ($query) use ($request) {

                return $query->where('category_id', $request->category_id);

            });
        }

        //search
        if (!is_null($request->q)) {
            $query->where(function ($query) use ($request) {
                $query
                    ->Where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('slug', 'like', '%' . $request->q . '%');
            });
        }

        //sorting
        $query->orderBy('created_at', $request->sortBy ?? 'desc');

        return $query->paginate(10);
    }

}
