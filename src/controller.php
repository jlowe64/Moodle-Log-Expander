<?php namespace LogExpander;
use \stdClass as PhpObj;

class Controller extends PhpObj {
    protected $service;
    public static $routes = [
        '\core\event\course_viewed' => 'readCourseViewedEvent',
        '\mod_page\event\course_module_viewed' => 'readModuleViewedEvent',
        '\mod_quiz\event\course_module_viewed' => 'readModuleViewedEvent',
        '\mod_url\event\course_module_viewed' => 'readModuleViewedEvent',
        '\mod_folder\event\course_module_viewed' => 'readModuleViewedEvent',
        '\mod_book\event\course_module_viewed' => 'readModuleViewedEvent',
        '\mod_quiz\event\attempt_preview_started' => 'readAttemptStartedEvent',
        '\mod_quiz\event\attempt_reviewed' => 'readAttemptStartedEvent',
        '\core\event\user_loggedin' => 'readUserLoggedinEvent',
        '\core\event\user_loggedout' => 'readUserLoggedoutEvent',
        '\mod_assign\event\submission_graded' => 'readAssignmentGradedEvent',
        '\mod_assign\event\assessable_submitted' => 'readAssignmentSubmittedEvent',
    ];

    /**
     * Constructs a new Controller.
     * @param service $service
     */
    public function __construct(Service $service) {
        $this->service = $service;
    }

    /**
     * Creates a new event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function createEvent(array $opts) {
        $route = isset($opts['eventname']) ? $opts['eventname'] : '';
        if (isset(static::$routes[$route])) {
            return $this->service->{static::$routes[$route]}($opts);
        } else {
            return null;
        }
    }
}
