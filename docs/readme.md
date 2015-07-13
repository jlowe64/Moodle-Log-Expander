## Installation and Upgrading
You'll need to install [Composer](https://getcomposer.org/) first.

- Install with `composer require learninglocker/moodle-log-expander`.
- Update with `composer update learninglocker/moodle-log-expander`.


## Supported Events
Mapping for moodle event names to expander event classes can be found in the [Controller](../src/Controller.php).

Moodle Event | Expander Event | Test | Example
--- | --- | --- | ---
\core\event\course_viewed | [Event](../src/Events/Event.php) | [EventTest](../tests/EventTest.php) | [Event](examples/Event.json)
\mod_page\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_quiz\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_url\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_folder\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_book\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_scorm\event\course_module_viewed | [ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_quiz\event\attempt_preview_started | [AttemptEvent](../src/Events/AttemptEvent.php) | [AttemptEventTest](../tests/AttemptEventTest.php) | [AttemptEvent](examples/AttemptEvent.json)
\mod_quiz\event\attempt_reviewed | [AttemptEvent](../src/Events/AttemptEvent.php) | [AttemptEventTest](../tests/AttemptEventTest.php) | [AttemptEvent](examples/AttemptEvent.json)
\core\event\user_loggedin | [Event](../src/Events/Event.php) | [EventTest](../tests/EventTest.php) | [Event](examples/Event.json)
\core\event\user_loggedout | [Event](../src/Events/Event.php) | [EventTest](../tests/EventTest.php) | [Event](examples/Event.json)
\mod_assign\event\submission_graded | [AssignmentGraded](../src/Events/AssignmentGraded.php) | [AssignmentGradedTest](../tests/AssignmentGradedTest.php) | [AssignmentGraded](examples/AssignmentGraded.json)
\mod_assign\event\assessable_submitted | [AssignmentSubmitted](../src/Events/AssignmentSubmitted.php) | [AssignmentSubmittedTest](../tests/AssignmentSubmittedTest.php) | [AssignmentSubmitted](examples/AssignmentSubmitted.json)
\mod_forum\event\discussion_viewed| [DiscussionViewed](../src/Events/DiscussionEvent.php) | [ModuleEventTest](../tests/DiscussionEventTest.php) | [DiscussionViewed](examples/DiscussionEvent.json)
\mod_forum\event\user_report_viewed | ModuleEvent](../src/Events/ModuleEvent.php) | [ModuleEventTest](../tests/ModuleEventTest.php) | [ModuleEvent](examples/ModuleEvent.json)
\mod_quiz\event\attempt_abandoned | [AttemptEvent](../src/Events/AttemptEvent.php) | [AttemptEventTest](../tests/AttemptEventTest.php) | [AttemptEvent](examples/AttemptEvent.json)


## Adding Events
To add an event create a new file in the "src/Events/" directory. You can then use the [ModuleEvent](../src/Events/ModuleEvent.php) as an example of what you're new file should look like. You will also need to change the [src/Controller.php file](../src/Controller.php) to map the Moodle event to your new event. Once you're happy with what you've done you'll need to create a pull request so that everyone else can use your new event.

### First Pull Request
If this is your first pull request, you need to follow the steps below.

1. Click the "Fork" button (top right of Github). Github will fork (copy) this repository as your own so you can make changes.
2. Run `git remote set-url origin https://github.com/YOUR_USERNAME/Moodle-Log-Expander.git` (replacing `YOUR_USERNAME` for your Github username).

Once this is done, you can then follow the steps for [subsequent pull requests](#subsequent-pull-requests) below.

### Subsequent Pull Requests
1. Run `git add -A; git commit -am "DESCRIPTION";` to commit your changes (replacing `DESCRIPTION` with a description of what you've changed).
2. Run `git push` to push your commits to your forked repository.
3. Go to "https://github.com/YOUR_USERNAME/Moodle-Log-Expander/pulls" (replacing `YOUR_USERNAME` for your Github username).
4. Click the "New pull request" button to begin creating your pull request.
5. Click the "Create pull request" button (twice) to confirm the creation of your pull request.

Once step 5 is complete, we'll test and review your pull request before merging it with the rest of the code.
