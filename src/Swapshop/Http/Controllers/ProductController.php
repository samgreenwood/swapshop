<?php namespace Swapshop\Http\Controllers;

use Swapshop\Image;
use Swapshop\Image\ImageUploader;
use Swapshop\Product\Forms\CreateProductForm;
use Swapshop\Product\Forms\EditProductForm;
use Swapshop\Product\Product;
use Swapshop\Product\ProductRepositoryInterface;
use Swapshop\Tag;
use Swapshop\Tag\Tagger;

class ProductController extends BaseController
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var Tagger
     */
    private $tagger;

    /**
     * @var ImageUploader
     */
    private $imageUploader;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param Tagger $tagger
     * @param ImageUploader $imageUploader
     */
    public function __construct(ProductRepositoryInterface $productRepository, Tagger $tagger, ImageUploader $imageUploader)
    {
        $this->productRepository = $productRepository;
        $this->tagger = $tagger;
        $this->imageUploader = $imageUploader;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $products = $this->productRepository->getAllPaged();

        return \View::make('products.index', compact('products'));
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getShow($productId)
    {
        $product = $this->productRepository->getById($productId);

        return \View::make('products.show', compact('product'));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return \View::make('products.create', compact('tags'));
    }

    /**
     * @return mixed
     */
    public function postStore()
    {
        $form = $this->form(CreateProductForm::class);

        $name = $form->get('name');
        $pdf = $form->get('pdf');
        $description = $form->get('description');
        $tags = $form->get('tags') ? $form->get('tags') : [];
        $tags = explode(",", $tags);

        $product = new Product;
        $product->name = $name;
        $product->pdf = $pdf;
        $product->description = $description;

        $this->productRepository->add($product);

        $this->tagger->tag($product, $tags);

        if ($form->has('image')) {
            $image = $form->get('image');
            $this->imageUploader->attachToImageable($product, $image);
        }

        return \Redirect::route('products.show', $product->id);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function getEdit($productId)
    {
        $product = $this->productRepository->getById($productId);
        $productTags = implode(',', $product->getTagsAsString());

        return \View::make('products.edit', compact('product', 'productTags'));
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function putUpdate($productId)
    {
        $form = $this->form(EditProductForm::class);

        $name = $form->get('name');
        $pdf = $form->get('pdf');
        $description = $form->get('description');
        $tags = $form->get('tags') ? $form->get('tags') : [];
        $tags = explode(",", $tags);

        $product = $this->productRepository->getById($productId);
        $product->name = $name;
        $product->pdf = $pdf;
        $product->description = $description;

        $this->productRepository->add($product);

        $this->tagger->tag($product, $tags);

        if ($form->has('image')) {
            $image = $form->get('image');
            $this->imageUploader->attachToImageable($product, $image);
        }

        return \Redirect::route('products.show', $product->id);

    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getDelete($productID)
    {
        $product = Product::find($productID);

        return \View::make('products.delete', compact('product'));
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function deleteDelete($productID)
    {
        $product = Product::find($productID);
        $product->delete();

        return \Redirect::route('products.index')
            ->withMessage('Product Deleted');
    }

    /**
     * @param $productID
     * @return mixed
     */
    public function getListings($productID)
    {
        $product = $this->productRepository->findWith($productID, array('listings', 'listings.user', 'images'));

        return \View::make('products.listings', compact('product'));
    }

    /**
     * Show all the Products in a certain tag
     * @param $tag The tag to filter by
     * @return \Response
     */
    public function getTag($tag)
    {
        $tag = Tag::with(array('products'))->where('slug', $tag)->first();

        $tag->products = $tag->products->filter(function ($product) {
            return $product->isSellable();
        });

        return \View::make('tags.products', compact('tag'));
    }

    /**
     * @param $productID
     */
    private function uploadImages($productID)
    {
        if (\Input::hasFile('image')) {
            $imageInput = \Input::file('image');
            $filename = $imageInput->getClientOriginalName();
            $path = public_path() . '/images/products/' . $productID;

            if ($imageInput->move($path, $filename)) {
                $image['image'] = $filename;
                $image['imageable_type'] = "Swapshop\Product";
                $image['imageable_id'] = $productID;

                Image::create($image);
            }
        }
    }

}
