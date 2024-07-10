<?php
namespace App\Repositories;
use App\Repositories\CategoryRepoInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryRepo implements CategoryRepoInterface{
    public function getAllCategories(){
        return Category::orderby('id','desc')->paginate(5);
    }
    public function createCategory(){
        return Category::where('parent_id',null)->get();
    }
    public function storeNewCategory(array $data){
        if (isset($data['cat_image'])) {
            // Retrieve file extension
            $extension = $data['cat_image']->getClientOriginalExtension();
            // Store the image with original extension in storage/app/public/images directory
            $imageName = time() . '.' . $extension;
            $data['cat_image']->storeAs('public/images/category', $imageName);

        }else{
            $imageName = null;
        }
        $category = new Category();
        $category->cat_name  = $data['cat_name'];
        $category->cat_slug = $data['cat_slug'];
        $category->parent_id = $data['parent_cat_id'];
        $category->image = $imageName;
        if(isset($data['custom_status'])){
            $category->status = $data['custom_status'];
        }else{
            $category->status = 0;
        }
        $category->description = $data['description'] ?? '';
        $category->save();
        return $category;

    }
    public function updateCategory(array $data){
        // Find the category by ID
    $category = Category::findOrFail($data['category_id']);

    // Check if a new image is uploaded
    if (isset($data['cat_image'])) {
        // Delete the old image file from storage if it exists
        if ($category->image) {
            Storage::disk('public')->delete('images/category/' . $category->image);
        }

        // Store the new image with a unique name
        $imageName = time() . '.' . $data['cat_image']->getClientOriginalExtension();
        $data['cat_image']->storeAs('public/images/category', $imageName);
    } else {
        $imageName = $category->image;
    }

    // Update category attributes
    $category->cat_name = $data['cat_name'];
    $category->cat_slug = $data['cat_slug'];
    $category->parent_id = $data['parent_cat_id'];
    $category->image = $imageName;
    $category->status = isset($data['custom_status']) ? $data['custom_status'] : 0;
    $category->description = $data['description'] ?? '';

    // Save the updated category
    $category->save();

    return $category;
    }
    public function showCategory($id){
         return Category::where('id',$id)->first();
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $delete = $category->delete();
        if($delete){
            return true;
        }else{
            return false;
        }
        
    }
}

?>