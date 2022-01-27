<?php

namespace Modules\Article\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('admin_sidebars', function ($menu) {
            // Separator: Module Management
            $all_modules = $menu->add(trans('oa_menues.backend.sidebar.modules'), [
                'class' => 'c-sidebar-nav-title',
            ])
            ->data('order', 80);

            // Articles Dropdown
            $articles_menu = $menu->add('<i class="c-sidebar-nav-icon fas fa-file-alt"></i>' . trans('oa_menues.backend.sidebar.article'), [
                'class' => 'c-sidebar-nav-dropdown',
            ])
            ->data([
                'order'         => 81,
                'activematches' => [
                    'admin/posts*',
                    'admin/categories*',
                ],
                'permission' => ['view_posts', 'view_categories'],
            ]);
            $articles_menu->link->attr([
                'class' => 'c-sidebar-nav-dropdown-toggle',
                'href'  => '#',
            ]);

            // Submenu: Posts
            $articles_menu->add('<i class="c-sidebar-nav-icon fas fa-file-alt"></i> ' . trans('oa_menues.backend.sidebar.posts'), [
                'route' => 'backend.posts.index',
                'class' => 'c-sidebar-nav-item',
            ])
            ->data([
                'order'         => 82,
                'activematches' => 'admin/posts*',
                'permission'    => ['edit_posts'],
            ])
            ->link->attr([
                'class' => "c-sidebar-nav-link",
            ]);
            // Submenu: Categories
            $articles_menu->add('<i class="c-sidebar-nav-icon fas fa-sitemap"></i> ' . trans('oa_menues.backend.sidebar.categories'), [
                'route' => 'backend.categories.index',
                'class' => 'c-sidebar-nav-item',
            ])
            ->data([
                'order'         => 83,
                'activematches' => 'admin/categories*',
                'permission'    => ['edit_categories'],
            ])
            ->link->attr([
                'class' => "c-sidebar-nav-link",
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
