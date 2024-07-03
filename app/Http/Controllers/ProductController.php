<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private const CREATE_SUCCESS = 'The product created successfully.', UPDATE_SUCCESS = 'The product updated successfully.', DELETE_SUCCESS = 'The product deleted successfully.', FAILED = 'Failed to get service, please try again.';
    
   
    public function index()
    {
        $products = Product::all();
        return response()->json($products);

    }

    public function create(ProductRequest $Request)
    {
        $product = $Request->validated();
        $product = Product::create($product);
        if($product){
            return response()->json($product, 201);
        }
        throw new ErrorException(self::FAILED, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function show(string $id)
    {
        $product = Product::where('id',$id)->get();

        return response()->json($product);
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(!$product) return response()->json('', 404);

        $product->update($request->all());
        return response()->json($product);
    }

   
    public function destroy($id)
    {
        $product = Product::find($id);
        $response = $product->delete();

        return response()->json($response, 204);
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product && $product->trashed()) {
            $product->restore();
            return response()->json($product);
        }

        return response()->json(null, 404);
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->forceDelete();
            return response()->json(null, 204);
        }

        return response()->json(null, 404);
    }

}
