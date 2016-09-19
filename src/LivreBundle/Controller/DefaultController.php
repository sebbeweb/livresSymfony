<?php

namespace LivreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('LivreBundle:Default:livres.html.twig');
    }
    /**
     * @Route("/livre/tome/{tome}/chp/{chap}")
     * @Template("LivreBundle::livres.html.twig")
     */
    
    public function getLivre($tome,$chap)
    {   
        $tomes=$tome;
        $tomep=$tome;
        $chps=$chap;
        $chpp=$chap; 
        if($chap == 5){//si fin de tome
            if($tome == 5){//si fin du livre
                $chpp --;
            }else{//fin du tom emais pas fin de livre
                $chpp --;
                $tomes ++;
                $chps =1;
            }
        }elseif($chap == 1){//si debut de tome
            if($tome == 1){//si debut du livre 
                $chps ++;                  
            }else{//debut du tome mais pas debut du livre
                $chps ++;
                $chpp=5;
                $tomep --;
            }
        }else{//cas normal
            $chps ++;
            $chpp --;
        }
        return array (
            "tome"=>$tome,
            "chp"=>$chap,
            "tomes"=>$tomes,
            "tomep"=>$tomep,
            "chps"=>$chps,
            "chpp"=>$chpp,
            );
    }
    
}
