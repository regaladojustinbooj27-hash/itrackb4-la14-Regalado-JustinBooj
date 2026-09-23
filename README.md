
Q1

No new route was needed because the router only checks the path of the URL, not the query string. So /books, /books?author=Robert+C.+Martin, and /books?author=Robert+C.+Martin&title=Clean all have the same path: /books. Because of this, they are handled by the same Route::resource('books', ...) route and go to the index() method. The query parameters are only used later in the controller, where $request->query('author', null) and $request->query('title', null) retrieve them.

Q2

If the filters were added as route parameters, searching only for Robert C. Martin without a title would require something like /books/filter/Robert-C.-Martin/_. The _ would act as a placeholder for the missing title because route parameters depend on their position in the URL. This can become difficult to manage as more filters are added since every URL would need to include the extra parameters, even when they aren't being used. Query strings are more flexible because each filter has its own name, they are optional, and they can be included in any order.

Q3

Only the detail-page situation required a change. The navigation pattern needed to use books* instead of just books because a page such as /books/4 has an additional path segment compared to /books. The filtered page didn't need any changes because /books?author=Robert+C.+Martin still has /books as its path. Since request()->is() only checks the path and ignores the query string, the same pattern works for both the normal and filtered book list.

Q4

The store() and update() methods are still unfinished because the features for creating and editing books haven't been implemented yet. Keeping these methods in the controller shows that they are planned features that will be worked on later.

The old filter() method was different because that feature had already been replaced. Filtering was moved into the index() method using query strings, so the old filter() method was no longer being used. Leaving it there would just create unnecessary duplicate code and two different ways of handling the same feature. Removing it keeps the project cleaner and avoids having outdated code hanging around.