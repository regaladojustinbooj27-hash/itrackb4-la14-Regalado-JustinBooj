Q1
If the form used GET instead of POST, the book information would be added to the URL. When the user refreshes the page, the browser would send the same information again. This could cause the same book to be added again and again without showing a warning.

POST works differently because it is used when we want to save or change something. If we refresh a page that came from a POST request, the browser usually asks if we want to send the form again. This is why we use Post-Redirect-Get. The POST saves the book first, then it sends the user to another page using GET. So, when the user refreshes, only the GET page is loaded again and the book is not saved again.




Q2
I don't need to check validate() myself because $request->validate([...]) already does it for me.

If the information entered by the user is not correct, Laravel stops the code at $request->validate([...]) and shows the validation errors. Because the code stops there, the parts after it, like creating $newBook, adding it to $books, and calling saveBooks(), will not run.

Laravel then sends the user back to the form and shows the error messages. It also keeps the information they already entered, which is why we can use old() to put their previous answers back into the form.



Q3
The layout is shown on every page, but the success message is not always there. The layout only checks if session('success') has a message.

The message is only added when store() successfully saves the book and uses ->with('success', '...'). Laravel only keeps this message for the next page load. After that, the message is removed.

So, even though the layout checks for the message every time a page loads, the message only appears on the page right after the book is successfully saved. When the user refreshes or goes to another page, the message is already gone.