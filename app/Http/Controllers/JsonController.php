<?php

namespace App\Http\Controllers;

use App\Mail\OrderCreated;
use ErpNET\App\Interfaces\OrderServiceInterface;
use ErpNET\App\Interfaces\PartnerServiceInterface;
use ErpNET\App\Interfaces\ProductServiceInterface;
use ErpNET\App\Models\RepositoryLayer\ProductGroupRepositoryInterface;
use Illuminate\Http\Request;
//use App\Http\Requests;

class JsonController extends Controller
{
    public function getCategories(ProductGroupRepositoryInterface $productGroupRepository)
    {
        return $productGroupRepository->collectionCategorias();
    }

    public function produtosDelivery(ProductServiceInterface $productService, $categ, $begin=null, $end=null)
    {
        return $productService->collectionProductsDelivery($categ, $begin, $end);
    }

    public function partnerProviderId(PartnerServiceInterface $partnerService, $id)
    {
        return $partnerService->jsonPartnerProviderId($id);
    }

    public function appVersion(){
        return response()->json([
            "version"=>env('APP_LAST_VERSION', "0.0.0")
        ]);
    }

    public function advice(){
        return response()->json([
            "advice"=>!env('DELIVERY_OPEN', true),
            "message"=>"Estamos em manutenção no momento, retornaremos novamente em: ".
                env('DELIVERY_RETURN', '29/06/2015 às 20:00'),
        ]);
    }

    public function ordem(Request $request, OrderServiceInterface $orderService)
    {
        $data = $request->all();
        logger($data);
        $returnJson = $orderService->createDeliverySalesOrderWithJson(json_encode($data['message']));
        $returnObj = json_decode($returnJson);

        \Mail::to('luciano.bapo@gmail.com')
            ->cc('ilhanet.lan@gmail.com')
//            ->bcc($evenMoreUsers)
            ->send(new OrderCreated());

//        dd($returnJson);
        if (property_exists($returnObj,'error'))
//            return $returnJson;
            return response()
                ->json($returnObj)
//                ->withCallback($request->input('callback'))
                ;
        else
            return response()
                ->json(["error"=>true,"message"=>"Json error"])
//                ->withCallback($request->input('callback'))
                ;
    }
}
