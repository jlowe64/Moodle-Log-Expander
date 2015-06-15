<?php namespace LogExpander;
use \stdClass as PhpObj;

class Service extends PhpObj {
    protected $repo;

    /**
     * Constructs a new Service.
     * @param repository $repo The LRS to be used to store statements.
     */
    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }

    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    private function readEvent(array $opts) {
        return [
            'user' => $this->repo->readUser($opts['userid']),
            'course' => $this->repo->readCourse($opts['courseid']),
            'event' => $opts,
        ];
    }

    /**
     * Reads data for a course_viewed event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readCourseViewedEvent(array $opts) {
        return $this->readEvent($opts);
    }

    /**
     * Reads data for a module_viewed event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readModuleViewedEvent(array $opts) {
        return array_merge($this->readEvent($opts), [
            'module' => $this->repo->readModule($opts['objectid'], $opts['objecttable']),
        ]);
    }

    /**
     * Reads data for a attempt_started event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readAttemptStartedEvent(array $opts) {
        $attempt = $this->repo->readAttempt($opts['objectid']);
        return array_merge($this->readEvent($opts), [
            'attempt' => $attempt,
            'module' => $this->repo->readModule($attempt->quiz, 'quiz'),
        ]);
    }

    /**
     * Reads data for a user_loggedin event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readUserLoggedinEvent(array $opts) {
        return $this->readEvent($opts);
    }

    /**
     * Reads data for a user_loggedout event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readUserLoggedoutEvent(array $opts) {
        return $this->readEvent($opts);
    }

    /**
     * Reads data for a assignment_graded event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readAssignmentGradedEvent(array $opts) {
        $grade = $this->repo->readObject($opts['objectid'], $opts['objecttable']);
        return array_merge($this->readEvent($opts), [
            'grade' => $grade,
            'module' => $this->repo->readModule($grade->assignment, 'assign'),
        ]);
    }

    /**
     * Reads data for a assignment_submitted event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function readAssignmentSubmittedEvent(array $opts) {
        $submission = $this->repo->readObject($opts['objectid'], $opts['objecttable']);
        return array_merge($this->readEvent($opts), [
            'submission' => $submission,
            'module' => $this->repo->readModule($submission->assignment, 'assign'),
        ]);
    }
}
