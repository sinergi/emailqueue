<?php
namespace Sinergi\EmailQueue\Attachement;

use Sinergi\EmailQueue\EmailQueueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="email_queue_attachement")
 */
class AttachementEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Sinergi\EmailQueue\EmailQueueEntity", inversedBy="attachements")
     * @ORM\JoinColumn(name="email_queue_id", referencedColumnName="id", onDelete="CASCADE")
     * @var EmailQueueEntity
     */
    private $emailQueue;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", name="mime_type", length=64)
     * @var string
     */
    private $mimeType;

    /**
     * @ORM\Column(type="blob")
     * @var resource
     */
    private $file;

    /**
     * @return EmailQueueEntity
     */
    public function getEmailQueue()
    {
        return $this->emailQueue;
    }

    /**
     * @param EmailQueueEntity $emailQueue
     * @return $this
     */
    public function setEmailQueue(EmailQueueEntity $emailQueue)
    {
        $this->emailQueue = $emailQueue;
        return $this;
    }

    /**
     * @return resource
     */
    public function getFile()
    {
        rewind($this->file);
        return $this->file;
    }

    /**
     * @param resource $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return $this
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }
}
