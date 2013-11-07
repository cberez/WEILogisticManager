<?php

namespace WEILogisticManager\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Activity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var Place
     *
     * @ORM\ManyToOne(targetEntity="WEILogisticManager\AdminBundle\Entity\Place")
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $place;

    /**
     * @var Event
     *
     * @ORM\ManyToOne(targetEntity="WEILogisticManager\AdminBundle\Entity\Event")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $event;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginTime", type="datetime")
     */
    protected $beginTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="datetime")
     */
    protected $endTime;


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
     * Set name
     *
     * @param string $name
     * @return Activity
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set beginTime
     *
     * @param \DateTime $beginTime
     * @return Activity
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    
        return $this;
    }

    /**
     * Get beginTime
     *
     * @return \DateTime 
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Activity
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return Activity
     */
    public function setPlace($place)
    {
        $this->place = $place;
    
        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set event
     *
     * @param \WEILogisticManager\AdminBundle\Entity\Event $event
     * @return Activity
     */
    public function setEvent(\WEILogisticManager\AdminBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \WEILogisticManager\AdminBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
}