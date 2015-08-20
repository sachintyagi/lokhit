<?php 
namespace Application\View\Helper;
use Zend\View\Helper\AbstractHelper;

class AgeInYears extends AbstractHelper
{
    public function __invoke($dob, $type=null)
    {
       $birthday = new \DateTime($dob);
       $today = new \DateTime();
       $interval = $birthday->diff($today);
       if(strtolower($type) == 'years') {
           return $interval->y;
       } else {
          return $interval->y." years, ".$interval->m." months, ".$interval->d." days";
       }
       
    }
}
