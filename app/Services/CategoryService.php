<?php
namespace App\Services;
use App\Repositories\CategoryRepoInterface;

class CategoryService{
   public $data; 
   public function __construct(CategoryRepoInterface $categoryRepo){
     $this->data = $categoryRepo;
   }
   public function get(){
    return $this->data->getAllCategories();
   }
   public function create(){
    return $this->data->createCategory();
   }
   public function store(array $data){
     return $this->data->storeNewCategory($data);
   }
   public function show($id){
    return $this->data->showCategory($id);
   }
   public function update(array $data){
    return $this->data->updateCategory($data);
   }
   public function delete($id){
    return $this->data->deleteCategory($id);
   }
}

?>