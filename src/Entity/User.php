<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="Veuillez renseigner un email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=30)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un prénom")
	 * @Assert\Length(
	 *	min=2,
	 *	max=30,
	 *  minMessage="Veuillez renseigner un prénom de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner un prénom de 30 carctères maxi"
	 * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
	 *
	 * @Assert\NotBlank(message="Veuillez renseigner un nom")
	 * @Assert\Length(
	 *	min=2,
	 *	max=50,
	 *  minMessage="Veuillez renseigner un nom de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner un nom de 50 carctères maxi"
	 * )
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=50)
	 * @Assert\NotBlank(message="Veuillez renseigner une ville")
	 * @Assert\Length(
	 *	min=2,
	 *	max=50,
	 *  minMessage="Veuillez renseigner une ville de 2 caractères mini",
	 *  maxMessage="Veuillez renseigner une ville de 50 carctères maxi"
	 * )
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Regex("/^[0-9]{5}/")
	 * @Assert\Type(type="integer", message="Veuillez renseigner un code postal composé de chiffres.")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner une adresse")
     */
    private $adresse;


    /**
     * @ORM\Column(type="string", length=25)
	 * @Assert\Regex(
	 *	pattern="/^0[1-9]([-. ]?[0-9]{2}){4}$/",
	 *	message="Mauvais numero de téléphone"
	 *)
     */
    private $telephone;




    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;


    /**
     * @ORM\Column(type="date")
     */
    private $register_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }






    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }



    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function getRoles()
    {
        return [$this->roles];
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRegisterAt(): ?\DateTimeInterface
    {
        return $this->register_at;
    }

    public function setRegisterAt(\DateTimeInterface $register_at): self
    {
        $this->register_at = new \DateTime('now');

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

}
