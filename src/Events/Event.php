<?php namespace LogExpander\Events;
use \LogExpander\Repository as Repository;
use \stdClass as PhpObj;

class Event extends PhpObj {
    protected $repo;

    /**
     * Constructs a new Event.
     * @param repository $repo
     */
    public function __construct(Repository $repo) {
        $this->repo = $repo;
    }

    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     */
    public function read(array $opts) {
        $version = str_replace("\r\n", "", file_get_contents(__DIR__.'/../../VERSION'));
        $user_id = $opts['userid'] > 0 ? $opts['userid'] : $opts['relateduserid'];
        return [
            'user' => $this->repo->readUser($user_id),
            'course' => $this->repo->readCourse($opts['courseid']),
            'app' => $this->repo->readCourse(1),
            'info' => (object) [
                'https://moodle.org/' => $this->repo->readRelease(),
                'https://github.com/LearningLocker/Moodle-Log-Expander' => $version,
            ],
            'event' => $opts,
        ];
    }
}