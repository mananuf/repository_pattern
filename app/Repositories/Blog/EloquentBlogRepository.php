<?php
    namespace App\Repositories\Blog;
    use App\Repositories\Blog\BlogContract;

class EloquentBlogRepository implements BlogContract{
    public function getAll()
    {
        return 'binding completed successfully';
    }
}