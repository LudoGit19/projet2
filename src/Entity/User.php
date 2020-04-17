<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields={"username"},
 * message="user déjà utilisé"
 * )
 */
class User implements UserInterface     // /!\partie importante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=10,minMessage="5 carcatères minimum", maxMessage="10 carcatères maximum") 
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=10,minMessage="5 carcatères minimum", maxMessage="10 carcatères maximum") 
     */
    private $password;

     /**
     * @Assert\Length(min=5,max=10,minMessage="5 carcatères minimum", maxMessage="10 carcatères maximum")
     * @Assert\EqualTo(propertyPath="password",message="Les mots de passe que vous avez tapés sont différents.")
     */
    private $checkPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * Get the value of checkPassword
     */ 
    public function getCheckPassword(): ?string
    {
        return $this->checkPassword;
    }

    /**
     * Set the value of checkPassword
     *
     * @return  self
     */ 
    public function setCheckPassword(string $checkPassword): self
    {
        $this->checkPassword = $checkPassword;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return [$this->roles];

    }

    public function setRoles(?string $roles): self
    {
        if($roles === null){
            $this->roles = "ROLE_USER";
        } else{
        $this->roles = $roles;
        }

        return $this;
    }

   
}
