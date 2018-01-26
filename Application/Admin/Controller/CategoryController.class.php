<?php

namespace Admin\Controller;
use Think\Controller;

class CategoryController extends Controller {
    
	public function view () {
		$this->assign( "catList", D("category")->getCatList() );
		$this->display( "cat_list" );
	}

    public function add () {
    	$this->assign( "act", U("Category/insert") );
    	$this->assign( "actInfo", "添加分类" );
        $this->display( "cat_info" );
    }

    public function insert ( ) {
    	$catModel = D("category");
    	if ( $catModel->addCategory() ) {

    		$this->success( "分类添加成功" );
    	}else {
    		$this->error( "分类添加失败" );
    	}
    }

    public function edit () {
    	$this->assign( "act", U("Category/update") );
    	$this->assign( "actInfo", "更新分类" );
    	$this->assign( "catInfo", D("category")->getCatInfo() );
    	$this->display( "cat_info" );
    }

    public function update () {
    	$categoryModel = D( "category" );
    	if ( $categoryModel->updateCatInfo() ) {
    		$this->success( "分类更新成功" );
    	}else {
    		$this->error( "分类更新失败" );
    	}
    }

    
}