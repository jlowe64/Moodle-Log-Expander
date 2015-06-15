## Installation and Upgrading
You'll need to install [Composer](https://getcomposer.org/) first.

- Install with `composer require learninglocker/moodle-log-expander`.
- Update with `composer update learninglocker/moodle-log-expander`.


## Supported Events
Moodle Event | Expander Event
--- | ---
\core\event\course_viewed | [Event](../src/events/Event.md)
\mod_page\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.md)
\mod_quiz\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.md)
\mod_url\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.md)
\mod_folder\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.md)
\mod_book\event\course_module_viewed | [ModuleEvent](../src/events/ModuleEvent.md)
\mod_quiz\event\attempt_preview_started | [AttemptEvent](../src/events/AttemptEvent.md)
\mod_quiz\event\attempt_reviewed | [AttemptEvent](../src/events/AttemptEvent.md)
\core\event\user_loggedin | [Event](../src/events/Event.md)
\core\event\user_loggedout | [Event](../src/events/Event.md)
\mod_assign\event\submission_graded | [AssignmentGraded](../src/events/AssignmentGraded.md)
\mod_assign\event\assessable_submitted | [AssignmentSubmitted](../src/events/AssignmentSubmitted.md)
