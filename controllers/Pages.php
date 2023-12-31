<?php

namespace Theme\Controllers;

use Dev\Bookstore\Books\Models\Books;
use Dev\Bookstore\Faqs\Models\Faqs;
use Theme\Models\Posts;
use Themosis\Route\BaseController;

class Pages extends BaseController
{
    /**
     * Handle the home page.
     *
     * @param \Dev\Bookstore\Books\Models\Books $books The books model.
     * @param \Theme\Models\Posts $posts The posts model class.
     * @param \WP_Post $post The home page WP_Post instance.
     *
     * @return string
     */
    public function home(Books $books, Posts $posts, $post)
    {
        // Get the promoted book ID.
        // $id = meta('book-promo', $post->ID);

        return view('twig.pages.home', []);

    }

    /**
     * Handle about page request.
     *
     * @param \Theme\Models\Posts $posts The posts model class.
     * @param \WP_Post $post The about page WP_Post instance.
     *
     * @return string
     */
    public function about(Posts $posts, $post)
    {
        return view('twig.pages.about', [
            'page' => $post,
            'members' => meta('collaborators', $post->ID),
            'latest_articles' => $posts->find(['posts_per_page' => 2])->get()
        ]);
    }

    /**
     * Handle the help page request.
     *
     * @param \Dev\Bookstore\Faqs\Models\Faqs $faqs The Faqs model.
     * @param \WP_Post $post The help page WP_Post.
     *
     * @return string
     */
    public function help(Faqs $faqs, $post)
    {
        return view('twig.pages.help', [
            'page' => $post,
            'faqs' => $faqs->find(['posts_per_page' => 250])->get()
        ]);
    }
}
