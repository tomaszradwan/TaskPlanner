<?php
namespace taskPlannerBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user")
     *
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
     *
     */
    private $categories;


    public function __construct()
    {
        parent::__construct();
    }





    /**
     * Add tasks
     *
     * @param \taskPlannerBundle\Entity\Task $tasks
     * @return User
     */
    public function addTask(\taskPlannerBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \taskPlannerBundle\Entity\Task $tasks
     */
    public function removeTask(\taskPlannerBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add categories
     *
     * @param \taskPlannerBundle\Entity\Category $categories
     * @return User
     */
    public function addCategory(\taskPlannerBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \taskPlannerBundle\Entity\Category $categories
     */
    public function removeCategory(\taskPlannerBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
