F1
Authentication: this lesson gave the app a way to prove who a visitor is, through register, login and logout, so Laravel knows whether someone is signed in. Authorisation: still missing next meeting is deciding what each signed-in user is allowed to do, because right now any logged-in user can edit or delete any book.

F2
Regenerating the session ID after login gives the user a brand-new ID and discards the old one. If you skip it, you’re open to session fixation: an attacker who planted or learned a pre-login session ID would still hold a valid ID once the victim logs in, and could use it to act as that user.

F3
A specific message such as “no account with that email” tells an attacker which emails are registered, so they can build a list of real accounts and target them. One generic message (“credentials do not match our records”) reveals nothing about which part was wrong.

F4
Browsing is read-only and harmless, so a public library list is the point of the site, and visitors can look without an account. Create, edit, update and destroy change or remove data, so only signed-in users should do them. The split follows read versus write.

F5
Hiding a button only changes what the page shows. The URLs still exist, and anyone can type /books/create or send a request directly, as you did in screenshot 19. What actually stops a stranger is the auth middleware on those five routes, which runs on the server before the controller and redirects guests to login. The button is tidiness, and the middleware is the security.

F6
When auth middleware finds a guest, it redirects them to the route named login, looked up by name. If no route has that name, Laravel can’t build the URL and throws Route [login] not defined, which is what you saw in screenshot 20. So the name has to be exactly login, or locked pages crash instead of sending guests to the login form.