<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Recursos
 *
 * @ORM\Table(name="Recursos")
 * @ORM\Entity
 */
class Recursos
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
     * @ORM\Column(name="Nombre_Recurso", type="string", length=100, nullable=false)
     */
    private $nombreRecurso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha_registro", type="date", nullable=false)
     */
    private $fechaRegistro;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Perfiles", mappedBy="recursos")
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
     * Set nombreRecurso
     *
     * @param string $nombreRecurso
     * @return Recursos
     */
    public function setNombreRecurso($nombreRecurso)
    {
        $this->nombreRecurso = $nombreRecurso;

        return $this;
    }

    /**
     * Get nombreRecurso
     *
     * @return string 
     */
    public function getNombreRecurso()
    {
        return $this->nombreRecurso;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Recursos
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Add perfiles
     *
     * @param \Perfiles $perfiles
     * @return Recursos
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
