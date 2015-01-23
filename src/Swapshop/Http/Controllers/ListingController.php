<?php namespace Swapshop\Http\Controllers;

use Swapshop\Image\ImageUploader;
use Swapshop\Listing\Forms\CreateListingForm;
use Swapshop\Listing\Forms\UpdateListingForm;
use Swapshop\Listing\Listing;
use Swapshop\Listing\ListingRepositoryInterface;
use Swapshop\Product;

class ListingController extends BaseController
{
    /**
     * @var ListingRepositoryInterface
     */
    private $listingRepository;

    /**
     * @var ImageUploader
     */
    private $imageUploader;

    /**
     * @param ListingRepositoryInterface $listingRepository
     */
    public function __construct(ListingRepositoryInterface $listingRepository, ImageUploader $imageUploader)
    {
        $this->listingRepository = $listingRepository;
        $this->imageUploader = $imageUploader;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $listings = $this->listingRepository->getAll();

        return $this->render('products.listings', compact('listings'));
    }

    /**
     * @param $listingId
     * @return mixed
     */
    public function getShow($listingId)
    {
        $listing = $this->listingRepository->getById($listingId);

        return $this->render('listings.show', compact('listing'));
    }

    /**
     * @return mixed
     */
    public function getCreate()
    {
        return $this->render('listings.create');
    }

    /**
     * @return mixed
     */
    public function postStore()
    {
        $form = $this->form(CreateListingForm::class);

        $listing = new Listing;
        $listing->product_id = $form->get('product_id');
        $listing->user_id = $form->get('user_id');
        $listing->price = $form->get('price');
        $listing->quantity = $form->get('quantity');
        $listing->condition = $form->get('condition');
        $listing->user_id = $this->get('auth')->user()->id;

        $this->listingRepository->add($listing);

        if ($form->has('images')) {
            $images = $form->get('images');
            foreach ($images as $image) $this->imageUploader->attachToImageable($listing, $image);
        }

        return $this->redirect()->route('listings.edit', $listing->id)
            ->withMessage('Listing Created Successfully');

    }

    /**
     * @param $listingId
     * @return mixed
     */
    public function getEdit($listingId)
    {
        $listing = $this->listingRepository->getById($listingId);

        return $this->render('listings.edit', compact('listing', 'products'));
    }

    /**
     * @param $listingId
     * @return mixed
     */
    public function putUpdate($listingId)
    {
        $form = $this->form(UpdateListingForm::class);

        $listing = new Listing;
        $listing->product_id = $form->get('product_id');
        $listing->user_id = $form->get('user_id');
        $listing->price = $form->get('price');
        $listing->quantity = $form->get('quantity');
        $listing->condition = $form->get('condition');
        $listing->user_id = $this->get('auth')->user()->id;

        $this->listingRepository->add($listing);

        if ($form->has('images')) {
            $images = $form->get('images');
            foreach ($images as $image) $this->imageUploader->attachToImageable($listing, $image);
        }

        return $this->redirect()->route('listings.edit', $listing->id)
            ->withMessage('Listing Created Successfully');


    }

}
