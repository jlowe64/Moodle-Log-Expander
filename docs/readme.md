## Installation and Upgrading
You'll need to install [Composer](https://getcomposer.org/) first.

- Install with `composer require learninglocker/moodle-log-expander`.
- Update with `composer update learninglocker/moodle-log-expander`.


## Supported Events
Mapping for moodle event names to expander event classes can be found in the [Controller](../src/Controller.php).

Moodle Event | Expander Event
--- | ---
\core\event\course_viewed | [Event](../src/events/Event.php)
\mod_page\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.php)
\mod_quiz\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.php)
\mod_url\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.php)
\mod_folder\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.php)
\mod_book\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.php)
\mod_quiz\event\attempt_preview_started | [AttemptEvent](../src/events/AttemptEvent.php)
\mod_quiz\event\attempt_reviewed | [AttemptEvent](../src/events/AttemptEvent.php)
\core\event\user_loggedin | [Event](../src/events/Event.php)
\core\event\user_loggedout | [Event](../src/events/Event.php)
\mod_assign\event\submission_graded | [AssignmentGraded](../src/events/AssignmentGraded.php)
\mod_assign\event\assessable_submitted | [AssignmentSubmitted](../src/events/AssignmentSubmitted.php)
