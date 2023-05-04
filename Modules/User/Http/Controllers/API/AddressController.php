<?php

namespace Modules\User\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Cart\Traits\CartTrait;
use Modules\User\Actions\Addresses\CreateAddressAction;
use Modules\User\Actions\Addresses\DeleteAddressAction;
use Modules\User\Actions\Addresses\listAddressAction;
use Modules\User\Actions\Addresses\ShowAddressAction;
use Modules\User\Actions\Addresses\UpdateAddressAction;
use Modules\User\Entities\Address;
use Modules\User\Http\Requests\CreateAddressRequest;
use Modules\User\Http\Requests\UpdateAddressRequest;
use Modules\User\Http\Resources\AddressCollection;
use Modules\User\Http\Resources\AddressResource;

class AddressController extends Controller
{
    use CartTrait;

    public function index()
    {
        $client = $this->getAuthenticatedClient();

        $addresses = (new listAddressAction())($client);

        return AddressCollection::make($addresses);

    }

    public function show(Address $address)
    {
        $address = (new ShowAddressAction())($address);
        return AddressResource::make($address);
    }

    public function store(CreateAddressRequest $request)
    {
        (new CreateAddressAction())($request, $this->getAuthenticatedClient());

        return response()->json([
            'message' => 'Address is created successfully',
        ], 201);
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address = (new UpdateAddressAction())($request, $address->id);

        return response()->json([
            'data' => $address,
        ], 200);
    }

    public function destroy(Address $address)
    {
        (new DeleteAddressAction())($address);

        return response()->json([
            'message' => 'Address is deleted successfully',
        ], 200);
    }
}
