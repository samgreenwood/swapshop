<?php namespace Swapshop\Image;

use Symfony\Component\Finder\SplFileInfo;

class ImageUploader
{
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * @param ImageRepositoryInterface $imageRepository
     */
    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param Imageable $imageable
     * @param \SplFileInfo $uploadedFile
     * @return bool
     */
    public function attachToImageable(Imageable $imageable, \SplFileInfo $uploadedFile)
    {
        $image = new Image;
        $image->imageable_id = $imageable->getId();
        $image->imageable_type = get_class($image);

        $uploadPath = $imageable->getPath();

        $imagePath = sprintf("%s/%s", $uploadedFile->getPath(), $uploadedFile->getFilename());

        if ( ! @move_uploaded_file($imagePath, $uploadPath)) return false;

        $this->imageRepository->save($image);
    }
}