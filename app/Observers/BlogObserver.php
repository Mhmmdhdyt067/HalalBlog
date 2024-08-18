<?php

namespace App\Observers;

use App\Models\Blog;
use App\Traits\LogDescription;

class BlogObserver
{
    use LogDescription;
    /**
     * Handle the Blog "created" event.
     */
    public function created(Blog $blog): void
    {
        $message = 'Created Blog ' . $blog->title;
        $this->Log($message);
    }

    /**
     * Handle the Blog "updated" event.
     */
    public function updated(Blog $blog): void
    {
        $message = 'Edited Blog ' . $blog->title;
        $this->Log($message);
    }

    /**
     * Handle the Blog "deleted" event.
     */
    public function deleted(Blog $blog): void
    {
        $message = 'Deleted Blog ' . $blog->title;
        $this->Log($message);
    }

    /**
     * Handle the Blog "restored" event.
     */
    public function restored(Blog $blog): void
    {
        $message = 'Restored Blog ' . $blog->title;
        $this->Log($message);
    }

    /**
     * Handle the Blog "force deleted" event.
     */
    public function forceDeleted(Blog $blog): void
    {
        $message = 'Destroy Blog ' . $blog->title;
        $this->Log($message);
    }
}
