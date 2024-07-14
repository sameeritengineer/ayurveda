<?php
namespace App\Repositories;

interface CategoryRepoInterface{
   
    public function getAllCategories();
    public function createCategory();
    public function storeNewCategory(array $data);
    public function showCategory($id);
    public function updateCategory(array $data);
    public function deleteCategory($id);


}

?>