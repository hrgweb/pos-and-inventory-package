<?php

namespace Hrgweb\SalesAndInventory\Domain\Supplier\Services;

use Exception;
use Hrgweb\SalesAndInventory\Models\Supplier;
use Illuminate\Support\Facades\Log;
use Hrgweb\SalesAndInventory\Domain\Supplier\Data\SupplierData;

class SupplierService
{
    public function __construct(protected array $request = [])
    {
    }

    public static function make(...$params)
    {
        return new static(...$params);
    }

    public static function all(): mixed
    {
        return Supplier::select(['id', 'name', 'description'])->get();
    }

    public static function fetch(): mixed
    {
        return SupplierData::collection(Supplier::paginate(10));
    }

    public function save()
    {
        $supplier =  Supplier::create($this->request);

        if (!$supplier) {
            throw new Exception('no supplier saved. encountered an error');
        }

        Log::info('new supplier (' . $this->request['name'] . ') saved.');

        return SupplierData::from($supplier)->additional(['created_at' => $supplier->created_at]);
    }
}
