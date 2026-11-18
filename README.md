J1
My HomeController is not a resource controller because it only handles the home page. Unlike a resource controller, it does not need to provide other CRUD methods such as create() and store() for managing books.

J2
Before adding withQueryString(), the pagination links only contained the page number and did not include the search term or filters. Because of this, the controller received no search or filter values when I moved to another page, causing the results to reset.

J3
A misspelled sort value is worse than an error because the page still loads but may not sort the books as expected, making the problem harder to notice. The allowed list ensures that only title and year can be used for sorting, while invalid values automatically fall back to title.