<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository\ProductRepositoryInterface;
use App\Repositories\ProjectRepository\ProjectRepositoryInterface;
use App\Traits\CreateMedia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use CreateMedia;

    public $repository;
    public $projectRepository;

    public function __construct(ProductRepositoryInterface $repository, ProjectRepositoryInterface $projectRepository)
    {
        $this->middleware('auth:api', ['except' => ['index']]);
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = $this->repository->all();
        return response()->json(new  ProductCollection($products), 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imageUrls = $this->uploadMedia($request->file('files'), 'images', Product::class);
        $products = $this->repository->store($request->all());
        if ($imageUrls != null) {
            $this->projectRepository->MapData($imageUrls, 'images', $products);
        }
        return response()->json(['message' => 'create product is success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json(['data' => new ProductResource($product)], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $files = $request->file('files');
        if ($files) {
            $media = $this->FindMedia($product);
            foreach ($media as $m) {
                unlink(public_path($m->url));
                $this->destroyMedia($product);
            }
            $imageUrls = $this->uploadMedia($request->file('files'), 'Images', Product::class);
            $this->projectRepository->MapData($imageUrls, 'images', $product);
        }
        $this->repository->update($request->all(), $product);
        return response()->json(['message' => 'updated is success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $media = $this->FindMedia($product);
        foreach ($media as $m) {
            unlink(public_path($m->url));
            $this->destroyMedia($product);
        }
        $this->repository->delete($product);
        return response()->json(['message' => 'deleted is success'], 200);
    }

    public function uploadVideo(Request $request, Product $product)
    {
        $file = $request->file('file');
        $imageUrl = $this->uploadVideoservice($file, 'videos', Product::class);
        if ($imageUrl != null) {
            $this->projectRepository->MapData($imageUrl, 'videos', $product);
        } else return response()->json(['Error' => 'you have a problem'], 402);
        return response()->json(['message' => 'upload video is success'], 200);
    }

    public function destroyVideo(Request $request, Product $product)
    {
        $media = $this->FindMedia($product, 'videos');
        foreach ($media as $m) {
            if ($m->id == intval($request->video_id)) {
                unlink(public_path($m->url));
                $this->destroyMedia($product, $m->id);
            }
        }
        return response()->json(['message' => 'delete video is success'], 200);
    }
}
