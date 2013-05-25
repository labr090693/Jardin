<?php

require_once '../model/Main.php';
class ControllerException extends Exception{}
class Controller  {
    public function  __call($name, $arguments) 
    {
        throw new ControllerException("Se Produojo un! El método {$name}  no se definio.");
    }
    public function Select($p) {
        $obj = new Main();
        $obj->table =  $p['table'];
        $data = array();

        $data['rows'] = $obj->getList();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];        
        $view = new View();
        $view->setData( $data );
        $view->setTemplate( '../view/_Select.php' );
        return $view->renderPartial();
    }    
    public function Select_ajax($p) {
        $obj = new Main();
        $obj->table =  $p['table'];
        $obj->filtro = $p['filtro'];
        $obj->criterio = $p['criterio'];
        $data = array();
        $data['rows'] = $obj->getList_ajax();
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];                
        $data['disabled'] = $p['disabled'];        
        $view = new View();
        $view->setData( $data );
        $view->setTemplate( '../view/_Select_ajax.php' );
        return $view->renderPartial();
    }    
    public function Pagination( $p ) 
    {
        $data = array();
        $data['rows'] = $p['rows'];
        $data['query'] = $p['query'];
        $data['url'] = $p['url'];
        $view = new View();
        $view->setData( $data );
        $view->setTemplate( '../view/_Pagination.php' );
        return $view->renderPartial();
    }
    public function Combo_Search($options)
    {
        $data = array();
        $data['options'] = $options;
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/_Combo_Search.php');
        return $view->renderPartial();
    }

    public function grilla($name,$columns,$rows,$options,$pag,$edit,$view,$select=false,$new=true)
    {
        $obj = new Main();        
        $data = array();
        $data['nr'] = $obj->getnr();
        $data['cols'] = $columns;
        $data['rows'] = $rows;
        $data['edit'] = $edit;
        $data['view'] = $view;
        $data['select'] = $select;
        $data['name'] = $name;
        $data['pag'] = $pag;
        $data['new'] = $new;
        $data['combo_search'] = $this->Combo_Search($options);
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/_grilla.php' );
        $view->setLayout( '../template/Layout.php' );
        return $view->renderPartial();       
    }
}
?>
