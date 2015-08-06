<?php namespace Tests;
use \PHPUnit_Framework_TestCase as PhpUnitTestCase;
use \LogExpander\Events\Event as Event;

class EventTest extends PhpUnitTestCase {
    protected $cfg;
    protected $repo;

    public function __construct() {
        $this->cfg = (object) [
            'wwwroot' => 'http://www.example.com',
            'release' => '1.0.0',
        ];
        $this->repo = new TestRepository((object) [], $this->cfg);
    }

    /**
     * Sets up the tests.
     * @override PhpUnitTestCase
     */
    public function setup() {
        $this->event = new Event($this->repo);
    }

    /**
     * Tests the read method of the Event.
     */
    public function testRead() {
        $input = $this->constructInput();
        $output = $this->event->read($input);
        $this->assertOutput($input, $output);
    }

    protected function constructInput() {
        return [
            'userid' => 1,
            'relateduserid' => 1,
            'courseid' => 1,
            'timecreated' => 1433946701,
            'eventname' => '\core\event\course_viewed',
        ];
    }

    protected function assertOutput($input, $output) {
        $this->assertUser($input['userid'], $output['user']);
        $this->assertUser($input['relateduserid'], $output['relateduser']);
        $this->assertCourse($input['courseid'], $output['course']);
        $this->assertCourse(1, $output['app']);
        $this->assertEquals($input, $output['event']);
        $this->assertInfo($input, $output['info']);
    }

    protected function assertInfo($input, $output) {
        $version = str_replace("\r\n", "", file_get_contents(__DIR__.'/../VERSION'));
        $this->assertEquals($this->cfg->release, $output->{'https://moodle.org/'});
        $this->assertEquals($version, $output->{'https://github.com/LearningLocker/Moodle-Log-Expander'});
    }

    protected function assertRecord($input, $output) {
        $this->assertEquals($input, $output->id);
        $this->assertEquals('object', $output->type);
    }

    protected function assertUser($input, $output) {
        $this->assertRecord($input, $output);
        $this->assertEquals($this->cfg->wwwroot, $output->url);
    }

    private function assertCourse($input, $output) {
        $this->assertRecord($input, $output);
        $this->assertEquals($this->cfg->wwwroot . '/course.php?id=' . $output->id, $output->url);
    }
    
    protected function assertModule($input, $output, $type) {
        $this->assertRecord($input, $output);
        $this->assertEquals($this->cfg->wwwroot . '/mod/'.$type.'/view.php?id=' . $output->id, $output->url);
    }

    protected function assertAttempt($input, $output) {
        $this->assertRecord($input, $output);
        $this->assertEquals($this->cfg->wwwroot . '/mod/quiz/attempt.php?attempt=' . $output->id, $output->url);
    }
    
    protected function assertDiscussion($input, $output) {
        $this->assertRecord($input, $output);
        $this->assertEquals($this->cfg->wwwroot . '/mod/forum/discuss.php?d=' . $output->id, $output->url);
    }
}
