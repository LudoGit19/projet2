<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
// use Symfony\Component\HttpFoundation\File\UploadedFile;
// use Symfony\Component\HttpFoundation\File\UploadFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @Vich\Uploadable
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=20, minMessage="minimum 3 carcatères", maxMessage="maximum 20 caractères")
     */
    private $fname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=30, minMessage="minimum 3 carcatères", maxMessage="maximum 30 caractères")
     */
    private $lname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min= 10,max=10, minMessage="minimum 10 carcatères", maxMessage="maximum 10 caractères")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255) 
     * @Assert\Email(
     *    message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

     /**
     * @Vich\UploadableField(mapping="player_image", fileNameProperty="image")
     * 
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(string $fname): self
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(string $lname): self
    {
        $this->lname = $lname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    
    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        
        if($this->imageFile instanceof UploadedFile){
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}
