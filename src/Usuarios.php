<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Usuarios
 *
 * @ORM\Table(name="Usuarios")
 * @ORM\Entity
 */
class Usuarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=150, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel_Fijo", type="string", length=15, nullable=true)
     */
    private $telFijo;

    /**
     * @var string
     *
     * @ORM\Column(name="Tel_Celular", type="string", length=15, nullable=true)
     */
    private $telCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="Usuario", type="string", length=20, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="Contrasenia", type="string", length=150, nullable=false)
     */
    private $contrasenia;

    /**
     * @var string
     *
     * @ORM\Column(name="Correo", type="string", length=100, nullable=true)
     */
    private $correo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha_Alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Perfiles", mappedBy="usuarios")
     */
    private $perfiles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->perfiles = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuarios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set telFijo
     *
     * @param string $telFijo
     * @return Usuarios
     */
    public function setTelFijo($telFijo)
    {
        $this->telFijo = $telFijo;

        return $this;
    }

    /**
     * Get telFijo
     *
     * @return string 
     */
    public function getTelFijo()
    {
        return $this->telFijo;
    }

    /**
     * Set telCelular
     *
     * @param string $telCelular
     * @return Usuarios
     */
    public function setTelCelular($telCelular)
    {
        $this->telCelular = $telCelular;

        return $this;
    }

    /**
     * Get telCelular
     *
     * @return string 
     */
    public function getTelCelular()
    {
        return $this->telCelular;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Usuarios
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set contrasenia
     *
     * @param string $contrasenia
     * @return Usuarios
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;

        return $this;
    }

    /**
     * Get contrasenia
     *
     * @return string 
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Usuarios
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuarios
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Add perfiles
     *
     * @param \Perfiles $perfiles
     * @return Usuarios
     */
    public function addPerfile(\Perfiles $perfiles)
    {
        $this->perfiles[] = $perfiles;

        return $this;
    }

    /**
     * Remove perfiles
     *
     * @param \Perfiles $perfiles
     */
    public function removePerfile(\Perfiles $perfiles)
    {
        $this->perfiles->removeElement($perfiles);
    }

    /**
     * Get perfiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPerfiles()
    {
        return $this->perfiles;
    }
}
