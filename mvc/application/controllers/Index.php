<?php 
/**
 * 默认控制器
 */
class Index extends Controller
{
    
    public function show()
    {
        $arr = array(
            'name' =>'lisi' , 
            'age' =>18 , 
        );
        $this->view->assign('info',$arr);
        $this->view->display('index.html');
        echo 'This is Show';die;        
    }

    public function about()
    {
        $this->view->display('about.html');
    }
    public function product_list()
    {
        $this->view->display('product_list.html');
    }
    public function new_list()
    {
        $this->view->display('new_list.html');
    }
    public function case_list()
    {
        $this->view->display('case_list.html');
    }
    public function contact()
    {
        $this->view->display('contact.html');
    }

}
